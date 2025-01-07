<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $taskList = [
        'first' => 'eat',
        'second' => 'code',
        'third' => 'sleep'
    ];

    public function index()
    {
        if (request()->search) { // jika query string search ada
            return $this->taskList[request()->search]; // tampilkan data sesuai dengan key yang diambil dari query string
        }
        return response()->json($this->taskList, 200);
    }
}
