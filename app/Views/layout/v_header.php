<div id="wrapper">
  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?= base_url('home') ?>">GIS RS SURABAYA</a>
    </div>
    <ul class="nav navbar-right navbar-top-links">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-user fa-fw"></i> <?= session()->get('username')?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu dropdown-user">
          <li>
            <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
          </li>
          <li>
            <a href="<?= base_url('auth/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
          </li>
        </ul>
      </li>
    </ul>
    <!-- /.navbar-top-links -->
  </nav>
</div>
