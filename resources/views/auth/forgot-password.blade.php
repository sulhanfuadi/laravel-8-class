@extends('layouts.app')

@section('content')
<div class="mt-5 mx-auto" style="width: 380px">
  <div class="card">
    <div class="card-body">
      @if (session('status')) <!-- jika terdapat session dengan data status -->
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif
      <form action="{{ route('password.email') }}" method="POST"> <!-- Add route for password.email -->
        @csrf
        <div class="mb-3">
          <label for="" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}">
          @error('email')
          <span class="text-danger">
            {{ $message }}
          </span>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Send Reset Link</button>
      </form>
    </div>
  </div>
</div>
@endsection