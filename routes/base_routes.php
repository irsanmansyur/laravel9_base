<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SecurityController;
use Illuminate\Support\Facades\Route;

//   User Profile Login
Route::prefix("admin/user")->namespace("User")->group(function () {
    Route::get("profile", [ProfileController::class, "index"])->name("user.profile");
    Route::put("profile", [ProfileController::class, "update"]);
    Route::post("{user}/upload-img", [ProfileController::class, "uploadThumbnail"])->name("user.uploadthumbnail");
    Route::get("security", [SecurityController::class, "index"])->name("user.security");
    Route::post("security", [SecurityController::class, "update"]);
});
