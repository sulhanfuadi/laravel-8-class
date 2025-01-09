@extends('layouts.app')

@section('content')
<div class="mt-5 mx-auto" style="width: 380px">
  <div class="card">
    <div class="card-body">
      @if (session('status')) <!-- jika terdapat session dengan data status -->
      <div class="alert alert-success">
        Verification link has been sent to your email address.
      </div>
      @endif
        Before proceeding, please check your email for a verification link.
        Or you can <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
          @csrf
          <button type="submit"
              class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
          .
      </form>
    </div>
  </div>
</div>
@endsection