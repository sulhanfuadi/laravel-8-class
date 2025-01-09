@extends('layouts.app')

@section('content')
<div class="mt-5 mx-auto" style="width: 380px">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('login') }}" method="POST">
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
        <div class="mb-3">
          <label for="" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="*****">
          @error('password')
          <span class="text-danger">
            {{ $message }}
          </span>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="{{ route('password.request') }}" class="btn-link">
          Forgot Password?
        </a>
      </form>
    </div>
  </div>
</div>
@endsection