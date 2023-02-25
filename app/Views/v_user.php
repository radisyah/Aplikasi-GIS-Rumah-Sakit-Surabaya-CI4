
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12"></div>
  </div>

  <div class="row">
    <div class="col-lg-6">
    
      <?php foreach ($profil as $key => $value) { ?>
        <?php if ($value['id_user']==session()->get('id_user')) { ?>
        <div class="panel panel-primary">
          <div class="panel-heading ">My Profil</div>
          <div class="panel-body text-center">
            <img
              width="150px"
              class="img-thumbnail"
              src="<?= base_url('img/'. $value['foto'])?>"
              alt="User profile picture"
            />
            <h3 class="profile-username text-center"><?= $value['nama'] ?></h3>
            <p class="text-muted text-center"><?= $value['username'] ?> | <?= $value['email'] ?> | <?= $value['no_telp'] ?> </p>
          </div>
          <div class="panel-footer">
            <a href="<?= base_url('profil/edit/'.$value['id_profil']) ?>" class="btn btn-sm btn-primary" >Edit</a>
          </div>
        </div>
        <?php } ?>
      <?php } ?>
    </div>

    <div class="row">
    <div class="col-lg-6">
      <?php foreach ($profil as $key => $value) { ?>
        <?php if ($value['id_user']==session()->get('id_user')) { ?>
          <div class="panel panel-primary">
            <div class="panel-heading">My Akun</div>
            <div class="panel-body">
              <div class="form-group">
                <label>username</label>
                <input  value="<?= $value['username'] ?>" name="username" class="form-control"readonly />
              </div>
              <div class="form-group">
                <label>email</label>
                <input  value="<?= $value['email'] ?>" name="email" class="form-control" readonly />
              </div>
              <div class="form-group">
                <label>password</label>
                <input type="password" value="<?= $value['password'] ?>" name="password" class="form-control" readonly />
              </div>
            </div>
            <div class="panel-footer">
              <a href="<?= base_url('user/edit/'.$value['id_user']) ?>" class="btn btn-sm btn-primary" >Edit</a>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>

    
      
   
  </div>
</div>
