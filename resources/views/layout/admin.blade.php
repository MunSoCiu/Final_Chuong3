<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        margin: 0;
    }

    /* SIDEBAR */
    .sidebar {
        width: 220px;
        height: 100vh;
        background: #0b2545;
        color: white;
        position: fixed;
    }

    .logo {
        padding: 20px;
        font-size: 20px;
        font-weight: bold;
    }

    .menu-item {
        display: block;
        padding: 15px 20px;
        color: #cbd5e1;
        text-decoration: none;
    }

    .menu-item:hover {
        background: #1e3a5f;
        color: white;
    }

    .menu-item.active {
        background: #3b82f6;
        color: white;
    }

    /* MAIN */
    .main {
        margin-left: 220px;
        background: #f5f7fa;
        min-height: 100vh;
    }

    /* TOPBAR */
    .topbar {
        height: 60px;
        background: white;
        border-bottom: 1px solid #ddd;
    }

    .content {
        padding: 20px;
    }
    .menu-box {
    display:inline-block;
    width:12px;
    height:12px;
    background:linear-gradient(45deg,#60a5fa,#3b82f6);
    margin-right:10px;
    border-radius:3px;
}
    </style>
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">🌸 MunSoCiu</div>

    <!-- Dashboard -->
    <a href="{{ route('dashboard') }}"
       class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
         <span class="menu-box"></span> 📊 Thống kê
    </a>

    <!-- Sản phẩm -->
    <a href="{{ route('products.index') }}"
       class="menu-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
         <span class="menu-box"></span> 📋 Sản phẩm
    </a>

    <!-- Lịch sử -->
    <a href="{{ route('history') }}"
       class="menu-item {{ request()->routeIs('history') ? 'active' : '' }}">
       <span class="menu-box"></span> 🕒 Lịch sử sản phẩm
    </a>

</div>

    <!-- MAIN -->
    <div class="main flex-grow-1">

        <div class="topbar d-flex justify-content-between align-items-center px-4">

    <!-- LEFT -->
    <div>
        <a href="{{ route('home') }}" class="btn btn-lg btn-outline-primary">
            🏠 Trang chủ
        </a>
    </div>

    <!-- RIGHT -->
    <div >👤 Admin</div>

</div>

        <div class="content">
            @yield('content')
        </div>

    </div>

</div>
@stack('scripts')
</body>
</html>