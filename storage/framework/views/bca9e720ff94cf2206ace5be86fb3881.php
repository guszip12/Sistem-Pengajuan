<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        /* Your existing CSS */
        .nav-link.active {
            font-weight: bold;
            color: #333;
            background-color: #f8f9fa;
            border-left: 3px solid #007bff;
            padding-left: 10px;
        }
        .main-content {
            padding: 20px;
        }
        .nav-link {
            position: relative;
            padding: 10px 20px;
            display: block;
            color: rgba(0, 0, 0, 0.75);
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: #54e9dc;
            text-decoration: none;
        }
        .nav-link::before {
            content: "";
            position: absolute;
            width: 3px;
            height: 100%;
            background-color: transparent;
            left: 0;
            top: 0;
            transition: background-color 0.3s;
        }
        .nav-link:hover::before {
            background-color: #007bff;
        }
        .active .nav-link {
            color: #fff;
            font-weight: bold;
        }
        .active .nav-link::before {
            background-color: #007bff;
        }
        .content-section {
            display: none;
        }
        .content-section.active {
            display: block;
        }
        .header .nav-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 5px;
            display: none;
            z-index: 999;
        }
        .header .nav-menu.active {
            display: block;
        }
        .header ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .header ul li {
            margin-bottom: 5px;
        }
    </style>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased">
    
<div class="min-h-screen bg-gray-100">
    <!-- Include navigation -->
    <?php echo $__env->make('admin.layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Page Heading -->
    <?php if(isset($header)): ?>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <?php echo e($header); ?>

            
        </div>
    </header>
    <?php endif; ?>

    <!-- Page Content -->
    <main class="main-content">
        <?php echo e($slot); ?>

    </main>
</div>

<!-- Custom JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sembunyikan menu saat halaman dimuat
        const navMenu = document.getElementById('navMenu');
        navMenu.classList.add('hidden');
        
        // Tambahkan event listener untuk menutup menu saat klik di luar menu
        document.addEventListener('click', function(event) {
            const isClickInsideMenu = navMenu.contains(event.target);
            const isToggleBtn = event.target.classList.contains('toggle-navigation-btn');
            
            if (!isClickInsideMenu && !isToggleBtn) {
                navMenu.classList.add('hidden');
            }
        });
    });

    function showSection(sectionId) {
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => {
            section.classList.remove('active');
        });

        const activeSection = document.getElementById(sectionId);
        if (activeSection) {
            activeSection.classList.add('active');
        }

        const links = document.querySelectorAll('.nav-link');
        links.forEach(link => {
            link.classList.remove('active');
        });

        const activeLink = document.querySelector(`.nav-link[onclick*='${sectionId}']`);
        if (activeLink) {
            activeLink.classList.add('active');
        }
    }

//     function toggleNavigation() {
//     const navMenu = document.getElementById('navMenu');
//     navMenu.classList.toggle('hidden');

//     // Menunda untuk menghapus class 'hidden' setelah tombol toggle ditekan
//     if (!navMenu.classList.contains('hidden')) {
//         setTimeout(() => {
//             document.addEventListener('click', closeNavMenuOutside);
//         }, 50); // Menunggu 50 milidetik sebelum menambahkan event listener
//     } else {
//         document.removeEventListener('click', closeNavMenuOutside);
//     }
// }

// // Fungsi untuk menutup menu saat klik di luar menu
// function closeNavMenuOutside(event) {
//     const navMenu = document.getElementById('navMenu');
//     const isClickInsideMenu = navMenu.contains(event.target);
//     const isToggleBtn = event.target.classList.contains('toggle-navigation-btn');

//     if (!isClickInsideMenu && !isToggleBtn) {
//         navMenu.classList.add('hidden');
//         document.removeEventListener('click', closeNavMenuOutside);
//     }
// }

</script>

</body>
</html>
<?php /**PATH D:\laravel-11-multi-auth-main\resources\views\admin\layouts\app.blade.php ENDPATH**/ ?>