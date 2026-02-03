<section>
    <h1 class="text-3xl font-bold mb-6 text-center">All Houses</h1>
    <div id="houses-container" class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    </div>
</section>

<script>
async function loadHouses(limit = 10) {
    const res = await fetch(`/endpoints/houses.php?limit=${limit}`);
    const houses = await res.json();

    const container = document.getElementById('houses-container');
    container.innerHTML = '';

    houses.forEach(house => {
        const div = document.createElement('div');
        div.className = "bg-white shadow rounded-lg p-6 hover:shadow-lg transition duration-300";

        div.innerHTML = `
            <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg" alt="${house.title}" class="w-full h-48 object-cover">
            <h3 class="text-xl font-semibold mb-2">${house.title}</h3>
            <p class="text-gray-700 mb-2">${house.description}</p>
            <p class="font-bold text-lg mb-2">Price: $${house.price}</p>
            ${house.discountInfo ? `<p class="text-green-600">Discount: ${house.discountInfo.discount}% — $${house.discountInfo.price}</p>` : ''}
        `;
        container.appendChild(div);
    });
}

loadHouses();
</script>
