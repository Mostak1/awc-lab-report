<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CardProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerPrepaidCardController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OffOrderController;
use App\Http\Controllers\OffOrderDetailsController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TabController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UsersController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/linkstorage', function () {
    $targetFolder = base_path().'/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
    symlink($targetFolder, $linkFolder);
 });
Auth::routes();
Route::resource('admins', AdminsController::class);
Route::resource('users', UsersController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionsController::class);
Route::group(['middleware' => ['auth']], function() {
    Route::get('/',function(){
        return view('dashboard');
    })->name('dashboard')->middleware('auth');

    // patient report route
    Route::resource('patients', PatientController::class);
    Route::resource('reports', ReportController::class);
    Route::post('/upload_image', [ReportController::class, 'uploadImage'])->name('upload_image');

    Route::get('/patients/{patient}/reports', [PatientController::class, 'showReports'])->name('patients.reports');

    Route::get('/patients/{patient}/create-report', [PatientController::class, 'createReport'])->name('patients.create-report');
    Route::post('/patients/{patient}/store-report', [PatientController::class, 'storeReport'])->name('patients.store-report');




});
// auth and permissions both required
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::resources([
    'role' => RoleController::class,
    'urole' => UserRoleController::class,
]);
require __DIR__ . '/auth.php';
