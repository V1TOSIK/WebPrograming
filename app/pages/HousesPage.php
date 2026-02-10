<?php
// $housesLimit передається з index.php
$housesLimit = (int)($housesLimit ?? 3);
?>

<section>
    <h1 class="text-3xl font-bold mb-6 text-center">All Houses</h1>

    <div id="houses-container" class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        <!-- JS вставляє будинки сюди -->
    </div>

    <div class="mt-8 full-width">
        <div class="text-center space-x-10 mt-8 mb-8">
            <a href="?page=houses&houses=<?= max(3, $housesLimit - 3) ?>"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Show Less
            </a>
            <a href="?page=houses&houses=<?= $housesLimit + 3 ?>"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Show More
            </a>
        </div>
    </div>
</section>

<script>
async function loadHouses(limit = <?= $housesLimit ?>) {
    try {
        const res = await fetch(`/endpoints/houses.php?limit=${limit}`);
        const data = await res.json();
        const houses = data.houses ?? data;

        const container = document.getElementById('houses-container');
        container.innerHTML = '';

        houses.forEach(house => {
            const div = document.createElement('div');
            div.className = "bg-white shadow rounded-lg p-6";

            div.innerHTML = `
                <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg"
                     class="w-full h-48 object-cover rounded-md mb-4">
                <h3 class="text-xl font-semibold mb-2">${house.title}</h3>
                <p class="text-gray-700 mb-2">${house.description}</p>
                <p class="font-bold text-lg">Price: $${house.price}</p>
                ${house.discountInfo ? `<p class="text-green-600">
                    Discount ${house.discountInfo.discount}% — $${house.discountInfo.price}
                </p>` : ''}
            `;

            container.appendChild(div);
        });
    } catch (err) {
        console.error(err);
    }
}

loadHouses();
</script>
