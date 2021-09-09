        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo site_url('admin/home/dashboard') ?>" class="site_title"><i class="fa fa-university"></i> <span>  Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url('uploads/account/').$image?>" alt="Avatar" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $name ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li <?php if($sidebar=="dashboard") { echo "class='active'"; } ?>><a href="<?php echo site_url('admin/home/dashboard') ?>"><i class="fa fa-home"></i> Dashboard </a></li>
                  <?php if($status=="root"){ ?>
                  <li <?php if($sidebar=="account") { echo "class='active'"; } ?>><a><i class="fa fa-user"></i> Accounts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('admin/account/table') ?>">Table</a></li>
                      <li><a href="<?php echo site_url('admin/account/add') ?>">Add</a></li>
                    </ul>
                  </li>
                  <li <?php if($sidebar=="grade") { echo "class='active'"; } ?>><a><i class="fa fa-line-chart"></i> Grade <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('admin/grade/table') ?>">Table</a></li>
                      <li><a href="<?php echo site_url('admin/grade/add') ?>">Add</a></li>
                    </ul>
                  </li>
                  <?php } ?>
                  <li <?php if($sidebar=="school") { echo "class='active'"; } ?>><a><i class="fa fa-institution"></i> School <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('admin/school/table') ?>">Table</a></li>
                      <li><a href="<?php echo site_url('admin/school/add') ?>">Add</a></li>
                    </ul>  
                  </li>
                  <li <?php if($sidebar=="layer") { echo "class='active'"; } ?>><a><i class="fa fa-navicon"></i> Layer <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('admin/layer/table') ?>">Table</a></li>
                      <li><a href="<?php echo site_url('admin/layer/add') ?>">Add</a></li>
                    </ul>
                  </li>
                  <li <?php if($sidebar=="maps") { echo "class='active'"; } ?>><a href="<?php echo site_url('admin/maps') ?>"><i class="fa fa-map"></i> Maps </a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small" style="background: #172D44; height: 20px;">
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>