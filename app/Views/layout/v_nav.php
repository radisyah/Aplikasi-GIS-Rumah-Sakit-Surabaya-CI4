<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
          <li class="sidebar-search">
              <div class="input-group custom-search-form">
                  <input type="text" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                      <button class="btn btn-primary" type="button">
                          <i class="fa fa-search"></i>
                      </button>
                  </span>
              </div>
              <!-- /input-group -->
          </li>
          <li>
              <a href="<?= base_url('home') ?>"><i class="fa fa-map fa-fw"></i>Pemetaan</a>
          </li>
          <li>
              <a href="<?= base_url('rumahSakit') ?>"><i class="fa fa-hospital-o"></i> Rumah Sakit</a>
          </li>
          <li>
              <a href="<?= base_url('user') ?>"><i class="fa fa-user"></i> User Profil </a>
          </li>
      </ul>
  </div>
  <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

 <!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $title ?></h1>
           
