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
                <h3>School Table</h3>
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
                            <a href="<?php echo site_url('admin/school/add') ?>">
                              <button type="button" class="btn btn-info"><i class="fa fa-plus-square"></i> Add School</button>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
					
                                <table id="_school_" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenjang</th>
                                            <th>Status</th>
                                            <th>NPSN</th>
                                            <th>Nama Sekolah</th>
                                            <th>Akreditasi</th>
                                            <th>Kurikulum</th>
                                            <th>Aksi</th>
                                            <th>Kepala Sekolah</th>
                                            <th>Operator</th>
                                            <th>Penyelenggaraan</th>
                                            <th>Ruang Kelas</th>
                                            <th>Laboratorium</th>
                                            <th>Perpustakaan</th>
                                            <th>Sanitasi Siswa</th>
                                            <th>Internet</th>
                                            <th>Listrik</th>
                                            <th>Daya Listrik</th>
                                            <th>Luas Tanah</th>
                                            <th>Guru</th>
                                            <th>Siswa Laki-Laki</th>
                                            <th>Siswa Perempuan</th>
                                            <th>Rombongan Belajar</th>
                                            <th>Alamat</th>
                                            <th>RT / RW</th>
                                            <th>Dusun</th>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>Kode Pos</th>
                                            <th>Email</th>
                                            <th>Website</th>
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
      var school;

      function delSchool(id){
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
              url: "<?php echo site_url('admin/API/school/delete')?>",
              dataType: "JSON",
              success: function (data) {
                if (data) {
                  school.ajax.reload();
                  Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                  });
                } else {
                  school.ajax.reload();
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
        school = $("#_school_").DataTable({
          ajax: {
            url: "<?php echo site_url('admin/API/school/data')?>",
            type: "POST",
            dataSrc: ""
          },
          "order": [[ 1, 'desc' ]],
          columns: [
            {data: null},
            {data: "sekolah_jenjang"},
            {data: "sekolah_status"},
            {data: "sekolah_npsn"},
            {data: "sekolah_nama"},
            {data: "sekolah_akreditasi"},
            {data: "sekolah_kurikulum"},
            {
              data: "sekolah_id",
              render: function(data, type, row){
                const setDelSchool = '"'+data+'"';
                return "\
                  <a href='<?php echo site_url('admin/gallery/table/')?>"+data+"' data-toggle='tooltip' title='Gallery'>\
                      <button type='button' class='btn btn-info'><i class='fa fa-file-image-o'></i></button>\
                  </a>\
                  <a href='<?php echo site_url('admin/school/edit/')?>"+data+"' data-toggle='tooltip' title='Edit'>\
                      <button type='button' class='btn btn-warning'><i class='fa fa-edit'></i></button>\
                  </a>\
                  <a onclick='delSchool("+setDelSchool+")' data-toggle='tooltip' title='Delete'>\
                      <button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button>\
                  </a>";
              }
            },
            {data: "sekolah_kepala"},
            {data: "sekolah_operator"},
            {data: "sekolah_penyelenggaraan"},
            {data: "sekolah_ruangkelas"},
            {data: "sekolah_laboratorium"},
            {data: "sekolah_perpustakaan"},
            {data: "sekolah_sanitasisiswa"},
            {data: "sekolah_internet"},
            {data: "sekolah_listrik"},
            {data: "sekolah_dayalistrik"},
            {data: "sekolah_luastanah"},
            {data: "sekolah_guru"},
            {data: "sekolah_siswalk"},
            {data: "sekolah_siswapr"},
            {data: "sekolah_rombonganbelajar"},
            {data: "sekolah_alamat"},
            {data: "sekolah_rtrw"},
            {data: "sekolah_dusun"},
            {data: "sekolah_kelurahan"},
            {data: "sekolah_kecamatan"},
            {data: "sekolah_kodepos"},
            {data: "sekolah_email"},
            {data: "sekolah_website"},
            
          ],
        });

        school.on( 'order.dt search.dt', function () {
          school.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
        } ).draw();
      });
    </script>
  </body>
</html>