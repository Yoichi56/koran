<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6);  ?>
  <form action="<?= $url; ?>" method="post" class="text-primary">
  	<?= $this->koran->inputAdd($id, $kode); ?>
  	<?= $this->koran->inputOpen('ID'); ?>
    	<input class="form-control col-md-12" type="text" name="" value="<?= "".$kode."-".jumlahAngka($id).""; ?>" readonly>
    <?= $this->koran->inputClose(); ?>
    <?= $this->koran->inputOpen('Nama'); ?>
    	<input class="form-control col-md-12" type="text" name="nama" placeholder="Contoh:  EPaper A4" value="<?= set_value('nama'); ?>">
    	<?= form_error('nama'); ?>
    <?= $this->koran->inputClose(); ?>
    <?= $this->koran->inputOpen('Satuan'); ?>
    	<input class="form-control col-md-12" type="text" name="satuan" placeholder="Contoh:  lembar/botol" value="<?= set_value('satuan'); ?>" onkeypress="return hanyaHuruf(event)">
    	<?= form_error('satuan'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Keterangan'); ?>
    <select class="form-control col-md-12" name="keterangan">
      <option disabled="" selected="">Pilih jenis bahan</option>
      <option value="Bahan Baku">Bahan Baku</option>
      <option value="Bahan Penolong">Bahan Penolong</option>
    </select>
    <?= form_error('keterangan'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->button2($back); ?>
  </form>
<?= $this->koran->rowClose();  ?>  