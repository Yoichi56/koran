<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6);  ?>
  <form action="<?= $url; ?>" method="post" class="text-primary">
    
    <?= $this->koran->inputEdit($hasil['kode_produk']); ?>
    <?= $this->koran->inputOpen('kode produk'); ?>
      <input class="form-control col-md-12" type="text" name="" value="<?= "".$hasil['kode']."-".jumlahAngka($hasil['kode_produk']).""; ?>" readonly>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Nama'); ?>
      <input class="form-control col-md-12" type="text" name="nama" placeholder="Contoh:  Koran" value="<?= $hasil['nama']; ?>">
      <?= form_error('nama'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->button2($back); ?>
  </form>
<?= $this->koran->rowClose();  ?>  