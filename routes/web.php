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
    //     Route::get("/", "registerView")->name("register");    
    // });

    Route::post("register", "registerPost")->name("register.post");
    Route::get("register", "newRegisterView")->name("register.new");
    Route::get("login", "newLoginView")->name('login');
    Route::post("login", "loginPost")->name('login.post');
    Route::get("kontributor", "kontributorView")->name("kontributor");
});



Route::middleware("auth")->group(function() {
    Route::prefix("old-app")->group(function() {
        Route::post("logout", [AuthController::class, "logout"])->name("logout");
        Route::middleware("fireman")->group(function() {
            Route::prefix("fireman")->group(function() {
                Route::controller(FiremanController::class)->group(function() {
                    Route::get("add-geo-locations","geoLocationView")->name("old.fireman.geolocation.old");
                    Route::post("add-geo-locations","geoLocationPost")->name("old.fireman.geolocation.post");
                    
                    Route::prefix("report")->group(function() {
                        Route::get("/", "reportView")->name("old.fireman.report");
                        Route::get("{status}","reportStatus")->name("old.fireman.report.status");
                        Route::get("detail/{id}", "detailReport")->name("old.fireman.detail.report");
                        Route::post("message/{id}", "sendMessage")->name("old.fireman.send.message");
                        Route::get("message/{id}", "getMessage")->name("old.fireman.get.message");
                        Route::put("message/{id}/{status}/", "updateReport")->name("old.fireman.update.report");
                    });

                    Route::get("home","homeView")->name("old.fireman.home");
                    Route::get("profile","profileView")->name("old.fireman.profile");
                    Route::post("profile","profilePost")->name("old.fireman.profile.post");
                });
            });
        });

        // Route::prefix("notifications")->group(function() {
        //     Route::controller(NotificationController::class)->group(function() {
        //         Route::get("/","notifView")->name("old.notif.view");
        //         Route::get("/get","getNotif")->name("old.notif.get");
        //     });
        // });

        Route::middleware("user")->group(function() {
            Route::prefix("user")->group(function() {
                Route::controller(UserController::class)->group(function() {
                    Route::get("home", "homeView")->name("old.user.home");
                    Route::prefix("report")->group(function() {
                        Route::get("/", "reportView")->name("old.user.report");
                        Route::get("{status}","reportStatus")->name("old.user.report.status");
                        Route::get("detail/{id}", "detailReport")->name("old.user.detail.report");
                        Route::post("message/{id}", "sendMessage")->name("old.user.send.message");
                        Route::get("message/{id}", "getMessage")->name("old.user.get.message");
                        Route::put("message/{id}/{status}/", "updateReport")->name("old.user.update.report");
                        Route::put("rating/{id}", "giveRating")->name("fireman.rating.report");
                    });

                    Route::get("create-report","createReportView")->name("old.user.create.report");
                    Route::post("create-report","createReport")->name("old.user.create.report.post");

                    Route::get("profile","profileView")->name("old.user.profile");
                    Route::post("profile","profilePost")->name("old.user.profile.post");

                    Route::get("fireman/{uuid}","getFiremanByUUID")->name("user.get-fireman");
                });
            });
        });

    });

    Route::prefix("app")->group(function() {
        Route::middleware("fireman")->group(function() {
            Route::prefix("fireman")->group(function() {
                Route::controller(FiremanController::class)->group(function() {
                    Route::post("add-geo-locations","geoLocationPost")->name("fireman.geolocation.post");
                    Route::get("add-geo-locations","geoLocationViewNew")->name("fireman.geolocation");
                    Route::get("home","homeViewNew")->name("fireman.home");
                    Route::get("profile","profileViewNew")->name("fireman.profile");
                    Route::post("profile","profilePostNew")->name("fireman.profile.post");
                    Route::get("update-point-location","updatePointLocationView")->name("fireman.point-location.view");
                    Route::post("update-point-location","updatePointLocation")->name("fireman.point-location.post");

                    Route::prefix("history-report")->group(function() {
                        Route::get("/","historyReportView")->name("fireman.history");
                        Route::get("{status}","reportStatus")->name("fireman.report.status");
                        Route::get("detail/{id}", "detailReport")->name("fireman.detail.report");
                        Route::post("message/{id}", "sendMessage")->name("fireman.send.message");
                        Route::get("message/{id}", "getMessage")->name("fireman.get.message");
                        Route::put("message/{id}/{status}/", "updateReport")->name("fireman.update.report");
                    });
                });
            });
        });

        Route::prefix("notifications")->group(function() {
            Route::controller(NotificationController::class)->group(function() {
                Route::get("/","notifViewNew")->name("notif.view");
                Route::get("/get","getNotif")->name("notif.get");
            });
        });
        Route::middleware("user")->group(function() {
            Route::prefix("user")->group(function() {
                Route::controller(UserController::class)->group(function() {

                });
            });
        });
    });
});
