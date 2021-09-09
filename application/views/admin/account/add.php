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
                <h3>Add Account</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Form Input <small>enter data correctly</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />
                    <form action="<?php echo base_url('/admin/account/add')?>" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_name_">Name
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_name_" id="_name_" value="<?php echo set_value('_name_'); ?>" required="required" minlength="3" maxlength="20" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_username_">Username
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_username_" id="_username_" value="<?php echo set_value('_username_'); ?>" required="required" minlength="5" maxlength="12" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_password_">Password
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="password" name="_password_" id="_password_" value="<?php echo set_value('_password_'); ?>" required="required" minlength="5" maxlength="20" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_passconf_">Confirm Password
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="password" name="_passconf_" id="_passconf_" value="<?php echo set_value('_passconf_'); ?>" required="required" minlength="5" maxlength="20" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_level_">Level
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="_level_" id="_level_"  class="form-control ">
                            <option value="" selected disabled hidden>Choose here</option>
                            <?php foreach ($jenjang_data as $key => $value) { ?>
                              <option value="<?php echo $value["jenjang_id"] ?>" <?php echo  set_select('_level_', $value["jenjang_id"]); ?> ><?php echo $value["jenjang_nama"] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_file_">Image
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <div class="col-sm-3">
                            <img src="<?php echo base_url('assets/gentelella/production/images/user.png')?>" alt="" class="img-thumbnail">
                          </div>
                          <div class="col-sm-9">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="_file_" name="_file_" accept="image/*">
                              <input type="hidden" id="_checkfile_" name="_checkfile_" value="_file_">
                              <label class="custom-file-label" for="customFile" id="filename" style="overflow: hidden;">Choose file</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-warning" type="button" onclick="goBack()">Cancel</button>
						              <button class="btn btn-info" type="reset" id="_reset_">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>


                    </form>
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

    <script>
      function goBack() {
        window.history.back();
      }
      $(document).ready(function(){
        $("#_file_").on("change", function() {
          var files = $(this).get(0).files;
          var eks = (files[0].name).split('.')[1]
          if (files[0].type != "image/jpeg" && files[0].type != "image/png" && files[0].type != "image/jpg") {
            $("#filename").text("");
            $("#_file_").val("");
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              html: 'The filetype you are attempting to upload is not allowed'
            })
          } else {
            $("#filename").text(files[0].name);
          }
        });

        $("#_reset_").on("click", function(){
          $("#filename").text("Choose file");
        });

        var notif = {
          type:"<?php if(isset($notif["type"])) { echo $notif["type"]; } ?>", 
          message:"<?php if(isset($notif["message"])) { echo $notif["message"]; } ?>"
        };

        if (notif.type == "error" && notif.message != "") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: notif.message
          })
        } else if(notif.type == "success" && notif.message != ""){
          Swal.fire({
            icon: 'success',
            title: 'Success...',
            html: notif.message,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Check Data',
            cancelButtonText: 'Cancel'
          }).then((result) => {
            if (result.value) {
              window.location.replace("<?php echo base_url('admin/account/table') ?>");
            }
          })
        }
      });
    </script>

  </body>
</html>