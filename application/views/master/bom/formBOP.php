<?= $this->koran->tittleMenu($judul, $menu, $icon); ?>
<div class="row text-primary">
  <div class="col-md-5">
    <div class="tile">
      <h6 class="tile-title line-head text-info" style="font-size: 17px; "><?= $produk['kode']."-".jumlahAngka($produk['kode_produk'])." ".$produk['nama']; ?></h6>
      <div class="tile-body">
        <form action="<?= $url; ?>" method="post">
          <?= $this->koran->inputOpen('Beban'); ?>
            <select class="form-control" id="exampleSelect1" name="kode_beban" style="width: 100%;">
              <option selected="" disabled="">Pilih Beban</option>
              <?php 
                foreach ($beban as $data) {
                  if ($data['kode_produk'] == NULL) {
                    echo "<option value = ".$data['kode_beban'].">".$data['kode']."-".jumlahAngka($data['kode_beban'])." ".$data['nama']."</option>";
                  } else {}
                }
              ?>
            </select>
            <?= form_error('kode_beban'); ?>
          <?= $this->koran->inputClose(); ?>
          <input class="form-control col-md-12" type="hidden" name="kode_produk" value="<?= $produk['kode_produk'] ?>">
          <?php //if ($beli['status'] == 'Menunggu Pembelian') { ?>
          <?= $this->koran->button2($back); ?>
          <?php //} else { } ?>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="tile">
      <h3 class="tile-title line-head text-info"><?= "Overhead Pabrik ".$produk['kode']."-".jumlahAngka($produk['kode_produk'])." ".$produk['nama']; ?></h3>
      <div class="tile-body">
        <table class="table table-hover table-bordered">
          <thead>
            <th>Beban</th>
            <th style="text-align: center;">Pilihan</th>
          </thead>
          <tbody>
            <?php
            $total = 0;
              foreach ($hasil as $data) {
                echo "<tr>
                        <td>".$data['nama']."</td>";
            ?>
                      <td align="center">
                          <!--a href="<?= site_url('bom/ubahBTK/'.$data['no'].'/'.$produk['kode_produk']); ?>" class="btn btn-sm btn-outline-warning">&nbsp;&nbsp;<i class="fa fa-fw fa-pencil"></i></a>
                          &nbsp;-->
                          <a href="#hapus<?= $data['no']; ?>" class="btn btn-sm btn-outline-danger" data-toggle="modal">&nbsp;&nbsp;<i class="fa fa-fw fa-trash"></i></a>
                      </td>
                    </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php foreach ($hasil as $data) { ?>
  <div class="bs-component">
    <div class="modal" id="hapus<?= $data['no']; ?>">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger">Hapus</h5>
          </div>
          <form action="<?= site_url('bom/hapusBOP/'.$this->uri->segment(3)); ?>" method="post">
            <div class="modal-body">
              <?= "Apakah anda ingin menghapus <b>".$data['kode']."-".jumlahAngka($data['kode_beban'])." ".$data['nama']." ?</b>"; ?>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="no" value="<?= $data['no']; ?>" readonly="readonly">
                <input type="hidden" name="aksi" value="hapus" readonly="readonly">
                <?= $this->koran->button5(); ?>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>