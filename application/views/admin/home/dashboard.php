<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("admin/partials/head") ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
        <?php $this->load->view("admin/partials/sidebar") ?>

        <?php $this->load->view("admin/partials/navigation") ?>

        <!-- PAGE CONTENT -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="">


                  <div class="x_content">
                    <div class="row">
                      <div class="col-lg-12 col-9">
                        <div class="text-center"  style="font-size: 24px;">
                            <i class="fa fa-home fa-5x" ></i>
                        </div>
                        <h1 class="display-4 text-center"><b>Selamat Datang!</b></h1>
                        <p class="lead text-center">Sistem Informasi Geografis Pemetaan Sekolah Surakarta</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-university"></i>
                          </div>
                          <div class="count"><?php echo $totalSekolah; ?></div>

                          <h3>Sekolah</h3>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-institution"></i>
                          </div>
                          <div class="count"><?php echo $totalNegeri; ?></div>

                          <h3>Negeri</h3>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-institution"></i>
                          </div>
                          <div class="count"><?php echo $totalSwasta; ?></div>

                          <h3>Swasta</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /PAGE CONTENT -->

        <?php $this->load->view("admin/partials/footer") ?>
      </div>
    </div>

    <?php $this->load->view("admin/partials/javascript") ?>

  </body>
</html>