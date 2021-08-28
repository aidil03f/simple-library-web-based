<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{KelasController,JenisBukuController,SiswaController,BukuController,PeminjamanController,UserController};
use App\Http\Controllers\Auth\{RegisterController,LoginController,LogoutController};


Route::middleware('auth:api')->group(function(){

    Route::get('/kelas',[KelasController::class,'index']);
    Route::post('create-kelas',[KelasController::class,'store']);
    Route::get('edit-kelas/{id}/edit',[KelasController::class,'edit']);
    Route::put('edit-kelas/{id}/edit',[KelasController::class,'update']);
    Route::delete('delete-kelas/{id}',[KelasController::class,'destroy']);
    
    Route::get('/jenis-buku',[JenisBukuController::class,'index']);
    Route::post('create-jenis-buku',[JenisBukuController::class,'store']);
    Route::get('edit-jenis-buku/{id}/edit',[JenisBukuController::class,'edit']);
    Route::put('edit-jenis-buku/{id}',[JenisBukuController::class,'update']);
    Route::delete('delete-jenis-buku/{id}',[JenisBukuController::class,'destroy']);
    
    Route::get('/siswa',[SiswaController::class,'index']);
    Route::post('create-siswa',[SiswaController::class,'store']);
    Route::get('edit-siswa/{id}/edit',[SiswaController::class,'edit']);
    Route::put('edit-siswa/{id}',[SiswaController::class,'update']);
    Route::delete('delete-siswa/{id}',[SiswaController::class,'destroy']);
    
    Route::get('/buku',[BukuController::class,'index']);
    Route::post('create-buku',[BukuController::class,'store']);
    Route::get('edit-buku/{id}/edit',[BukuController::class,'edit']);
    Route::put('edit-buku/{id}',[BukuController::class,'update']);
    Route::delete('delete-buku/{id}',[BukuController::class,'destroy']);
    
    Route::get('/peminjaman',[PeminjamanController::class,'index']);
    Route::post('create-peminjaman',[PeminjamanController::class,'store']);
    Route::get('edit-peminjaman/{id}/edit',[PeminjamanController::class,'edit']);
    Route::put('edit-peminjaman/{id}',[PeminjamanController::class,'update']);
    Route::delete('delete-peminjaman/{id}',[PeminjamanController::class,'destroy']);
   
    Route::get('user',UserController::class);
});
Route::post('logout',LogoutController::class);

Route::post('register',RegisterController::class);
Route::post('login',LoginController::class);
