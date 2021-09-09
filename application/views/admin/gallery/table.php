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
                <h3>Gallery <?php echo $school["sekolah_nama"]; ?></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Table</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li style="float: right;">
                            <a href="<?php echo site_url('admin/school/table') ?>">
                                <button type="button" class="btn btn-warning" >Cancel</button>
                            </a>
                        </li>
                        <li style="float: right;">
                            <a href="<?php echo site_url('admin/gallery/add/'.$encrypt_id) ?>">
                                <button type="button" class="btn btn-info"><i class="fa fa-plus-square"></i> Add Images</button>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
					
                                <table id="_gallery_" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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

    <script>
      var gallery;

      function goBack() {
        window.history.back();
      }

      function delGallery(id){
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type: "POST",
              data: { id: id},
              url: "<?php echo site_url('admin/API/gallery/delete')?>",
              dataType: "JSON",
              success: function (data) {
                if (data) {
                  gallery.ajax.reload();
                  Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                  });
                } else {
                  gallery.ajax.reload();
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                  })
                }
              }
            });
          }
        })
      }

      $(document).ready(function(){
        var notif = {
          type:"<?php if(isset($notif["type"])) { echo $notif["type"]; } ?>", 
          message:"<?php if(isset($notif["message"])) { echo $notif["message"]; } ?>"
        };

        if(notif.type == "empty" && notif.message != ""){
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


        gallery = $("#_gallery_").DataTable({
          ajax: {
            url: "<?php echo site_url('admin/API/gallery/data/'.$encrypt_id)?>",
            type: "POST",
            dataSrc: ""
          },
          "order": [[ 1, 'desc' ]],
          columns: [
            {data: null},
            {
              data: "foto_nama",
              render: function(data, type, row){
                const folder = row.foto_folder;
                const imgURL = "<?php echo base_url('uploads/school/') ?>"+folder+"/"+data
                return "<a href='"+imgURL+"'><img src='"+imgURL+"'  class='img-thumbnail' width='100px' height='70px'></a>";
              }
            },
            {data: "foto_tanggal"},
            {
              data: "foto_id",
              render: function(data, type, row){
                const setDelGallery = '"'+data+'"';
                return "\
                  <a onclick='delGallery("+setDelGallery+")' data-toggle='tooltip' title='Delete'>\
                      <button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button>\
                  </a>";
              }
            }
          ],
        });

        gallery.on( 'order.dt search.dt', function () {
          gallery.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
        } ).draw();
      });
    </script>
  </body>
</html>