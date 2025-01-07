<?php

use App\Http\Controllers\HomeController; // import HomeController
use App\Http\Controllers\TaskController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// menggunakan controller, untuk mengarahkan ke view welcome, dengan menggunakan HomeController
Route::get('/', [HomeController::class, 'index']); // menggunakan controller, untuk mengarahkan ke view welcome

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

// selain metode get, untuk konfigurasi route, bisa juga menggunakan metode lain
// available methods: get, post, put, patch, delete, options
// learn more: https://laravel.com/docs/8.x/routing#available-router-methods 
// & https://www.restapitutorial.com/introduction/httpmethods#overview


// metode get digunakan untuk mengambil data
// get ditujukan untuk membaca data, tidak mengubah data

// $taskList = [
//     'first' => 'eat',
//     'second' => 'code',
//     'third' => 'sleep'
// ];
// pindahkan ke file controller, TaskController.php


// // menambahkan parameter pada route, dengan menggunakan {param}
// // parameter ini akan diambil dari url, dan bisa digunakan pada fungsi
// // contoh: /tasks/first, /tasks/second, /tasks/third
// // akan menampilkan data sesuai dengan key yang diambil dari url
// // contoh: /tasks/first akan menampilkan data 'eat'
// Route::get('/tasks/{param}', function ($param) use ($taskList) {
//     return $taskList[$param];
// });

// refactor code di atas, pindahkan ke file controller, TaskController.php
Route::get('/tasks/{param}', [TaskController::class, 'show']);

// // menambahkan query string pada route, dengan menggunakan request()->query
// // contoh: /tasks?search=first akan dikembalikan data 'eat'
// // akan nemapilkan data sesuai dengan key yang diambil dari query string
// Route::get('/tasks', function () use ($taskList) {
//     // dd(request()->all()); // menampilkan semua request, termasuk query string
//     // ddd(request()->all());
//     if (request()->search) { // jika query string search ada
//         return $taskList[request()->search]; // tampilkan data sesuai dengan key yang diambil dari query string
//     }
//     return response()->json($taskList, 200);
// });

Route::get('/tasks', [TaskController::class, 'index']); // menggunakan controller, untuk mengarahkan ke view welcome

// // metode post digunakan untuk menambahkan data
// // post ditujukan untuk menambahkan data, tidak mengubah data

// // menambahkan route baru, /tasks, dengan metode post
// Route::post('/tasks', function () use ($taskList) {
//     // return request()->all(); // menampilkan semua request, termasuk body
//     $taskList[request()->label] = request()->task; // menambahkan data baru ke dalam array
//     return response()->json($taskList, 200); // menampilkan data array
// });

// refactor code di atas, pindahkan ke file controller, TaskController.php
Route::post('/tasks', [TaskController::class, 'store']);

// // proses di atas biasanya di laravel, akan mengaktifkaan CSRF token
// // sehingga perlu menonaktifkan CSRF token untuk route /tasks, @ app/Http/Middleware/VerifyCsrfToken.php

// // metode put digunakan untuk mengubah data
// // metode patch digunakan untuk mengubah data, tapi hanya sebagian data
// // put dan patch ditujukan untuk mengubah data, tidak menambahkan data
// // perbedaan put dan patch adalah, put mengubah seluruh data, sedangkan patch mengubah sebagian data
// Route::patch('/tasks/{key}', function ($key) use ($taskList) {
//     $taskList[$key] = request()->task; // mengubah data array, sesuai dengan key yang diambil dari url
//     return response()->json($taskList, 200); // menampilkan data array
// });

// refactor code di atas, pindahkan ke file controller, TaskController.php
Route::patch('/tasks/{key}', [TaskController::class, 'update']);

// // untuk proses ini juga perlu menonaktifkan CSRF token untuk route /tasks, @ app/Http/Middleware/VerifyCsrfToken.php

// // pada postman:
// // apabila digunakan body pada x-www-form-urlencoded, tidak perlu: ditambahkan _method pada key, dan put atau patch pada value
// // apabila digukan form data, perlu: ditambahkan _method pada key, dan put atau patch pada value {atur request method menjadi post}


// // metode delete digunakan untuk menghapus data
// Route::delete('/tasks/{key}', function ($key) use ($taskList) {
//     unset($taskList[$key]); // menghapus data array, sesuai dengan key yang diambil dari url
//     return response()->json($taskList, 200); // menampilkan data array
// });

Route::delete('/tasks/{key}', [TaskController::class, 'destroy']);

// // pada postman: atur request method menjadi post, lalu tambahkan _method pada key, dan delete pada value
// // atur url menjadi /tasks/{key}, sesuai dengan key yang ingin dihapus