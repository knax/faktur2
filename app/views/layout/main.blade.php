<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="/css/style.css"/>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Mega Beton</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="/">Beranda</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Stok <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/stok">Stok</a></li>
            <li><a href="/stok/barang">Barang</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Penjualan <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/penjualan/marketing">Marketing</a></li>
            <li><a href="/penjualan/kasir">Kasir</a></li>
          </ul>
        </li>
        <li><a href="/pelanggan">Pelanggan</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Laporan <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/keuntungan">Laporan</a></li>
            <li><a href="/keuntungan/barang_terjual">Barang Terjual</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Pembelian <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/pembelian">Pembelian</a></li>
            <li><a href="/pembelian/hutang">Daftar Hutang</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Biaya <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/biaya">Biaya Tambahan</a></li>
            <li><a href="/biaya/komisi">Komisi</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<div class="container">
  @yield('content')
</div>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/js/moment.js"></script>
<script src="/js/faktur.js"></script>
</body>
</html>