<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6);  ?>
  <form action="<?= $url; ?>" method="post" class="text-primary">
    <?= $this->koran->inputEdit($hasil['kode_bahan']); ?>
    <?= $this->koran->inputOpen('ID'); ?>
      <input class="form-control col-md-12" type="text" name="" value="<?= "".$hasil['kode']."-".jumlahAngka($hasil['kode_bahan']).""; ?>" readonly>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Nama'); ?>
      <input class="form-control col-md-12" type="text" name="nama" placeholder="Contoh:  Tinta cumi-cumi" value="<?= $hasil['nama']; ?>">
      <?= form_error('nama'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Satuan'); ?>
      <input class="form-control col-md-12" type="text" name="satuan" placeholder="Contoh:  kg/pcs/ltr"  value="<?= $hasil['satuan']; ?>" onkeypress="return hanyaHuruf(event)">
      <?= form_error('satuan'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Keterangan'); ?>
    <select class="form-control col-md-12" name="keterangan">
      <option value="<?= $hasil['keterangan']; ?>"><?= $hasil['keterangan']; ?></option>
      <?php if($hasil['keterangan'] == 'Bahan Penolong') : ?>
        <option value="Bahan Baku">Bahan Baku</option>
      <?php elseif($hasil['keterangan'] == 'Bahan Baku') : ?>
        <option value="Bahan Penolong">Bahan Penolong</option>
      <?php else: ?>  
        <option value="Bahan Baku">Bahan Baku</option>
        <option value="Bahan Penolong">Bahan Penolong</option>
      <?php endif; ?>
    </select>
    <?= form_error('keterangan'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->button2($back); ?>
  </form>
<?= $this->koran->rowClose();  ?>  