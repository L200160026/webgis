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
                <h3>Layer Table</h3>
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
                            <a href="<?php echo site_url('admin/layer/add') ?>">
                                <button type="button" class="btn btn-info"><i class="fa fa-plus-square"></i> Add Layer</button>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
					
                                <table id="_layer_" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Color</th>
                                            <th>File</th>
                                            <th>Aksi</th>
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
      var layer;

      function delLayer(id){
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
              url: "<?php echo site_url('admin/API/layer/delete')?>",
              dataType: "JSON",
              success: function (data) {
                if (data) {
                  layer.ajax.reload();
                  Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                  });
                } else {
                  layer.ajax.reload();
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
        layer = $("#_layer_").DataTable({
          ajax: {
            url: "<?php echo site_url('admin/API/layer/data')?>",
            type: "POST",
            dataSrc: ""
          },
          "order": [[ 1, 'desc' ]],
          columns: [
            {data: null},
            {data: "layer_nama"},
            {
              data: "layer_warna",
              render: function(data, type, row){
                return "<div style='height: 30px; width: 30px; background-color: "+data+";'></div>";
              }
            },
            {data: "layer_file"},
            {
              data: "layer_id",
              render: function(data, type, row){
                const setDelLayer = '"'+data+'"';
                return "\
                  <a href='<?php echo site_url('admin/layer/edit/')?>"+data+"' data-toggle='tooltip' title='Edit'>\
                      <button type='button' class='btn btn-warning'><i class='fa fa-edit'></i></button>\
                  </a>\
                  <a href='<?php echo base_url('uploads/layer/')?>"+row.layer_file+"' download='"+row.layer_nama+"' data-toggle='tooltip' title='Download'>\
                      <button type='button' class='btn btn-info'><i class='fa fa-download'></i></button>\
                  </a>\
                  <a onclick='delLayer("+setDelLayer+")' data-toggle='tooltip' title='Delete'>\
                      <button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button>\
                  </a>";
              }
            }
          ],
        });

        layer.on( 'order.dt search.dt', function () {
          layer.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
        } ).draw();
      });
    </script>
  </body>
</html>