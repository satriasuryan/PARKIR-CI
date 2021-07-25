<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PARKIR-STTNF</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url() ?>template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>template/bootstrap/css/custom-button.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>template/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>template/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>template/dist/css/skins/_all-skins.min.css">
</head>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        <header class="main-header">

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <!-- Logo -->
                <a href="<?php echo base_url('dashboard') ?>" class="logo">
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>PARKIR</b>-STTNF</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                    <li>
                            <?php 
                            echo anchor('dashboard/create/', '+ DAFTARKAN KENDARAAN', array('class' => 'btn btn-success btn-lg')); 
                            ?>
                        </li>
                        <li>
                            <?php
                            echo anchor('auth/login', 'LOGIN', array('class' => 'btn btn-warning btn-lg'));
                            ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <?php
            echo $contents;
            ?>
        </div><!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong> &copy; 2021 <a href="#">Satria Suryanegara</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script type="text/javascript" src="<?php echo base_url() ?>template/dist/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>template/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>template/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>template/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>template/dist/js/app.min.js"></script>
</body>

</html>