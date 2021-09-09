<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("admin/partials/head") ?>
    <!-- Bootstrap Colorpicker -->
    <link href="<?php echo base_url('assets/gentelella/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')?>" rel="stylesheet">
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
                <h3>Edit Layer</h3>
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
                    <form action="<?php echo base_url('admin/layer/edit/'.$encrypt_id)?>" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_name_" id="_name_" value="<?php if(set_value('_name_')!=null) { echo set_value('_name_'); } else { echo $layer["layer_nama"] ;} ?>" required="required" minlength="3" maxlength="20" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Color</label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_color_" id="_color_" value="<?php if(set_value('_color_')!=null) { echo set_value('_color_'); } else { echo $layer["layer_warna"] ;} ?>" required="required" class="demo1 form-control" placeholder="#000000" />
                        </div>
                      </div>

                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">File
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="_file_" name="_file_">
                            <input type="hidden" id="_checkfile_" name="_checkfile_" value="_file_">
                            <label class="custom-file-label" for="customFile" id="filename" style="overflow: hidden;">Choose file</label>
                          </div>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-warning" type="button" onclick="goBack()">Cancel</button>
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
    <!-- Bootstrap Colorpicker -->
    <script src="<?php echo base_url('assets/gentelella/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')?>"></script>
    <script>
      function goBack() {
        window.history.back();
      }
      $(document).ready(function(){
        $("#_file_").on("change", function() {
          var files = $(this).get(0).files;
          var eks = (files[0].name).split('.')[1]
          if (eks.toLowerCase() != "geojson") {
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
              window.location.replace("<?php echo base_url('admin/layer/table') ?>");
            }
          })
        } else if(notif.type == "empty" && notif.message != ""){
          Swal.fire({
            title: notif.message,
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Back!',
            allowOutsideClick: false,
            allowEscapeKey: false
          }).then((result) => {
            if (result.value) {
              window.history.back();
            }
          })
        }
      });
    </script>

  </body>
</html>