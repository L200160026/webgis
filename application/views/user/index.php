<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("user/partials/head") ?>
  <?php $this->load->view("admin/partials/leafletcss") ?>
</head>
<body>

<div class="wrapper-main">

  <?php $this->load->view("user/partials/navigation") ?>

  <header class="slider-main">
    
      <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
              <!-- Slide One - Set the background image for this slide in the line below -->
              <div class="carousel-item active" style="background-image: url('<?php echo base_url('assets/zonebiz/images/home-bg4.png')?>'); background-repeat:no-repeat; background-size:100%; background-position:center;">
                <!-- <img class="img-fluid" src="<?php //echo base_url('assets/zonebiz/images/home-bg7.png')?>" alt=""> -->
                <div class="carousel-caption ">
                    <p><a href="#carisekolah"><button type="button" class="btn btn-primary btn-lg">CARI SEKOLAH</button></a></p>
                </div>
              </div>
          </div>
      </div>
  </header>


  <div class="services-bar" id="carisekolah">
    <div class="container">
      <h1 class="py-4">Peta Sebaran Sekolah </h1>
      <!-- Services Section -->
      <div class="row">

        <div class="col-lg-12 mb-12">
          <div class="card h-100">
            <div class="card-img">
              <div id="mapid" class="map"></div>
            </div>
            <div class="card-body">
              <h4 class="card-header"> Sekolah Mana Yang Ingin Anda Ketahui? </h4>
              <div class="item form-group" id="_option_">
                <div class='row' style='margin-bottom: 10px; display: none;' id='_checkradius_'>
                  <div class='col-md-10'>
                    <input type='text' name='_radius_' id='_radius_' class='form-control' placeholder='Radius (Meter)'>
                  </div>
                  <div class='col-md-2 col-sm-2 '>
                    <button type='submit' id='_setradius_' class='btn btn-info btn-block'><i class='fa fa-map-marker-alt'></i> RADIUS</button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 ">
                    <select name="_level_" id="_level_"  class="form-control ">
                      <option value="all" selected disabled hidden>Pilih Jenjang</option>
                      <option value="all">Pilih Semua</option>
                      <?php foreach ($jenjang_data as $key => $value) { ?>
                        <option value="<?php echo $value["jenjang_id"] ?>" <?php echo  set_select('_level_', $value["jenjang_id"]); ?> ><?php echo $value["jenjang_nama"] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-2 col-sm-2 ">
                    <select name="_status_" id="_status_"  class="form-control ">
                      <option value="all" selected disabled hidden>Pilih Status</option>
                      <option value="all">Pilih Semua</option>
                      <option value="negeri">Negeri</option>
                      <option value="swasta">Swasta</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 ">
                    <input type="text" name="_name_" id="_name_" class="form-control" placeholder="Nama Sekolah (1 Kata)">
                  </div>
                  <div class="col-md-2 col-sm-2 ">
                    <button type="submit" id="_search_" class="btn btn-info btn-block"><i class="fa fa-search"></i> CARI</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
  </div>


  <!-- Contact Us -->
  <div class="touch-line" style="padding:0px;">
  </div>

  <?php $this->load->view("user/partials/footer") ?>
</div>
	  
<?php $this->load->view("user/partials/javascript") ?>
<?php $this->load->view("admin/partials/leafletjs") ?>
<?php $this->load->view("admin/partials/providers") ?>

<script>
  var level = "all";
  var status = "all";
  var name = "";
  var URL = "<?php echo site_url('API/school/geojson'); ?>";

  $(document).ready(function(){
    $("#_level_").on("change select load ready", function(){
      level = $(this).val();
      URL = "<?php echo site_url('API/school/geojson/'); ?>"+level+"/"+status+"/"+name;
    });
    $("#_status_").on("change select load ready", function(){
      status = $(this).val();
      URL = "<?php echo site_url('API/school/geojson/'); ?>"+level+"/"+status+"/"+name;
    });
    $("#_name_").on("change keyup", function(){
      name = $(this).val();
      URL = "<?php echo site_url('API/school/geojson/'); ?>"+level+"/"+status+"/"+name;
    });


    $("a.leaflet-bar-part.leaflet-bar-part-single").on("click", function(){
      if (locate._active == false && $("#_checkradius_").length) {
        locate.options.circleRadius = 5;
        // $("#_checkradius_").remove();
        $("#_radius_").val("");
        $("#_checkradius_").slideUp("slow");
      }

      $(window).click(function() {
        if (locate._active == false && $("#_checkradius_").length) {
          locate.options.circleRadius = 5;
          // $("#_checkradius_").remove();
          $("#_radius_").val("");
          $("#_checkradius_").slideUp("slow");
        }
      });
    });
  });



  var maps = L.map('mapid', {
    fullscreenControl: true,
    fullscreenControlOptions: {position: 'topleft'},
    zoomControl: false,
    measureControl: true,
  }).setView([-7.556202,110.823247], 13);

  var zoomHome = L.Control.zoomHome().addTo(maps);

  L.control.polylineMeasure ({
    position:'topleft', 
    unit:'metres', 
    showBearings:true, 
    clearMeasurementsOnStop: false, 
    showClearControl: true, 
    showUnitControl: true
  }).addTo (maps);

  
  var locate = L.control.locate({
    icon : "fa fa-map-marker-alt",
    flyTo : true,
    cacheLocation : false,
  }).addTo(maps);

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
  
  var inputradius = "<div class='row' style='margin-bottom: 10px;' id='_checkradius_'>\
                    <div class='col-md-10'>\
                      <input type='text' name='_radius_' id='_radius_' class='form-control' placeholder='Radius (Meter)'>\
                    </div>\
                    <div class='col-md-2 col-sm-2 '>\
                      <button type='submit' id='_setradius_' class='btn btn-info btn-block'><i class='fa fa-map-marker-alt'></i> RADIUS</button>\
                    </div>\
                  </div>";
      

  maps.on('zoomstart', function() {
    // if (!$("#_checkradius_").length && locate._active == true) {
    //   $("#_option_").prepend(inputradius);
    // }

    if (locate._active == true) {
      $("#_checkradius_").slideDown("slow");
    }

    $("#_setradius_").on("click", function(){
      var radius = $("#_radius_").val();
      if (radius != "") {
        if ($.isNumeric(radius)) {
          locate.options.circleRadius = radius;
          locate._updateContainerStyle();
          locate._drawMarker();
        } else {
          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            html: 'Input harus angka!'
          });
        }
      } else {
        Swal.fire({
          icon: 'warning',
          title: 'Oops...',
          html: 'Input tidak boleh kosong!'
        });
      }
    });
  });

  
  

  var style = {};

  function popupLayer(e) {
    var popup = L.popup();
    popup
    .setLatLng(e.latlng)
    .setContent(e.sourceTarget.feature.properties.NAMA)
    .openOn(maps);
    // return popup;
  }

  function highlightFeature(e) {
    let highlight = { fillOpacity: 0.4, weight: 3}
    e.target.setStyle(highlight);
    popupLayer(e);
  };
  function resetHighlight(e) {
    let LayerName = e.target.options.LayerName
    e.target.setStyle(style[LayerName]);
    maps.closePopup();
  };
  function onEachFeature(feature, layer) {
    layer.on({
      mouseover: highlightFeature,
      mouseout: resetHighlight,
      click: highlightFeature,
    })
  };

  $.ajax({
    type: "POST",
    url: "<?php echo site_url('API/layer/data')?>",
    dataType: "JSON",
    success: function (data) {
      if (data) {
        let baseURL = "<?php echo base_url('uploads/layer/') ?>";
        for (let i = 0; i < data.length; i++) {
          style[data[i].layer_nama] = {
            fillColor: data[i].layer_warna, 
            fillOpacity: 0.15,
            color: data[i].layer_warna,
            weight: 1.5, 
            LayerName: data[i].layer_nama
          };
          overlayer[data[i].layer_nama] = L.geoJson.ajax(baseURL+data[i].layer_file, {onEachFeature : onEachFeature,style:style[data[i].layer_nama]});
        }
        // console.log(data);
      } else {
        console.log("Data Tidak Ada");
      }
    }
  });


  function iconSchool(feature) {
    if (feature.properties.STATUS == "swasta") {
      return L.icon({
        iconUrl: '<?php echo base_url("assets/images/marker/marker-icon-2x-red.png") ?>',
        shadowUrl: '<?php echo base_url("assets/images/marker/marker-shadow.png") ?>',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      });
    } else if (feature.properties.STATUS == "negeri") {
      return L.icon({
        iconUrl: '<?php echo base_url("assets/images/marker/marker-icon-2x-blue.png") ?>',
        shadowUrl: '<?php echo base_url("assets/images/marker/marker-shadow.png") ?>',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      });
    }
  }

  function popupSchool(e) {
    var popup = L.popup();
    var school = e.sourceTarget.feature.properties;
    var content = "<table style='text-align:center'>\
                      <tr>\
                        <td><a href='<?php echo site_url('profil/')?>"+school.ID+"' target='_blank'>"+school.NAMA+"</a></td>\
                      </tr>\
                    </table>";
    popup
    .setLatLng(e.latlng)
    .setContent(content)
    .openOn(maps);
  }

  function onEachFeatureSchool(feature, layer) {
    layer.on({
      click: popupSchool
    })
  };

  var school = L.geoJson.ajax(URL,{
    onEachFeature : onEachFeatureSchool,
    pointToLayer: function (feature, latlng) {
      return L.marker(latlng, {
        icon: iconSchool(feature)
      });
    }
  }).addTo(maps);
  overlayer["Sekolah"] = school;

  $("#_search_").on("click", function(){
    // school.refresh(URL);
    L.Util.ajax(URL).then(function (data) {
      // console.log(data);
      if (data.features.length > 0) {
        school.clearLayers();
        school.addData(data);
      } else {
        Swal.fire({
          icon: 'warning',
          title: 'Oops...',
          html: 'Data tidak ditemukan!'
        })
      }
    });
  });

  var legend = L.control({position: 'bottomleft'});
  legend.onAdd = function (map) {
      var div = L.DomUtil.create('div', 'info legend'),
          grades = ["Negeri", "Swasta"],
          labels = ["#0356fc", "#fc0303"];

      // loop through our density intervals and generate a label with a colored square for each interval
      for (var i = 0; i < grades.length; i++) {
        div.innerHTML += "<div style='display:inline-block;'><i style='background: "+labels[i]+";'></i><b>" + grades[i] + "</b></div><br>";
      }

      return div;
  };
  legend.addTo(maps);

  $( document ).ajaxComplete(function() {
    // console.log(overlayer);
    L.control.layers(basemaps, overlayer).addTo(maps);
  });

</script>

</body>
</html>