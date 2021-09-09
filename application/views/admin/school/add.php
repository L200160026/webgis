<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("admin/partials/head") ?>
    <?php $this->load->view("admin/partials/leafletcss") ?>
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
                <h3>Add School</h3>
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
                    <form action="<?php echo base_url('admin/school/add')?>" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_jenjang_">Jenjang
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="_jenjang_" id="_jenjang_"  class="form-control " required>
                            <option selected disabled hidden>Pilih Jenjang</option>
                            <?php foreach ($jenjang_data as $key => $value) { 
                                if ($status != "root") {
                                  if ($jenjang == $value["jenjang_id"]) {
                            ?>
                                    <option value="<?php echo $value["jenjang_id"] ?>" <?php echo  set_select('_jenjang_', $value["jenjang_id"]); ?> ><?php echo $value["jenjang_nama"] ?></option>
                            <?php }
                                } else {
                            ?>
                              <option value="<?php echo $value["jenjang_id"] ?>" <?php echo  set_select('_jenjang_', $value["jenjang_id"]); ?> ><?php echo $value["jenjang_nama"] ?></option>
                            <?php 
                                } 
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_status_">Status
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="_status_" id="_status_" class="form-control " required>
                            <option selected disabled hidden>Pilih Status</option>
                            <option value="negeri" <?php echo  set_select('_status_', 'negeri'); ?>>Negeri</option>
                            <option value="swasta" <?php echo  set_select('_status_', 'swasta'); ?>>Swasta</option>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_npsn_">NPSN
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_npsn_" id="_npsn_" value="<?php echo set_value('_npsn_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_nama_">Nama Sekolah
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_nama_" id="_nama_" value="<?php echo set_value('_nama_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_akreditasi_">Akreditasi
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_akreditasi_" id="_akreditasi_" value="<?php echo set_value('_akreditasi_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_kepala_">Kepala Sekolah
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_kepala_" id="_kepala_" value="<?php echo set_value('_kepala_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_operator_">Operator
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_operator_" id="_operator_" value="<?php echo set_value('_operator_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_kurikulum_">Kurikulum
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_kurikulum_" id="_kurikulum_" value="<?php echo set_value('_kurikulum_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_penyelenggaraan_">Penyelenggaraan
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_penyelenggaraan_" id="_penyelenggaraan_" value="<?php echo set_value('_penyelenggaraan_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_ruangkelas_">Ruang Kelas
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_ruangkelas_" id="_ruangkelas_" value="<?php echo set_value('_ruangkelas_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_laboratorium_">Laboratorium
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_laboratorium_" id="_laboratorium_" value="<?php echo set_value('_laboratorium_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_perpustakaan_">Perpustakaan
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_perpustakaan_" id="_perpustakaan_" value="<?php echo set_value('_perpustakaan_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_sanitasisiswa_">Sanitasi Siswa
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_sanitasisiswa_" id="_sanitasisiswa_" value="<?php echo set_value('_sanitasisiswa_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_internet_">Internet
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="_internet_" id="_internet_" class="form-control " required>
                            <option selected disabled hidden>Pilih Internet</option>
                            <option value="true" <?php echo  set_select('_internet_', 'true'); ?>>YA</option>
                            <option value="false" <?php echo  set_select('_internet_', 'false'); ?>>TIDAK</option>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_listrik_">Listrik
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="_listrik_" id="_listrik_" class="form-control " required>
                            <option selected disabled hidden>Pilih Listrik</option>
                            <option value="true" <?php echo  set_select('_listrik_', 'true'); ?>>YA</option>
                            <option value="false" <?php echo  set_select('_listrik_', 'false'); ?>>TIDAK</option>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_dayalistrik_">Daya Listrik
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_dayalistrik_" id="_dayalistrik_" value="<?php echo set_value('_dayalistrik_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_luastanah_">Luas Tanah
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_luastanah_" id="_luastanah_" value="<?php echo set_value('_luastanah_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_guru_">Guru
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_guru_" id="_guru_" value="<?php echo set_value('_guru_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_siswalk_">Siswa Laki-Laki
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_siswalk_" id="_siswalk_" value="<?php echo set_value('_siswalk_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_siswapr_">Siswa Perempuan
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_siswapr_" id="_siswapr_" value="<?php echo set_value('_siswapr_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_rombonganbelajar_">Rombongan Belajar
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_rombonganbelajar_" id="_rombonganbelajar_" value="<?php echo set_value('_rombonganbelajar_'); ?>" required="required" class="form-control">
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_alamat_">Alamat
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_alamat_" id="_alamat_" value="<?php echo set_value('_alamat_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_rtrw_">RT / RW
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_rtrw_" id="_rtrw_" value="<?php echo set_value('_rtrw_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_dusun_">Dusun
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_dusun_" id="_dusun_" value="<?php echo set_value('_dusun_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_kelurahan_">Kelurahan
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_kelurahan_" id="_kelurahan_" value="<?php echo set_value('_kelurahan_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_kecamatan_">Kecamatan
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_kecamatan_" id="_kecamatan_" value="<?php echo set_value('_kecamatan_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_kabupaten_">Kabupaten
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_kabupaten_" id="_kabupaten_" value="<?php if(set_value('_kabupaten_')!=null){ echo set_value('_kabupaten_'); }else{ echo "Kota Surakarta"; } ?>" required="required" class="form-control" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_provinsi_">Provinsi
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_provinsi_" id="_provinsi_" value="<?php if(set_value('_provinsi_')!=null){ echo set_value('_provinsi_'); }else{ echo "Jawa Tengah"; } ?>" required="required" class="form-control" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_kodepos_">Kode Pos
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_kodepos_" id="_kodepos_" value="<?php echo set_value('_kodepos_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_email_">Email
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_email_" id="_email_" value="<?php echo set_value('_email_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_website_">Website
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_website_" id="_website_" value="<?php echo set_value('_website_'); ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <!-- <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_website_">Foto
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="_files_" name="_files_[]" accept="image/*" multiple>
                            <input type="hidden" id="_checkfile_" name="_checkfile_" value="_files_">
                            <label class="custom-file-label" for="customFile" id="filename" style="overflow: hidden;">Choose file</label>
                          </div>
                        </div>
                      </div> -->

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_lng_">Lokasi
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <div class="col-md-6" style="padding-left:0;">
                            <input type="text" name="_lng_" id="_lng_" value="<?php echo set_value('_lng_'); ?>" required="required" class="form-control" placeholder="longtitude">
                          </div>
                          <div class="col-md-6" style="padding-right:0;">
                            <input type="text" name="_lat_" id="_lat_" value="<?php echo set_value('_lat_'); ?>" required="required" class="form-control" placeholder="latitude">
                          </div>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="mapid"></label>
                        <div class="col-md-6 col-sm-6 ">
                          <div id="mapid" class="map"></div>
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
    <?php $this->load->view("admin/partials/leafletjs") ?>
    <?php $this->load->view("admin/partials/providers") ?>
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
          // console.log(files);
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
          notif["gallery"] = "<?php if(isset($notif["encrypt_id"])) { echo site_url('admin/gallery/add/'.$notif["encrypt_id"]); } ?>";
          Swal.fire({
            icon: 'success',
            title: 'Success...',
            html: notif.message,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Check Data',
            cancelButtonText: 'Cancel',
            footer: '<a href="'+notif.gallery+'" id="add-gallery"><button class="btn btn-info">Add Gallery</button></a>'
          }).then((result) => {
            if (result.value) {
              window.location.replace("<?php echo base_url('admin/school/table') ?>");
            }
          })
        }
      });
    </script>
    <script>
      var maps = L.map('mapid', {
        fullscreenControl: true,
        fullscreenControlOptions: {position: 'topleft'},
        zoomControl: false,
      }).setView([-7.557526, 110.835228], 13);

      var zoomHome = L.Control.zoomHome().addTo(maps);

      L.control.polylineMeasure ({
        position:'topleft', 
        unit:'metres', 
        showBearings:true, 
        clearMeasurementsOnStop: false, 
        showClearControl: true, 
        showUnitControl: true
      }).addTo (maps);
      
      var locate = L.control.locate().addTo(maps);

      var centermap  = [-7.557526, 110.835228];
      var longtitude = $("#_lng_").val();
      var latitude = $("#_lat_").val();
      if(longtitude!="" && latitude!=""){
        centermap = [latitude, longtitude];
      }

      var marker = new L.marker(centermap, {draggable: 'true'}).addTo(maps);
      marker.bindPopup("Pilih Lokasi Sekolah").openPopup();

      marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        $("#_lng_").val(position.lng);
        $("#_lat_").val(position.lat);
        marker.bindPopup("Pilih Lokasi Sekolah").openPopup();
      });



      var basemaps = {
        "Google Streets": providers["googleStreets"].addTo(maps),
        "Google Hybrid": providers["googleHybrid"],
        "Google Satellite": providers["googleSat"],
        "Google Terrain": providers["googleTerrain"],
        "OSM": providers["OSM"],
        "OSM BW": providers["OSM BW"],
        "OSM DE": providers["OSM DE"],
        "TONER": providers["TONER"],
        "POSITRON": providers["POSITRON"],
      };
      var overlayer = {};
      L.control.layers(basemaps, overlayer).addTo(maps);

    </script>
  </body>
</html>