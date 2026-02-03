<?php
function getFooterBlock() {
    $location = "Kyiv, Ukraine";
    $year = date('Y');

    echo <<<HTML
<footer class="bg-gray-800 text-white py-6 mt-5 shadow-md">
    <div class="max-w-6xl mx-auto text-center px-6">
        <p class="text-sm mb-2">Location: <span class="font-semibold">$location</span></p>
        <p class="text-sm">&copy; $year <span class="font-semibold">Your Company</span></p>
        <div class="mt-4 space-x-4">
            <a href="#" class="text-gray-400 hover:text-gray-200 transition-colors duration-300">Privacy Policy</a>
            <a href="#" class="text-gray-400 hover:text-gray-200 transition-colors duration-300">Terms of Service</a>
            <a href="/?page=contact" class="text-gray-400 hover:text-gray-200 transition-colors duration-300">Contact</a>
            <a href="/?page=about" class="text-gray-400 hover:text-gray-200 transition-colors duration-300">About</a>
        </div>
    </div>
</footer>
HTML;
}
?>
