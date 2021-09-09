          <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px; border-left: 2px solid #c6c5c5;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?php echo base_url('uploads/account/').$image?>" alt=""><?php echo $name ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="<?php echo site_url('admin/account/profile') ?>">My Profile</a><div class="dropdown-divider"></div>
                      <a class="dropdown-item"  href="<?php echo site_url('admin/home/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>

                </ul>
              </nav>
            </div>
          </div>