<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/style.css">

  
</head>

<body>
   
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Login Form</h1><span>Flat Login Form By Andy Tran</span>
</div>
<!-- Form Module-->
<div class="module form-module">
 
  <div class="form"></div>
  <div class="form"><center>
    <h2>Log In </h2></center>
    
    <form action="" method="POST">
     <input type="text" name="username" placeholder="Username"/>
      <input type="password" name="password" placeholder="Password"/>
      <select  name="jenis">
                                        <option>Pilih Jabatan Anda</option>
                                        <option value="1">Guru</option>
                                        <option value="2">Ortu</option>
                                        <option value="3">Siswa</option>
                                    </select>
                                    <br>
      <br>

                                        
                                       
                                   
      <button>Login</button>
    </form>
  </div>
 
</div>
  

    <script  src="<?php echo base_url('assets/') ?>js/index.js"></script>

</body>
</html>
