<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6);  ?>
  <form action="<?= $url; ?>" method="post" class="text-primary">
  	<?= $this->koran->inputOpen('Kode Akun'); ?>
    	<input class="form-control col-md-12" type="text" name="kode_akun" placeholder="Contoh: 111" value="<?= set_value('kode_akun'); ?>" onkeypress="return hanyaAngka(event)">
      <?= form_error('kode_akun'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Nama'); ?>
    	<input class="form-control col-md-12" type="text" name="nama" placeholder="Contoh:  Kas" value="<?= set_value('nama'); ?>" onkeypress="return hanyaHuruf(event)">
    	<?= form_error('nama'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->button2($back); ?>
  </form>
<?= $this->koran->rowClose();  ?>  