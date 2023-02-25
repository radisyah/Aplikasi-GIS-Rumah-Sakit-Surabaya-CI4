<div class="panel panel-default">
  <div class="panel-heading">
    <a href="<?= base_url('rumahSakit/add') ?>" class="btn btn-primary btn-sm">Add</a> 
  </div>
  <!-- /.panel-heading -->
  <div class="panel-body">
    <?php 
      if(session()->getFlashdata('pesanSukses')){
      echo '<div class="alert alert-success" role="alert">';
      echo session()->getFlashdata('pesanSukses');
      echo '</div>';
    }
    ?>
    <div class="table-responsive">
      <table
        class="table table-striped table-bordered table-hover "
        id="dataTables-example"
      >
        <thead>
          <tr >
            <th class="text-center">No</th>
            <th class="text-center">Nama Rumah Sakit</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">No Telepon</th>
            <th class="text-center">Lat</th>
            <th class="text-center">Lon</th>
            <th class="text-center">Deskripsi</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($rumkit as $key => $value) { ?>
          <tr class="odd gradeX text-center">
            <td><?= $no++; ?></td>
            <td><?= $value['nama_rumkit']; ?></td>
            <td><?= $value['alamat']; ?></td>
            <td><?= $value['no_telpon']; ?></td>
            <td><?= $value['latitude']; ?></td>
            <td><?= $value['longtitude']; ?></td>
            <td><?= $value['deskripsi']; ?></td>
            <td>
            <img
            width="80px"
            src="<?= base_url('img/'. $value['foto'])?>"
            alt="User profile picture"
            />
            </td>
            <td>
              <a href="<?= base_url('rumahSakit/edit/'.$value['id_rumkit']) ?>" class="btn btn-warning btn-sm">Edit</a> 
              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?=  $value['id_rumkit']; ?>">Delete</button>
            </td>
          </tr>
          <?php } ?>
         
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal EDIT.Hapus -->
<?php foreach ($rumkit as $key => $value){?>
<div class="modal fade" id="delete<?=  $value['id_rumkit']; ?>">
  <div class="modal-dialog modal-danger">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin ingin menghapus <?=  $value['nama_rumkit']; ?> ?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('rumahSakit/delete_data/'.$value['id_rumkit']) ?>" type="submit" class="btn btn-primary">Iya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.AKHIR modal-Hapus -->
<?php } ?>
