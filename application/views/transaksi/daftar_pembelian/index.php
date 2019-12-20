<?php 
  $this->koran->tittleMenu($judul, $menu, $icon); 
  echo $this->session->flashdata('pesan');
  $this->koran->rowOpen(12);
  if ($pembelian['status'] == NULL) {
?>
  <a href="<?= $url; ?>" class="btn btn-outline-success"><i class="fa fa-plus-circle text"></i><strong> Tambah</strong></a>
<?php } else { ?>
  <button class="btn btn-outline-success" data-target="#notif" data-toggle="modal"><i class="fa fa-plus-circle text"></i><strong> Tambah</strong></button>
<?php } ?>
  <br><br>
<div class="tile-body text-primary">
  <table class="table table-hover table-bordered" id="sampleTable">
    <thead>
      <tr>
        <th style="width: 14%;"># Pembelian</th>
        <th>Pemasok</th>
        <th style="width: 10%;">Tanggal</th>
        <th>Total</th>
        <th style="width: 16%;">Status</th>
        <th style="text-align: center;">Tambah / Detail</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($hasil as $data) {
          echo "<tr>
                  <td><span class='text-hide'>".$data['no']."</span> ".$data['kode']."-".$data['kode_pembelian']."</td>
                  <td>".$data['kodee']."-".jumlahAngka($data['id_pemasok'])." ".$data['nama']."</td>
                  <td>".shortdate_indo($data['tanggal'])."</td>
                  <td align='right'>".rp($data['total'])."</td>
                  <td>".$data['status']."</td>";
          if ($data['status'] == 'Menunggu Pembelian') {
      ?>
                  <td align="center"> <a href="<?= site_url('pembelian/tambahPembelian/'.$data['kode_pembelian']); ?>" class="btn btn-sm btn-outline-primary" >&nbsp;<i class="icon fa fa-fw fa-plus"></i></a> </td>
      <?php } else { ?>
                  <td align="center"> <a href="<?= site_url('pembelian/detailPembelian/'.$data['kode_pembelian']); ?>" class="btn btn-sm btn-outline-info" target="_blank">&nbsp;<i class="icon fa fa-fw fa-info"></i></a> </td>
      <?php } } ?>
    </tbody>
  </table>
</div>
<?= $this->koran->rowClose();  ?>


<div class="bs-component">
  <div class="modal" id="notif">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger">PERINGATAN !!</h5>
        </div>
        
        <div class="modal-body">
          <p style="font-size: 24px;">
            <?= "Terdapat pembelian <b>".$pembelian['kode']."-".$pembelian['kode_pembelian']." </b>dari pemasok <b>".$pembelian['nama']."</b> yang belum selesai."; ?>
          </p>
        </div>
        <div class="modal-footer">
           <?= $this->koran->button6(); ?>   
        </div>
      </div>
    </div>
  </div>
</div>