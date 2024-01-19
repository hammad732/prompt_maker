@extends('admin.layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{Auth::user()->name}}</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
 @php
    $user = Auth::user(); // Get the currently authenticated user
@endphp
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    
                    @if(session()->has('status'))
                        <p class="alert alert-success">{{session('status')}} {{$user->name}}</p>
                    @endif
                    @if(session()->has('msg'))
                        <p class="alert alert-danger">{{session('msg')}}</p>
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
                </div>
            </div>
        </div>

               @if($user->hasRole('admin'))
           <!-- Main content -->
       <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                            <h3>{{App\Models\User::count()}}</h3>
                            <p>Registered Users</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <a href="{{route('users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    @endif
                    <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{App\Models\PromptMaker::count()}}</h3>

                            <p>Experiences</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-globe"></i>
                        </div>
                        <a href="{{route('content.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
