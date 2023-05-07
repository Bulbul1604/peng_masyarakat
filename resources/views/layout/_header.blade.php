<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
                <div class="header-left d-flex align-items-center">
                    <div class="menu-toggle-btn mr-20">
                        <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                            <i class="lni lni-chevron-left me-2"></i> Menu
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
                <div class="header-right">
                    <!-- profile start -->
                    <div class="profile-box ml-15">
                        <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-info">
                                <div class="info">
                                    <h6 class="small">{{ ucwords(auth()->user()->name) }}</h6>
                                </div>
                            </div>
                            <i class="lni lni-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="profile">
                            <li>
                                <a href="{{ route('profile.edit') }}"> <i class="lni lni-cog"></i>
                                    Settings
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="text-danger small border-none bg-transparent border-0"
                                        style="width: 100%; font-size: 14px; display: flex; align-items: center; gap: 10px">
                                        <i class="lni lni-exit"></i> Sign Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- profile end -->
                </div>
            </div>
        </div>
    </div>
</header>
