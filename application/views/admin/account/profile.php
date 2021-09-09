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
            <div class="page-title">
              <div class="title_left">
                <h3>My Profile</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="">


                  <div class="x_content">
                    <div class="row">
                      

                      <div class="col-md-3   widget widget_tally_box">
                        <div class="x_panel fixed_height_390">
                          <div class="x_content">

                            <div class="row">
                                <div class="col-md">
                                    <div class="thumbnail">
                                        <img src="<?php echo base_url('uploads/account/').$image?>" alt="Avatar" class="img-thumbnail">
                                    </div>
                                    <div class="caption">
                                        <h5 style="text-align: center;"><?php echo $profile["akun_name"] ?></h5>
                                        <p class="text-muted font-13 m-b-30">
                                            Username : <?php echo $profile["akun_username"] ?> <br>
                                            Is Active : <?php echo $profile["akun_isactive"] ?> <br>
                                            Level : <?php echo $profile["akun_jenjang"] ?> <br>
                                            Since : <?php echo $profile["akun_createat"] ?>
                                        </p>
                                        <p>
                                            <a href="<?php echo base_url('admin/account/edit/'.$encrypt_id)?>" class="btn btn-info btn-block" role="button">Edit</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                          </div>
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