@extends('admin.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <div class="container justify-content-center">
        <div class="row justify-content-center mx-3">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header text-center font-weight-bold">All Users</div>
                <table class="table table-striped table-responsive-md table-hover table-bordered table-condensed">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        @foreach ($user as $new)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $new->name }}</td>
                            <td>{{ $new->email }}</td>
                            <td>
                                <a href="{{ route('users.edit', $new->id) }}" class="btn btn-primary">Edit</a>

                                <form action="{{ route('users.destroy', $new->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    @foreach ($new->roles as $role)
                                    @if($role->name!='admin')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    @endif
                                    @endforeach

                                   
                                </form>
                            </td>
                        </tr>
                        @endforeach
    

                    </tbody>
                </table>
<center><a name="" class="btn btn-success"  href="{{ route('users.create') }}" role="button">Add More</a></center>
            </div>
        </div>
    </div>
</div>

@endsection