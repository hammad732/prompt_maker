<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('images/newlogo.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>Prompt</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-1 pb-1 mb-1 d-flex">
            <div class="image">
                <img src="{{asset('images/admin_icon.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item"><a href="#" class="d-block">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <li class="nav-item">
                                    <a href="#" type="button" id="edit-profile-btn" class="" class="d-block" data-toggle="modal" data-target="#profile-btn-modal"><i class="nav-icon far fa-id-card"></i>
                                        My Profile
                                    </a>
                                </li>
                            </ul>
                        </a></li>
                </ul>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @php
    $user = Auth::user(); // Get the currently authenticated user
@endphp


                <li class=" nav-item">
                    <a href="{{route('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
               @if($user->hasRole('admin'))
                <li class=" nav-item">
                    <a href="{{route('users') }}" class="{{ Request::is('users') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>All Users</p>
                    </a>
                </li>
              

                <li class=" nav-item">
                    <a href="{{route('newpage')}}" class="{{ Request::is('https://cyberbulwark.com/upwork') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-rss"></i>
                        <p>Feed <span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                </li>
                  @endif
                <li class=" nav-item">
                    <a href="{{route('content.show')}}" class="{{ Request::is('content') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>All Experiences <span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                </li>
                
                <li class=" nav-item">
                    <a href="{{route('work.create')}}" class="{{ Request::is('work/create') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Experience <span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                </li>
                @if($user->hasRole('admin'))
                <li class=" nav-item">
                    <a href="{{route('prompt.create')}}" class="{{ Request::is('prompt-create') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>Create Prompt <span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                </li> 
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>