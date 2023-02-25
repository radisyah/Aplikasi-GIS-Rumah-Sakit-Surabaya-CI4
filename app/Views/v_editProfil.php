<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8">
      <div class="panel panel-primary">
        <div class="panel-heading">Edit Profil</div>
        <div class="panel-body">
          <div class="col-lg-16">
          <?php 
          if(session()->getFlashdata('error')){
            echo '<div class="alert alert-danger" role="alert">';
            echo session()->getFlashdata('error');
            echo '</div>';
          }else if(session()->getFlashdata('pesanSukses')){
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesanSukses');
            echo '</div>';
          }
          ?>
              <?php echo form_open_multipart('profil/save_edit/'.$profil['id_profil']); ?>
              <div class="form-group">
                <label>Nama</label>
                <input  value="<?= $profil['nama'] ?>" name="nama" class="form-control" required />
              </div>
              <div class="form-group">
                <label>No Telp</label>
                <input  value="<?= $profil['no_telp'] ?>" name="no_telp" class="form-control" required />
              </div>
              <div class="form-group">
                <label for="foto" class="form-label">Foto</label>
                <input type="file"  class="form-control" id="foto" name="foto">
              </div>
              <div class="form-group">
                <button  type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('user')?>" class="btn btn-success" >Kembali</a>
              </div>
              <?php echo form_close(); ?>
         
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
