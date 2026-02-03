<div class="container mx-auto">
    <section class="mb-12">
        <h2 class="text-3xl font-bold mb-6">Latest Houses</h2>
        <div id="houses-container" class="grid 2xl:grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-6">
            <!-- Будинки завантажуються через JS -->
        </div>
    </section>

    <section class="text-center">
        <h2 class="text-2xl font-semibold mb-4">Explore More</h2>
        <a href="?page=houses" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
            See All Houses
        </a>
    </section>
</div>

<script>
async function loadHouses(limit = 3) {
    try {
        const res = await fetch(`/endpoints/houses.php?limit=${limit}`);
        const houses = await res.json();

        const container = document.getElementById('houses-container');
        container.innerHTML = '';

        houses.forEach(house => {
            const div = document.createElement('div');
            div.className = 'bg-white shadow-lg rounded-lg p-4';
            div.innerHTML = `
                <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg" alt="${house.title}" class="w-full h-48 object-cover">
                <h3 class="text-xl font-semibold mb-2">${house.title}</h3>
                <p class="text-gray-600 mb-2">${house.description}</p>
                <p class="font-bold mt-2">
                    ${house.discountInfo && house.discountInfo.discount > 0
                        ? `<span class="line-through text-gray-400">$${house.price}</span> 
                           <span class="text-green-600">$${house.discountInfo.price}</span>`
                        : `Price: $${house.price}`
                    }
                </p>
                ${house.discountInfo && house.discountInfo.discount > 0 
                    ? `<p class="text-red-600">Discount: ${house.discountInfo.discount}%</p>` 
                    : ''}
            `;
            container.appendChild(div);
        });
    } catch (error) {
        console.error('Error loading houses:', error);
    }
}

// Завантажуємо будинки при завантаженні сторінки
loadHouses();
</script>
