<?= $this->koran->tittleMenu($judul, $menu, $icon); ?>
<div class="row text-primary">
  <?php if($detail == NULL) { ?>
    <div class="col-md-6">
  <?php } else { ?>
    <div class="col-md-4">
  <?php } ?>
    <div class="tile">
      <h6 class="tile-title line-head text-info" style="font-size: 17px; "><?= "".$beli['kode']."-".$beli['kode_pembelian']."&nbsp;&nbsp;".$beli['kodee']."-".jumlahAngka($beli['id_pemasok'])." ".$beli['nama'].""; ?></h6>
      <div class="tile-body">
        <form action="<?= $url; ?>" method="post">
          <?= $this->koran->inputTransaksi($beli['kode_pembelian']); ?>
          <?= $this->koran->inputOpen('Bahan'); ?>
            <select class="form-control" id="exampleSelect1" name="kode_bahan" style="width: 100%;">
              <option selected="" disabled="">Pilih bahan yang akan dibeli</option>
              <?php 
                foreach ($bahan as $data) {
                  if ($data['kode_pembelian'] == NULL) {
                    echo "<option value = ".$data['kode_bahan'].">".$data['kode']."-".jumlahAngka($data['kode_bahan'])." ".$data['nama']." - ".$data['keterangan']."</option>";
                  } else {}
                }
              ?>
            </select>
            <?= form_error('kode_bahan'); ?>
          <?= $this->koran->inputClose(); ?>

          <?= $this->koran->inputOpen('Harga Beli'); ?>
            <input class="form-control col-md-12" type="text" id="rupiah0" name="harga" placeholder="Contoh: 10.000" onkeypress="return hanyaAngka(event)" value="<?= set_value('harga'); ?>">
            <?= form_error('harga'); ?>
          <?= $this->koran->inputClose(); ?>

          <?= $this->koran->inputOpen('Jumlah'); ?>
            <input class="form-control col-md-12" type="text" name="jumlah" placeholder="Contoh: 75" onkeypress="return hanyaAngka(event)" value="<?= set_value('jumlah'); ?>">
            <?= form_error('jumlah'); ?>
          <?= $this->koran->inputClose(); ?>
          <?php if ($beli['status'] == 'Menunggu Pembelian') { ?>
          <?= $this->koran->button2($back); ?>
          <?php } else { } ?>
        </form>
      </div>
    </div>
  </div>
  <?php if($detail != NULL) { ?>
  <div class="col-md-8">
    <div class="tile">
      <h3 class="tile-title line-head text-info">Detail Pembelian</h3>
      <div class="tile-body">
        <table class="table table-hover table-bordered">
          <thead>
            <th>Bahan</th>
            <th>Jenis Bahan</th>
            <th>Jumlah</th>
            <th>Harga Beli</th>
            <th>Subtotal</th>
            <?php if ($beli['status'] == 'Menunggu Pembelian') { ?>
            <th style="text-align: center;">Pilihan</th>
            <?php } else { } ?>
          </thead>
          <tbody>
            <?php
            $total = 0;
              foreach ($detail as $data) {
                echo "<tr>
                        <td>".$data['nama']."</td>
                        <td>".$data['keterangan']."</td>";
                if ($data['kode_bahan'] == '1') {
                  echo "<td align='center'>".$data['input_jumlah']." rim</td>";
                }
                else{
                  echo "<td align='center'>".$data['jumlah']." ".$data['satuan']."</td>";
                }
                echo  "        
                        <td align='right'>".rp($data['harga_beli'])."</td>
                        <td align='right'>".rp($data['subtotal'])."</td>";
                $total += $data['subtotal'];
            ?>
            <?php if ($beli['status'] == 'Menunggu Pembelian') { ?>
                      <td align="center">
                          <a href="<?= site_url('pembelian/ubahPembelian/'.$beli['kode_pembelian'].'/'.$data['kode_bahan']); ?>" class="btn btn-sm btn-outline-warning">&nbsp;&nbsp;<i class="fa fa-fw fa-pencil"></i></a>
                          &nbsp;
                          <a href="#hapus<?= $data['kode_bahan']; ?>" class="btn btn-sm btn-outline-danger" data-toggle="modal">&nbsp;&nbsp;<i class="fa fa-fw fa-trash"></i></a>
                      </td>
                      <?php } else { } ?>  
                    </tr>
            <?php } ?>
            <tr>
              <td colspan="4" align="center"><b>Total</b></td>
              <td align="right"><b><?= rp($total); ?></b></td>
              <?php if ($beli['status'] == 'Menunggu Pembelian') { ?>
              <td></td>
              <?php } else { } ?>  
            </tr>
          </tbody>
        </table>
        <?php if ($beli['status'] == 'Menunggu Pembelian') { ?>
          <a href="#tambah" class="btn btn-outline-info" data-toggle="modal"><i class="fa fa-fw fa-save"></i> Selesai</a>
        <?php } else { } ?>
      </div>
    </div>
  </div>
  <?php } ?>
</div>