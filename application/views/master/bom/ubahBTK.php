<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6); ?>
  <h6 class="tile-title line-head text-info" style="font-size: 17px; "><?= "Biaya Tenaga Kerja ".$produk['kode']."-".jumlahAngka($produk['kode_produk'])." ".$produk['nama']; ?></h6>
  <form action="<?= $url; ?>" method="post" class="text-primary">
    <?= $this->koran->inputEditTransaksi1($hasil['no']); ?>
  	<?= $this->koran->inputOpen('Pekerjaan'); ?>
    	<input class="form-control col-md-12" type="text" name="" value="<?= "".$hasil['kode']."-".jumlahAngka($hasil['kode_pekerjaan'])." ".$hasil['nama'].""; ?>" readonly>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Tarif'); ?>
    	<input class="form-control col-md-12" id="rupiah0" type="text" name="tarif"  placeholder="Contoh:  120.000" value="<?= $hasil['tarif']; ?>" onkeypress="return hanyaAngka(event)">
    	<?= form_error('tarif'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->button2($back); ?>
  </form>
<?= $this->koran->rowClose();  ?>  