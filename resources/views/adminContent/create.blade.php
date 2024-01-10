
@extends('admin.layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper " >
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Add</div>
          <form action="{{ route('work.store') }}" method="POST">
            @csrf
            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <div class="card-body">
              <div class="form-group">
                <label for="">Project Title</label>
                <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Enter Project Title" required>
              </div>

              <div class="form-group">
                <label for="">Type</label>
                <input type="text" class="form-control" name="type" id="" aria-describedby="helpId" placeholder="Enter Type" required>
              </div>

              <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description" id="" aria-describedby="helpId" placeholder="Enter Description" required>
              </div>
              <div class="form-group">
                <label for="">URL</label>
                <input type="url" class="form-control" name="url" id="" aria-describedby="helpId" placeholder="Enter URL" required>
              </div>
              <center>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('prompt.create')}}" class="btn btn-success">Next</a>
              </center>
            </div>
          </form>
        </div>



        @endsection