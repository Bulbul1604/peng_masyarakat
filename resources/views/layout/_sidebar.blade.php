<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <div class="d-flex align-items-center">
            <img src="{{ asset('logo.png') }}" alt="logo" width="125" />
        </div>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item {{ (Request::is('dashboard') ? 'active' : '') }}">
                <a href="{{ route('dashboard') }}">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22">
                            <path
                                d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z">
                            </path>
                        </svg>
                    </span>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <span class="divider">
                <hr />
            </span>

            {{-- Akses Admin --}}
            @if (auth()->user()->akses == 'admin')
            <li class="nav-item {{ (Request::is('users') || Request::is('users/*') ? 'active' : '') }}">
                <a href="{{ route('users.index') }}">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22">
                            <path
                                d="M12,5A3.5,3.5 0 0,0 8.5,8.5A3.5,3.5 0 0,0 12,12A3.5,3.5 0 0,0 15.5,8.5A3.5,3.5 0 0,0 12,5M12,7A1.5,1.5 0 0,1 13.5,8.5A1.5,1.5 0 0,1 12,10A1.5,1.5 0 0,1 10.5,8.5A1.5,1.5 0 0,1 12,7M5.5,8A2.5,2.5 0 0,0 3,10.5C3,11.44 3.53,12.25 4.29,12.68C4.65,12.88 5.06,13 5.5,13C5.94,13 6.35,12.88 6.71,12.68C7.08,12.47 7.39,12.17 7.62,11.81C6.89,10.86 6.5,9.7 6.5,8.5C6.5,8.41 6.5,8.31 6.5,8.22C6.2,8.08 5.86,8 5.5,8M18.5,8C18.14,8 17.8,8.08 17.5,8.22C17.5,8.31 17.5,8.41 17.5,8.5C17.5,9.7 17.11,10.86 16.38,11.81C16.5,12 16.63,12.15 16.78,12.3C16.94,12.45 17.1,12.58 17.29,12.68C17.65,12.88 18.06,13 18.5,13C18.94,13 19.35,12.88 19.71,12.68C20.47,12.25 21,11.44 21,10.5A2.5,2.5 0 0,0 18.5,8M12,14C9.66,14 5,15.17 5,17.5V19H19V17.5C19,15.17 14.34,14 12,14M4.71,14.55C2.78,14.78 0,15.76 0,17.5V19H3V17.07C3,16.06 3.69,15.22 4.71,14.55M19.29,14.55C20.31,15.22 21,16.06 21,17.07V19H24V17.5C24,15.76 21.22,14.78 19.29,14.55M12,16C13.53,16 15.24,16.5 16.23,17H7.77C8.76,16.5 10.47,16 12,16Z" />
                        </svg>
                    </span>
                    <span class="text">Data Users</span>
                </a>
            </li>

            <li class="nav-item {{ (Request::is('complaint') || Request::is('complaint/*') ? 'active' : '') }}">
                <a href="{{ route('complaint.index') }}">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22">
                            <path
                                d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2M18 20H6V4H13V9H18V20M9 13V19H7V13H9M15 15V19H17V15H15M11 11V19H13V11H11Z">
                            </path>
                        </svg>
                    </span>
                    <span class="text">Data Laporan</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->akses == 'admin' || auth()->user()->akses == 'petugas' || auth()->user()->akses ==
            'pimpinan')
            <li class="nav-item {{ (Request::is('verif') || Request::is('verif/*') ? 'active' : '') }}">
                <a href="{{ route('verif.index') }}">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22">
                            <path
                                d="M23.5 17L18.5 22L15 18.5L16.5 17L18.5 19L22 15.5L23.5 17M6 2C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H13.8C13.4 21.4 13.2 20.7 13.1 20H6V4H13V9H18V13.1C18.3 13 18.7 13 19 13C19.3 13 19.7 13 20 13.1V8L14 2H6M11 11V19H13V11H11M7 13V19H9V13H7Z">
                            </path>
                        </svg>
                    </span>
                    <span class="text">Laporan Verif</span>
                </a>
            </li>

            <li class="nav-item {{ (Request::is('response') || Request::is('response/*') ? 'active' : '') }}">
                <a href="{{ route('response.index') }}">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22">
                            <path
                                d="M4,6V16H9V12A2,2 0 0,1 11,10H16A2,2 0 0,1 18,12V16H20V6H4M0,20V18H4A2,2 0 0,1 2,16V6A2,2 0 0,1 4,4H20A2,2 0 0,1 22,6V16A2,2 0 0,1 20,18H24V20H18V20C18,21.11 17.1,22 16,22H11A2,2 0 0,1 9,20H9L0,20M11.5,20A0.5,0.5 0 0,0 11,20.5A0.5,0.5 0 0,0 11.5,21A0.5,0.5 0 0,0 12,20.5A0.5,0.5 0 0,0 11.5,20M15.5,20A0.5,0.5 0 0,0 15,20.5A0.5,0.5 0 0,0 15.5,21A0.5,0.5 0 0,0 16,20.5A0.5,0.5 0 0,0 15.5,20M13,20V21H14V20H13M11,12V19H16V12H11Z">
                            </path>
                        </svg>
                    </span>
                    <span class="text">Data Tanggapan</span>
                </a>
            </li>
            @endif

            {{-- Akses Masyarakat --}}
            @if (auth()->user()->akses == 'masyarakat')
            <li class="nav-item {{ (Request::is('complaint/create') ? 'active' : '') }}">
                <a href="{{ route('complaint.create') }}">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22">
                            <path
                                d="M23 18H20V15H18V18H15V20H18V23H20V20H23M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z">
                            </path>
                        </svg>
                    </span>
                    <span class="text">Buat Laporan</span>
                </a>
            </li>

            <li class="nav-item {{ (Request::is('complaint')  ? 'active' : '') }}">
                <a href="{{ route('complaint.index') }}">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22">
                            <path
                                d="M6,2A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2H6M6,4H13V9H18V20H6V4M8,12V14H16V12H8M8,16V18H13V16H8Z">
                            </path>
                        </svg>
                    </span>
                    <span class="text">Laporan</span>
                </a>
            </li>

            <li class="nav-item {{ (Request::is('response') || Request::is('response/*') ? 'active' : '') }}">
                <a href="{{ route('response.index') }}">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22">
                            <path
                                d="M6,2A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2H6M6,4H13V9H18V20H6V4M8,12V14H16V12H8M8,16V18H13V16H8Z">
                            </path>
                        </svg>
                    </span>
                    <span class="text">Tanggapan</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->akses == 'admin' || auth()->user()->akses == 'pimpinan')
            <li
                class="nav-item {{ (Request::is('generate-report') || Request::is('generate-report/*') ? 'active' : '') }}">
                <a href="{{ route('generate-report.index') }}">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22">
                            <path
                                d="M15 15H9V14H15V15M15 16H9V17H15V16M15 18H9V19H15V18M23 13.5C23 14.75 22.56 15.81 21.69 16.69C20.81 17.56 19.75 18 18.5 18H18V22H6V17.95C4.7 17.85 3.57 17.36 2.61 16.43C1.54 15.38 1 14.09 1 12.58C1 11.28 1.39 10.12 2.17 9.1S4 7.43 5.25 7.15C5.67 5.62 6.5 4.38 7.75 3.43S10.42 2 12 2C13.95 2 15.6 2.68 16.96 4.04C18.32 5.4 19 7.05 19 9C20.15 9.13 21.1 9.63 21.86 10.5C22.62 11.35 23 12.35 23 13.5M6 15.95V11H17V9C17 7.62 16.5 6.44 15.54 5.46C14.56 4.5 13.38 4 12 4S9.44 4.5 8.46 5.46C7.5 6.44 7 7.62 7 9H6.5C5.53 9 4.71 9.34 4.03 10.03C3.34 10.71 3 11.53 3 12.5S3.34 14.29 4.03 15C4.59 15.54 5.25 15.85 6 15.95M16 13H8V20H16V13M21 13.5C21 12.8 20.76 12.21 20.27 11.73S19.2 11 18.5 11H18V16H18.5C19.2 16 19.79 15.76 20.27 15.28S21 14.2 21 13.5Z">
                            </path>
                        </svg>

                    </span>
                    <span class="text">Data Laporan</span>
                </a>
            </li>
            @endif

        </ul>
    </nav>
</aside>
<div class="overlay"></div>
