<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{ url('tasks/') }}" class="nav-link px-2 text-white">Home</a></li>
      </ul>
      <div class="text-end">
        <button type="button" class="btn btn-outline-light me-2">Login</button>
        {{-- <button type="button" class="btn btn-warning">Sign-up</button> --}}
        <a href="{{ url('register') }}" class="btn btn-warning">Sign-up</a>
      </div>
    </div>
  </div>
</header>