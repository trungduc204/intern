<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Tạo nền vũ trụ */
        body, html {
            height: 100%;
            margin: 0;
            background: radial-gradient(circle, rgba(15,15,54,1) 0%, rgba(0,0,0,1) 100%);
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
            position: relative;
        }

        /* Lớp chứa sao */
        .stars {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        /* Tạo sao động */
        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0;
            animation: twinkle linear infinite;
        }

        /* Hiệu ứng nhấp nháy sao */
        @keyframes twinkle {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }
            50% {
                opacity: 1;
                transform: scale(1);
            }
            100% {
                opacity: 0;
                transform: scale(0.5);
            }
        }

        /* Hiệu ứng form xuất hiện */
        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.8);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 40px;
            width: 100%;
            color: #fff;
            /* opacity: 0;
            animation: fadeIn 1.5s forwards, zoomIn 1s ease-out; */
            max-width: 400px;
            background: linear-gradient(135deg, rgba(20, 20, 60, 0.9), rgba(0, 0, 40, 0.95)); /* Tối hơn */
            border: 2px solid rgba(70, 117, 245, 0.3); /* Viền giảm sáng */
            box-shadow: 0 0 15px rgba(200, 212, 216, 0.3); /* Giảm độ sáng của shadow */
        }

        /* Hiệu ứng zoom-in */
        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.8);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

        /* Hiệu ứng fade-in */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .form-control {
            border-radius: 30px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid #fff;
            color: #fff;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #00bfff;
            box-shadow: 0 0 5px rgba(0, 191, 255, 0.8);
        }

        .btn {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border-radius: 30px;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background: linear-gradient(to left, #6a11cb, #2575fc);
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 191, 255, 0.5);
        }

        .input-group-text {
            cursor: pointer;
        }

        /* Tạo ông trăng */
        .moon {
            position: absolute;
            top: 10%;
            left: 80%;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.6) 30%, rgba(255, 255, 255, 0.1) 100%);
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            opacity: 0.8;
            /* animation: moonMovement 5s linear infinite; */
        }

        /* Hiệu ứng chuyển động của ông trăng */
        @keyframes moonMovement {
            0% {
                transform: translateX(0) translateY(0);
            }
            50% {
                transform: translateX(-50px) translateY(30px);
            }
            100% {
                transform: translateX(0) translateY(0);
            }
        }

    </style>
</head>
<body>

    <!-- Hiệu ứng sao trời -->
    <div class="stars"></div>

    <!-- Thêm ông trăng -->
    <div class="moon"></div>

    <!-- Form Đăng Nhập -->
    @yield('content')

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript tạo hiệu ứng sao động -->
    <script>
        function createStars() {
            const starsContainer = document.querySelector('.stars');
            for (let i = 0; i < 100; i++) {
                let star = document.createElement('div');
                star.classList.add('star');
                let size = Math.random() * 3 + 1;
                star.style.width = size + 'px';
                star.style.height = size + 'px';
                star.style.top = Math.random() * 100 + 'vh';
                star.style.left = Math.random() * 100 + 'vw';
                star.style.animationDuration = (Math.random() * 3 + 2) + 's';
                starsContainer.appendChild(star);
            }
        }
        createStars();

        // Toggle Password Visibility
        document.getElementById('toggle-password').addEventListener('click', function () {
            let passwordInput = document.getElementById('password');
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
            this.innerHTML = passwordInput.type === 'password' ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
        });
    </script>

</body>
</html>
