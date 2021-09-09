<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("user/partials/head") ?>
  <?php $this->load->view("admin/partials/datatablecss") ?>
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

    /* *********  tables styling  ******************************* */
    .bulk-actions {
      display: none; }

    table.countries_list {
      width: 100%; }

    table.countries_list td {
      padding: 0 10px;
      line-height: 30px;
      border-top: 1px solid #eeeeee; }

    .dataTables_paginate a {
      padding: 6px 9px !important;
      background: #ddd !important;
      border-color: #ddd !important; }

    .paging_full_numbers a.paginate_active {
      background-color: rgba(38, 185, 154, 0.59) !important;
      border-color: rgba(38, 185, 154, 0.59) !important; }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
      border: 1px solid #E7E7E7 !important;
      background: #E7E7E7 !important;
      -webkit-box-shadow: none !important;
              box-shadow: none !important; }

    table.jambo_table {
      border: 1px solid rgba(221, 221, 221, 0.78); }

    table.jambo_table thead {
      background: rgba(52, 73, 94, 0.94);
      color: #ECF0F1; }

    table.jambo_table tbody tr:hover td {
      background: rgba(38, 185, 154, 0.07);
      border-top: 1px solid rgba(38, 185, 154, 0.11);
      border-bottom: 1px solid rgba(38, 185, 154, 0.11); }

    table.jambo_table tbody tr.selected {
      background: rgba(38, 185, 154, 0.16); }

    table.jambo_table tbody tr.selected td {
      border-top: 1px solid rgba(38, 185, 154, 0.4);
      border-bottom: 1px solid rgba(38, 185, 154, 0.4); }

    .dataTables_paginate a {
      background: #ff0000; }

    .dataTables_wrapper {
      position: relative;
      clear: both;
      zoom: 1; }

    .dataTables_processing {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 250px;
      height: 30px;
      margin-left: -125px;
      margin-top: -15px;
      padding: 14px 0 2px 0;
      border: 1px solid #ddd;
      text-align: center;
      color: #999;
      font-size: 14px;
      background-color: white; }

    .dataTables_info {
      width: 60%;
      float: left; }

    .dataTables_paginate {
      float: right;
      text-align: right; }

    table.dataTable th.focus,
    table.dataTable td.focus {
      outline: 2px solid #1ABB9C !important;
      outline-offset: -1px; }

    table.display {
      margin: 0 auto;
      clear: both;
      width: 100%; }

    table.display thead th {
      padding: 8px 18px 8px 10px;
      border-bottom: 1px solid black;
      font-weight: bold;
      cursor: pointer; }

    table.display tfoot th {
      padding: 3px 18px 3px 10px;
      border-top: 1px solid black;
      font-weight: bold; }

    table.display tr.heading2 td {
      border-bottom: 1px solid #aaa; }

    table.display td {
      padding: 3px 10px; }

    table.display td.center {
      text-align: center; }

    table.display thead th:active, table.display thead td:active {
      outline: none; }

    .dataTables_scroll {
      clear: both; }

    .dataTables_scrollBody {
      *margin-top: -1px;
      -webkit-overflow-scrolling: touch; }

    .top .dataTables_info {
      float: none; }

    .clear {
      clear: both; }

    .dataTables_empty {
      text-align: center; }

    tfoot input {
      margin: 0.5em 0;
      width: 100%;
      color: #444; }

    tfoot input.search_init {
      color: #999; }

    td.group {
      background-color: #d1cfd0;
      border-bottom: 2px solid #A19B9E;
      border-top: 2px solid #A19B9E; }

    td.details {
      background-color: #d1cfd0;
      border: 2px solid #A19B9E; }

    .example_alt_pagination div.dataTables_info {
      width: 40%; }

    .paging_full_numbers {
      width: 400px;
      height: 22px;
      line-height: 22px; }

    .paging_full_numbers a:active {
      outline: none; }

    .paging_full_numbers a:hover {
      text-decoration: none; }

    .paging_full_numbers a.paginate_button, .paging_full_numbers a.paginate_active {
      border: 1px solid #aaa;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      padding: 2px 5px;
      margin: 0 3px;
      cursor: pointer; }

    .paging_full_numbers a.paginate_button {
      background-color: #ddd; }

    .paging_full_numbers a.paginate_button:hover {
      background-color: #ccc;
      text-decoration: none !important; }

    .paging_full_numbers a.paginate_active {
      background-color: #99B3FF; }

    table.display tr.even.row_selected td {
      background-color: #B0BED9; }

    table.display tr.odd.row_selected td {
      background-color: #9FAFD1; }

    div.box {
      height: 100px;
      padding: 10px;
      overflow: auto;
      border: 1px solid #8080FF;
      background-color: #E5E5FF; }

    /* *********  /tables styling  ****************************** */
  </style> 
</head>
<body>
<div class="wrapper-main">

  <?php $this->load->view("user/partials/navigation") ?>

	<!-- full Title -->
	<div class="full-title" style="background: url(<?php echo base_url('assets/zonebiz/images/school-bg.png')?>) no-repeat center;">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3">Kota Surakarta</h1>
      <div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#"></a>
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
				<div class="col-md-12 blog-entries">
					<!-- Blog Post -->
					<div class="card mb-12">
						
						<div class="card-body">
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
<?php $this->load->view("admin/partials/datatablesjs") ?>
<script>
      var school;

      $(document).ready(function(){
        school = $("#_school_").DataTable({
          ajax: {
            url: "<?php echo site_url('API/school/data')?>",
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
                  <a href='<?php echo site_url('profil/')?>"+data+"' data-toggle='tooltip' title='Detail'>\
                      <button type='button' class='btn btn-info'><i class='fas fa-eye'></i> Detail</button>\
                  </a>";
              }
            },
            
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
