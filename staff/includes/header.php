<header>
  <!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark black">
  <div class="container">
    <a class="navbar-brand" href="index.php"><strong>Expertise Learning</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
      aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=="index.php") echo "active";?>">
          <a class="nav-link" href="#">
            <strong> Manage </strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <strong> Enrollment </strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <strong> Payment </strong>
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <strong> Placement </strong>
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <strong> Certificate </strong>
        </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <?php 
              if(isset($_SESSION['login_staff']))
              {
                $name=$_SESSION['login_staff'];
            ?>
              <i class="fas fa-user"></i> <?php echo $name; ?> </a>
            <?php
              }
            ?>
          <div class="dropdown-menu dropdown-menu-right dropdown-dark" aria-labelledby="navbarDropdownMenuLink-4">
            <a class="dropdown-item" href="#">My Account</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--/.Navbar -->
</header>