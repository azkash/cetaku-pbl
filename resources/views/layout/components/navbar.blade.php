<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
  </ul>

  <!-- Search form -->
  <form class="form-inline ml-3 flex-grow-1">
    <div class="input-group">
      <input class="form-control" type="search" placeholder="Mau cetak apa?" aria-label="Search" style="border-radius: 20px;">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit" style="position: absolute; right: 10px; top: 5px; background: transparent; border: none;">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    
    <!-- Notifications -->
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="far fa-bell"></i>
      </a>
    </li>
    
    <!-- Cart -->
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fas fa-shopping-cart"></i>
        <span class="badge badge-danger navbar-badge">1</span>
      </a>
    </li>
    
    <!-- User Profile -->
    <li class="nav-item">
      <a class="nav-link" href="#">
        <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image" style="height: 30px; width: 30px;">
      </a>
    </li>
  </ul>
</nav>