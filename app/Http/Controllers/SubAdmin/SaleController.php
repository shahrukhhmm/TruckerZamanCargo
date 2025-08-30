<?php

namespace App\Http\Controllers\SubAdmin;

use Carbon\Carbon;
use App\Models\Deal;
use App\Models\Customer;
use App\Models\Transection;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class SaleController extends Controller
{
    public function index()
    {


        $user = Auth::user();
        $customers = Customer::get();
        return view('admin.deal.index',compact('user','customers'));
    }


    public function getCustomer($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        return response()->json($customer);
    }

    public function store(Request $request)
    {
        $deal = new Deal();

        $deal->container_number = $request->container_number;
        $deal->date_of_loading = $request->date_of_loading;
        $deal->date_of_shipping = $request->date_of_shipping;
        $deal->customer_id = $request->customer_id;
        $deal->shipping_mark = $request->shipping_mark;
        $deal->place = $request->place;
        $deal->date = $request->date;

        $dealsData = [];
        $totalAmount = 0;

        foreach ($request->deals as $dealData) {
            $ctn = (float) $dealData['ctn'];
            $quantity = (float) $dealData['quantity'];
            $weight = (float) $dealData['weight'];
            $cbm = (float) $dealData['cbm'];
            $rate = (float) $dealData['rate'];

            $total_quantity = $quantity * $ctn;
            $total_weight = $weight * $ctn;
            $total_cbm = $cbm * $ctn;

            // $amount = $dealData['rate_type'] == 'CBM' ? $rate * $total_cbm : $rate * $total_weight;
            $amount = 0;
            if ($dealData['rate_type'] == 'CBM') {
                $amount = $rate * $total_cbm;
            } else if($dealData['rate_type'] == 'PC') {
                $amount = $rate * $total_quantity;
            } else {
                $amount = $rate * $total_weight;
            }

            $dealsData[] = [
                'item_name'      => $dealData['item_name'],
                'ctn'            => $ctn,
                'quantity'       => $quantity,
                'total_quantity' => $total_quantity,
                'weight'         => $weight,
                'total_weight'   => $total_weight,
                'cbm'            => $cbm,
                'total_cbm'      => $total_cbm,
                'rate_type'      => $dealData['rate_type'],
                'rate'           => $rate,
                'amount'         => $amount,
            ];


            $totalAmount += $amount;
        }

        // dd($dealsData);

        $deal->deals_json = json_encode($dealsData);

        $deal->total_amount = $totalAmount;

        $deal->save();

        return redirect()->back()->with('success', 'Deal and related items saved successfully. Total Amount: ' . $totalAmount);
    }





    public function createDealPdf($id)
    {
        $deal = Deal::with('customer')->findOrFail($id);

        // Check if deals_json is a string or array
        $dealsData = is_string($deal->deals_json) ? json_decode($deal->deals_json, true) : $deal->deals_json;

        // Initialize totalCtn
        $totalCtn = 0;
        foreach ($dealsData as $key) {
            $totalCtn += $key['ctn'];
        }

        return view('admin.deal.dealInvoice', compact('deal', 'dealsData', 'totalCtn'));
    }


    public function list(Request $request){
        if ($request->ajax()) {

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            if($fromDate == null && $toDate == null){

                $data = Deal::with('customer')->get();
            }

            else{
                //Date Filter
                $data = Deal::with('customer')->whereBetween('created_at', [$fromDate, $toDate])->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn =   '<a class="btn btn-sm  btn-info btn-info ml-2 my-3" href="'.url('/edit-deal/'.$row->id).'" role="button"><i class="fa fa-edit"></i></a>';
                    $btn = $btn .  '<a class="btn btn-sm btn-secondary ml-2 my-3" href="'.url('/invoice/'.$row->id).'" role="button"><i class="fa-solid fa-print"></i></a>';
                    $btn = $btn .  '<a class="btn btn-sm btn-primary ml-2 my-3" href="'.url('/deal-detail/'.$row->id).'" role="button"><i class="fa fa-eye"></i></a>';
                    // $btn = $btn .  '<a class="btn btn-sm btn-danger ml-2 my-3" href="'.url('/deal-delete/'.$row->id).'" role="button"><i class="fa fa-trash"></i></a>';


                    $btn .= '<button class="btn btn-sm btn-danger ml-2 my-3 delete" data-id="' . $row->id . '" type="button"><i class="fa fa-trash"></i></button>';

                    return $btn;
                })
                ->addColumn('balance', function ($row) {

                    $balance = $row->total_amount - $row->paid_amount;

                    return $balance;
                })
                ->addColumn('created', function ($row) {

                    $created_at = $row->created_at;

                    $formatted_date = Carbon::parse($created_at)->format('d-m-Y');
                    return $formatted_date;
                })
                ->addColumn('date', function ($row) {

                    $date = $row->date;

                    $formatted_date = Carbon::parse($date)->format('d-m-Y');
                    return $formatted_date;
                })
                ->rawColumns(['action', 'created','date'])
                ->make(true);

        }
    }



    // edit
    public function editDeal($id)
    {
        $deal = Deal::find($id);

        $customers = Customer::all();

         $dealsData = is_string($deal->deals_json) ? json_decode($deal->deals_json, true) : $deal->deals_json;


        return view('admin.deal.edit', compact('deal', 'customers', 'dealsData'));
    }

    // Update
    public function updateDeal(Request $request)
    {
        $deal = Deal::find($request->deal_Id);

        $deal->container_number = $request->container_number;
        $deal->date_of_loading = $request->date_of_loading;
        $deal->date_of_shipping = $request->date_of_shipping;
        $deal->customer_id = $request->customer_id;
        $deal->shipping_mark = $request->shipping_mark;
        $deal->place = $request->place;
        $deal->date = $request->date;
        $deal->status = $request->status;

        $totalAmount =0;
        $dealsData = [];
        foreach ($request->deals as $dealData) {

            $ctn = (float) $dealData['ctn'];
            $quantity = (float) $dealData['quantity'];
            $weight = (float) $dealData['weight'];
            $cbm = (float) $dealData['cbm'];
            $rate = (float) $dealData['rate'];

            $total_quantity = $quantity * $ctn;
            $total_weight = $weight * $ctn;
            $total_cbm = $cbm * $ctn;

            $amount = $dealData['rate_type'] == 'CBM' ? $rate * $total_cbm : $rate * $total_weight;

            $dealsData[] = [

                'item_name' => $dealData['item_name'],
                'ctn' => $dealData['ctn'],
                'quantity' => $dealData['quantity'],
                'total_quantity' => $total_quantity,
                'weight' => $dealData['weight'],
                'total_weight' => $total_weight,
                'cbm' => $dealData['cbm'],
                'total_cbm' => $total_cbm,
                'rate_type' => $dealData['rate_type'],
                'rate' => $dealData['rate'],
                'amount' => $amount,
            ];

            $totalAmount += $amount;
        }

        $deal->deals_json = json_encode($dealsData);


        $deal->total_amount = $totalAmount;

        $deal->save();

        $deal->save();

        return redirect('/deals')->with('success', 'Deal updated successfully.');
    }


    // delete
    public function deleteDeal($id){

        $deal=Deal::find($id);

        if ($deal) {
            $deal->delete();
        }

        session()->flash('message', 'Deal deleted successfully!');

        return redirect()->back();
    }

    // detail
    public function detailDeal($id){

        $deal=Deal::with('customer')->find($id);

        $customers = Customer::get();

        return view('admin.deal.detail', compact('deal','customers'));
    }

    // transactionStore
    public function transactionStore(Request $request){

        $transa = Transection::insert([
            'customer_id'=> $request->customer_id,
            'deal_id'=> $request->deal_id,
            'amount'=> $request->amount,
            'date'=>$request->date,
            'created_at'=>now(),

        ]);

        $deal = Deal::where('id', $request->deal_id)->first();

        $deal->paid_amount  = $deal->paid_amount + $request->amount;

        $deal->update();

        return redirect()->back();
    }


    public function transList(Request $request){
        if ($request->ajax()) {

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            $deal_id = $request->input('deal_id');

            if($fromDate == null && $toDate == null){

                $data = Transection::with('deal')->where('deal_id',$deal_id)->get();
            }

            else{
                //Date Filter
                $data = Transection::with('deal')->where('deal_id',$deal_id)->whereBetween('created_at', [$fromDate, $toDate])->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn =   '<a class="btn btn-sm  btn-info btn-info ml-2 my-3" href="'.url('/edit-trans/'.$row->id).'" role="button"><i class="fa fa-edit"></i></a>';

                    $btn = $btn .  '<a class="btn btn-sm btn-danger ml-2 my-3" href="'.url('/trans-delete/'.$row->id).'" role="button"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->addColumn('created', function ($row) {

                    $created_at = $row->created_at;

                    $formatted_date = Carbon::parse($created_at)->format('Y-m-d');
                    return $formatted_date;
                })
                ->rawColumns(['action', 'created'])
                ->make(true);

        }
    }



      // edit trans
      public function editTrans($id){

        $trans = Transection::find($id);

        return view('admin.deal.transEdit', compact('trans'));

    }

    // update trans
    public function updateTrans(Request $req){


        $trans = Transection::find($req->trans_Id);

        $trans->date = $req->date;
        $trans->amount = $req->amount;

        $trans->save();

        return redirect()->back();

    }



    // delete
    public function deleteTrans($id){

        $trans=Transection::find($id);

        $deal=Deal::where('id', $trans->deal_id)->first();

        $deal->paid_amount=$deal->paid_amount-$trans->amount;

        $deal->update();

        if ($trans) {
            $trans->delete();
        }

        session()->flash('message', 'Transaction deleted successfully!');

        return redirect()->back();
    }


    public function createTransactionPdf($id)
    {
        $trans = Transection::with('deal.customer')->where('deal_id',$id)->get();
        $deal = Deal::with('customer')->where('id',$id)->first();

        // dd($trans);

        return view('admin.deal.transactionInvoice', compact('trans','deal'));

        // $pdf = Pdf::setOption(['isHtmlParserEnabled' => true,'isRemoteEnabled'=>true,'defaultFont' => 'sans-serif'])->loadView('admin.subAdmin.show', compact('sale'))->setPaper('A4', 'landscape');

        // return $pdf->stream("pdfcard.pdf");

        // return view('admin.subAdmin.show', compact('sale'));
    }
}
