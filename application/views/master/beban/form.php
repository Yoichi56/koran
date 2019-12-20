<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6);  ?>
  <form action="<?= $url; ?>" method="post" class="text-primary">
  	<?= $this->koran->inputAdd($id, $kode); ?>
  	<?= $this->koran->inputOpen('Kode Beban'); ?>
    	<input class="form-control col-md-12" type="text" name="" value="<?= "".$kode."-".jumlahAngka($id).""; ?>" readonly>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Nama'); ?>
    	<input class="form-control col-md-12" type="text" name="nama" placeholder="Contoh:  Packing"  value="<?= set_value('nama'); ?>">
    	<?= form_error('nama'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->button2($back); ?>
  </form>
<?= $this->koran->rowClose();  ?>  