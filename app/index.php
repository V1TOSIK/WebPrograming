<?php
$page = $_GET['page'] ?? 'home';

$contentFile = match($page) {
    'houses' => __DIR__ . '/pages/HousesPage.php',
    'contact' => __DIR__ . '/pages/ContactPage.php',
    'about' => __DIR__ . '/pages/AboutPage.php',
    default => __DIR__ . '/pages/HomePage.php'
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Portal</title>
    <link rel="stylesheet" href="/assets/dist/styles.css">
</head>
<body class="font-sans bg-gray-100 flex flex-col min-h-screen">

    <!-- Хедер -->
    <?php 
    require_once __DIR__ . '/components/Header.php';
    getHeaderBlock();
    ?>

    <!-- Контент -->
    <main class="flex-1 container mx-auto px-6 py-8">
        <?php include $contentFile; ?>
    </main>

    <!-- Футер -->
    <?php
    require_once __DIR__ . '/components/Footer.php';
    getFooterBlock();
    ?>

</body>
</html>
