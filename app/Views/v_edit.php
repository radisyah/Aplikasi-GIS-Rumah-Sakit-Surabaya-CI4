<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8">
      <div class="panel panel-primary">
        <div class="panel-heading">Edit User</div>
        <div class="panel-body">
          <div class="col-lg-16">
          <?php 
          if(session()->getFlashdata('pesanSukses')){
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesanSukses');
            echo '</div>';
          }
          ?>
            <?php echo form_open_multipart('user/save_edit/'.$user['id_user']); ?>
              <div class="form-group">
                <label>Username</label>
                <input  value="<?= $user['username'] ?>" name="username" class="form-control"required />
              </div>
              <div class="form-group">
                <label>Email</label>
                <input  value="<?= $user['email'] ?>" name="email" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type=""  value="<?= $user['password'] ?>" name="password" class="form-control" required />
              </div>
              <div class="form-group">
                <button  type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('user')?>" class="btn btn-success" >Kembali</a>
              </div>
            <?php echo form_close() ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
