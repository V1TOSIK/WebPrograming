<div class="container mx-auto">
    <section class="mb-12">
        <h2 class="text-3xl font-bold mb-6">Latest Houses</h2>
        <div id="houses-container" class="grid 2xl:grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-6">
            <!-- Будинки завантажуються через JS -->
        </div>
    </section>

    <section class="text-center mt-8">
        <a href="?page=houses" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
            See All Houses
        </a>
    </section>
</div>

<script>
async function loadHouses(limit = 3) {
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

// Завантажуємо будинки при завантаженні сторінки
loadHouses();
</script>
