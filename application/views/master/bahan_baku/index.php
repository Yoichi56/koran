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
        <th>Kode</th>
        <th>Nama</th>
        <th>Satuan</th>
        <th>Keterangan</th>
        <th style="text-align: center;">Ubah</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($hasil as $data) {
          echo "<tr>
                  <td>".$data['kode']."-".jumlahAngka($data['kode_bahan'])."</td>
                  <td>".$data['nama']."</td>
                  <td>".$data['satuan']."</td>
                  <td>".$data['keterangan']."</td>";
      ?>
                  <td align="center"> <a href="<?= site_url('bahanBaku/ubah_bahanBaku/'.$data['kode_bahan']); ?>" class="btn btn-sm btn-outline-secondary" >&nbsp;&nbsp;<i class="icon fa fa-fw fa-edit"></i></a> </td>
      <?php } ?>
    </tbody>
  </table>
</div>
<?= $this->koran->rowClose();  ?>