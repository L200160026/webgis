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
                <h3>Maps Page</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Maps<small>SURAKARTA</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                      <div id="mapid" class="map"></div>
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
    <?php $this->load->view("admin/partials/leafletjs") ?>
    <?php $this->load->view("admin/partials/providers") ?>

    <script>
      var maps = L.map('mapid', {
        fullscreenControl: true,
        fullscreenControlOptions: {position: 'topleft'},
        zoomControl: false,
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

      var locate = L.control.locate().addTo(maps);

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
      

      

      var style = {};

      function highlightFeature(e) {
        let highlight = { fillOpacity: 0.4, weight: 3}
        e.target.setStyle(highlight);
      };
      function resetHighlight(e) {
        let LayerName = e.target.options.LayerName
        e.target.setStyle(style[LayerName]);
      };
      function onEachFeature(feature, layer) {
        layer.on({
          mouseover: highlightFeature,
          mouseout: resetHighlight,
        })
      };

      $.ajax({
        type: "POST",
        url: "<?php echo site_url('admin/API/layer/data')?>",
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
        var content = "<p><a href='<?php echo site_url('profil/')?>"+school.ID+"' target='_blank'>"+school.NAMA+"</a></p>";
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

      var school = L.geoJson.ajax("<?php echo site_url('admin/API/school/geojson'); ?>",{
        onEachFeature : onEachFeatureSchool,
        pointToLayer: function (feature, latlng) {
          return L.marker(latlng, {
            icon: iconSchool(feature)
          });
        }
      }).addTo(maps);
      overlayer["Sekolah"] = school;

      var legend = L.control({position: 'bottomleft'});
      legend.onAdd = function (map) {
          var div = L.DomUtil.create('div', 'info legend'),
              grades = ["Negeri", "Swasta"],
              labels = ["#0356fc", "#fc0303"];

          // loop through our density intervals and generate a label with a colored square for each interval
          for (var i = 0; i < grades.length; i++) {
            div.innerHTML += "<i style='background: "+labels[i]+";'></i><b>" + grades[i] + "</b><br>";
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