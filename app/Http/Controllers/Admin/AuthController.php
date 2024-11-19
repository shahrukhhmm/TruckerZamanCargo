<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Deal;
use App\Models\Sale;
use App\Models\User;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\SaleItem;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\UserAttandance;
use App\Models\InventoryCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function registerPage()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function loginPage()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }


    // dashboard

    public function dashboard()
    {
        $user = Auth::user();


        $customer = Customer::count();
        $deal = Deal::count();

        return view('admin.dashboard.index', compact('customer','deal'));
    }
}
