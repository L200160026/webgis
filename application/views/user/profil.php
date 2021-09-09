<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("user/partials/head") ?>
  <?php $this->load->view("admin/partials/leafletcss") ?>
  <style>
    .btn-success {
        background-color: #0594a9;
        color: #FFF;
        border-color: #0594a9 ;
        border-radius: 25px;
    }
    .btn-success:hover,
    .btn-success:focus,
    .btn-success:active    {
        background-color: #046371 ;
        color: #FFF;
        border-color: #077282 ;
    }
  </style>
</head>
<body>
<div class="wrapper-main">

  <?php $this->load->view("user/partials/navigation") ?>

	<!-- full Title -->
	<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"><?php echo strtoupper($school["sekolah_nama"]) ?></h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a><?php echo $school["sekolah_npsn"] ?></a>
					</li>
					<li class="breadcrumb-item">
            <a><?php echo strtoupper($school["sekolah_status"]) ?></a>
          </li>
				</ol>
			</div>
		</div>
	</div>

	<div class="services-bar">
  <div class="blog-main">
		<div class="container">
			<div class="row">
				<!-- Blog Entries Column -->
				<div class="col-md-8 blog-entries">
					<!-- Blog Post -->
					<div class="card mb-4">
            <div class="card-img-top">
              <div id="mapid" class="map"></div>
            </div>
						
						<div class="card-body">
							<!-- <div class="by-post">
								Posted on January 1, 2018 by <a href="#">Zonebiz</a>
							</div>
							<h2 class="card-title">How to run successful business meeting</h2> -->
							<div class="row">
                <div class="col-md-6" style="border-right: 2px solid;">
                  <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-user-tie"></i></span> Guru : <?php echo $school["sekolah_guru"] ?></li>
                    <li><span class="fa-li"><i class="fa fa-user"></i></span> Siswa Laki-Laki : <?php echo $school["sekolah_siswalk"] ?></li>
                    <li><span class="fa-li"><i class="fa fa-user"></i></span> Siswa Perempuan : <?php echo $school["sekolah_siswapr"] ?></li>
                    <li><span class="fa-li"><i class="fa fa-users"></i></span> Rombongan Belajar : <?php echo $school["sekolah_rombonganbelajar"] ?></li>
                    <li><span class="fa-li"><i class="fa fa-graduation-cap"></i></span> Kurikulum : <?php echo $school["sekolah_kurikulum"] ?></li>
                    <li><span class="fa-li"><i class="fa fa-clock"></i></span> Penyelenggaraan : <?php echo $school["sekolah_penyelenggaraan"] ?></li>
                    <li><span class="fa-li"><i class="fa fa-wifi"></i></span> Akses Internet : <?php if($school["sekolah_internet"]=="true"){ echo "<i class='fa fa-check-square'></i>"; } else { echo "<i class='fa fa-window-close'></i>"; } ?></li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-charging-station"></i></span> Sumber Listrik : <?php if($school["sekolah_listrik"]=="true"){ echo "<i class='fa fa-check-square'></i>"; } else { echo "<i class='fa fa-window-close'></i>"; } ?></li>
                    <li><span class="fa-li"><i class="fa fa-bolt"></i></span> Daya Listrik : <?php echo $school["sekolah_dayalistrik"] ?></li>
                    <li><span class="fa-li"><i class="fa fa-th-large"></i></span> Luas Tanah : <?php echo $school["sekolah_luastanah"] ?> M²</li>
                    <li><span class="fa-li"><i class="fa fa-square"></i></span> Ruang Kelas : <?php echo $school["sekolah_ruangkelas"] ?></li>
                    <li><span class="fa-li"><i class="fa fa-microscope"></i></span> Laboratorium : <?php echo $school["sekolah_laboratorium"] ?></li>
                    <li><span class="fa-li"><i class="fa fa-book"></i></span> Perpustakaan : <?php echo $school["sekolah_perpustakaan"] ?></li>
                    <li><span class="fa-li"><i class="fa fa-door-closed"></i></span> Sanitasi Siswa : <?php echo $school["sekolah_sanitasisiswa"] ?></li>
                  </ul>
                </div>
              </div>

                <!-- <div class="d-flex justify-content-center" style="margin-top:10px;">
                  <a href="https://referensi.data.kemdikbud.go.id/tabs.php?npsn=<?php //echo $school["sekolah_npsn"] ?>" target="_blank">
                    <button class="btn btn-success" >Data Referensi</button>
                  </a>
                </div> -->
						</div>
					</div>

        </div>
        
				<!-- Sidebar Widgets Column -->
				<div class="col-md-4 blog-right-side">
					<div class="card mb-4">
						<h5 class="card-header">Detail Sekolah</h5>
            <ul class="list-group list-group-flush fa-ul">
              <li class="list-group-item" style="padding-left: 0px;"><span class="fa-li"><i class="fa fa-award"></i></span>Akreditasi : <?php echo $school["sekolah_akreditasi"] ?></li> 
              <li class="list-group-item" style="padding-left: 0px;"><span class="fa-li"><i class="fa fa-user-graduate"></i></span>Kepala Sekolah : <?php echo $school["sekolah_kepala"] ?></li>
              <li class="list-group-item" style="padding-left: 0px;"><span class="fa-li"><i class="fa fa-user-shield"></i></span>Operator : <?php echo $school["sekolah_operator"] ?></li>
              <li class="list-group-item" style="padding-left: 0px;"><span class="fa-li"><i class="fa fa-envelope"></i></span>Email : <?php echo $school["sekolah_email"] ?></li>
              <li class="list-group-item" style="padding-left: 0px;"><span class="fa-li"><i class="fa fa-link"></i></span>Website : <?php echo $school["sekolah_website"] ?></li>
            </ul>
          </div>
          
					<!-- Side Widget -->
					<div class="card my-4">
						<h5 class="card-header">Alamat</h5>
						<ul class="list-group list-group-flush fa-ul">
              <li class="list-group-item" style="padding-left: 0px;"><span class="fa-li"><i class="fa fa-map-marker-alt"></i></span>Alamat : <?php echo $school["sekolah_alamat"] ?></li> 
              <li class="list-group-item" style="padding-left: 0px;"><span class="fa-li"><i class="fa fa-map-marker-alt"></i></span>RT / RW : <?php echo $school["sekolah_rtrw"] ?></li>
              <li class="list-group-item" style="padding-left: 0px;"><span class="fa-li"><i class="fa fa-map-marker-alt"></i></span>Dusun : <?php echo $school["sekolah_dusun"] ?></li>
              <li class="list-group-item" style="padding-left: 0px;"><span class="fa-li"><i class="fa fa-map-marker-alt"></i></span>Kelurahan : <?php echo $school["sekolah_kelurahan"] ?></li>
              <li class="list-group-item" style="padding-left: 0px;"><span class="fa-li"><i class="fa fa-map-marker-alt"></i></span>Kecamatan : <?php echo $school["sekolah_kecamatan"] ?></li>
              <li class="list-group-item" style="padding-left: 0px;"><span class="fa-li"><i class="fa fa-map-marker-alt"></i></span>Kabupaten : <?php echo $school["sekolah_kabupaten"] ?></li>
              <li class="list-group-item" style="padding-left: 0px;"><span class="fa-li"><i class="fa fa-map-marker-alt"></i></span>Kodepos : <?php echo $school["sekolah_kodepos"] ?></li>
            </ul>
					</div>
					
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	</div>
	
		
	<div class="container">
    <!-- Portfolio Section -->
    <div class="portfolio-main">
      <h2>Foto Sekolah</h2>
			<div class="col-lg-12">
				<div class="project-menu text-center">
					<button class="btn btn-primary active" data-filter="*">All</button>
				</div>
			</div>
      <div id="projects" class="projects-main row">
        <?php foreach ($images as $key => $value) { 
          $imgURL =   base_url("uploads/school/".$value["foto_folder"]."/".$value["foto_nama"]);
        ?>

          <div class="col-lg-4 col-sm-6 pro-item portfolio-item">
            <div class="card h-100">
                <div class="card-img">
                  <a href="<?php echo $imgURL; ?>" data-fancybox="images">
                      <img class="card-img-top" src="<?php echo $imgURL; ?>" alt="<?php echo $value["foto_nama"]; ?>" />
                      <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                  </a>
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                      <a href="#">Foto Sekolah</a>
                  </h4>
                </div>
            </div>
          </div>
        <?php } ?>
          
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
  var longtitude = "<?php echo $school['sekolah_lokasi']['coordinates'][0] ?>";
  var latitude = "<?php echo $school['sekolah_lokasi']['coordinates'][1] ?>";

  var maps = L.map('mapid', {
    fullscreenControl: true,
    fullscreenControlOptions: {position: 'topleft'},
    zoomControl: false,
  }).setView([latitude, longtitude], 16);

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
    flyTo : true
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



  function iconSchool(status) {
    if (status == "swasta") {
      return L.icon({
        iconUrl: '<?php echo base_url("assets/images/marker/marker-icon-2x-red.png") ?>',
        shadowUrl: '<?php echo base_url("assets/images/marker/marker-shadow.png") ?>',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      });
    } else if (status == "negeri") {
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

  L.marker([latitude, longtitude], {icon: iconSchool("<?php echo $school["sekolah_status"] ?>")}).addTo(maps).bindPopup("<?php echo $school["sekolah_nama"] ?>").openPopup();

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
