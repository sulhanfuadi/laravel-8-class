<?php

namespace App\Http\Controllers;

use App\Models\Task; // import model Task
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
    // public function index(Request $request)
    // {
    //     if ($request->search) { // jika query string search ada
    //         return $this->taskList[$request->search]; // tampilkan data sesuai dengan key yang diambil dari query string
    //     }
    //     return response()->json($this->taskList, 200);
    // }

    // method index digunakan untuk menampilkan seluruh data yang ada di database

    // public function index(Request $request)
    // {
    //     if ($request->search) { // jika query string search ada
    //         $tasks = DB::table('tasks')
    //             ->where('task', 'LIKE', "%$request->search%") // mencari data yang mengandung string yang diinputkan, pada kolom task 
    //             ->get();
    //         return $tasks;
    //     }

    //     $tasks = DB::table('tasks')->get(); // mengambil data dari database
    //     return $tasks; // menampilkan data yang diambil dari database
    // }

    // menampilkan data menggunakan model Task
    // public function index(Request $request)
    // {
    //     if ($request->search) { // jika query string search ada
    //         $tasks = Task::where('task', 'LIKE', "%$request->search%") // mencari data yang mengandung string yang diinputkan, pada kolom task 
    //             ->get();
    //         return $tasks;
    //     }

    //     $tasks = Task::all(); // mengambil data dari database dengan model Task
    //     return $tasks; // menampilkan data yang diambil dari database
    // }

    // menampilkan data menggunakan view, dengan model Task, dan query string search
    // public function index(Request $request)
    // {
    //     if ($request->search) { // jika query string search ada
    //         $tasks = Task::where('task', 'LIKE', "%$request->search%") // mencari data yang mengandung string yang diinputkan, pada kolom task 
    //             ->get();
    //         return $tasks;
    //     }

    //     $tasks = Task::all(); // mengambil data dari database dengan model Task
    //     return view("task.index", [ // menampilkan data yang diambil dari database, dengan view task.index
    //         "data" => $tasks
    //     ]);
    // }

    // 
    public function index(Request $request)
    {
        if ($request->search) { // jika query string search ada
            $tasks = Task::where('task', 'LIKE', "%$request->search%") // mencari data yang mengandung string yang diinputkan, pada kolom task 
                ->paginate(4); // menampilkan data dengan pagination, dengan jumlah data 4
            return view("task.index", [ // menampilkan data yang diambil dari database, dengan view task.index
                "data" => $tasks
            ]);
        }

        $tasks = Task::paginate(4); // mengambil data dari database dengan model Task
        return view("task.index", [ // menampilkan data yang diambil dari database, dengan view task.index
            "data" => $tasks
        ]);
    }

    // public function store()
    // {
    //     $this->taskList[request()->label] = request()->task; // menambahkan data baru ke dalam array
    //     return response()->json($this->taskList, 200); // menampilkan data array
    // }

    // menambah data menggunakan query builder
    // public function store()
    // {
    //     DB::table('tasks')->insert([
    //         'task' => request()->task, // mengambil data dari body request, dengan key task
    //         'user' => request()->user,
    //     ]);

    //     return 'success'; // menampilkan pesan success, jika berhasil
    // }

    // public function store()
    // {
    //     Task::create([ // membuat data baru dengan model Task, menggunakan method create, karena data hanya satu
    //         'task' => request()->task, // mengambil data dari body request, dengan key task
    //         'user' => request()->user,
    //     ]);

    //     return 'success'; // menampilkan pesan success, jika berhasil
    // }

    public function create() // menampilkan halaman create
    {
        return view("task.create"); // menampilkan view task.create
    }

    public function store(Request $request)
    {
        $request->validate([ // validasi data yang diinputkan
            'task' => ['required'], // data task wajib diisi
            'user' => ['required'], // data user wajib diisi
        ]);

        Task::create([ // membuat data baru dengan model Task, menggunakan method create, karena data hanya satu
            'task' => request()->task, // mengambil data dari body request, dengan key task
            'user' => request()->user,
        ]);

        return redirect('/tasks'); // mengarahkan ke halaman tasks
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.edit', compact('task')); // menampilkan view task.edit, dengan data task
        // compact digunakan untuk mengirim data task ke view task.edit
    }

    // public function show($param)
    // {
    //     // return $param;
    //     return $this->taskList[request()->param];
    // }

    // menampilkan data berdasarkan id, menggunakan query builder
    // public function show($id)
    // {
    //     $task = DB::table('tasks')
    //         ->where('id', $id)
    //         ->first(); // mencari data berdasarkan id
    //     ddd($task); // menampilkan data yang diambil dari database
    // }

    public function show($id)
    {
        $task = Task::find($id); // mencari data berdasarkan id, menggunakan model Task
        return $task; // menampilkan data yang diambil dari database
    }

    // public function update($key)
    // {
    //     $this->taskList[$key] = request()->task; // mengubah data array, sesuai dengan key yang diambil dari url
    //     return response()->json($this->taskList, 200); // menampilkan data array
    // }

    // public function update($id)
    // {
    //     $task = Task::find($id); // mencari data berdasarkan id, menggunakan model Task

    //     $task->update([ // mengubah data yang ditemukan, menggunakan method update
    //         'task' => request()->task, // mengambil data dari body request, dengan key task
    //         'user' => request()->user,
    //     ]);

    //     return $task; // menampilkan data yang telah diubah, dari database
    // }

    public function update($id)
    {
        $task = Task::find($id); // mencari data berdasarkan id, menggunakan model Task

        $task->update([ // mengubah data yang ditemukan, menggunakan method update
            'task' => request()->task, // mengambil data dari body request, dengan key task
            'user' => request()->user,
        ]);

        return redirect('/tasks'); // mengarahkan ke halaman tasks
    }

    // public function destroy($key)
    // {
    //     unset($this->taskList[$key]);
    //     return response()->json($this->taskList, 200);
    // }

    public function destroy($id)
    {
        $task = Task::find($id); // mencari data berdasarkan id, menggunakan model Task
        $task->delete(); // menghapus data yang ditemukan, menggunakan method delete
        // return 'success';
        return redirect('/tasks'); // mengarahkan ke halaman tasks
    }
}