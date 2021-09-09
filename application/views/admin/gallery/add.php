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
                <h3>Add Image <?php echo $school["sekolah_nama"]; ?></h3>
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
                    <form action="<?php echo base_url('admin/gallery/add/'.$encrypt_id)?>" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">


                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_website_">Foto
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="_files_" name="_files_[]" accept="image/*" multiple>
                            <input type="hidden" id="_checkfile_" name="_checkfile_" value="_files_">
                            <label class="custom-file-label" for="customFile" id="filename" style="overflow: hidden;">Choose file</label>
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
        $("#_files_").on("change", function() {
          var files = $(this).get(0).files;
          var names = "";
          for (let i = 0; i < files.length; i++) {
            if (files[i].type != "image/jpeg" && files[i].type != "image/png" && files[i].type != "image/jpg") {
              $("#filename").text("");
              $("#_files_").val("");
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: 'The filetype you are attempting to upload is not allowed'
              })
            } else {
              if (i == 0) {
                names += files[i].name
              } else {
                names += " / "+files[i].name;
              }
            }
          }
          console.log(files);
          if (names != "") {
            $("#filename").text(names);
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
              window.location.replace("<?php echo base_url('admin/gallery/table/'.$encrypt_id) ?>");
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