<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <style>
        body {
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(45deg, rgb(45, 77, 44), rgb(175, 115, 172));
            color: white;
            padding: 15px;
            position: fixed;
            left: 0;
            top: 0;
            transition: all 0.3s;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Khi sidebar thu nhỏ */
        .sidebar.closed {
            width: 65px;
        }

        /* Header (Logo + Tên) */
        .sidebar-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Logo */
        .brand-logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Tên thương hiệu */
        .brand-name {
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s;
            text-align: center;
            margin-top: 5px;
        }

        /* Khi sidebar thu nhỏ, ẩn tên */
        .sidebar.closed .brand-name {
            display: none;
        }

        /* Links */
        .sidebar-menu {
            flex-grow: 1;
            margin-top: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .sidebar a i {
            margin-right: 10px;
            transition: 0.3s;
        }

        /* Khi sidebar thu nhỏ, ẩn text của menu */
        .sidebar.closed a span {
            display: none;
        }

        .sidebar.closed a i {
            margin-right: 0;
        }

        /* Nút thu gọn sidebar (Luôn ở dưới) */
        .toggle-btn {
            cursor: pointer;
            font-size: 20px;
            padding: 10px;
            transition: 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar.closed .toggle-btn {
            font-size: 24px;
        }

        /* Main content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            transition: margin-left 0.3s;
            width: calc(100% - 250px);
        }

        .sidebar.closed ~ .main-content {
            margin-left: 80px;
            width: calc(100% - 80px);
        }

        /* Navbar */
        .navbar-custom {
            background: #f8f9fa;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ddd;
        }

        .search-bar {
            width: 300px;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .dropdown-menu {
            right: 0;
            left: auto;
        }

        /* Dashboard Box */
        .dashboard-box {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
                overflow: hidden;
            }

            .sidebar a {
                justify-content: center;
            }

            .sidebar a span {
                display: none;
            }

            .main-content {
                margin-left: 80px;
            }
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar closed" id="sidebar">
    <div>
        <div class="sidebar-header">
            <img src="https://i.pinimg.com/736x/12/42/d2/1242d213b7c0899ee076972d34075f20.jpg" alt="Logo" class="brand-logo">
            <span class="brand-name">My Store</span>
        </div>

        <div class="sidebar-menu">
            <a href="{{ route('admin.app') }}"><i class="bi bi-house-door"></i><span> Dashboard</span></a>
            <a href="{{ route('listCate') }}"><i class="bi bi-grid"></i><span> Categories</span></a>
            <a href="{{ route('listPro') }}"><i class="bi bi-box"></i><span> Products</span></a>
            <a href="#"><i class="bi bi-cart"></i><span> Orders</span></a>
        </div>
    </div>

    <!-- Nút thu gọn -->
    <div class="toggle-btn" onclick="toggleSidebar()">
        <i class="bi bi-arrow-left-right"></i>
    </div>
</div>


<!-- Main content -->
<div class="main-content">
    <!-- Navbar -->
    <div class="navbar-custom">
        <div class="search-bar">
            <input class="form-control" type="text" placeholder="Search...">
        </div>
        <div class="user-dropdown dropdown">
            <img src="https://i.pinimg.com/736x/65/c4/cc/65c4ccfc51c06460efc0e701f8a98e8b.jpg" alt="User" class="user-avatar">
            <span data-bs-toggle="dropdown"> {{ Auth::user()->name ?? 'Guest' }} <i class="bi bi-chevron-down"></i></span>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Switch to Client</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="dashboard-box mt-3">
        <h4 class="text-primary">👋 Welcome, {{ Auth::user()->name ?? 'Guest' }}!</h4>
        <p>Manage your products, categories, and orders with ease.</p>
    </div>

    <div class="mt-4">
        @yield('content')
    </div>
</div>

<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("closed");
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
