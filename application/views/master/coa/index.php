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
        <th style="width: 10%">Kode</th>
        <th>Nama</th>
        <th style="width: 10%">Header</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($hasil as $data) {
          echo "<tr>
                  <td align='center'>".$data['kode_akun']."</td>
                  <td>".$data['nama']."</td>
                  <td align='center'>".$data['header_akun']."</td>
                </tr>";
        }
      ?>
    </tbody>
  </table>
</div>
<?= $this->koran->rowClose(); ?>