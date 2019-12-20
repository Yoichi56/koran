<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6);  ?>
  <form action="<?= $url; ?>" method="post" class="text-primary">
  	<?= $this->koran->inputAdd($id, $kode); ?>
  	<?= $this->koran->inputOpen('ID'); ?>
    	<input class="form-control col-md-12" type="text" name="" value="<?= "".$kode."-".jumlahAngka($id).""; ?>" readonly>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Nama'); ?>
    	<input class="form-control col-md-12" type="text" name="nama" placeholder="Contoh:  Sumaliyah Rasunah" onkeypress="return hanyaHuruf(event)" value="<?= set_value('nama'); ?>">
    	<?= form_error('nama'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('No HP'); ?>
    	<input class="form-control col-md-12" type="text" name="no_hp" placeholder="Contoh:  087830661966" onkeypress="return hanyaAngka(event)" value="<?= set_value('no_hp'); ?>">
    	<?= form_error('no_hp'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Pekerjaan'); ?>
      <select class="form-control" id="exampleSelect1" name="pekerjaan" style="width: 100%;">
        <option selected="" disabled="">Pilih Pekerjaan</option>
        <?php 
          foreach ($pekerjaan as $data) {
            echo "<option value = ".$data['kode_pekerjaan'].">".$data['nama']."</option>";
          }
        ?>
      </select>
      <?= form_error('pekerjaan'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->button2($back); ?>
  </form>
<?= $this->koran->rowClose();  ?>  