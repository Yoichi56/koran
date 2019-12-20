<?php foreach ($detail as $data) { ?>
  <?= $this->koran->modalOpen($judul); ?>
        <div class="modal-body">
          <form action="<?php echo site_url('pembelian/selesaiPembelian'); ?>" method="POST">
            <b>Apakah anda yakin ingin menyelesaikan transaksi pembelian ?</b>
            <?php $no = 0; $total = 0; foreach ($detail as $data) { $no++; ?> 
                  <table>
                    <tr>
                      <td>
                        <input type="hidden" name="kode_bahan[]" value="<?php echo $data['kode_bahan']; ?>" readonly="">
                      </td>
                      <td>
                        <input type="hidden" name="jumlah[]" value="<?php echo $data['jumlah']; ?>" readonly="">
                      </td>
                      <td>
                        <input type="hidden" name="harga[]" value="<?php echo $data['harga_beli']; ?>" readonly="">
                      </td>
                      <td>
                        <input type="hidden" name="subtotal[]" value="<?php echo $data['subtotal']; ?>" readonly="">
                      </td>
                    </tr>
                  </table>
            <?php 
                  $total += $data['subtotal']; 
                } $this->koran->inputSelesaiPembelian($no, $total, $beli['kode_pembelian']); ?>
            <div class="ln_solid"></div>
            <div class="text-right">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tidak</button>
              &nbsp;&nbsp;&nbsp;
              <button type="submit" class="btn btn-outline-primary">Iya</button>
            </div>
          </form>
        </div>
  <?= $this->koran->modalClose($judul); ?>   
<?php } ?>