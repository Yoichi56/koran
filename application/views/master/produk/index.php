<?php 
  $this->koran->tittleMenu($judul, $menu, $icon); 
  echo $this->session->flashdata('pesan');
  $this->koran->rowOpen(12); 
?>
<a href="<?= $url; ?>" class="btn btn-outline-success"><i class="fa fa-plus-circle text"></i><strong> Tambah</strong></a><br><br>
<div class="tile-body text-primary">
  <table class="table table-hover table-bordered" id="sampleTable">
    <thead>
      <tr>
        <th>Kode Produk</th>
        <th>Nama Produk</th>
        <th style="text-align: center;">Ubah</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($hasil as $data) {
          echo "<tr>
                  <td>".$data['kode']."-".jumlahAngka($data['kode_produk'])."</td>
                  <td>".$data['nama']."</td> ";
      ?>
                  <td align="center"> <a href="<?= site_url('produk/ubah_produk/'.$data['kode_produk']); ?>" class="btn btn-sm btn-outline-secondary" >&nbsp;&nbsp;<i class="icon fa fa-fw fa-edit"></i></a> </td>
      <?php } ?>
    </tbody>
  </table>
</div>
<?= $this->koran->rowClose();  ?>