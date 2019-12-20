<?php 
  $this->koran->tittleMenu($judul, $menu, $icon); 
  echo $this->session->flashdata('pesan');
  $this->koran->rowOpen(12); 
?>
<div class="tile-body text-primary">
  <h6 class="tile-title line-head text-info" style="font-size: 17px; ">
    <a href="<?= $back; ?>" class="text-danger"><i class="icon fa fa-fw fa-mail-reply"></i></a>
    <?= $produk['kode']."-".jumlahAngka($produk['kode_produk'])." ".$produk['nama']; ?>
  </h6>
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Bahan Baku <?= $produk['nama']; ?></th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($bbb as $data) {
          echo "<tr>
                  <td>".$data['kode']."-".jumlahAngka($data['kode_bahan'])." ".$data['nama']."</td>
                  <td>".$data['jumlah']." ".$data['satuan']."</td>
                </tr>";
        }
      ?> 
    </tbody>
  </table><br>
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Pekerjaan <?= $produk['nama']; ?></th>
        <th>Karyawan</th>
        <th>Tarif</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($btk as $data) {
          echo "<tr>
                  <td>".$data['kode']."-".jumlahAngka($data['kode_pekerjaan'])." ".$data['nama']."</td>
                  <td>".$data['jumlah']." orang</td>
                  <td align='right'>".rp($data['tarif'])."</td>
                </tr>";
        }
      ?> 
    </tbody>
  </table><br>
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Bahan Penolong <?= $produk['nama']; ?></th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($bop as $data) {
          echo "<tr>
                  <td>".$data['kode']."-".jumlahAngka($data['kode_bahan'])." ".$data['nama']."</td>
                  <td>".$data['jumlah']." ".$data['satuan']."</td>
                </tr>";
        }
      ?> 
    </tbody>
  </table><br>
</div>
<?= $this->koran->rowClose();  ?>