<!--  Header Start -->
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ (!empty(Auth::user()->photo)) ? url('upload/user/'.Auth::user()->photo) : url('upload/no_image.jpg')}}" alt="" width="35" height="35"
                            class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <h6 class="d-flex align-items-center gap-2 text-center ps-3 pt-2">
                                <p class="mb-0 fs-3">{{Auth::user()->name}}</p>
                            </h6>
                            <h6 class="d-flex align-items-center gap-2 text-center ps-3">
                                as <p class="mb-0 text-info"> {{ Auth::user()->role == 'manager' ? "Manager" : "Member" }}</p>
                            </h6>
                            
                            <hr>
                            <a href="{{route('profile')}}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">My Profile</p>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')"
                                class="btn btn-outline-primary mx-3 mt-2 d-block" onclick="event.preventDefault();
                                this.closest('form').submit();">Logout</a>
                            </form>
                            
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--  Header End -->
