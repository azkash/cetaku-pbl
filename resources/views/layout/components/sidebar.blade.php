<aside class="main-sidebar elevation-4" style="background-color: #143D60;">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link text-center" style="border-bottom: 1px solid rgba(255,255,255,0.1);">
    <span class="brand-text font-weight-bold text-white" style="font-size: 24px;">CETAKU</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-4">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard Menu Item -->
        <li class="nav-item mb-3">
          <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active-menu' : 'inactive-menu' }}">
            <i class="nav-icon fas fa-home"></i>
            <p class="menu-text">Dashboard</p>
          </a>
        </li>
        
        <!-- Product Menu Item -->
        <li class="nav-item mb-3">
          <a href="{{ route('product') }}" class="nav-link {{ request()->routeIs('product') ? 'active-menu' : 'inactive-menu' }}">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p class="menu-text">Product</p>
          </a>
        </li>
        
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>