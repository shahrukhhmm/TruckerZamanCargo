<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Deal;
use App\Models\Client;
use App\Models\LedgerReport;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {

        $clients = Client::count();
        return view('admin.client.index',compact('clients'));
    }


    // yajra pagination
    public function getClients(Request $request)
    {
        if ($request->ajax()) {

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            if($fromDate == null && $toDate == null){

                $data = Client::get();
            }

            else{
                //Date Filter
                $data = Client::whereBetween('created_at', [$fromDate, $toDate])->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()


                ->addColumn('action', function ($row) {

                    $btn = '<button class="btn btn-sm  btn-info ml-2 my-3 edit" value="' . $row->id . '" type="button"><i class="fa fa-edit"></i></button>';
                    $btn = $btn .  '<a class="btn btn-sm btn-danger ml-2 my-3" href="'.url('/client-delete/'.$row->id).'" role="button"><i class="fa fa-trash"></i></a>';
                    $btn = $btn .  '<a class="btn btn-sm btn-dark ml-2 my-3" href="'.url('/client-detail/'.$row->id).'" role="button"><i class="fa fa-eye"></i></a>';

                    $btn = $btn .  '<a class="btn btn-sm btn-secondary ml-2 my-3" href="'.url('/ledger-report/'.$row->id).'" role="button"><i class="fa-solid fa-print"></i></a>';

                    return $btn;
                })

                ->addColumn('created', function ($row) {

                    $created_at = $row->created_at;

                    $formatted_date = Carbon::parse($created_at)->format('Y-m-d H:i:s');
                    return $formatted_date;
                })
                ->rawColumns(['action', 'created'])
                ->make(true);

        }
    }


    public function addClient(Request $req){

        Client::insert([
            'name' => $req->client_name,
            'date' => $req->client_date,
            'contact' => $req->client_contact,
            'reference' => $req->client_reference,
            'created_at' => now(),
        ]);


        return redirect()->back();
    }



    // edit
    public function editClient($id){

        $client = Client::find($id);

        return response()->json([
            'client'=>$client,
        ]);
    }


    // update Client
    public function updateClient(Request $req){

        $client = Client::find($req->clientId);

        $client->name = $req->name;

        $client->date = $req->date;
        $client->contact = $req->contact;
        $client->reference = $req->reference;

        $client->save();

        return redirect()->back();

    }


    // delete Customer
    public function deleteClient($id){

        $client=Client::find($id);

        if ($client) {
            LedgerReport::where('client_id', $id)->delete();

            $client->delete();

            session()->flash('message', 'Client and associated ledger reports deleted successfully!');
        } else {
            session()->flash('message', 'Client not found!');
        }


        return redirect()->back();
    }


    //  ==========================legdger



      // detail
    public function detailClient($id){

        $client=Client::find($id);


        return view('admin.client.detail', compact('client'));
    }

    // transactionStore
    public function ledgerStore(Request $request){

        LedgerReport::insert([
            'client_id'=> $request->client_id,
            'amount'=> $request->amount,
            'detail'=> $request->detail,
            'status'=> $request->status,
            'date'=>$request->date,
            'created_at'=>now(),

        ]);


        return redirect()->back();
    }


    public function ledgerList(Request $request){
        if ($request->ajax()) {

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            $client_id = $request->input('client_id');

            if($fromDate == null && $toDate == null){

                $data = LedgerReport::where('client_id',$client_id)->get();
            }

            else{
                //Date Filter
                $data = LedgerReport::where('client_id',$client_id)->whereBetween('created_at', [$fromDate, $toDate])->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn =   '<a class="btn btn-sm  btn-info btn-info ml-2 my-3" href="'.url('/edit-ledger/'.$row->id).'" role="button"><i class="fa fa-edit"></i></a>';

                    // $btn = $btn .  '<a class="btn btn-sm btn-danger ml-2 my-3" href="'.url('/trans-delete/'.$row->id).'" role="button"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->addColumn('amount', function ($row) {

                    if($row->status  == 'Used'){
                        $amount = '-'. $row->amount;
                    }else{
                        $amount =  $row->amount;

                    }

                    return $amount;
                })
                ->addColumn('status', function ($row) {

                    if($row->status  == 'Used'){
                        $sta  = 'Received';
                    }else{
                        $sta  = 'Paid' ;

                    }

                    return $sta ;
                })
                ->addColumn('created', function ($row) {

                    $created_at = $row->created_at;

                    $formatted_date = Carbon::parse($created_at)->format('Y-m-d H:i:s');
                    return $formatted_date;
                })
                ->rawColumns(['action', 'created','amount','status'])
                ->make(true);

        }
    }



      // edit Ledger
      public function editLedger($id){

        $ledger = LedgerReport::find($id);



        return view('admin.client.ledgerEdit', compact('ledger'));

    }

    // update Ledger
    public function updateLedger(Request $req){


        $ledger = LedgerReport::where('id',$req->ledger_Id)->first();

        $ledger->date = $req->date;
        $ledger->amount = $req->amount;
        $ledger->status = $req->status;
        $ledger->detail = $req->detail;

        $ledger->save();

        return redirect()->back();

    }



    public function ledgerReport($id)
    {
        $ledger = LedgerReport::with('client')->where('client_id', $id)->get();

        // Get the client information
        $client = Client::find($id);

        // Calculate total credit amount
        $totalUsed = LedgerReport::where('client_id', $id)->where('status', 'Used')->sum('amount');

        $totalPaid = LedgerReport::where('client_id', $id)->where('status', 'Paid')->sum('amount');

        $balance = $totalPaid - $totalUsed;

        return view('admin.client.ledgerReport', compact('ledger', 'client', 'totalPaid', 'totalUsed', 'balance'));

        // $pdf = Pdf::setOption(['isHtmlParserEnabled' => true,'isRemoteEnabled'=>true,'defaultFont' => 'sans-serif'])->loadView('admin.subAdmin.show', compact('sale'))->setPaper('A4', 'landscape');

        // return $pdf->stream("pdfcard.pdf");

        // return view('admin.subAdmin.show', compact('sale'));
    }
}
