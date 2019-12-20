<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6);  ?>
  <form action="<?= $url; ?>" method="post" class="text-primary">
    <?= $this->koran->inputEdit($hasil['no']); ?>
    <?= $this->koran->inputOpen('Kode Akun'); ?>
      <input class="form-control col-md-12" type="text" name="kode_akun" value="<?= $hasil['kode_akun']; ?>">
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Nama'); ?>
      <input class="form-control col-md-12" type="text" name="nama" placeholder="Contoh:  Pendapatan" value="<?= $hasil['nama']; ?>" onkeypress="return hanyaHuruf(event)">
      <?= form_error('nama'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->button(); ?>
  </form>
<?= $this->koran->rowClose();  ?>  