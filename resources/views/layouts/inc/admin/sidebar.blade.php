
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    @can('manager')      
    <li class="nav-item">
      <a class="nav-link" href="/manager/dashboard">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/manager/role">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">Role</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-library-books menu-icon"></i>
        <span class="menu-title">Laporan</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/manager/produk"> Produk </a></li>
          <li class="nav-item"> <a class="nav-link" href="/manager/pembelian"> Pembelian</a></li>
        </ul>
      </div>
    </li>
    @endcan
    @can('user') 
    <li class="nav-item">
      <a class="nav-link" href="/user/menu">
        <i class="mdi mdi-coffee menu-icon"></i>        
        <span class="menu-title">Menu</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/transaksi">
        <i class="mdi mdi-cart-plus menu-icon"></i>        
        <span class="menu-title">Keranjang</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/user/history">
        <i class="mdi mdi-history menu-icon"></i>        
        <span class="menu-title">History Pesanan</span>
      </a>
    </li>
    @endcan
    @can('admin')        
    <li class="nav-item">
      <a class="nav-link" href="/admin/produk">
        <i class="mdi mdi-package-variant menu-icon"></i>
        <span class="menu-title">Produk</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/orderan">
        <i class="mdi mdi-clipboard-text menu-icon"></i>
        <span class="menu-title">Orderan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/historyor">
        <i class="mdi mdi-history menu-icon"></i>        
        <span class="menu-title">History Orderan</span>
      </a>
    </li>
    @endcan
  </ul>
</nav>