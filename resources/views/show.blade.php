<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị Karma Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
   
</head>
<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900 background-image">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-full">
                    <div class="w-full text-center">
                        <h1 class="mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            Xin chào, mừng bạn đã đến với trang quản trị Karma Shop
                        </h1>
                        <p class="mb-4 text-sm text-gray-700 dark:text-gray-400">
                            Chúng tôi rất vui mừng chào đón bạn. Hãy đăng ký hoặc đăng nhập để bắt đầu quản lý cửa hàng của bạn.
                        </p>
                        <div class="flex justify-center mt-4 space-x-4">
                            <a href="{{ route('register') }}" class="block w-1/3 px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Đăng ký
                            </a>
                            <a href="{{ route('login') }}" class="block w-1/3 px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                Đăng nhập
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
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
    </style>
</html>
