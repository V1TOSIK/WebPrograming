<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Lab</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100 flex flex-col min-h-screen">

    <header class="bg-gray-800 text-white py-4 text-center">
        <h1 class="text-3xl">Welcome to Our PHP Real Estate</h1>
    </header>

    <main class="flex-1">
        <div class="container mx-auto px-4 py-6">
            <?php
            echo '
                <section id="about">
                    <h2>About Us</h2>
                    <p>We are a company that values innovation and quality.</p>
                </section>';
            ?>
        </div>
    </main>

    <?php
        include 'footer.php';
        getFooterBlock();
    ?>

</body>
</html>