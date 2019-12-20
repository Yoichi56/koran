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
  <table class="table table-hover table-bordered" id="sampleTable">
    <thead>
      <tr>
        <th>Bill of Material <?= $produk['nama']; ?></th>
        <th>Status</th>
        <th style="text-align: center;">Tambah</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>BBB</td>
        <td><?= $produk['bbb']; ?></td>
        <td align="center">
          <?php if ($produk['bbb'] == 'Belum Dibuat') : ?>
            <a href="<?= site_url('bom/tambahBBB/'.$produk['kode_produk']); ?>" class="btn btn-sm btn-outline-success" >&nbsp;&nbsp;<i class="icon fa fa-fw fa-cube"></i>BBB</a>
          <?php elseif ($produk['bbb'] == 'Sudah Dibuat') : ?>
            <a href="<?= site_url('bom/tambahBBB/'.$produk['kode_produk']); ?>" class="btn btn-sm btn-outline-primary" >&nbsp;&nbsp;<i class="icon fa fa-fw fa-cube"></i>BBB</a>
          <?php endif; ?> 
        </td>
      </tr>
      <tr>
        <td>BTK</td>
        <td><?= $produk['btk']; ?></td>
        <td align="center">
          <?php if ($produk['btk'] == 'Belum Dibuat') : ?>
            <a href="<?= site_url('bom/tambahBTK/'.$produk['kode_produk']); ?>" class="btn btn-sm btn-outline-success" >&nbsp;&nbsp;<i class="icon fa fa-fw fa-odnoklassniki"></i>BTK</a>
          <?php elseif ($produk['btk'] == 'Sudah Dibuat') : ?>
            <a href="<?= site_url('bom/tambahBTK/'.$produk['kode_produk']); ?>" class="btn btn-sm btn-outline-primary" >&nbsp;&nbsp;<i class="icon fa fa-fw fa-odnoklassniki"></i>BTK</a>
          <?php endif; ?> 
        </td>
      </tr>
      <tr>
        <td>BOP</td>
        <td><?= $produk['bop']; ?></td>
        <td align="center">
          <?php if ($produk['bop'] == 'Belum Dibuat') : ?>
            <a href="<?= site_url('bom/tambahBOP/'.$produk['kode_produk']); ?>" class="btn btn-sm btn-outline-success" >&nbsp;&nbsp;<i class="icon fa fa-fw fa-sitemap"></i>BOP</a>
          <?php elseif ($produk['bop'] == 'Sudah Dibuat') : ?>
            <a href="<?= site_url('bom/tambahBOP/'.$produk['kode_produk']); ?>" class="btn btn-sm btn-outline-primary" >&nbsp;&nbsp;<i class="icon fa fa-fw fa-sitemap"></i>BOP</a>
          <?php endif; ?> 
        </td>
      </tr>
    </tbody>
  </table>
</div>
<?= $this->koran->rowClose();  ?>