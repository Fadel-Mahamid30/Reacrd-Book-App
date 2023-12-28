<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\UserManagementController;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

// login 
Route::get("/", [LoginController::class, "index"])->name("login")->middleware('guest');
Route::post("/", [LoginController::class, "auth"])->name("login");
Route::get("/proses", [LoginController::class, "check_user_role"])->name("check-user-role")->middleware("auth");

// registrasi 
Route::get("/registrasi", [RegisterController::class, "index"])->name("register")->middleware("guest");
Route::post("/registrasi", [RegisterController::class, "register"])->name("register");

// lupa password
Route::get("/lupa-password", [ForgotPasswordController::class, "index"])->middleware("guest")->name("lupa.password");
Route::post("/lupa-password", [ForgotPasswordController::class, "sendResetLinkEmail"])->middleware("guest")->name("send.link");
Route::get("/reset-password/{token}", [ForgotPasswordController::class, "reset_password"])->middleware("guest")->name("password.reset");
Route::post("/reset-password/{token}", [ForgotPasswordController::class, "update_password"])->middleware("guest")->name("update.password");

// logout
Route::get("/logout", [LogoutController::class, "index"])->name("logout");

Route::get("/absensi/detail", [AbsensiController::class, "detail_absen"])->name("absensi-detail")->middleware("auth");
Route::delete("/logbook/remove/{id}", [LogbookController::class, "remove_logbook"])->name("remove-logbook")->middleware("userRole:user,admin");
Route::get("/dashboard/worklog/{id}", [LogbookController::class, "worklog"])->name("laporan")->middleware("userRole:pimpinan,admin");
Route::get("/download/pdf/{id}", [LogbookController::class, "download_pdf"])->name("download-pdf")->middleware("userRole:pimpinan,admin");

// profil
Route::middleware(["auth"])->group(function () {
    Route::get("/profil", [ProfilController::class, "index"])->name("profil");
    Route::get("/profil/edit", [ProfilController::class, "edit_profil"])->name("edit-profil");
    Route::post("/profil/edit", [ProfilController::class, "update_profil"])->name("edit-profil");
});

// user 
Route::middleware(["auth", "userRole:user"])->group(function () {

    // dashboard
    Route::get("/dashboard/user",[UserController::class, "dashboard_user"])->name("dashboard-user");

    // absesni
    Route::get("/absensi/user",[AbsensiController::class, "view_absensi_user"])->name("absensi-user");
    Route::get("/absensi/check", [AbsensiController::class, "check_absen"])->name("absensi-check");
    Route::get("/absensi/masuk", [AbsensiController::class, "absen_masuk"])->name("absensi-masuk");
    Route::post("/absensi/masuk", [AbsensiController::class, "store_absen"])->name("absensi-masuk");
    Route::get("/absensi/keluar/{id}", [AbsensiController::class, "absen_keluar"])->name("absensi-keluar");
    Route::post("/absensi/keluar/{id}", [AbsensiController::class, "update_absen_keluar"])->name("absensi-keluar");
    Route::post("/absensi/detail", [AbsensiController::class, "detail_absen"])->name("absensi-detail");

    // logbook
    Route::get("/logbook/user", [LogbookController::class, "view_logbook_user"])->name("logbook-user");
    Route::get("/logbook/add", [LogbookController::class, "create_logbook"])->name("logbook-add");
    Route::post("/logbook/add", [LogbookController::class, "store_logbook"])->name("logbook-add");
    Route::get("/logbook/edit/{id}", [LogbookController::class, "edit_logbook_user"])->name("logbook-edit");
    Route::post("/logbook/edit/{id}", [LogbookController::class, "update_logbook_user"])->name("logbook-edit");
   
});

// admin
Route::middleware(["auth","userRole:admin"])->group(function (){

    //dashboard
    Route::get("/dashboard/admin", [UserController::class, "dashboard_admin"])->name("dashboard-admin");

    // user
    Route::get("/edit/user/profil/{id}", [UserManagementController::class, "edit_user_profil"])->name("edit-user-profil");
    Route::post("/update/user/profil", [UserManagementController::class, "update_user_profil"])->name("update-user-profil");
    Route::delete("/user/remove/{id}", [UserManagementController::class, "remove_user"])->name("remove-user");
    Route::put("/update/role/user/{id}", [UserManagementController::class, "update_role_user"])->name("update-role-user");
    Route::put("/active/user/{id}", [UserManagementController::class, "active_user"])->name("active-user");
    Route::get("/dashboard/admin/users", [UserManagementController::class, "users"])->name("dashboard-users-admin");
    Route::get("/dashboard/admin/user-access", [UserManagementController::class, "user_access"])->name("dashboard-user-access");
    Route::get("/dashboard/admin/user-registration", [UserManagementController::class, "user_registration"])->name("dashboard-user-registration");
    Route::get("/get/data/user/{id}", [UserManagementController::class, "get_data_user"])->name("get-data-user");

    // absensi
    Route::get("/absensi/admin", [AbsensiController::class, "view_absensi_admin"])->name("dashboard-admin-absensi");
    Route::delete("/absensi/remove/{id}", [AbsensiController::class, "remove_absensi"])->name("remove-absensi");
    Route::get("/absensi/edit/{id}", [AbsensiController::class, "edit_absensi"])->name("edit-absensi");
    Route::put("/absensi/edit/{id}", [AbsensiController::class, "update_absensi"])->name("edit-absensi");

    // logbook
    Route::get("/logbook/admin", [LogbookController::class, "view_logbook_admin"])->name("dashboard-admin-logbook");
    Route::get("/logbook/edit/admin/{id}", [LogbookController::class, "edit_logbook_admin"])->name("logbook-edit-admin");
    Route::get("/logbook/edit/admin/{id}", [LogbookController::class, "edit_logbook_admin"])->name("logbook-edit-admin");
    Route::post("/logbook/edit/admin/{id}", [LogbookController::class, "update_logbook_admin"])->name("logbook-edit-admin");
  
    // other 
    Route::get("/dashboard/admin/other", [UserController::class, "other"])->name("dashboard-admin-other");

     // divisi
    Route::get("/dashboard/admin/divisi", [DivisiController::class, "index"])->name("dashboard-divisi");
    Route::post("/dashboard/admin/divisi", [DivisiController::class, "store"])->name("dashboard-divisi");
    Route::put("/divisi/update/{id}", [DivisiController::class, "update"])->name("divisi-update");
    Route::delete("/divisi/remove/{id}", [DivisiController::class, "delete"])->name("divisi-remove");

    // shift
    Route::get("dashboard/admin/shift", [ShiftController::class, "index"])->name("dashboard-shift");
    Route::post("dashboard/admin/shift", [ShiftController::class, "store"])->name("dashboard-shift");
    Route::put("/shift/update/{id}", [ShiftController::class, "update"])->name("update-shift");
    Route::delete("/shift/remove/{id}", [ShiftController::class, "delete"])->name("remove-shift");

});

// pimpinan
Route::middleware(["auth", "userRole:pimpinan"])->group(function () {

    // dashboard
    Route::get("/dashboard/pimpinan", [UserController::class, "dashboard_pimpinan"])->name("dashboard-pimpinan");

    // absensi
    Route::get("/absensi/pimpinan", [AbsensiController::class, "view_absensi_pimpinan"])->name("dashboard-pimpinan-absensi");

    // logbook
    Route::get("/logbook/pimpinan", [LogbookController::class, "view_logbook_pimpinan"])->name("dashboard-pimpinan-logbook");

});

