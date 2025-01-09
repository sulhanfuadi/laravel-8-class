@extends('layouts.app')

@section('content')
    <div class="mt-5 mx-auto" style="width: 380px">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('/tasks') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">User</label>
                        <input type="text" name="user" class="form-control" value="{{ old('user') }}"> <!-- Add a value attribute to keep the user input -->
                        @error('user') <!-- Display the error message -->
                            <span class="text-danger"> <!-- Add a text-danger class to make the text red -->
                                {{ $message }} <!-- Display the error message -->
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Task</label>
                        <textarea name="task" class="form-control" id="" rows="3" value="{{ old('task') }}"></textarea>
                        @error('task')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection