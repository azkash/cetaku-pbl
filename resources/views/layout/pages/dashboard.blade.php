@extends('layout.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <!-- Statistik dan Total Penjualan -->
    <div class="row">
      <!-- Statistik Penjualan -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Statistik Penjualan</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                <span id="bulan-ini-text">Bulan Ini</span> <i class="fas fa-caret-down"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'] as $key => $bulan)
                <a href="#" class="dropdown-item month-filter" data-month="{{ $key+1 }}">{{ $bulan }}</a>
                @endforeach
              </div>
            </div>
          </div>
          <div class="card-body">
            <p class="text-bold">30 Pesanan</p>
            <canvas id="salesChart" style="min-height: 250px; max-height: 250px;"></canvas>
          </div>
        </div>
      </div>
      
      <!-- Total Penjualan -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Total Penjualan</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                <span id="bulan-ini-total-text">Bulan Ini</span> <i class="fas fa-caret-down"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'] as $key => $bulan)
                <a href="#" class="dropdown-item total-month-filter" data-month="{{ $key+1 }}">{{ $bulan }}</a>
                @endforeach 
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <h3 class="text-bold mb-4">2.000.000,00 IDR</h3>
            <p>30 Pesanan</p>
            <div style="height:200px; width:200px; margin:auto">
              <canvas id="salesDonutChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Jadwal Pesanan -->
    <div class="row mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Jadwal Pesanan</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" id="prev-month">
                <i class="fas fa-chevron-left"></i>
              </button>
              <span id="current-month" class="mx-2">May, 2025</span>
              <button type="button" class="btn btn-tool" id="next-month">
                <i class="fas fa-chevron-right"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered" id="calendar-table">
              <thead>
                <tr>
                  <th>MINGGU</th>
                  <th>SENIN</th>
                  <th>SELASA</th>
                  <th>RABU</th>
                  <th>KAMIS</th>
                  <th>JUMAT</th>
                  <th>SABTU</th>
                </tr>
              </thead>
              <tbody id="calendar-body"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection