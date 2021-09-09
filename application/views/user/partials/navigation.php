  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-light top-nav">
      <div class="container" style="margin: 0px; max-width: 100%;">
          <a class="" href="<?php echo base_url('home') ?>" style="color: #fff;">
            <h2><i class="fa fa-school"></i> Pemetaan Sekolah </h2>
            <!-- <img src="<?php echo base_url('assets/zonebiz/images/logo.png')?>" alt="logo" /> -->
          </a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link <?php if($menu == "home"){ echo "active"; } ?>" href="<?php echo site_url('home') ?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($menu == "school"){ echo "active"; } ?>" href="<?php echo site_url('school') ?>">School</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($menu == "about"){ echo "active"; } ?>" href="<?php echo base_url('uploads/file/about.pdf') ?>" target="_blank">About</a>
              </li>
            </ul>
          </div>
      </div>
  </nav>