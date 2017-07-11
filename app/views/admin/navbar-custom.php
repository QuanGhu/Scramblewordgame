<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
    <!-- User Account Box -->
    <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="Public/img/user2-160x160.jpg" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo $_SESSION['firstname']; ?></span>
      </a>
      <ul class="dropdown-menu">
        <li class="user-header">
          <img src="Public/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          <p>
            <?php echo $_SESSION['firstname']; ?>
          </p>
        </li>
        <?php if($_SESSION['role'] == '1'){ ?>
            <?php echo '<li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="dashboard/adduser" class="btn btn-default btn-flat">Tambah Pengguna</a>
                </div>
              </div>
            </li>';
        ?>
        <?php } ?>
        <li class="user-footer">
          <div class="pull-left">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
          </div>
          <div class="pull-right">
            <a href="dashboard/logout" class="btn btn-default btn-flat">Sign out</a>
          </div>
        </li>
      </ul>
    </li>
  </ul>
</div>
