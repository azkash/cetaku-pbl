// product-create.js - Script untuk halaman tambah/edit produk

document.addEventListener("DOMContentLoaded", function () {
    // Inisialisasi preview gambar
    initImagePreview();

    // Inisialisasi manajemen komponen
    initSizeManagement();
    initMaterialManagement();
    initFinishingManagement();

    // Inisialisasi tab navigation
    initTabNavigation();

    // Inisialisasi validasi form
    initFormValidation();
});

// Preview gambar utama saat dipilih
function initImagePreview() {
    const mainImageInput = document.getElementById("main_image");
    if (mainImageInput) {
        mainImageInput.addEventListener("change", function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    document.getElementById("preview").src =
                        event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Preview gambar tambahan
    const additionalImagesInput = document.getElementById("additional_images");
    if (additionalImagesInput) {
        additionalImagesInput.addEventListener("change", function () {
            const previewContainer = document.getElementById(
                "additional-images-preview"
            );
            previewContainer.innerHTML = "";

            Array.from(this.files).forEach((file, index) => {
                if (index < 5) {
                    // Maksimal 5 gambar
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        const imgContainer = document.createElement("div");
                        imgContainer.className = "col-md-4 mb-3";
                        imgContainer.innerHTML = `
                            <div class="img-preview-container position-relative">
                                <img src="${event.target.result}" class="img-thumbnail" alt="Preview">
                                <button type="button" class="btn btn-sm btn-danger remove-img-btn position-absolute" style="top: 0; right: 0;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        `;
                        previewContainer.appendChild(imgContainer);

                        // Tambahkan event listener untuk tombol hapus
                        imgContainer
                            .querySelector(".remove-img-btn")
                            .addEventListener("click", function () {
                                imgContainer.remove();
                            });
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    }

    // Menangani tombol hapus gambar yang sudah ada
    document.querySelectorAll(".remove-img-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
            this.closest(".col-md-4").remove();
        });
    });
}

// Pengelolaan ukuran produk
function initSizeManagement() {
    // Tambah ukuran baru
    let sizeIndex = 1;
    const addSizeBtn = document.getElementById("add-size");
    if (addSizeBtn) {
        addSizeBtn.addEventListener("click", function () {
            const sizeContainer = document.getElementById("size-container");
            const sizeHtml = `
                <div class="row mb-3 size-row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="sizes[${sizeIndex}][name]" placeholder="Nama ukuran (ex: 60x160cm)">
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="sizes[${sizeIndex}][price]" placeholder="Harga">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="sizes[${sizeIndex}][description]" placeholder="Deskripsi (opsional)">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm remove-size">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            `;

            // Append HTML ke container
            sizeContainer.insertAdjacentHTML("beforeend", sizeHtml);

            // Tambahkan event listener untuk tombol hapus
            const newRow = sizeContainer.lastElementChild;
            newRow
                .querySelector(".remove-size")
                .addEventListener("click", function () {
                    newRow.remove();
                    updateMaterialAvailability();
                });

            sizeIndex++;
            updateMaterialAvailability();
        });
    }

    // Hapus ukuran
    document.querySelectorAll(".remove-size").forEach(function (btn) {
        btn.addEventListener("click", function () {
            this.closest(".size-row").remove();
            updateMaterialAvailability();
        });
    });
}

// Pengelolaan bahan produk
function initMaterialManagement() {
    // Tambah bahan baru
    let materialIndex = 1;
    const addMaterialBtn = document.getElementById("add-material");
    if (addMaterialBtn) {
        addMaterialBtn.addEventListener("click", function () {
            const materialContainer =
                document.getElementById("material-container");
            const materialHtml = `
                <div class="row mb-3 material-row">
                    <div class="col-md-4">
                        <input type="text" class="form-control material-name" name="materials[${materialIndex}][name]" placeholder="Nama bahan">
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="materials[${materialIndex}][price]" placeholder="Harga tambahan">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="materials[${materialIndex}][description]" placeholder="Deskripsi (opsional)">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm remove-material">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            `;

            // Append HTML ke container
            materialContainer.insertAdjacentHTML("beforeend", materialHtml);

            // Tambahkan event listener untuk tombol hapus
            const newRow = materialContainer.lastElementChild;
            newRow
                .querySelector(".remove-material")
                .addEventListener("click", function () {
                    newRow.remove();
                    updateMaterialAvailability();
                });

            // Tambahkan event listener untuk nama bahan
            newRow
                .querySelector(".material-name")
                .addEventListener("input", function () {
                    updateMaterialAvailability();
                });

            materialIndex++;
            updateMaterialAvailability();
        });
    }

    // Hapus bahan
    document.querySelectorAll(".remove-material").forEach(function (btn) {
        btn.addEventListener("click", function () {
            this.closest(".material-row").remove();
            updateMaterialAvailability();
        });
    });

    // Event listener untuk perubahan nama bahan
    document.querySelectorAll(".material-name").forEach(function (input) {
        input.addEventListener("input", function () {
            updateMaterialAvailability();
        });
    });
}

// Pengelolaan finishing produk
function initFinishingManagement() {
    // Tambah finishing baru
    let finishingIndex = 1;
    const addFinishingBtn = document.getElementById("add-finishing");
    if (addFinishingBtn) {
        addFinishingBtn.addEventListener("click", function () {
            const finishingContainer = document.getElementById(
                "finishing-container"
            );
            const finishingHtml = `
                <div class="row mb-3 finishing-row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="finishing[${finishingIndex}][name]" placeholder="Nama finishing">
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="finishing[${finishingIndex}][price]" placeholder="Harga tambahan">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="finishing[${finishingIndex}][description]" placeholder="Deskripsi (opsional)">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm remove-finishing">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            `;

            // Append HTML ke container
            finishingContainer.insertAdjacentHTML("beforeend", finishingHtml);

            // Tambahkan event listener untuk tombol hapus
            const newRow = finishingContainer.lastElementChild;
            newRow
                .querySelector(".remove-finishing")
                .addEventListener("click", function () {
                    newRow.remove();
                });

            finishingIndex++;
        });
    }

    // Hapus finishing
    document.querySelectorAll(".remove-finishing").forEach(function (btn) {
        btn.addEventListener("click", function () {
            this.closest(".finishing-row").remove();
        });
    });
}

// Update tabel ketersediaan bahan
function updateMaterialAvailability() {
    const availabilityTable = document.getElementById(
        "materials-availability-table"
    );
    if (!availabilityTable) return;

    const tableBody = availabilityTable.querySelector("tbody");
    tableBody.innerHTML = "";

    const materials = [];
    document.querySelectorAll(".material-name").forEach(function (input) {
        const materialName = input.value.trim();
        if (materialName) {
            materials.push(materialName);
        }
    });

    if (materials.length === 0) {
        tableBody.innerHTML = `
            <tr>
                <td>
                    <input type="text" readonly class="form-control-plaintext" value="Ditambahkan setelah mengisi bagian Bahan">
                </td>
                <td colspan="2" class="text-center text-muted">
                    Isi bagian Variasi & Harga terlebih dahulu
                </td>
            </tr>
        `;
    } else {
        materials.forEach(function (material, index) {
            const row = `
                <tr>
                    <td>
                        <input type="hidden" name="material_availability[${index}][name]" value="${material}">
                        ${material}
                    </td>
                    <td>
                        <select class="form-control" name="material_availability[${index}][status]">
                            <option value="1">Tersedia</option>
                            <option value="2">Terbatas</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="material_availability[${index}][note]" placeholder="Catatan (opsional)">
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML("beforeend", row);
        });
    }
}

// Navigasi tab
function initTabNavigation() {
    // Memastikan tab yang aktif direfleksikan dalam URL
    document
        .querySelectorAll('#product-tabs a[data-toggle="pill"]')
        .forEach(function (tab) {
            tab.addEventListener("shown.bs.tab", function (e) {
                const id = e.target.getAttribute("id");
                const tabName = id.replace("-tab", "");
                history.replaceState(null, null, `#${tabName}`);
            });
        });

    // Cek hash URL saat halaman dimuat
    const hash = window.location.hash;
    if (hash) {
        const tab = document.querySelector(`#product-tabs a[href="${hash}"]`);
        if (tab) {
            tab.tab("show");
        }
    }

    // Tombol next/prev untuk tab
    document.querySelectorAll(".btn-next-tab").forEach(function (btn) {
        btn.addEventListener("click", function () {
            const currentTab = document.querySelector("#product-tabs a.active");
            const nextTab = currentTab.parentElement.nextElementSibling;
            if (nextTab) {
                nextTab.querySelector("a").tab("show");
            }
        });
    });

    document.querySelectorAll(".btn-prev-tab").forEach(function (btn) {
        btn.addEventListener("click", function () {
            const currentTab = document.querySelector("#product-tabs a.active");
            const prevTab = currentTab.parentElement.previousElementSibling;
            if (prevTab) {
                prevTab.querySelector("a").tab("show");
            }
        });
    });
}

// Validasi form sebelum submit
function initFormValidation() {
    const form = document.querySelector("form");
    if (form) {
        form.addEventListener("submit", function (e) {
            let isValid = true;

            // Validasi nama produk
            const productName = document.getElementById("product_name");
            if (productName && productName.value.trim() === "") {
                isValid = false;
                productName.classList.add("is-invalid");

                // Tambahkan pesan error jika belum ada
                if (
                    !productName.nextElementSibling ||
                    !productName.nextElementSibling.classList.contains(
                        "invalid-feedback"
                    )
                ) {
                    const errorMsg = document.createElement("div");
                    errorMsg.className = "invalid-feedback";
                    errorMsg.textContent = "Nama produk harus diisi";
                    productName.parentNode.insertBefore(
                        errorMsg,
                        productName.nextSibling
                    );
                }
            } else if (productName) {
                productName.classList.remove("is-invalid");
            }

            // Validasi kategori
            const category = document.getElementById("category");
            if (category && category.value === "") {
                isValid = false;
                category.classList.add("is-invalid");

                // Tambahkan pesan error jika belum ada
                if (
                    !category.nextElementSibling ||
                    !category.nextElementSibling.classList.contains(
                        "invalid-feedback"
                    )
                ) {
                    const errorMsg = document.createElement("div");
                    errorMsg.className = "invalid-feedback";
                    errorMsg.textContent = "Kategori harus dipilih";
                    category.parentNode.insertBefore(
                        errorMsg,
                        category.nextSibling
                    );
                }
            } else if (category) {
                category.classList.remove("is-invalid");
            }

            // Jika tidak valid, cegah form submit
            if (!isValid) {
                e.preventDefault();

                // Tampilkan tab yang berisi error
                const invalidField = document.querySelector(".is-invalid");
                if (invalidField) {
                    const tabContent = invalidField.closest(".tab-pane");
                    if (tabContent) {
                        const tabId = tabContent.getAttribute("id");
                        document
                            .querySelector(`#product-tabs a[href="#${tabId}"]`)
                            .tab("show");
                    }
                }
            }
        });

        // Hapus status invalid saat input diubah
        document
            .querySelectorAll("input, select, textarea")
            .forEach(function (field) {
                field.addEventListener("input", function () {
                    this.classList.remove("is-invalid");
                    const feedback = this.nextElementSibling;
                    if (
                        feedback &&
                        feedback.classList.contains("invalid-feedback")
                    ) {
                        feedback.remove();
                    }
                });
            });
    }
}
