<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    private $taskList = [
        'first' => 'eat',
        'second' => 'code',
        'third' => 'sleep'
    ];

    // public function index()
    // {
    //     if (request()->search) { // jika query string search ada
    //         return $this->taskList[request()->search]; // tampilkan data sesuai dengan key yang diambil dari query string
    //     }
    //     return response()->json($this->taskList, 200);
    // }

    // merubah helper request menjadi class request
    public function index(Request $request)
    {
        if ($request->search) { // jika query string search ada
            return $this->taskList[$request->search]; // tampilkan data sesuai dengan key yang diambil dari query string
        }
        return response()->json($this->taskList, 200);
    }

    // public function store()
    // {
    //     $this->taskList[request()->label] = request()->task; // menambahkan data baru ke dalam array
    //     return response()->json($this->taskList, 200); // menampilkan data array
    // }

    // menambah data menggunakan query builder
    public function store()
    {
        DB::table('tasks')->insert([
            'task' => request()->task, // mengambil data dari body request, dengan key task
            'user' => request()->user,
        ]);

        return 'success'; // menampilkan pesan success, jika berhasil
    }

    public function show($param)
    {
        // return $param;
        return $this->taskList[request()->param];
    }

    public function update($key)
    {
        $this->taskList[$key] = request()->task; // mengubah data array, sesuai dengan key yang diambil dari url
        return response()->json($this->taskList, 200); // menampilkan data array
    }

    public function destroy($key)
    {
        unset($this->taskList[$key]);
        return response()->json($this->taskList, 200);
    }
}
