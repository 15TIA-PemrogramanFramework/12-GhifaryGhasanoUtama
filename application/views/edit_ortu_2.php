<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="<?php echo base_url('assets/') ?>image/png" sizes="16x16" href="<?php echo base_url('assets/') ?>images/favicon.png">
    <title>Orang Tua</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url('assets/') ?>bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url('assets/') ?>bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/') ?>css/style1.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index"><i class="glyphicon glyphicon-fire"></i>&nbsp;<span class="hidden-xs">Orang Tua</span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs hidden-lg waves-effect waves-light"><i class="ti-arrow-circle-left ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                  
                   <li>
                        <a class="profile-pic" href="<?php echo site_url('login/logout'); ?>"><b><?php echo tanggal(); ?> , Log Out </b> </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <div class="navbar-default sidebar nicescroll" role="navigation">
            <div class="sidebar-nav navbar-collapse ">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="ti-search"></i> </button>
                            </span>
                        </div>
                    </li>
                    <li>
                        <a href="index3" class="waves-effect"><i class="ti-layout fa-fw"></i>Tabel Nilai Anak Anda</a>
                    </li>
                    <li>
                        <a href="dataortu" class="waves-effect"><i class="ti-user fa-fw"></i>Data Anda</a>
                    </li>
                   
                   
                    
                </ul>
               
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-12">
                        <h4 class="page-title">Edit Data</h4>
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                           
                            
                            <form class="form-horizontal form-material" action="<?php echo $action;?>" method="post">
                            
                           
                                    <input type="hidden" name="id_ortu" value="<?php echo $id_ortu; ?>" class="form-control form-control-line"> 
                            
                             <div class="form-group">
                                <label class="col-md-12">Nama Orang Tua</label>
                                <div class="col-md-12">
                                    <input type="text" name="nama_ortu" value="<?php echo $nama_ortu; ?>" class="form-control form-control-line"> </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-12">Alamat</label>
                                <div class="col-md-12">
                                    <input type="text" name="alamat_ortu" value="<?php echo $alamat_ortu; ?>" class="form-control form-control-line"> </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-md-12">Gender</label>
                                <div class="col-md-12">
                                    <input type="text" name="gender" value="<?php echo $gender; ?>" class="form-control form-control-line"> </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-12">Agama</label>
                                <div class="col-md-12">
                                    <input type="text" name="agama" value="<?php echo $agama; ?>" class="form-control form-control-line"> </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-12">Nomor Hp/Telepon</label>
                                <div class="col-md-12">
                                    <input type="text" name="telp" value="<?php echo $telp; ?>" class="form-control form-control-line"> </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-12">Perkerjaan</label>
                                <div class="col-md-12">
                                    <input type="text" name="pekerjaan" value="<?php echo $pekerjaan; ?>" class="form-control form-control-line"> </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-12">Status</label>
                                <div class="col-md-12">
                                    <input type="text" name="status" value="<?php echo $status; ?>" class="form-control form-control-line"> </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-12">Password Akun</label>
                                <div class="col-md-12">
                                    <input type="text" name="pass" value="<?php echo $pass; ?>" class="form-control form-control-line"> </div>
                            </div>
                            
                       
                           
                            
                           
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Input</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <footer class="footer text-center"> 2017 &copy; Myadmin brought to you by wrappixel.com  </footer>
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/') ?>bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!--Nice scroll JavaScript -->
    <script src="<?php echo base_url('assets/') ?>js/jquery.nicescroll.js"></script>
    <!--Morris JavaScript -->
    <script src="<?php echo base_url('assets/') ?>bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url('assets/') ?>bower_components/morrisjs/morris.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('assets/') ?>js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/') ?>js/myadmin.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/dashboard1.js"></script>
</body>

</html>
