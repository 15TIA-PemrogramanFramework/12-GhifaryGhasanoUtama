<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="<?php echo base_url('assets/') ?>image/png" sizes="16x16" href="<?php echo base_url('assets/') ?>images/favicon.png">
    <title>Admin</title>
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
                <div class="top-left-part"><a class="logo" href="index"><i class="glyphicon glyphicon-fire"></i>&nbsp;<span class="hidden-xs">Admin</span></a></div>
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
                        <a href="index" class="waves-effect"><i class="ti-layout fa-fw"></i>Tabel Nilai</a>
                    </li>
                    <li>
                        <a href="siswa" class="waves-effect"><i class="ti-user fa-fw"></i>Tabel Siswa</a>
                    </li>
                   <li>
                        <a href="ortu" class="waves-effect"><i class="ti-user fa-fw"></i>Tabel Orang Tua</a>
                    </li>
                    <li>
                        <a href="guru" class="waves-effect"><i class="ti-user fa-fw"></i>Tabel Guru</a>
                    </li>
                    <li>
                        <a href="kelas" class="waves-effect"><i class="ti-user fa-fw"></i>Tabel Kelas</a>
                    </li>
                    
                    <li>
                        <a href="mapel" class="waves-effect"><i class="ti-user fa-fw"></i>Tabel Mapel</a>
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
                        <h4 class="page-title">Tabel Guru</h4>
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12">
                    <div class="row">
    <div class="col-md-12 text-right" style="margin-top:20px; margin-bottom:20px;">
        <?php echo anchor(site_url("home/tambah_guru"),'<i class="fa fa-plus">&nbsp;Tambah Guru</i>', 'class="btn btn-primary"');?>
    </div>
</div>
                        <div class="white-box">
                             
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr><th>NIK</th>
                                            <th>Nama Guru</th>
                                            <th>Alamat</th>
                                            <th>Tempat / Tanggal Lahir</th>
                                            <th>Nomor Telepon/HP</th>
                                            <th>Gender</th>
                                            <th>Pendidikan</th>

                                            <th>Agama</th>
                                            <th>Status</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($guru as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->nik; ?></td>
                                            <td><?php echo $value->nama_guru; ?></td>
                                            <td><?php echo $value->alamat_guru; ?></td>
                                            <td><?php echo $value->tmp_lahir; ?>,<?php echo $value->tgl_lahir; ?></td>
                                            <td><?php echo $value->telp; ?></td>
                                            <td><?php echo $value->gender; ?></td>
                                            <td><?php echo $value->pendidikan; ?></td>
                                            <td><?php echo $value->agama; ?></td>
                                            <td><?php echo $value->status; ?></td>
<td><?php echo $value->pass_guru; ?></td> <td>
                                            <button ><?php echo anchor(site_url("home/edit_guru/".$value->nik),
                    '<i class="fa fa-trash">Edit Data</i>');?>&nbsp;</button>&nbsp;
                                            </td> 
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <footer class="footer text-center">2017 &copy; Myadmin brought to you by wrappixel.com </footer>
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
