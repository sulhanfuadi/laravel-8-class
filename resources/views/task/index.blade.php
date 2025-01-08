@extends('layouts.app') <!-- Extend the app layout -->

@section('content') <!-- Define a section called content -->

<div class="border rounded my-5 mx-auto d-flex flex-column align-items-stretch bg-white" style="width: 380px;">
    <div class="d-flex justify-content-between flex-shrink-0 p-3 link-dark  border-bottom">
      <span class="fs-5 fw-semibold">Task Lists: {{ $data->total() }}</span> <!-- Display the total data -->
      <span class="btn btn-sm btn-primary">add</span>
    </div>
    @foreach($data as $item) <!-- Loop through the data -->
    <div class="list-group list-group-flush border-bottom scrollarea">
      <div class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
        <div class="d-flex w-100 align-items-center justify-content-between">
          <strong class="mb-1">{{ $item -> task }}</strong> <!-- Display the task, double {} is equal to <php echo ... ?> milik extension blade -->
          <small>Wed</small>
        </div>
        <div class="col-10 mb-1 small">{{ $item -> user }}</div> <!-- Display the user -->
        <div class="group-action">
          <a href="#" class="badge bg-info text-white">edit</a>
          <a href="#" class="badge bg-danger text-white">delete</a>
        </div>
      </div>
    </div>
    @endforeach <!-- End of the loop -->
    <br>
    {{ $data -> links('pagination::bootstrap-4') }} <!-- Display the pagination, dengan template pagination terdefinisi -->
</div>

@endsection <!-- End of the content section -->