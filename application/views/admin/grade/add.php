<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("admin/partials/head") ?>
    <!-- Cropper -->
    <link href="<?php echo base_url('assets/gentelella/vendors/cropper/dist/cropper.min.css')?>" rel="stylesheet">
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
                <h3>Add Grade</h3>
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
                    <form action="<?php echo base_url('admin/grade/add')?>" class="form-horizontal form-label-left" method="post">

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_name_">Name
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_name_" id="_name_" value="<?php echo set_value('_name_'); ?>" required="required" minlength="3" maxlength="50" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_abbreviation_">Abbreviation
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_abbreviation_" id="_abbreviation_" value="<?php echo set_value('_abbreviation_'); ?>" required="required" minlength="2" maxlength="10" class="form-control">
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-warning" type="button" onclick="goBack()">Cancel</button>
						              <button class="btn btn-info" type="reset">Reset</button>
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
              window.location.replace("<?php echo base_url('admin/grade/table') ?>");
            }
          })
        }
      });
    </script>

  </body>
</html>