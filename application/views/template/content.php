
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?= site_url('beranda'); ?>">CV Bandung</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-power-off fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?= site_url('welcome/logout');?>"><i class="fa fa-sign-out fa-lg"></i> Keluar</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <?php $foto = $this->session->userdata('foto'); ?>
        <img class="app-sidebar__user-avatar" src="<?= base_url('/assets/img/').$foto ; ?>" alt="User Image" width="63" height="58">
        <div>
          <p class="app-sidebar__user-name"><?= $this->session->userdata('nama'); ?></p>
          <p class="app-sidebar__user-designation"><?= $this->session->userdata('posisi'); ?></p>
        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="<?= site_url('beranda'); ?>"><i class="app-menu__icon fa fa-windows"></i><span class="app-menu__label">Beranda</span></a></li>

        <?php if($this->session->userdata('posisi') == "Pemilik"): ?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-folder-o"></i><span class="app-menu__label">Master Data</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= site_url('coa'); ?>"><i class="icon fa fa-caret-right"></i> COA</a></li>
            <li><a class="treeview-item" href="<?= site_url('produk'); ?>"><i class="icon fa fa-caret-right"></i> Produk Jadi</a></li>
            <li><a class="treeview-item" href="<?= site_url('bahanBaku'); ?>"><i class="icon fa fa-caret-right"></i> Bahan</a></li>
            <li><a class="treeview-item" href="<?= site_url('pekerjaan'); ?>"><i class="icon fa fa-caret-right"></i> Pekerjaan</a></li>
            <li><a class="treeview-item" href="<?= site_url('beban'); ?>"><i class="icon fa fa-caret-right"></i> Beban</a></li>
            <li><a class="treeview-item" href="<?= site_url('pemasok'); ?>"><i class="icon fa fa-caret-right"></i> Pemasok</a></li>
            <li><a class="treeview-item" href="<?= site_url('karyawan'); ?>"><i class="icon fa fa-caret-right"></i> Karyawan</a></li>
          </ul>
        </li>
        <?php endif; ?>
        <?php if($this->session->userdata('posisi') == "Produksi"): ?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Bill of Material</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu"> 
            <li><a class="treeview-item" href="<?= site_url('bom'); ?>"><i class="icon fa fa-caret-right"></i> Tambah Bill of Material</a></li>
          </ul>
        </li>
        <?php endif; ?>
        <?php if($this->session->userdata('posisi') == "Pemilik" || $this->session->userdata('posisi') == "Produksi"): ?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cubes"></i><span class="app-menu__label">Stok</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu"> 
            <li><a class="treeview-item" href="<?= site_url('stok'); ?>"><i class="icon fa fa-caret-right"></i> Stok Bahan</a></li>
            <!--li><a class="treeview-item" href="<?= site_url('stok/stokProduk'); ?>"><i class="icon fa fa-caret-right"></i> Stok Produk</a></li-->
          </ul>
        </li>
        <?php endif; ?>

        <?php if($this->session->userdata('posisi') == "Pemilik"): ?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Transaksi</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= site_url('pembelian'); ?>"><i class="icon fa fa-caret-right"></i> Pembelian</a></li>
          </ul>
        </li>
        <?php endif; ?>

        <?php if($this->session->userdata('posisi') == "Produksi"): ?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-calendar"></i><span class="app-menu__label">Produksi</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= site_url('produksi'); ?>"><i class="icon fa fa-caret-right"></i> Buat</a></li>
            <!--li><a class="treeview-item" href="<?= site_url('produksi/riwayatProduksi'); ?>"><i class="icon fa fa-caret-right"></i> History</a></li-->
          </ul>
        </li>
        <?php endif; ?>

        <?php if($this->session->userdata('posisi') == "Pemilik"): ?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Laporan</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu"> 
            <li><a class="treeview-item" href="<?= site_url('keuangan/jurnalUmum'); ?>"><i class="icon fa fa-caret-right"></i> Jurnal Umum</a></li>
            <li><a class="treeview-item" href="<?= site_url('keuangan/bukuBesar'); ?>"><i class="icon fa fa-caret-right"></i> Buku Besar</a></li>
            <li><a class="treeview-item" href=""><i class="icon fa fa-caret-right"></i> Biaya Produksi</a></li>
            <li><a class="treeview-item" href=""><i class="icon fa fa-caret-right"></i> Harga Pokok Produksi</a></li>
          </ul>
        </li>
        <?php endif; ?>

      </ul>

        
    </aside>

    <main class="app-content">
      <?= $contents; ?>
    </main>
