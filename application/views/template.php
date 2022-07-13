<!-- Include Head -->
<?php $this->load->view('template/head'); ?>
<!-- Include JS File -->
<?php $this->load->view('template/js'); ?>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <!-- Include Header -->
  <?php $this->load->view('template/header'); ?>
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
		<br>
    <!-- Include Content -->
		<?= ! empty($contents) ? $contents : "404 not found" ?>

  </div>
  <!-- /.content-wrapper -->
  
  <!-- Include Footer File -->
  <?php $this->load->view('template/footer'); ?>
</div>

</body>
</html>
