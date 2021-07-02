<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

#Dashboard route
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


#Ride routes
Route::prefix('rides')->group(function(){
    Route::get('/', [App\Http\Controllers\Backend\RideController::class, 'index'])->name('manage-rides');
});

#User routes
Route::get('/user/detail/{id}', [App\Http\Controllers\Backend\UserController::class, 'userDetail'])->name('user-detail');
Route::post('/user/update-account-status',[App\Http\Controllers\Backend\UserController::class, 'updateAccountStatus'])->name('update-account-status');


#Driver routes
Route::prefix('driver')->group(function(){
    Route::get('/', [App\Http\Controllers\Backend\DriverController::class, 'index'])->name('manage-drivers');
    Route::get('/new-registrations', [App\Http\Controllers\Backend\DriverController::class, 'newRegistrations'])->name('new-registrations');
});

#Passenger routes
Route::prefix('passengers')->group(function(){
    Route::get('/', [App\Http\Controllers\Backend\PassengerController::class, 'passengers'])->name('manage-passengers');
});


#Wallet routes
Route::prefix('transactions')->group(function(){
    Route::get('/', [App\Http\Controllers\Backend\WalletController::class, 'walletDashboard'])->name('wallet-dashboard');
    Route::get('/wallet', [App\Http\Controllers\Backend\WalletController::class, 'wallet'])->name('wallet');
    Route::get('/credit-wallet', [App\Http\Controllers\Backend\WalletController::class, 'creditWallet'])->name('credit-wallet');
    Route::post('/credit-wallet', [App\Http\Controllers\Backend\WalletController::class, 'storeCreditWallet']);
    Route::get('/payout-requests', [App\Http\Controllers\Backend\WalletController::class, 'showPayoutRequests'])->name('payout-requests');
    Route::get('/payout-requests/{requestid}', [App\Http\Controllers\Backend\WalletController::class, 'viewPayoutRequest'])->name('view-payout-request');
    Route::post('/process-payout-request', [App\Http\Controllers\Backend\WalletController::class, 'processPayoutRequest'])->name('process-payout-request');
});

Route::prefix('policy')->group(function(){
    Route::get('/', [App\Http\Controllers\Backend\PolicyController::class, 'policySettings'])->name('policy-settings');
    Route::post('/', [App\Http\Controllers\Backend\PolicyController::class, 'processPolicySettings']);
    Route::get('/bank-setup', [App\Http\Controllers\Backend\BankController::class, 'bankSetup'])->name('bank-setup');
    Route::post('/bank-setup', [App\Http\Controllers\Backend\BankController::class, 'storeBank']);
    Route::post('/update-bank-name', [App\Http\Controllers\Backend\BankController::class, 'updateBank'])->name('update-bank-name');
});

Route::prefix('/support')->group(function(){
    Route::get('/categories', [App\Http\Controllers\Backend\SupportController::class, 'showSupportCategories'])->name('support-categories');
    Route::post('/categories', [App\Http\Controllers\Backend\SupportController::class, 'setSupportName']);
    Route::post('/update-category-name', [App\Http\Controllers\Backend\SupportController::class, 'updateSupportName'])->name('update-category-name');
});

#Administration routes
Route::get('/administration/all-admin-users', [App\Http\Controllers\Backend\AdminUserController::class, 'allUsers'])->name('all-admin-users');
Route::get('/administration/new-admin-user', [App\Http\Controllers\Backend\AdminUserController::class, 'showAddNewUserForm'])->name('add-new-admin-user');
Route::post('/administration/new-admin-user', [App\Http\Controllers\Backend\AdminUserController::class, 'storeNewAdminUser']);
Route::get('/administration/user/{id}', [App\Http\Controllers\Backend\AdminUserController::class, 'getAdminUser'])->name('view-admin-user');
