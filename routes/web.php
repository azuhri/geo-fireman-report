<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FiremanController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('web-gis');
// });

Route::get("/", function() {
    return redirect()->route('kontributor');
});

Route::get("broadcast", function() {
    broadcast(new \App\Events\NotifEvent("Ini data"));
});

Route::controller(AuthController::class)->group(function() {
    // Route::get("login", "loginView")->name('login');
    // Route::prefix("register")->group(function() {
    //     Route::get("select-user", "selectUserRegister")->name('select-user-register');
    //     Route::get("{user_type}", "registerView")->name("register");
    //     Route::post("/", "registerPost")->name("register.post");
        
    // });
    Route::get("register", "newRegisterView")->name("register.new");
    Route::get("login", "newLoginView")->name('login');
    Route::post("login", "loginPost")->name('login.post');
    Route::get("kontributor", "kontributorView")->name("kontributor");
});



Route::middleware("auth")->group(function() {
    Route::prefix("app")->group(function() {
        Route::post("logout", [AuthController::class, "logout"])->name("logout");
        Route::middleware("fireman")->group(function() {
            Route::prefix("fireman")->group(function() {
                Route::controller(FiremanController::class)->group(function() {
                    Route::get("add-geo-locations","geoLocationView")->name("fireman.geolocation.old");
                    Route::get("add-geo-locations","geoLocationViewNew")->name("fireman.geolocation");
                    Route::post("add-geo-locations","geoLocationPost")->name("fireman.geolocation.post");
                    
                    Route::prefix("report")->group(function() {
                        Route::get("/", "reportView")->name("fireman.report");
                        Route::get("{status}","reportStatus")->name("fireman.report.status");
                        Route::get("detail/{id}", "detailReport")->name("fireman.detail.report");
                        Route::post("message/{id}", "sendMessage")->name("fireman.send.message");
                        Route::get("message/{id}", "getMessage")->name("fireman.get.message");
                        Route::put("message/{id}/{status}/", "updateReport")->name("fireman.update.report");
                    });

                    Route::get("home","homeView")->name("fireman.home");
                    Route::get("profile","profileView")->name("fireman.profile");
                    Route::post("profile","profilePost")->name("fireman.profile.post");
                });
            });
        });

        Route::prefix("notifications")->group(function() {
            Route::controller(NotificationController::class)->group(function() {
                Route::get("/","notifView")->name("notif.view");
                Route::get("/get","getNotif")->name("notif.get");
            });
        });

        Route::middleware("user")->group(function() {
            Route::prefix("user")->group(function() {
                Route::controller(UserController::class)->group(function() {
                    Route::get("home", "homeView")->name("user.home");
                    Route::prefix("report")->group(function() {
                        Route::get("/", "reportView")->name("user.report");
                        Route::get("{status}","reportStatus")->name("user.report.status");
                        Route::get("detail/{id}", "detailReport")->name("user.detail.report");
                        Route::post("message/{id}", "sendMessage")->name("user.send.message");
                        Route::get("message/{id}", "getMessage")->name("user.get.message");
                        Route::put("message/{id}/{status}/", "updateReport")->name("user.update.report");
                        Route::put("rating/{id}", "giveRating")->name("fireman.rating.report");
                    });

                    Route::get("create-report","createReportView")->name("user.create.report");
                    Route::post("create-report","createReport")->name("user.create.report.post");

                    Route::get("profile","profileView")->name("user.profile");
                    Route::post("profile","profilePost")->name("user.profile.post");

                    Route::get("fireman/{uuid}","getFiremanByUUID")->name("user.get-fireman");
                });
            });
        });

    });
});
