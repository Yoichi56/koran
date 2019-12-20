<?= $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(6);  ?>
  <form action="<?= $url; ?>" method="post">
  	<?= $this->koran->inputAdd($id, $kode); ?>
  	<?= $this->koran->inputOpen('Kode Pembelian'); ?>
    	<input class="form-control col-md-12" type="text" value="<?= "".$kode."-".$id.""; ?>" readonly>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Tanggal'); ?>
    	<input class="form-control col-md-12" type="text" value="<?= date('d-m-Y'); ?>" readonly>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpen('Pemasok'); ?>
      <select class="form-control" id="exampleSelect1" name="id_pemasok" style="width: 100%;">
        <option selected="" disabled="">Pilih Pemasok</option>
        <?php 
          foreach ($pemasok as $data) {
            echo "<option value = ".$data['id_pemasok'].">".$data['kode']."-".jumlahAngka($data['id_pemasok'])." ".$data['nama']."</option>";
          }
        ?>
      </select>
      <?= form_error('id_pemasok'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->button(); ?>
  </form>
<?= $this->koran->rowClose();  ?>  