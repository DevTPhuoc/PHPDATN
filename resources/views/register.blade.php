<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <!-- <style>
        .background-image {
            background-image: url('{{ asset('img/add/e-p1.png') }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .overlay {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
        .image-text {
            position: relative;
            text-align: center;
            color: dark;
        }
        .image-text img {
            width: 100%;
            height: auto;
        }
        .text-overlay {
            position: absolute;
            bottom: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0);
            padding: 10px;
            border-radius: 10px;
        }
    </style> -->
</head>
<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2 image-text">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('img/add/Nike Air Max.png') }}" alt="Office"/>
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="{{ asset('assets/img/login-office-dark.jpeg') }}" alt="Office" />
                    <!-- <div class="text-overlay">
                        <h2>Đăng Nhập Để Mua Hàng Tại Shop Chúng Tôi.</h2>
                        <p>Đây là trang đăng nhập tại cửa hàng Karma Shop của Chúng Tôi.</p>
                    </div> -->
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        @if (session('success'))
                            <div class="mb-4 text-green-600">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('registerHandle') }}" method="POST">
                            @csrf
                            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                Đăng ký
                            </h1>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="email"
                                    type="email"
                                    required
                                />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Số điện thoại</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="phone"
                                    type="phone"
                                    required
                                />
                            </label>
                            <label class="block mt-4 text-sm password-toggle">
                                <span class="text-gray-700 dark:text-gray-400">Mật khẩu</span>
                                <input id="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="password"
                                    type="password"
                                    required
                                />
                                <svg id="togglePassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    class="w-6 h-6 password-toggle-icon text-gray-700 dark:text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12l-3 3m0 0l-3-3m3 3V9m9 3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </label>
                            <label class="block mt-4 text-sm password-toggle">
                                <span class="text-gray-700 dark:text-gray-400">Xác nhận mật khẩu</span>
                                <input id="confirmPassword" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="password_confirmation"
                                    type="password"
                                    required
                                />
                                <svg id="toggleConfirmPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    class="w-6 h-6 password-toggle-icon text-gray-700 dark:text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12l-3 3m0 0l-3-3m3 3V9m9 3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </label>
                            <button 
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                type="submit"
                            >
                                Đăng ký   
                            </button>
                        </form>
                        @if ($errors->any())
                            <div class="mt-4">
                                <ul class="text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <hr class="my-8" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
            const password = document.getElementById('confirmPassword');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
        });
    </script>
</body>
</html>
