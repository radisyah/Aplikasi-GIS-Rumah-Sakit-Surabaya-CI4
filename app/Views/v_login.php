<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Please Sign In</h3>
        </div>

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

        <div class="panel-body">
          <?php echo form_open('auth/cek_login') ?>
            <fieldset>
              <div class="form-group">
                <input
                  class="form-control <?= ($errors->hasError('email')) ? 'is-invalid' : ''; ?>"
                  placeholder="E-mail"
                  name="email"
                  type="email"
                  autofocus
                />
                <div class="invalid-feedback">
                  <?= $errors->getError('email'); ?>
                </div>
              </div>
              <div class="form-group">
                <input
                  class="form-control <?= ($errors->hasError('password')) ? 'is-invalid' : ''; ?>"
                  placeholder="Password"
                  name="password"
                  type="password"
                  value=""
                />
                <div class="invalid-feedback">
                  <?= $errors->getError('password'); ?>
                </div>
              </div>
              <!-- Change this to a button or input when using this as a form -->
              <button class="btn btn-lg btn-success btn-block"
                >Login</button
              >
            </fieldset>
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
  </div>
</div>
