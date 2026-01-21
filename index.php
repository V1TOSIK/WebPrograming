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

            $house1 = new House(100000, 'House 1', '123 Street', '123-456-789', 'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?cs=srgb&dl=pexels-binyaminmellish-106399.jpg&fm=jpg', 3, 2);
            $house2 = new House(200000, 'House 2', '456 Avenue', '987-654-321', 'https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 4, 3);
            $house3 = new House(150000, 'House 3', '789 Boulevard', '555-123-456', 'https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg', 2, 1);
            $house4 = new House(150000, 'House 3', '789 Boulevard', '555-123-456', 'https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg', 2, 1);
            $house5 = new House(150000, 'House 3', '789 Boulevard', '555-123-456', 'https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg', 2, 1);
            $house6 = new House(150000, 'House 3', '789 Boulevard', '555-123-456', 'https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg', 2, 1);
            $house7 = new House(100000, 'House 1', '123 Street', '123-456-789', 'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?cs=srgb&dl=pexels-binyaminmellish-106399.jpg&fm=jpg', 3, 2);
            $house8 = new House(200000, 'House 2', '456 Avenue', '987-654-321', 'https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 4, 3);
            $house9 = new House(150000, 'House 3', '789 Boulevard', '555-123-456', 'https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg', 2, 1);
            $house10 = new House(150000, 'House 3', '789 Boulevard', '555-123-456', 'https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg', 2, 1);
            $house11 = new House(150000, 'House 3', '789 Boulevard', '555-123-456', 'https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg', 2, 1);
            $house12 = new House(150000, 'House 3', '789 Boulevard', '555-123-456', 'https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg', 2, 1);
            
            $houses = [$house1, $house2, $house3, $house4, $house5, $house6, $house7, $house8, $house9, $house10, $house11, $house12];
            
            renderHouses($houses);
            
            ?>
        </section>
    </main>

    <?php
        include 'footer.php';
        getFooterBlock();
    ?>

</body>
</html>