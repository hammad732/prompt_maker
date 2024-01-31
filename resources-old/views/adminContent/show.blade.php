@extends('admin.layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper " >
        <div class="container justify-content-center" >
            <div class="row justify-content-center mx-3">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded" >
                    <div class="card-header text-center font-weight-bold">View</div>
                    <table class="table table-striped table-responsive-md table-hover table-bordered table-condensed">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Project Title</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>URL</th>
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
                            @foreach ($data as $user)
                                       

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->type }}</td>
                                <td>{{ $user->description }}</td>
                                <td>{{ $user->url }}</td>
                                <td>
                                    <a href="{{ route('work.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('work.destroy',$user->id)}}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        @if(Auth::user()->hasRole('admin'))
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        

                        </tbody>
                        
                    </table>
                     

                </div>
            </div>
        </div>
    </div>

@endsection
