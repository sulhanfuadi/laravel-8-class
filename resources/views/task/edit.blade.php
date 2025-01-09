@extends('layouts.app')

@section('content')
    <div class="mt-5 mx-auto" style="width: 380px">
        <div class="card">
            <div class="card-body">
                <form action="{{ url("/tasks/$task->id") }}" method="POST">
                    @csrf @method('PATCH')
                    <div class="mb-3">
                        <label for="" class="form-label">User</label>
                        <input name="user" type="text" class="form-control" value="{{ old('user', $task->user) }}"> <!-- Add a value attribute to keep the user input -->
                        @error('user')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Task</label>
                        <textarea name="task" class="form-control" id="" rows="3">{{ old('task', $task->task) }}</textarea>
                        @error('task')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection