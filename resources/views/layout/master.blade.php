<!DOCTYPE html>
<html>
<head>
    <title>❤️❤️❤️</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
     html,body {
    background: linear-gradient(to bottom, #ffd6eb, #fff0f6);
      height: 100%;
    overflow-y: auto; 

}
.header, .container, footer {
    box-shadow: 0 5px 15px rgba(255,105,180,0.2);
}
.pagination-custom {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 20px;
}

.page-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: none;
    background: #ffd6eb;
    color: #ff4da6;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}

.page-btn:hover {
    background: #ff9ecf;
    color: white;
}

.page-active {
    background: linear-gradient(45deg,#ff6fa5,#ff9ecf);
    color: white;
}

.page-disabled {
    background: #ff9ecf;
    color: #999;
}
.product-card {
    border-radius: 20px;
    background: #f9f9f9;
    backdrop-filter: blur(10px);
    transition: 0.3s;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 30px rgba(255,105,180,0.4);
}

.btn-pink {
    background: linear-gradient(45deg, #ff6fa5, #ff9ecf);
    border: none;
    color: white;
}

        .header {
            background: linear-gradient(90deg, #ff9ecf, #ffb6d9);
            padding: 20px 30px;
            margin: 15px;              
            border-radius: 15px; 
            color: white;
            font-weight: bold;
        }
        .container {
    padding: 20px;
    background: rgba(255,255,255,0.6);
    border-radius: 15px;
}

footer .container {
    background: transparent; /* bỏ nền trắng */
    box-shadow: none;
}

.petal {
    position: fixed;
    top: -20px;
    width: 12px;
    height: 12px;
    background: radial-gradient(circle at 30% 30%, #ff6fa5, #ff6fa5);
    border-radius: 50% 70% 50% 70%;
    opacity: 0.8;
    animation: fall linear infinite;
}

@keyframes fall {
    0% {
        transform: translateY(-20px) translateX(0) rotate(0deg);
    }
    100% {
        transform: translateY(110vh) translateX(50px) rotate(360deg);
    }
}
footer {
    margin: 15px;             
    border-radius: 15px;
    background: rgba(255,192,203,0.9);
}


    </style>
</head>

<body class="d-flex flex-column min-vh-100">

<div class="header d-flex justify-content-between px-6">
    <h5>🌸 yxm_munsociu Store 🌸</h5>

    <div>
        <a href="{{ route('home') }}" class="btn btn-pink btn-lg">🏠 Home</a>
        <a href="{{ route('dashboard') }}" class="btn btn-pink btn-lg">⚙️ Dashboard</a>
    </div>
</div>

<div class="container mt-4 mb-4 flex-grow-1 fixed-content">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

<footer class="bg-pink text-pink pt-4 mt-auto">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                    🌸&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;🌸<br>
    🌸🌸&nbsp;&nbsp;🌸🌸<br>
    🌸&nbsp;🌸🌸&nbsp;🌸<br>
                       🌸&nbsp;&nbsp;&nbsp;&nbsp;🌸&nbsp;&nbsp;&nbsp;🌸<br>
                   🌸&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;🌸<br>
            </div>

            <div class="col-md-4">
                <h5>📄 Chính sách</h5>
                <ul class="list-unstyled">
                    <h5><li>🔒 Bảo mật</li></h5>
                    <h5><li>🚚 Vận chuyển</li></h5>
                    <h5><li>💸 Hoàn tiền</li></h5>
                </ul>
            </div>

            <div class="col-md-4">
                <h5>📞 Liên hệ</h5>
                <h5>Email: munsociu@gmail.com</h5>
                <h5>Phone: 0123 456 789</h5>

                <div>
                    <h5>🌐 Facebook | Instagram | TikTok</h5>
                </div>
            </div>

        </div>

        <div class="text-center mt-3 pb-2">
            <h5>💖 2026 yxm_munsociu Store</h5>
        </div>
    </div>
</footer>

<script>
for (let i = 0; i < 40; i++) {
    let petal = document.createElement("div");
    petal.className = "petal";

    petal.style.left = Math.random() * 100 + "vw";
    petal.style.animationDuration = (6 + Math.random() * 6) + "s";
    petal.style.opacity = Math.random();

    document.body.appendChild(petal);
}
</script>
</body>
</html>