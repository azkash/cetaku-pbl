@extends('layout.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Produk</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Produk</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <!-- Filter & Action Buttons -->
    <div class="card filter-container mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <div class="d-flex flex-wrap">
              <!-- Filter Kategori -->
              <div class="dropdown mr-2 mb-2">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                  Kategori: <span id="current-category">Semua</span>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item category-filter" href="#" data-value="all">Semua</a>
                  <a class="dropdown-item category-filter" href="#" data-value="banner">Banner</a>
                  <a class="dropdown-item category-filter" href="#" data-value="baju">Baju</a>
                  <a class="dropdown-item category-filter" href="#" data-value="stiker">Stiker</a>
                  <a class="dropdown-item category-filter" href="#" data-value="kartu_nama">Kartu Nama</a>
                </div>
              </div>
              
              <!-- Filter Ketersediaan -->
              <div class="dropdown mr-2 mb-2">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                  Status: <span id="current-status">Semua</span>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item status-filter" href="#" data-value="all">Semua</a>
                  <a class="dropdown-item status-filter" href="#" data-value="1">Tersedia</a>
                  <a class="dropdown-item status-filter" href="#" data-value="2">Terbatas</a>
                  <a class="dropdown-item status-filter" href="#" data-value="0">Tidak Tersedia</a>
                </div>
              </div>
              
              <!-- Search Input -->
              <div class="search-box mb-2">
                <div class="input-group">
                  <input type="text" id="search-input" class="form-control" placeholder="Cari produk...">
                  <div class="input-group-append">
                    <button id="search-button" class="btn btn-outline-secondary" type="button">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 text-right">
            <a href="{{ route('product.create') }}" class="btn btn-primary">
              <i class="fas fa-plus"></i> Tambah Produk
            </a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Loading Overlay -->
    <div class="position-relative">
      <div class="loading-overlay" id="loading-overlay">
        <div class="spinner"></div>
      </div>
      
      <!-- Products Container -->
      <div id="products-container">
        <!-- Products Grid -->
        <div class="row">
          <!-- Product Card 1 -->
          <div class="col-md-4 col-sm-6">
            <div class="card product-card">
              <div class="card-header bg-light">
                <h5 class="card-title">X-Banner Standard</h5>
                <span class="badge badge-available">Tersedia</span>
              </div>
              <img src="{{ asset('assets/product/pepek.jpg') }}" class="card-img-top" alt="X-Banner">
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-6">
                    <span class="text-muted">Kategori:</span>
                  </div>
                  <div class="col-6 text-right">
                    <span class="category-tag">Banner</span>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <span class="text-muted">Harga Mulai:</span>
                  </div>
                  <div class="col-6 text-right">
                    <strong>Rp 120.000</strong>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <span class="text-muted">Variasi:</span>
                  </div>
                  <div class="col-6 text-right">
                    4 Ukuran, 3 Bahan
                  </div>
                </div>
                <div class="text-center mt-3 product-actions">
                  <a href="{{ route('product.edit', 1) }}" class="btn btn-sm btn-info mr-1">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <button class="btn btn-sm btn-danger delete-product" data-id="1" data-name="X-Banner Standard">
                    <i class="fas fa-trash"></i> Hapus
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Product Card 2 -->
          <div class="col-md-4 col-sm-6">
            <div class="card product-card">
              <div class="card-header bg-light">
                <h5 class="card-title">Kaos Polos Custom</h5>
                <span class="badge badge-limited">Terbatas</span>
              </div>
              <img src="/api/placeholder/300/200" class="card-img-top" alt="Kaos Custom">
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-6">
                    <span class="text-muted">Kategori:</span>
                  </div>
                  <div class="col-6 text-right">
                    <span class="category-tag">Baju</span>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <span class="text-muted">Harga Mulai:</span>
                  </div>
                  <div class="col-6 text-right">
                    <strong>Rp 85.000</strong>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <span class="text-muted">Variasi:</span>
                  </div>
                  <div class="col-6 text-right">
                    5 Ukuran, 2 Bahan
                  </div>
                </div>
                <div class="text-center mt-3 product-actions">
                  <a href="{{ route('product.edit', 2) }}" class="btn btn-sm btn-info mr-1">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <button class="btn btn-sm btn-danger delete-product" data-id="2" data-name="Kaos Polos Custom">
                    <i class="fas fa-trash"></i> Hapus
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Product Card 3 -->
          <div class="col-md-4 col-sm-6">
            <div class="card product-card">
              <div class="card-header bg-light">
                <h5 class="card-title">Stiker Vinyl Custom</h5>
                <span class="badge badge-unavailable">Tidak Tersedia</span>
              </div>
              <img src="/api/placeholder/300/200" class="card-img-top" alt="Stiker Vinyl">
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-6">
                    <span class="text-muted">Kategori:</span>
                  </div>
                  <div class="col-6 text-right">
                    <span class="category-tag">Stiker</span>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <span class="text-muted">Harga Mulai:</span>
                  </div>
                  <div class="col-6 text-right">
                    <strong>Rp 50.000</strong>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <span class="text-muted">Variasi:</span>
                  </div>
                  <div class="col-6 text-right">
                    Custom Size, 3 Bahan
                  </div>
                </div>
                <div class="text-center mt-3 product-actions">
                  <a href="{{ route('product.edit', 3) }}" class="btn btn-sm btn-info mr-1">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <button class="btn btn-sm btn-danger delete-product" data-id="3" data-name="Stiker Vinyl Custom">
                    <i class="fas fa-trash"></i> Hapus
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
          <nav>
            <ul class="pagination">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Sebelumnya</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Selanjutnya</a>
              </li>
            </ul>
          </nav>
        </div>
        
        <!-- Empty State (akan ditampilkan saat tidak ada produk) -->
        <div class="empty-state" style="display: none;">
          <i class="fas fa-box-open"></i>
          <h4>Belum Ada Produk</h4>
          <p>Anda belum memiliki produk. Silakan tambahkan produk pertama Anda untuk memulai.</p>
          <a href="{{ route('product.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Produk
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/product.js') }}"></script>
@endsection