<?= $this->desa->tittleMenu($judul, $menu); ?>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <button class="btn btn-primary" data-target="#tambah" data-toggle="modal"><i class="fa fa-plus-circle text"></i><strong> Tambah</strong></button><br><br>
      <div class="tile-body">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Role</th>
              <!--th style="text-align: center;">Pilihan</th-->
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($hasil as $data) {
                echo "<tr>
                        <td>".$data['id']."</td>
                        <td>".$data['nama']."</td>
                        <td>".$data['username']."</td>
                        <td>".$data['role']."</td>
                      </tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah -->

<!-- Modal Tambah -->