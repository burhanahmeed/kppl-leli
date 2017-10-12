<!-- PELELANG -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/jquery.simple-dtpicker.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url()?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="<?= base_url()?>assets/js/jquery.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="#">Barang</a>
				<a class="navbar-brand" href="<?= base_url()?>dompet">Tabungan</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?= $username; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= base_url()?>user/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?= base_url()?>dashboard"> List Barang</a>
                    </li>
					<li>
                        <a href="#"> Tambah</a>
                    </li>
					<li>
                        <a href="index.html"> Penawaran</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper1">
        <form action="<?= base_url()?>barang/update/<?= $barang[0]['id_barang']?>" method="post" enctype="multipart/form-data">
    		<div class="form-group">
    			</br>
                <div class="col-lg-4"><input class="form-control" placeholder="Nama Barang" name="nBarang" value="<?= $barang[0]['nama']?>"></div>
    			<input type="file" name="file">
    			<label>Upload gambar</label><br>
                <label>Harga Awal</label><input type="number" name="hargaAwal" value="<?= $barang[0]['harga_awal']?>">
                
            </div>
    		<div class="form-group">
                <div class="col-lg-10"><textarea name="detBarang" class="form-control" rows="8" placeholder="Detil Barang"><?= $barang[0]['detail']?></textarea></div>
            </div>

    		<div class="container">
                <div class="row">
                    <div class='col-sm-6'>
                    <label>deadline</label>
                    <input type="text" name="dates" value="<?= $barang[0]['deadline']?>">
                        <script type="text/javascript">
                            $(function(){
                                $('*[name=dates]').appendDtpicker();
                            });
                        </script>
                </div>
            </div>
    	
    	<div class="col-lg-12" style="margin-top:1%"><button type="submit" class="btn btn-lg btn-success">save</button></div>
        </div>
        <!-- /#page-wrapper -->
    </form>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
  
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/js/jquery.simple-dtpicker.js"></script>

    <script src="<?= base_url()?>assets/js/moment.js"></script>

</body>

</html>
