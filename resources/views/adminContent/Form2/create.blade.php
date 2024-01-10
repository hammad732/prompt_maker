@extends('admin.layouts.master')
@section('section')

@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper " >
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Prompt Form</div>
          <form action="{{ route('prompt.store') }}" method="POST">
            @csrf
            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif
            <div class="card-body">
              <div class="form-group">
                <label for="">Job Post</label>
                <input type="text" class="form-control" name="post" id="" aria-describedby="helpId" placeholder="Enter Post">
              </div>

              <div class="form-group">
                <label for="">Client Name</label>
                <input type="text" class="form-control" name="c_name" id="" aria-describedby="helpId" placeholder="Enter Name">
              </div>

              <div class="form-group">
                <label for="work1">Select Work Experience 1</label>
                <select id="work1" name="work1" class="form-control">
                  <option value="">Please select</option>
                  @foreach ($data as $item)
                  <option value="{{ $item->id }}">{{$item->name }}</option>
                  @endforeach
                </select>

                <label for="work2">Select Work Experience 2</label>
                <select id="work2" name="work2" class="form-control">
                  <option value="">Please select</option>
                  @foreach ($data as $item)
                  <option value="{{ $item->id }}">{{$item->name }}</option>
                  @endforeach
                </select>

              </div>

              <div class="form-group">
                <label for="">Timeline</label>
                <input type="text" class="form-control" name="timeline" id="" aria-describedby="helpId" placeholder="Enter Timeline">
              </div>
              <div class="form-group">
                <label for="">Cost</label>
                <input type="text" class="form-control" name="cost" id="" aria-describedby="helpId" placeholder="Enter Cost">
              </div>
              <div class="form-group">
                <label for="">Tone</label>
                <input type="text" class="form-control" name="tone" id="" aria-describedby="helpId" placeholder="Enter Tone">
              </div>
              <center>
                <button type="submit" class="btn btn-primary">Create Promt</button>
              </center>
            </div>
          </form>
        </div>
       

        @endsection
      
