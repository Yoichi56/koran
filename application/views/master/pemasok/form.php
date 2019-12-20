<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6);  ?>
  <form action="<?= $url; ?>" method="post" class="text-primary">
  	<?= $this->koran->inputAdd($id, $kode); ?>
  	<?= $this->koran->inputOpen('ID'); ?>
    	<input class="form-control col-md-12" type="text" name="" value="<?= "".$kode."-".jumlahAngka($id).""; ?>" readonly>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Nama'); ?>
    	<input class="form-control col-md-12" type="text" name="nama" placeholder="Contoh:  Sumber Bening Jaya" onkeypress="return hanyaHuruf(event)" value="<?= set_value('nama'); ?>">
    	<?= form_error('nama'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('No HP'); ?>
    	<input class="form-control col-md-12" type="text" name="no_hp" placeholder="Contoh:  087830661966" onkeypress="return hanyaAngka(event)" value="<?= set_value('no_hp'); ?>">
    	<?= form_error('no_hp'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Alamat'); ?>
      <textarea class="form-control" name="alamat" rows="3" placeholder="Contoh: Jl.Kepanjen"><?= set_value('alamat'); ?></textarea>
      <?= form_error('alamat'); ?>
    <?= $this->koran->inputClose(); ?>


    <?= $this->koran->button2($back); ?>
  </form>
<?= $this->koran->rowClose();  ?>  