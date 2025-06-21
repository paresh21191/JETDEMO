<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .wrapper {
            flex: 1;
            display: flex;
            flex-direction: row;
        }

        #sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            padding: 1rem;
        }

        #sidebar .nav-link {
            color: white;
        }

        #sidebar .nav-link.active {
            background-color: #495057;
        }

        #content {
            flex: 1;
            padding: 20px;
            background: #f8f9fa;
            min-height: calc(100vh - 56px);
        }

        @media (max-width: 768px) {
            #sidebar {
                display: none;
            }

            #sidebar.active {
                display: block;
                position: absolute;
                z-index: 1000;
                height: 100vh;
            }
        }

        button.nav-link {
            padding: 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item me-2">
                        <span class="nav-link text-white">Hello, {{ auth()->user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-white">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar and Content -->
    <div class="wrapper">
        <nav id="sidebar" class="d-flex flex-column">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.bookings.index') }}" class="nav-link {{ request()->routeIs('admin.bookings.index') ? 'active' : '' }}">
                        Bookings
                    </a>
                </li>
                <li>
                  <a href="{{ route('admin.flight_customer_users.index') }}" class="nav-link {{ request()->routeIs('admin.flight_customer_users.*') ? 'active' : '' }}">
                      Flight Customer Users
                  </a>
              </li>
              <li>
                <a href="{{ route('admin.reports.index') }}" class="nav-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                    System Reports
                </a>
             </li>
                <!-- Add more sidebar links here -->
            </ul>
        </nav>

        <main id="content">
            @yield('content')
        </main>
    </div>

    @yield('scripts');

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
