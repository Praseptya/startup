// Ambil elemen dropdown rating, alphabet, jenis makanan, tingkat kesulitan, dan search input
const ratingFilter = document.getElementById('ratingFilter');
const alphabetFilter = document.getElementById('alphabetFilter');
const jenisFilter = document.getElementById('jenisFilter');
const kesulitanFilter = document.getElementById('kesulitanFilter');
const searchInput = document.getElementById('searchInput');

// Tambahkan event listener untuk deteksi perubahan pada dropdown rating
ratingFilter.addEventListener('change', filterFoodItems);

// Tambahkan event listener untuk deteksi perubahan pada dropdown alphabet
alphabetFilter.addEventListener('change', filterFoodItems);

// Tambahkan event listener untuk deteksi perubahan pada dropdown jenis makanan
jenisFilter.addEventListener('change', filterFoodItems);

// Tambahkan event listener untuk deteksi perubahan pada dropdown tingkat kesulitan
kesulitanFilter.addEventListener('change', filterFoodItems);

// Tambahkan event listener untuk deteksi perubahan pada search input
searchInput.addEventListener('input', filterFoodItems);

// Fungsi untuk memfilter food-item
function filterFoodItems() {
    const selectedRating = ratingFilter.value; // Nilai rating yang dipilih
    const selectedAlphabet = alphabetFilter.value; // Nilai huruf yang dipilih
    const selectedJenis = jenisFilter.value; // Nilai jenis makanan yang dipilih
    const selectedKesulitan = kesulitanFilter.value; // Nilai tingkat kesulitan yang dipilih
    const searchQuery = searchInput.value.trim().toLowerCase(); // Nilai pencarian

    // Ambil semua elemen food-item
    const foodItems = document.querySelectorAll('.food-item');

    // Loop melalui setiap food-item
    foodItems.forEach(function(item) {
        const itemRating = item.getAttribute('data-rating'); // Nilai rating makanan
        const itemJenis = item.getAttribute('data-jenis'); // Jenis makanan
        const itemKesulitan = item.getAttribute('data-kesulitan'); // Tingkat kesulitan makanan
        const itemName = item.querySelector('.details p').textContent.trim().toLowerCase(); // Nama makanan

        // Tampilkan semua food-item jika opsi "Semua" dipilih
        if (selectedRating === 'all' && selectedAlphabet === 'all' && selectedJenis === 'all' && selectedKesulitan === 'all' && searchQuery === '') {
            item.style.display = 'block';
        } else {
            // Filter berdasarkan rating
            const ratingMatch = selectedRating === 'all' || parseInt(itemRating) === parseInt(selectedRating);

            // Filter berdasarkan huruf pertama dari nama makanan
            const alphabetMatch = selectedAlphabet === 'all' || itemName.charAt(0).toUpperCase() === selectedAlphabet;

            // Filter berdasarkan jenis makanan
            const jenisMatch = selectedJenis === 'all' || itemJenis === selectedJenis;

            // Filter berdasarkan tingkat kesulitan
            const kesulitanMatch = selectedKesulitan === 'all' || itemKesulitan === selectedKesulitan;

            // Filter berdasarkan pencarian nama makanan
            const searchMatch = itemName.includes(searchQuery);

            // Tampilkan food-item jika rating, huruf pertama, jenis makanan, tingkat kesulitan, dan pencarian cocok
            if (ratingMatch && alphabetMatch && jenisMatch && kesulitanMatch && searchMatch) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        }
    });
}