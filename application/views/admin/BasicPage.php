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
                <h3>Home Page</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="">


                  <div class="x_content">
                    <div class="row">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-caret-square-o-right"></i>
                          </div>
                          <div class="count">179</div>

                          <h3>New Sign ups</h3>
                          <p>Lorem ipsum psdea itgum rixt.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-comments-o"></i>
                          </div>
                          <div class="count">179</div>

                          <h3>New Sign ups</h3>
                          <p>Lorem ipsum psdea itgum rixt.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                          </div>
                          <div class="count">179</div>

                          <h3>New Sign ups</h3>
                          <p>Lorem ipsum psdea itgum rixt.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-check-square-o"></i>
                          </div>
                          <div class="count">179</div>

                          <h3>New Sign ups</h3>
                          <p>Lorem ipsum psdea itgum rixt.</p>
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