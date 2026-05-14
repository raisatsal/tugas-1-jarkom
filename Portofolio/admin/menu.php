<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container-fluid">

    <!-- LOGO -->
    <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php">
      <img src="img/logo.jpg" alt="Logo" width="40" class="me-2">
      My Web
    </a>

    <!-- TOGGLER -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- MENU -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <?php
      $hal = isset($_GET['hal']) ? $_GET['hal'] : 'home';
      ?>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- HOME -->
        <li class="nav-item">
          <a class="nav-link px-3 rounded-pill mx-1 
            <?= ($hal == 'home') ? 'active-menu' : ''; ?>"
            href="index.php?hal=home">

            <i class="bi bi-house-door-fill me-1"></i>
            Home
          </a>
        </li>

        <!-- ABOUT -->
        <li class="nav-item">
          <a class="nav-link px-3 rounded-pill mx-1 
            <?= ($hal == 'about') ? 'active-menu' : ''; ?>"
            href="index.php?hal=about">

            <i class="bi bi-person-fill me-1"></i>
            About Me
          </a>
        </li>

        <!-- CONTACT -->
        <li class="nav-item">
          <a class="nav-link px-3 rounded-pill mx-1 
            <?= ($hal == 'contact') ? 'active-menu' : ''; ?>"
            href="index.php?hal=contact">

            <i class="bi bi-envelope-fill me-1"></i>
            Contact Me
          </a>
        </li>

        <!-- DROPDOWN -->
        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle px-3 rounded-pill mx-1
            <?= ($hal == 'jenis_list' || $hal == 'journey_list') ? 'active-menu' : ''; ?>"
            href="#"
            role="button"
            data-bs-toggle="dropdown">

            <i class="bi bi-mortarboard-fill me-1"></i>
            My Studies
          </a>

          <ul class="dropdown-menu shadow border-0">

            <li>
              <a class="dropdown-item"
                 href="index.php?hal=jenis_list">

                 Riwayat Pendidikan
              </a>
            </li>

            <li>
              <a class="dropdown-item"
                 href="index.php?hal=journey_list">

                 Journey
              </a>
            </li>

          </ul>

        </li>

      </ul>

      <!-- SEARCH -->
      <form class="d-flex align-items-center" role="search">

        <input class="form-control me-2"
               type="text"
               name="keyword"
               placeholder="Search">

        <button class="btn btn-light me-2" type="submit">
          <i class="bi bi-search"></i>
        </button>

        <input type="hidden" name="hal" value="produk_cari">

        <!-- LOGOUT -->
        <a href="logout.php" class="btn btn-danger">
          <i class="bi bi-box-arrow-right"></i>
          Logout
        </a>

      </form>

    </div>
  </div>
</nav>

<!-- STYLE -->
<style>

.navbar .nav-link{
    transition: all 0.3s ease;
    font-weight: 500;
}

/* HOVER */
.navbar .nav-link:hover{
    background: rgba(255,255,255,0.2);
    transform: scale(0.95);
}

/* ACTIVE MENU */
.active-menu{
    background: white !important;
    color: #0d6efd !important;
    font-weight: bold;
    box-shadow: inset 0 2px 5px rgba(0,0,0,0.2);
    transform: scale(0.95);
}

/* DROPDOWN */
.dropdown-menu{
    border-radius: 12px;
}

.dropdown-item:hover{
    background: #0d6efd;
    color: white;
}

</style>