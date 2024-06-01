<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Responsive Tailwind CSS Header</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<header class="bg-white shadow">
    <div class="container mx-auto px-6 py-6 flex items-center justify-between">
        <div class="text-2xl font-bold text-gray-800">
            <a href="#">Logo</a>
        </div>
        <div class="md:flex hidden items-center space-x-4">
            <a href="/" class="text-gray-800 hover:text-blue-500">Home</a>
            <a href="dashboard.php" class="text-gray-800 hover:text-blue-500">Dashboard</a>
            <a href="logout.php" class="text-gray-800 hover:text-blue-500">Logout</a>
        </div>
        <div class="md:hidden">
            <button id="menu-toggle" class="focus:outline-none">
                <svg class="w-6 h-6 text-gray-800 hover:text-blue-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</header>


<?php get_message(); ?>











<!-- <div>
    Main content will go here
</div> -->

<!-- The closing tags are inside the footer.php -->

<!-- </body>
</html> -->
