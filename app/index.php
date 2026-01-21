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
        <section id="houses" class="grid 2xl:grid-cols-7 xl:grid-cols-6 lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-2 p-6">
            <?php
            include 'houses.php';

            $housesCount = isset($_GET['houses']) ? (int)$_GET['houses'] : 3;

            $houses = generateHouses($housesCount);
            renderHouses($houses);

            
            ?>
        </section>
        <?php
            $housesCount = isset($_GET['houses']) ? (int)$_GET['houses'] : 3;
            $nextCount = $housesCount + 3;
        ?>

        <div class="text-center mb-6">
            <a href="?houses=<?= $nextCount ?>"
            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Показати більше
            </a>
        </div>

    </main>

    <?php
        include 'footer.php';
        getFooterBlock();
    ?>

</body>
</html>