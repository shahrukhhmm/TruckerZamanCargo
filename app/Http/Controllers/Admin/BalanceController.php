<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\LedgerReport;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class BalanceController extends Controller
{
    // detail
    public function pageBalance(){

        // $client=Client::find($id);


        return view('admin.client.balanceSheet');
    }


    public function BalanceList(Request $request){
        if ($request->ajax()) {

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');


            if($fromDate == null && $toDate == null){

                $data = LedgerReport::with('client')->get();
            }

            else{
                //Date Filter
                $data = LedgerReport::with('client')->whereBetween('created_at', [$fromDate, $toDate])->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('created', function ($row) {

                    $created_at = $row->created_at;

                    $formatted_date = Carbon::parse($created_at)->format('Y-m-d H:i:s');
                    return $formatted_date;
                })->addColumn('amount', function ($row) {

                    if($row->status  == 'Used'){
                        $amount = '-'. $row->amount;
                    }else{
                        $amount =  $row->amount;

                    }

                    return $amount;
                })
                ->rawColumns([ 'created','amount'])
                ->make(true);

        }
    }

    public function BalanceSheet(Request $request)
    {
        // if ($request->ajax()) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            $data = LedgerReport::with('client')
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->get();

            $balanceSheet = [];
            $totalPayable = 0;
            $totalReceivable = 0;

            $groupedData = $data->groupBy('client_id');

            foreach ($groupedData as $clientId => $ledgerReports) {
                $clientName = $ledgerReports->first()->client->name;
                $clientPhone = $ledgerReports->first()->client->contact;
                $totalUsed = 0;
                $totalPaid = 0;


                foreach ($ledgerReports as $report) {
                    if ($report->status == 'Used') {
                        $totalUsed += $report->amount;
                    } elseif ($report->status == 'Paid') {
                        $totalPaid += $report->amount;
                    }
                }

                $balance = $totalPaid - $totalUsed;

                $balanceSheet[] = [
                    'client' => $clientName,
                    'phone' => $clientPhone,
                    'total_used' => $totalUsed,
                    'total_paid' => $totalPaid,
                    'balance' => $balance
                ];

                if ($balance > 0) {
                    $totalReceivable += $balance;
                } else {
                    $totalPayable += abs($balance);
                }
            }

            // // Output the results
            // dd([
            //     'balance_sheet' => $balanceSheet,
            //     'total_payable' => $totalPayable,
            //     'total_receivable' => $totalReceivable,
            // ]);


            return view('admin.client.balanceSheetPDf', compact('balanceSheet','totalReceivable', 'totalPayable'))->render();
        // }
    }

}
