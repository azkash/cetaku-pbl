@extends('layout.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Produk Baru</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('product') }}">Produk</a></li>
          <li class="breadcrumb-item active">Tambah Produk</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      
      <!-- Navigasi Tab -->
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
          <ul class="nav nav-tabs" id="product-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="info-tab" data-toggle="pill" href="#info" role="tab">Informasi Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="variants-tab" data-toggle="pill" href="#variants" role="tab">Variasi & Harga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="availability-tab" data-toggle="pill" href="#availability" role="tab">Ketersediaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="images-tab" data-toggle="pill" href="#images" role="tab">Gambar & Contoh</a>
            </li>
          </ul>
        </div>
        
        <div class="card-body">
          <div class="tab-content" id="product-tabsContent">
            <!-- Tab Informasi Produk -->
            <div class="tab-pane fade show active" id="info" role="tabpanel">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="product_name">Nama Produk</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="category">Kategori</label>
                    <select class="form-control" id="category" name="category">
                      <option value="">Pilih Kategori</option>
                      <option value="banner">Banner</option>
                      <option value="baju">Baju</option>
                      <option value="stiker">Stiker</option>
                      <option value="kartu_nama">Kartu Nama</option>
                      <option value="lainnya">Lainnya</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="description">Deskripsi Produk</label>
                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="production_time">Waktu Produksi (Hari)</label>
                    <input type="number" class="form-control" id="production_time" name="production_time" min="1" value="1">
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Status Produk</label>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="status" name="status" checked>
                      <label class="custom-control-label" for="status">Aktif</label>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="main_image">Gambar Utama</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="main_image" name="main_image">
                        <label class="custom-file-label" for="main_image">Pilih file</label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="mt-3 text-center">
                    <div class="img-preview p-2 border" style="min-height: 200px; max-width: 100%;">
                      <img id="preview" src="/api/placeholder/300/200" class="img-fluid" alt="Preview">
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="mt-4 text-right">
                <button type="button" class="btn btn-primary btn-next-tab">
                  Lanjut ke Variasi & Harga <i class="fas fa-arrow-right ml-2"></i>
                </button>
              </div>
            </div>
            
            <!-- Tab Variasi & Harga -->
            <div class="tab-pane fade" id="variants" role="tabpanel">
              <!-- Panel Ukuran -->
              <div class="card card-outline card-secondary mb-4">
                <div class="card-header">
                  <h3 class="card-title">Ukuran</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-sm btn-primary btn-add-variation" id="add-size">
                      <i class="fas fa-plus"></i> Tambah Ukuran
                    </button>
                  </div>
                  
                  <div id="size-container">
                    <div class="row mb-3 size-row">
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="sizes[0][name]" placeholder="Nama ukuran (ex: 60x160cm)">
                      </div>
                      <div class="col-md-3">
                        <input type="number" class="form-control" name="sizes[0][price]" placeholder="Harga">
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="sizes[0][description]" placeholder="Deskripsi (opsional)">
                      </div>
                      <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm remove-size">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Panel Bahan -->
              <div class="card card-outline card-secondary mb-4">
                <div class="card-header">
                  <h3 class="card-title">Bahan</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-sm btn-primary btn-add-variation" id="add-material">
                      <i class="fas fa-plus"></i> Tambah Bahan
                    </button>
                  </div>
                  
                  <div id="material-container">
                    <div class="row mb-3 material-row">
                      <div class="col-md-4">
                        <input type="text" class="form-control material-name" name="materials[0][name]" placeholder="Nama bahan">
                      </div>
                      <div class="col-md-3">
                        <input type="number" class="form-control" name="materials[0][price]" placeholder="Harga tambahan">
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="materials[0][description]" placeholder="Deskripsi (opsional)">
                      </div>
                      <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm remove-material">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Panel Finishing -->
              <div class="card card-outline card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Finishing</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-sm btn-primary btn-add-variation" id="add-finishing">
                      <i class="fas fa-plus"></i> Tambah Finishing
                    </button>
                  </div>
                  
                  <div id="finishing-container">
                    <div class="row mb-3 finishing-row">
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="finishing[0][name]" placeholder="Nama finishing">
                      </div>
                      <div class="col-md-3">
                        <input type="number" class="form-control" name="finishing[0][price]" placeholder="Harga tambahan">
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="finishing[0][description]" placeholder="Deskripsi (opsional)">
                      </div>
                      <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm remove-finishing">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="mt-4 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary btn-prev-tab">
                  <i class="fas fa-arrow-left mr-2"></i> Kembali ke Informasi
                </button>
                <button type="button" class="btn btn-primary btn-next-tab">
                  Lanjut ke Ketersediaan <i class="fas fa-arrow-right ml-2"></i>
                </button>
              </div>
            </div>
            
            <!-- Tab Ketersediaan -->
            <div class="tab-pane fade" id="availability" role="tabpanel">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Status Ketersediaan</label>
                        <div class="d-flex">
                          <div class="custom-control custom-radio mr-3">
                            <input class="custom-control-input" type="radio" id="available_yes" name="availability_status" value="1" checked>
                            <label for="available_yes" class="custom-control-label">Tersedia</label>
                          </div>
                          <div class="custom-control custom-radio mr-3">
                            <input class="custom-control-input" type="radio" id="available_limited" name="availability_status" value="2">
                            <label for="available_limited" class="custom-control-label">Terbatas</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="available_no" name="availability_status" value="0">
                            <label for="available_no" class="custom-control-label">Tidak Tersedia</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="availability_note">Catatan Ketersediaan</label>
                    <textarea class="form-control" id="availability_note" name="availability_note" rows="3" placeholder="Contoh: Bahan Flexi China sedang kosong, estimasi tersedia kembali 20 Oktober 2023"></textarea>
                  </div>
                  
                  <div class="card card-outline card-secondary mt-4">
                    <div class="card-header">
                      <h3 class="card-title">Status Ketersediaan Bahan</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="materials-availability-table">
                          <thead>
                            <tr>
                              <th>Bahan</th>
                              <th>Status</th>
                              <th>Catatan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <input type="text" readonly class="form-control-plaintext" value="Ditambahkan setelah mengisi bagian Bahan">
                              </td>
                              <td colspan="2" class="text-center text-muted">
                                Isi bagian Variasi & Harga terlebih dahulu
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="mt-4 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary btn-prev-tab">
                  <i class="fas fa-arrow-left mr-2"></i> Kembali ke Variasi
                </button>
                <button type="button" class="btn btn-primary btn-next-tab">
                  Lanjut ke Gambar <i class="fas fa-arrow-right ml-2"></i>
                </button>
              </div>
            </div>
            
            <!-- Tab Gambar & Contoh -->
            <div class="tab-pane fade" id="images" role="tabpanel">
              <div class="row">
                <div class="col-md-6">
                  <div class="card card-outline card-secondary">
                    <div class="card-header">
                      <h3 class="card-title">Gambar Produk Tambahan</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="additional_images">Upload Gambar (max. 5)</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="template_file" name="template_file">
                            <label class="custom-file-label" for="template_file">Pilih file</label>
                          </div>
                        </div>
                        <small class="form-text text-muted">Format: AI, PSD, PDF, maksimal 10MB</small>
                      </div>
                      
                      <div class="form-group mt-4">
                        <label for="template_description">Deskripsi Template</label>
                        <textarea class="form-control" id="template_description" name="template_description" rows="3" placeholder="Contoh: Template X-Banner 60x160cm dengan area aman 58x158cm, resolusi 150dpi"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="mt-4 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary btn-prev-tab">
                  <i class="fas fa-arrow-left mr-2"></i> Kembali ke Ketersediaan
                </button>
                <button type="submit" class="btn btn-success">
                  <i class="fas fa-save"></i> Simpan Produk
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/create-product.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/create-product.js') }}"></script>
@endsection">