<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6);  ?>
  <form action="<?= $url; ?>" method="post">
  	<?= $this->koran->inputEditTransaksi($beli['kode_pembelian'], $detail['kode_bahan']); ?>
  	<?= $this->koran->inputOpen('Kode Pembelian'); ?>
    	<input class="form-control col-md-12" type="text" value="<?= "".$beli['kode']."-".$beli['kode_pembelian'].""; ?>" readonly>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Bahan'); ?>
    	<input class="form-control col-md-12" type="text" value="<?= $detail['nama']; ?>" readonly>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Harga'); ?>
      <input class="form-control col-md-12" type="text" id="rupiah0" name="harga" value="<?= $detail['harga_beli']; ?>">
      <?= form_error('harga'); ?>
    <?= $this->koran->inputClose(); ?>
    <?php if ($detail['kode_bahan'] == '1') : ?>
      <?= $this->koran->inputOpen('Jumlah'); ?>
        <input class="form-control col-md-12" type="text" name="jumlah" value="<?= $detail['input_jumlah']; ?>">
        <?= form_error('jumlah'); ?>
      <?= $this->koran->inputClose(); ?>
    <?php else : ?>
      <?= $this->koran->inputOpen('Jumlah'); ?>
        <input class="form-control col-md-12" type="text" name="jumlah" value="<?= $detail['jumlah']; ?>">
        <?= form_error('jumlah'); ?>
      <?= $this->koran->inputClose(); ?>
    <?php endif; ?>

    <?= $this->koran->button3($back); ?>
  </form>
<?= $this->koran->rowClose();  ?>  