<?= $this->desa->modalOpen($judul); ?>
  <form id="<?= $validator; ?>" action="<?= $url; ?>" method="post" enctype="multipart/form-data">
    <div class="modal-body">
      <?= $this->desa->inputOpen('Nama'); ?>
        <input class="form-control col-md-12" type="text" name="nama" placeholder="Contoh :  Muhammad Balyan" onkeypress="return hanyaHuruf(event)">
      <?= $this->desa->inputClose(); ?>
      <?= $this->desa->inputOpen('Role'); ?>
        <select class="form-control" id="exampleSelect1" name="role_id" style="width: 100%;">
          <option selected="" disabled="">Pilih Role</option>
          <?php 
            foreach ($role as $data) {
              if ($data['max'] == 0) { }
              else {
                echo "<option value = ".$data['id'].">".$data['role']."</option>";
              }
            }
          ?>
        </select>
      <?= $this->desa->inputClose(); ?>
      <?= $this->desa->inputOpen('Username'); ?>
        <input class="form-control col-md-12" type="text" name="username" placeholder="Contoh :  mmbalyann">
      <?= $this->desa->inputClose(); ?>
      <?= $this->desa->inputOpen('Password'); ?>
        <input class="form-control col-md-12" type="password" name="password" placeholder="********">
      <?= $this->desa->inputClose(); ?>
      <?= $this->desa->inputOpen('Re-Password'); ?>
        <input class="form-control col-md-12" type="password" name="repassword" placeholder="********">
      <?= $this->desa->inputClose(); ?>
      <?= $this->desa->inputOpen('Foto'); ?>
        <input class="form-control col-md-12" type="file" name="foto">
      <?= $this->desa->inputClose(); ?>
    </div>  
    <?= $this->desa->buttonModal(); ?>
  </form>
<?= $this->desa->modalClose(); ?>