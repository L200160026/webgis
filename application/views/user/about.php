<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("user/partials/head") ?>
  <?php $this->load->view("admin/partials/leafletcss") ?>
</head>
<body>
<div class="wrapper-main">

  <?php $this->load->view("user/partials/navigation") ?>

	<!-- full Title -->
	<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3">UNDERCONSTRUCT</h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#"></a>
					</li>
					<li class="breadcrumb-item">
            <a href="#"></a>
          </li>
				</ol>
			</div>
		</div>
	</div>

	<div class="services" style="height: 250px;">
    <div class="blog-main">
      <div class="container">

        <div class="row">
          <!-- Blog Entries Column -->
          <div class="col-md-8 blog-entries">
            <!-- <div class="leaflet-top leaflet-left">
              <div class="leaflet-bar leaflet-control">
                <a class="leaflet-control-zoom-fullscreen fullscreen-icon" href="#" title="Full Screen" role="button" aria-label="Full Screen" style="outline: currentcolor none medium;"></a>
              </div>
              <div class="leaflet-control-zoomhome leaflet-bar leaflet-control">
                <a class="leaflet-control-zoomhome-in" href="#" title="Zoom in" role="button" aria-label="Zoom in">+</a>
                <a class="leaflet-control-zoomhome-home" href="#" title="Home" role="button" aria-label="Home">
                  <i class="fa fa-home" style="line-height:1.65;"></i>
                </a>
                <a class="leaflet-control-zoomhome-out" href="#" title="Zoom out" role="button" aria-label="Zoom out">-</a>
              </div>
              <div class="leaflet-bar leaflet-control">
                <a title="Turn on PolylineMeasure" class="polyline-measure-unicode-icon" id="polyline-measure-control">↦</a>
                <a title="Clear Measurements" class="polyline-measure-unicode-icon polyline-measure-clearControl">×</a>
                <a title="Change Units [metres]" id="unitControlId">m</a>
              </div>
              <div class="leaflet-control-locate leaflet-bar leaflet-control">
                <a class="leaflet-bar-part leaflet-bar-part-single" title="Show me where I am">
                  <span class="fa fa-map-marker-alt"></span>
                </a>
              </div>
            </div>
            <div class="leaflet-top leaflet-right">
              <div class="leaflet-control-layers leaflet-control" aria-haspopup="true">
                <a class="leaflet-control-layers-toggle" href="#" title="Layers"></a>

                <section class="leaflet-control-layers-list">
                  <div class="leaflet-control-layers-base">
                    <label>
                      <div>
                        <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_245" checked="checked">
                          <span> Google Streets</span>
                      </div>
                    </label>
                    <label>
                      <div>
                        <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_245">
                        <span> Google Hybrid</span>
                      </div>
                    </label>
                    <label>
                      <div>
                        <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_245">
                        <span> Google Satellite</span>
                      </div>
                    </label>
                    <label>
                      <div>
                        <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_245">
                        <span> Google Terrain</span>
                      </div>
                    </label>
                    <label>
                      <div>
                        <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_245">
                        <span> OSM</span>
                      </div>
                    </label>
                    <label>
                      <div>
                        <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_245">
                        <span> OSM BW</span>
                      </div>
                    </label>
                    <label>
                      <div>
                        <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_245">
                        <span> OSM DE</span>
                      </div>
                    </label>
                    <label>
                      <div>
                        <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_245">
                        <span> TONER</span>
                      </div>
                    </label>
                    <label>
                      <div>
                        <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_245">
                        <span> POSITRON</span>
                      </div>
                    </label>
                  </div>
                  <div class="leaflet-control-layers-separator"></div>
                  <div class="leaflet-control-layers-overlays">
                    <label>
                      <div>
                        <input type="checkbox" class="leaflet-control-layers-selector" checked="">
                        <span> Sekolah</span>
                      </div>
                    </label>
                    <label>
                      <div>
                        <input type="checkbox" class="leaflet-control-layers-selector">
                        <span> Batas Provinsi Jawa</span>
                      </div>
                    </label>
                    <label>
                      <div>
                        <input type="checkbox" class="leaflet-control-layers-selector">
                        <span> Batas Kota Surakarta</span>
                      </div>
                    </label>
                    <label>
                      <div>
                        <input type="checkbox" class="leaflet-control-layers-selector">
                        <span> Batas Kecamatan</span>
                      </div>
                    </label>
                    <label>
                      <div>
                        <input type="checkbox" class="leaflet-control-layers-selector">
                        <span> Batas Desa Surakarta</span>
                      </div>
                    </label>
                  </div>
                </section>
              </div>
            </div> -->
          </div>
          
          <!-- Sidebar Widgets Column -->
          <div class="col-md-4 blog-right-side">
          </div>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->
    </div>
	</div>
	
	
  <!-- Contact Us -->
  <div class="touch-line" style="padding:0px;">
  </div>

  <?php $this->load->view("user/partials/footer") ?>
</div>

<?php $this->load->view("user/partials/javascript") ?>
<?php $this->load->view("admin/partials/leafletjs") ?>

</body>
</html>
