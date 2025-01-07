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

// add new route, /about, that will return about view, when user access /about
Route::get('/about', function () {
    return view('about');
});

// menampilkan data secara langsung melalui route
Route::get('/hello', function () {
    // return data dalam bentuk json, dengan key message dan value Hello World
    // return response()->json([
    //     'message' => 'Hello World'
    // ]);

    // atau bisa juga menggunakan array, lalu di return
    $dataArray = [
        'message' => 'Hello World'
    ];

    // atau bisa juga menggunakan helper function response()->json,
    // yang akan mengubah array menjadi json, 
    // dan juga memberikan status code 200 -- ini kelebihannya
    return response()->json($dataArray, 200);

    // ajaibnya, laravel akan mengubah array menjadi json secara otomatis
    // return $dataArray;
});

// praktik fungsi debugging di laravel untuk menampilkan response
// membuat route baru, /debug , untuk menampilkan data array dan request
Route::get('/debug', function () {
    $dataArray = [
        'message' => 'Hello World'
    ];

    // dd() adalah helper function untuk menampilkan data array
    // dd adalah singkatan dari dump and die
    // dump adalah fungsi untuk menampilkan data array
    // die adalah fungsi untuk menghentikan proses selanjutnya

    // dd($dataArray); // akan menampilkan data array
    // dd(request());

    // atau bisa juga menggunakan helper function ddd()
    // ddd() adalah helper function untuk menampilkan data array
    // ddd adalah singkatan dari dump, die, dan debug
    // dump adalah fungsi untuk menampilkan data array
    // die adalah fungsi untuk menghentikan proses selanjutnya
    // debug adalah fungsi untuk menampilkan data array dan request

    ddd($dataArray);
    // ddd(request());
});
