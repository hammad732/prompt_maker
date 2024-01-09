@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper " >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update</div>
                  <form action="{{ route('work.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                     <div class="form-group">
                       <label for="">Project Title</label>
                       <input type="text"
                         class="form-control" name="name" id="" aria-describedby="helpId" placeholder="" value="{{ $data->name }}">
                     </div>

                     <div class="form-group">
                       <label for="">Type</label>
                       <input type="text"
                         class="form-control" name="type" id="" aria-describedby="helpId" placeholder="" value="{{ $data->type }}">
                     </div>

                     <div class="form-group">
                       <label for="">Description</label>
                       <input type="text"
                         class="form-control" name="description" id="" aria-describedby="helpId" placeholder="" value="{{ $data->description }}">
                     </div>
                     <div class="form-group">
                       <label for="">URL</label>
                       <input type="text"
                         class="form-control" name="url" id="" aria-describedby="helpId" placeholder="" value="{{ $data->url }}">
                     </div>
                    <center>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </center>
                    </div>
                </form>
    </div>


    @endsection
