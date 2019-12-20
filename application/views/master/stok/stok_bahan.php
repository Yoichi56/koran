<?php 
  $this->koran->tittleMenu($judul, $menu, $icon); 
  $this->koran->rowOpen(12); 
?>
<div class="tile-body text-primary">
  <table class="table table-hover table-bordered" id="sampleTable">
    <thead>
      <tr>
        <th>Bahan</th>
        <th style="width: 10%">Stok</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($hasil as $data) {
          echo "<tr>
                  <td>".$data['kode']."-".jumlahAngka($data['kode_bahan'])." ".$data['nama']."</td>
                  <td>".$data['stok']." ".$data['satuan']."</td>";
        } 
      ?>
    </tbody>
  </table>
</div>
<?= $this->koran->rowClose();  ?>