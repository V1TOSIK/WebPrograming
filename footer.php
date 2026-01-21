<?php
function getFooterBlock(){
    $location = "Kyiv, Ukraine";
    
    echo "<footer class='bg-gray-800 text-white py-6 mt-8'>
        <div class='container mx-auto text-center'>
            <p class='text-sm mb-2'>Location: <span class='font-semibold'>$location</span></p>
            <p class='text-sm'>&copy; " . date('Y') . " <span class='font-semibold'>Your Company</span></p>
            <div class='mt-4'>
                <a href='#' class='text-gray-400 hover:text-gray-200 transition-colors duration-300 mx-2'>Privacy Policy</a>
                <a href='#' class='text-gray-400 hover:text-gray-200 transition-colors duration-300 mx-2'>Terms of Service</a>
                <a href='#' class='text-gray-400 hover:text-gray-200 transition-colors duration-300 mx-2'>Contact</a>
                <a href='/about.php' class='text-gray-400 hover:text-gray-200 transition-colors duration-300 mx-2'>About</a>
            </div>
        </div>
    </footer>";
}
?>