<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin QB <sup>2.0</sup></div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  {{-- <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li> --}}
  
  <!-- Product -->
  <li class="nav-item">
    {{-- <a class="nav-link" href="{{ route('products') }}" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
      <i class="fas fa-fw fa-cube"></i>
      <span>Product</span>
    </a> --}}
    <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('products') }}">List Product</a>
        <a class="collapse-item" href="{{ route('products.create') }}">Add Product</a>
        <a class="collapse-item" href="{{ route('products.edit', ['id' => 1]) }}">Edit Product</a>
        {{-- <a class="collapse-item" href="{{ route('products.show', ['id' => 1]) }}">Detail Product</a> --}}
      </div>
    </div>
  </li>

  <!-- Transactions -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('transactions') }}" data-toggle="collapse" data-target="#collapseTransactions" aria-expanded="true" aria-controls="collapseTransactions">
      <i class="fas fa-fw fa-exchange-alt"></i>
      <span>Transaksi</span>
    </a>
    <div id="collapseTransactions" class="collapse" aria-labelledby="headingTransactions" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('transactions') }}">List Transaction</a>
        <a class="collapse-item" href="{{ route('transactions.create_transaksi') }}">Add Transaction</a>
        <a class="collapse-item" href="{{ route('transactions.edit', ['id' => 1]) }}">Edit Transaction</a>
        {{-- <a class="collapse-item" href="{{ route('transactions.show', ['id' => 1]) }}">Detail Transaction </a> --}}
      </div>
    </div>
  </li>

  <!-- Users -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('user') }}" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
      <i class="fas fa-fw fa-users"></i>
      <span>Users Setting</span>
    </a>
    <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('user') }}">List User</a>
        <a class="collapse-item" href="{{ route('user.create') }}">Add User</a>
        <a class="collapse-item" href="{{ route('user.edit', ['id' => 1]) }}">Edit User</a>
        {{-- <a class="collapse-item" href="{{ route('user.show', ['id' => 1]) }}">Detail User</a> --}}
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
