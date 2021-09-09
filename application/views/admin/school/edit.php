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
                <h3>Edit School</h3>
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
                    <form action="<?php echo base_url('admin/school/edit/'.$encrypt_id)?>" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_jenjang_">Jenjang
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="_jenjang_" id="_jenjang_"  class="form-control " required>
                            <option selected disabled hidden>Pilih Jenjang</option>
                              <?php foreach ($jenjang_data as $key => $value) { 
                                if ($status != "root") {
                                  if ($jenjang == $value["jenjang_id"] && $school["sekolah_jenjang"]==$value["jenjang_id"]) {
                              ?>
                                    <option value="<?php echo $value["jenjang_id"] ?>" <?php echo  set_select('_level_', $value["jenjang_id"]); ?> selected><?php echo $value["jenjang_nama"] ?></option>
                              <?php
                                  }
                                } else {
                                  if ($school["sekolah_jenjang"]==$value["jenjang_id"]) {
                              ?>
                                    <option value="<?php echo $value["jenjang_id"] ?>" <?php echo  set_select('_level_', $value["jenjang_id"]); ?> selected><?php echo $value["jenjang_nama"] ?></option>
                              <?php
                                  } else {
                              ?>
                                    <option value="<?php echo $value["jenjang_id"] ?>" <?php echo  set_select('_level_', $value["jenjang_id"]); ?> ><?php echo $value["jenjang_nama"] ?></option>
                              <?php
                                  }
                                }

                              }?>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_status_">Status
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="_status_" id="_status_" class="form-control " required>
                            <option selected disabled hidden>Pilih Status</option>
                            <option value="negeri" <?php if(set_select('_status_', 'negeri')){ echo set_select('_status_', 'negeri'); }else{ if($school["sekolah_status"]=="negeri"){ echo "selected"; }} ?>>Negeri</option>
                            <option value="swasta" <?php if(set_select('_status_', 'swasta')){ echo set_select('_status_', 'swasta'); }else{ if($school["sekolah_status"]=="swasta"){ echo "selected"; }} ?>>Swasta</option>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_npsn_">NPSN
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <div class="col-md-11 col-sm-11 " style="padding:0;">
                            <input type="hidden" name="_oldnpsn_" value="<?php echo $school['sekolah_npsn']; ?>">
                            <input type="number" name="_npsn_" id="_npsn_" value="<?php if(set_value('_npsn_')!=null){ echo set_value('_npsn_'); }else{ echo $school['sekolah_npsn']; } ?>" required="required" class="form-control" <?php if (set_value('_npsn_') == null) { echo "disabled";}?>>
                          </div>
                          <div class="col-md-1 col-sm-1 " style="text-align: center; vertical-align: middle; padding-top: 10px;">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="_setnpsn_" id="_setnpsn_" class="flat">
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_nama_">Nama Sekolah
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_nama_" id="_nama_" value="<?php if(set_value('_nama_')!=null){ echo set_value('_nama_'); }else{ echo $school['sekolah_nama']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_akreditasi_">Akreditasi
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_akreditasi_" id="_akreditasi_" value="<?php if(set_value('_akreditasi_')!=null){ echo set_value('_akreditasi_'); }else{ echo $school['sekolah_akreditasi']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_kepala_">Kepala Sekolah
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_kepala_" id="_kepala_" value="<?php if(set_value('_kepala_')!=null){ echo set_value('_kepala_'); }else{ echo $school['sekolah_kepala']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_operator_">Operator
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_operator_" id="_operator_" value="<?php if(set_value('_operator_')!=null){ echo set_value('_operator_'); }else{ echo $school['sekolah_operator']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_kurikulum_">Kurikulum
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_kurikulum_" id="_kurikulum_" value="<?php if(set_value('_kurikulum_')!=null){ echo set_value('_kurikulum_'); }else{ echo $school['sekolah_kurikulum']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_penyelenggaraan_">Penyelenggaraan
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_penyelenggaraan_" id="_penyelenggaraan_" value="<?php if(set_value('_penyelenggaraan_')!=null){ echo set_value('_penyelenggaraan_'); }else{ echo $school['sekolah_penyelenggaraan']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_ruangkelas_">Ruang Kelas
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_ruangkelas_" id="_ruangkelas_" value="<?php if(set_value('_ruangkelas_')!=null){ echo set_value('_ruangkelas_'); }else{ echo $school['sekolah_ruangkelas']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_laboratorium_">Laboratorium
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_laboratorium_" id="_laboratorium_" value="<?php if(set_value('_laboratorium_')!=null){ echo set_value('_laboratorium_'); }else{ echo $school['sekolah_laboratorium']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_perpustakaan_">Perpustakaan
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_perpustakaan_" id="_perpustakaan_" value="<?php if(set_value('_perpustakaan_')!=null){ echo set_value('_perpustakaan_'); }else{ echo $school['sekolah_perpustakaan']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_sanitasisiswa_">Sanitasi Siswa
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_sanitasisiswa_" id="_sanitasisiswa_" value="<?php if(set_value('_sanitasisiswa_')!=null){ echo set_value('_sanitasisiswa_'); }else{ echo $school['sekolah_sanitasisiswa']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_internet_">Internet
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="_internet_" id="_internet_" class="form-control " required>
                            <option selected disabled hidden>Pilih Internet</option>
                            <option value="true" <?php if(set_select('_internet_', 'true')){ echo set_select('_internet_', 'true'); }else{ if($school['sekolah_internet']=='true'){ echo 'selected'; }} ?>>YA</option>
                            <option value="false" <?php if(set_select('_internet_', 'false')){ echo set_select('_internet_', 'false'); }else{ if($school['sekolah_internet']=="false"){ echo "selected"; }} ?>>TIDAK</option>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_listrik_">Listrik
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="_listrik_" id="_listrik_" class="form-control " required>
                            <option selected disabled hidden>Pilih Listrik</option>
                            <option value="true" <?php if(set_select('_listrik_', 'true')){ echo set_select('_listrik_', 'true'); }else{ if($school['sekolah_listrik']=='true'){ echo 'selected'; }} ?>>YA</option>
                            <option value="false" <?php if(set_select('_listrik_', 'false')){ echo set_select('_listrik_', 'false'); }else{ if($school['sekolah_listrik']=="false"){ echo "selected"; }} ?>>TIDAK</option>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_dayalistrik_">Daya Listrik
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_dayalistrik_" id="_dayalistrik_" value="<?php if(set_value('_dayalistrik_')!=null){ echo set_value('_dayalistrik_'); }else{ echo $school['sekolah_dayalistrik']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_luastanah_">Luas Tanah
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_luastanah_" id="_luastanah_" value="<?php if(set_value('_luastanah_')!=null){ echo set_value('_luastanah_'); }else{ echo $school['sekolah_luastanah']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_guru_">Guru
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_guru_" id="_guru_" value="<?php if(set_value('_guru_')!=null){ echo set_value('_guru_'); }else{ echo $school['sekolah_guru']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_siswalk_">Siswa Laki-Laki
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_siswalk_" id="_siswalk_" value="<?php if(set_value('_siswalk_')!=null){ echo set_value('_siswalk_'); }else{ echo $school['sekolah_siswalk']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_siswapr_">Siswa Perempuan
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_siswapr_" id="_siswapr_" value="<?php if(set_value('_siswapr_')!=null){ echo set_value('_siswapr_'); }else{ echo $school['sekolah_siswapr']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_rombonganbelajar_">Rombongan Belajar
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_rombonganbelajar_" id="_rombonganbelajar_" value="<?php if(set_value('_rombonganbelajar_')!=null){ echo set_value('_rombonganbelajar_'); }else{ echo $school['sekolah_rombonganbelajar']; } ?>" required="required" class="form-control">
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_alamat_">Alamat
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_alamat_" id="_alamat_" value="<?php if(set_value('_alamat_')!=null){ echo set_value('_alamat_'); }else{ echo $school['sekolah_alamat']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_rtrw_">RT / RW
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_rtrw_" id="_rtrw_" value="<?php if(set_value('_rtrw_')!=null){ echo set_value('_rtrw_'); }else{ echo $school['sekolah_rtrw']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_dusun_">Dusun
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_dusun_" id="_dusun_" value="<?php if(set_value('_dusun_')!=null){ echo set_value('_dusun_'); }else{ echo $school['sekolah_dusun']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_kelurahan_">Kelurahan
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_kelurahan_" id="_kelurahan_" value="<?php if(set_value('_kelurahan_')!=null){ echo set_value('_kelurahan_'); }else{ echo $school['sekolah_kelurahan']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_kecamatan_">Kecamatan
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_kecamatan_" id="_kecamatan_" value="<?php if(set_value('_kecamatan_')!=null){ echo set_value('_kecamatan_'); }else{ echo $school['sekolah_kecamatan']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_kabupaten_">Kabupaten
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_kabupaten_" id="_kabupaten_" value="<?php if(set_value('_kabupaten_')!=null){ echo set_value('_kabupaten_'); }else{ echo $school['sekolah_kabupaten']; } ?>" required="required" class="form-control" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_provinsi_">Provinsi
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_provinsi_" id="_provinsi_" value="<?php if(set_value('_provinsi_')!=null){ echo set_value('_provinsi_'); }else{ echo $school['sekolah_provinsi']; } ?>" required="required" class="form-control" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_kodepos_">Kode Pos
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" name="_kodepos_" id="_kodepos_" value="<?php if(set_value('_kodepos_')!=null){ echo set_value('_kodepos_'); }else{ echo $school['sekolah_kodepos']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_email_">Email
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_email_" id="_email_" value="<?php if(set_value('_email_')!=null){ echo set_value('_email_'); }else{ echo $school['sekolah_email']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_website_">Website
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="_website_" id="_website_" value="<?php if(set_value('_website_')!=null){ echo set_value('_website_'); }else{ echo $school['sekolah_website']; } ?>" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="_lng_">Lokasi
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <div class="col-md-6" style="padding-left:0;">
                            <input type="text" name="_lng_" id="_lng_" value="<?php if(set_value('_lng_')!=null){ echo set_value('_lng_'); }else{ echo $school['sekolah_lokasi']['coordinates'][0]; } ?>" required="required" class="form-control" placeholder="longtitude">
                          </div>
                          <div class="col-md-6" style="padding-right:0;">
                            <input type="text" name="_lat_" id="_lat_" value="<?php if(set_value('_lat_')!=null){ echo set_value('_lat_'); }else{ echo $school['sekolah_lokasi']['coordinates'][1]; } ?>" required="required" class="form-control" placeholder="latitude">
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
        $("#_setnpsn_").on( "ifChecked", function(){
          $( "input[name='_npsn_']" ).prop( "disabled", false );
        });

        $("#_setnpsn_").on( "ifUnchecked", function(){
          $( "input[name='_npsn_']" ).prop( "disabled", true );
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
              window.location.replace("<?php echo base_url('admin/school/table') ?>");
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
    <script>

      var centermap  = [-7.557526, 110.835228];
      var longtitude = $("#_lng_").val();
      var latitude = $("#_lat_").val();
      if(longtitude!="" && latitude!=""){
        centermap = [latitude, longtitude];
      }

      var maps = L.map('mapid', {
        fullscreenControl: true,
        fullscreenControlOptions: {position: 'topleft'},
        zoomControl: false,
      }).setView(centermap, 13);

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