// product.js - Script untuk halaman daftar produk

document.addEventListener("DOMContentLoaded", function () {
    // Inisialisasi filter dropdown
    initializeFilters();

    // Inisialisasi konfirmasi hapus
    initializeDeleteConfirmation();
});

// Inisialisasi filter dropdown
function initializeFilters() {
    // Filter kategori
    document.querySelectorAll(".category-filter").forEach(function (item) {
        item.addEventListener("click", function (e) {
            e.preventDefault();
            let categoryName = this.textContent;
            document.getElementById("current-category").textContent =
                categoryName;
            // Logika filter akan ditambahkan di sini
            // filterProducts('category', this.getAttribute('data-value'));
        });
    });

    // Filter status
    document.querySelectorAll(".status-filter").forEach(function (item) {
        item.addEventListener("click", function (e) {
            e.preventDefault();
            let statusName = this.textContent;
            document.getElementById("current-status").textContent = statusName;
            // Logika filter akan ditambahkan di sini
            // filterProducts('status', this.getAttribute('data-value'));
        });
    });

    // Pencarian produk
    document
        .getElementById("search-button")
        .addEventListener("click", function () {
            let searchTerm = document.getElementById("search-input").value;
            // Logika pencarian
            // searchProducts(searchTerm);
        });

    // Enter key untuk pencarian
    document
        .getElementById("search-input")
        .addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
                document.getElementById("search-button").click();
            }
        });
}

// Inisialisasi konfirmasi hapus
function initializeDeleteConfirmation() {
    document.querySelectorAll(".delete-product").forEach(function (btn) {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            let productId = this.getAttribute("data-id");
            let productName = this.getAttribute("data-name");

            if (
                confirm(
                    `Apakah Anda yakin ingin menghapus produk "${productName}"?`
                )
            ) {
                // Kirim request hapus ke server
                // submitDeleteRequest(productId);
                console.log("Produk dengan ID " + productId + " akan dihapus");
            }
        });
    });
}

// Filter produk berdasarkan parameter
function filterProducts(filterType, filterValue) {
    console.log(`Filtering products by ${filterType}: ${filterValue}`);
    // Implementasi filter dengan AJAX atau manipulasi DOM
    // ...
}

// Pencarian produk
function searchProducts(searchTerm) {
    console.log(`Searching for: ${searchTerm}`);
    // Implementasi pencarian dengan AJAX atau manipulasi DOM
    // ...
}

// Submit request hapus ke server
function submitDeleteRequest(productId) {
    // Implementasi logika hapus dengan AJAX
    // ...
}
