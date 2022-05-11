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
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/registrar', function () {
    return view('registrar');
});
Route::get('/configuracioncarga', function () {
    return view('configuracioncarga');
}
);
Route::get('/crearsolicitud', function () {
    return view('crearsolicitud');
}
);
Route::get('/listarsolicitud', function () {
    return view('listarsolicitud');
}
);

