<?php
function getHeaderBlock() {
    echo <<<HTML
<header class="bg-gray-800 text-white py-6 shadow-md">
    <div class="container max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between px-6">
        <h1 class="text-3xl font-bold mb-2 md:mb-0">Real Estate Portal</h1>
        <nav class="space-x-4">
            <a href="/?page=home" class="hover:text-gray-300 transition-colors duration-200">Home</a>
            <a href="/?page=houses" class="hover:text-gray-300 transition-colors duration-200">Houses</a>
            <a href="/?page=contact" class="hover:text-gray-300 transition-colors duration-200">Contact</a>
            <a href="/?page=about" class="hover:text-gray-300 transition-colors duration-200">About</a>
        </nav>
    </div>
</header>
HTML;
}
?>
