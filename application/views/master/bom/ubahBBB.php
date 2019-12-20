<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6); ?>
  <h6 class="tile-title line-head text-info" style="font-size: 17px; "><?= "Bahan Baku ".$produk['kode']."-".jumlahAngka($produk['kode_produk'])." ".$produk['nama']; ?></h6>
  
  <form action="<?= $url; ?>" method="post" class="text-primary">
    <?= $this->koran->inputEditTransaksi1($hasil['no']); ?>
  	<?= $this->koran->inputOpen('Bahan'); ?>
    	<input class="form-control col-md-12" type="text" name="" value="<?= "".$hasil['kode']."-".jumlahAngka($hasil['kode_bahan'])." ".$hasil['nama'].""; ?>" readonly>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Jumlah'); ?>
    	<input class="form-control col-md-12" type="text" name="jumlah" placeholder="Contoh:  120" value="<?= $hasil['jumlah']; ?>" onkeypress="return hanyaAngka(event)">
    	<?= form_error('jumlah'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->button2($back); ?>
  </form>
<?= $this->koran->rowClose();  ?>  