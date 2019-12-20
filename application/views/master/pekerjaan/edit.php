<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6);  ?>
  <form action="<?= $url; ?>" method="post" class="text-primary">
    <?= $this->koran->inputEdit($hasil['kode_pekerjaan']); ?>
    <?= $this->koran->inputOpen('Kode Pekerjaan'); ?>
      <input class="form-control col-md-12" type="text" name="" value="<?= "".$hasil['kode']."-".jumlahAngka($hasil['kode_pekerjaan']).""; ?>" readonly>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Nama'); ?>
      <input class="form-control col-md-12" type="text" name="nama" placeholder="Contoh:  Packing" value="<?= $hasil['nama']; ?>" onkeypress="return hanyaHuruf(event)">
      <?= form_error('nama'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->button2($back); ?>
  </form>
<?= $this->koran->rowClose();  ?>  