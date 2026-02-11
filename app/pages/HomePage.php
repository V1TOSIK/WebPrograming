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

    <section class="mb-12">
        <h2 class="text-3xl font-bold mb-6">Featured Houses</h2>
        <div id="slider-container" class="flex gap-6 overflow-x-auto"></div>
    </section>
</div>

<script>
async function loadHouses(limit = 3) {
    try {
        const res = await fetch(`/endpoints/houses.php?limit=${limit}`);
        const data = await res.json();

        const houses = data.houses ?? [];
        const sliderHouses = data.slider ?? [];

        // Latest Houses
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
                <p class="text-sm text-gray-500">${house.category ?? ''}</p>
                <button 
                    class="like-btn mt-3 bg-pink-500 text-white px-3 py-1 rounded"
                    data-id="${house.id}">
                    ❤️ ${house.likes}
                </button>
            `;

            container.appendChild(div);
        });

        // Slider Houses
        const slider = document.getElementById('slider-container');
        slider.innerHTML = '';
        sliderHouses.forEach(house => {
            slider.innerHTML += `
                <div class="min-w-[300px] bg-white p-4 shadow rounded">
                    <h3 class="font-bold">${house.title}</h3>
                    <p>$${house.price}</p>
                </div>
            `;
        });

        // Like buttons
        const likeBtn = div.querySelector('.like-btn');
        likeBtn.addEventListener('click', async () => {
            const id = likeBtn.dataset.id;

            if (localStorage.getItem('liked_' + id)) {
                alert('You already liked this house');
                return;
            }

            await fetch('/endpoints/like.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id })
            });

            localStorage.setItem('liked_' + id, true);
            loadHouses(limit); // Перезавантажуємо будинки
        });


    } catch (err) {
        console.error(err);
    }
}

// Завантажуємо будинки при завантаженні сторінки
loadHouses();
</script>
