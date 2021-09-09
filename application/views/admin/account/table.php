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
                <h3>Account Table</h3>
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
                            <a href="<?php echo site_url('admin/account/add') ?>">
                                <button type="button" class="btn btn-info"><i class="fa fa-plus-square"></i> Add Account</button>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
					
                                <table id="_account_" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Level</th>
                                            <th>IsActive</th>
                                            <th>CreatAt</th>
                                            <th>ModifyAt</th>
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
      var account;
      function setSwitch(id,isactive){
        $.ajax({
          type: "POST",
          data: { id: id, isactive: isactive },
          url: "<?php echo site_url('admin/API/account/update')?>",
          dataType: "JSON",
          success: function (data) {
            if (data) {
              account.ajax.reload();
              Swal.fire({
                icon: 'success',
                title: 'Success...',
                text: 'Success update data!',
              });
            } else {
              account.ajax.reload();
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
              })
            }
          }
        });
      }

      function delUser(id){
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
              url: "<?php echo site_url('admin/API/account/delete')?>",
              dataType: "JSON",
              success: function (data) {
                if (data) {
                  account.ajax.reload();
                  Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                  });
                } else {
                  account.ajax.reload();
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
        account = $("#_account_").DataTable({
          ajax: {
            url: "<?php echo site_url('admin/API/account/data')?>",
            type: "POST",
            dataSrc: ""
          },
          "order": [[ 1, 'desc' ]],
          columns: [
            {data: null},
            {data: "akun_name"},
            {data: "akun_username"},
            {data: "akun_status"},
            // {
            //   data: "akun_image",
            //   render: function(data, type, row){
            //     return "<img src='"+"<?php //echo base_url('uploads/account/') ?>"+data+"' class='.img-thumbnail' height='50px' width='50px'  alt='Imgae'>"
            //   }
            // },
            {data: "akun_jenjang"},
            {
              data: "akun_isactive",
              render: function(data, type, row){
                const setSwitch = '"'+row.akun_id+'",'+data;
                return "\
                  <label>\
                      <input type='checkbox' class='js-switch' onclick='setSwitch("+setSwitch+")' />\
                  </label>";
              }
            },
            {data: "akun_createat"},
            {data: "akun_modifyat"},
            {
              data: "akun_id",
              render: function(data, type, row){
                const setDelUser = '"'+data+'"';
                return "\
                  <a href='<?php echo site_url('admin/account/edit/')?>"+data+"' data-toggle='tooltip' title='Edit'>\
                      <button type='button' class='btn btn-warning'><i class='fa fa-edit'></i></button>\
                  </a>\
                  <a onclick='delUser("+setDelUser+")' data-toggle='tooltip' title='Delete'>\
                      <button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button>\
                  </a>";
              }
            }
          ],
          "createdRow": function (row, data, index) {
            var elems = Array.prototype.slice.call($(row).find('.js-switch'));
            elems.forEach(function (html) {
              var switchery = new Switchery(html);
              var check = false;
              if (data.akun_isactive == "true") {
                var check = true;
                $(switchery.switcher.children).css("left","20px");
              }
              switchery.setPosition(check);
                
            });
          }
        });

        account.on( 'order.dt search.dt', function () {
          account.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
        } ).draw();
      });
    </script>
  </body>
</html>