@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper " >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update</div>
                  <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                     <div class="form-group">
                       <label for="">User Name</label>
                       <input type="text"
                         class="form-control" name="name" id="" aria-describedby="helpId" placeholder="" value="{{ $user->name }}">
                     </div>

                     <div class="form-group">
                       <label for="">Email</label>
                    <input type="text"   class="form-control" type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="" aria-describedby="helpId" placeholder="" value="{{ $user->email }}">
                        @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
                     </div>
                    <center>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </center>
                    </div>
                </form>
    </div>


    @endsection
