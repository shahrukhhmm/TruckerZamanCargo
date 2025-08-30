<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Deal;
use App\Models\User;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Transection;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerController extends Controller
{
    public function index()
    {

        $customers = Customer::count();
        return view('admin.customer.index',compact('customers'));
    }






    // yajra pagination
    public function getCustomers(Request $request)
    {
        if ($request->ajax()) {

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            if($fromDate == null && $toDate == null){

                $data = Customer::get();
            }

            else{
                //Date Filter
                $data = Customer::whereBetween('created_at', [$fromDate, $toDate])->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $btn = '<button class="btn btn-sm btn-info ml-2 my-3 edit" value="' . $row->id . '" type="button"><i class="fa fa-edit"></i></button>';
                    $btn .= '<button class="btn btn-sm btn-danger ml-2 my-3 delete" data-id="' . $row->id . '" type="button"><i class="fa fa-trash"></i></button>';
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


    public function addCustomer(Request $req){

        Customer::insert([
            'name' => $req->customer_name,
            'details' => $req->customer_details,
            'contact' => $req->customer_contact,
            'location' => $req->customer_location,
            'created_at' => now(),
        ]);


        return redirect()->back();
    }



    // edit
    public function editCustomer($id){

        $customer = Customer::find($id);

        return response()->json([
            'customer'=>$customer,
        ]);
    }


    // update Customer
    public function updateCustomer(Request $req){

        $customer = Customer::find($req->customerId);

        $customer->name = $req->name;

        $customer->details = $req->details;
        $customer->contact = $req->contact;
        $customer->location = $req->location;

        $customer->save();

        return redirect()->back();

    }


    // delete Customer
    public function deleteCustomer($id){

        $customer=Customer::find($id);

        if ($customer) {

            Deal::where('customer_id', $id)->delete();
            Transection::where('customer_id', $id)->delete();

            $customer->delete();
        }

        session()->flash('message', 'Customer deleted successfully!');

        return redirect()->back();
    }

    // update profile
    public function profileCustomer(){

        $user = Auth::user();


        return view('admin.user.profile',compact('user'));
    }


}
