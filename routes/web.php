<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ZakatController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\BalanceController;
use App\Http\Controllers\SubAdmin\SaleController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\SubAdmin\AttendanceController;
use App\Http\Controllers\Admin\InventoryCategoryController;
use App\Http\Controllers\SuperAdmin\SaleController as SuperAdminSaleController;


Route::get('/optimize', function() {
    Artisan::call('optimize');
    return "optimized!";
});

    // routes/web.php
Route::get('lang/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('setLanguage');

Route::redirect('/', '/dashboard');


Route::get('register', [AuthController::class, 'registerPage'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');
Route::get('login', [AuthController::class, 'loginPage'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');



Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('/all-branch-sales', [SaleController::class, 'allBranchSales'])->name('branch.allSales');





    //================ customer


    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');

    Route::get('/customers-list', [CustomerController::class, 'getCustomers'])->name('customer.list');

    // add customer
    Route::post('/add-customer',                     [CustomerController::class, 'addCustomer'])->name('customer.add');

    // edit customer
    Route::get('/edit-customer/{id}',                [CustomerController::class, 'editCustomer'])->name('customer.edit');

    // update customer
    Route::get('/update-customer',                   [CustomerController::class, 'updateCustomer'])->name('customer.update');

    // customer delete
    Route::get('/customer-delete/{id}',              [CustomerController::class, 'deleteCustomer'])->name('customer.delete');


    // profile customer
    Route::get('/profile-customer',                   [CustomerController::class, 'profileCustomer'])->name('customer.profile');





    // --------------=========Sub Admin


    Route::get('/deals', [SaleController::class, 'index'])->name('deal.index');

    Route::get('/invoice/{id}', [SaleController::class, 'createDealPdf'])->name('invoice.show');

    Route::get('/transaction-history/{id}', [SaleController::class, 'createTransactionPdf'])->name('invoice.transactionPdf');

    Route::post('/deals', [SaleController::class, 'store'])->name('deals.store');

    Route::get('/deal-list', [SaleController::class, 'list'])->name('deals.list');

    Route::get('/get-customer/{id}', [SaleController::class, 'getCustomer'])->name('invoice.getCustomer');

    // edit deal
    Route::get('/edit-deal/{id}',  [SaleController::class, 'editDeal'])->name('Deal.edit');

    // update Deal
    Route::post('/update-deal',     [SaleController::class, 'updateDeal'])->name('Deal.update');

    // Deal delete
    Route::get('/deal-delete/{id}',[SaleController::class, 'deleteDeal'])->name('Deal.delete');

    // Deal detail
    Route::get('/deal-detail/{id}',[SaleController::class, 'detailDeal'])->name('Deal.detail');

    //  transaction store
    Route::post('/transaction-store', [SaleController::class, 'transactionStore'])->name('transaction.store');


    Route::get('/trans-list', [SaleController::class, 'transList'])->name('trans.list');

    Route::get('/edit-trans/{id}', [SaleController::class, 'editTrans'])->name('trans.edit');

    // trans update

    Route::post('/update-trans', [SaleController::class, 'updateTrans'])->name('trans.update');

    // Trans delete
    Route::get('/trans-delete/{id}',[SaleController::class, 'deleteTrans'])->name('Trans.delete');






    // =============client


    Route::get('/client', [ClientController::class, 'index'])->name('client');


    Route::get('/clients-export', [ClientController::class, 'exportExcel'])->name('clients.export');


    Route::get('/clients-list', [ClientController::class, 'getClients'])->name('client.list');

    // add client
    Route::post('/add-client',                     [ClientController::class, 'addClient'])->name('client.add');

    // edit client
    Route::get('/edit-client/{id}',                [ClientController::class, 'editClient'])->name('client.edit');

    // update client
    Route::get('/update-client',                   [ClientController::class, 'updateClient'])->name('client.update');

    // client delete
    Route::get('/client-delete/{id}',              [ClientController::class, 'deleteClient'])->name('client.delete');

    // ======================ledger

    // client detail
    Route::get('/client-detail/{id}',[ClientController::class, 'detailClient'])->name('client.detail');

    //  ledger store
    Route::post('/ledger-store', [ClientController::class, 'ledgerStore'])->name('ledger.store');


    Route::get('/ledger-list', [ClientController::class, 'ledgerList'])->name('ledger.list');

    Route::get('/edit-ledger/{id}', [ClientController::class, 'editLedger'])->name('ledger.edit');


    // trans update

    Route::post('/update-ledgers', [ClientController::class, 'updateLedger'])->name('ledger.update');

    // Ledger delete
    Route::get('/ledger-delete/{id}',[ClientController::class, 'deleteLedger'])->name('ledger.delete');


    Route::get('/ledger-report/{id}', [ClientController::class, 'ledgerReport'])->name('ledger.report');





    // ==============blanace sheet

      // client detail
      Route::get('/balance-page',[BalanceController::class, 'pageBalance'])->name('balance.detail');

      Route::get('/balance-list', [BalanceController::class, 'BalanceList'])->name('balance.list');

      Route::get('/balance-sheet-print', [BalanceController::class, 'BalanceSheet'])->name('balance.sheet');

});
