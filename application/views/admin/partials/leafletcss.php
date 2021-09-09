    
    <link href="<?php echo base_url('assets/Leaflet/LeafletJS/leaflet.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/Leaflet/LeafletJS/leaflet.js')?>"></script>
    <link href="<?php echo base_url('assets/Leaflet/LeafletFullscreen/Control.FullScreen.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/Leaflet/LeafletZoomHome/dist/leaflet.zoomhome.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/Leaflet/LeafletLocateControl/dist/L.Control.Locate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/Leaflet/LeafletPolylineMeasure/Leaflet.PolylineMeasure.css')?>" rel="stylesheet">

    <style>
        #mapid { height: 480px; }
        .map {
            position: relative;
            width: 100%;
            height: 450px;
            overflow: hidden;
        }

        .legend {
            line-height: 18px;
            color: #555;
        }

        .info.legend {
            background-color: #fff;
            padding: 5px;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 5px;
            opacity: 0.8;
        }
    </style>