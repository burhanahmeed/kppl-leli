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

    <!-- Custom CSS -->
    <link href="<?= base_url()?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= base_url()?>assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="<?= base_url()?>dashboard">Barang</a>
                <a class="navbar-brand" href="#">Tabungan</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?= $username; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <li class="divider"></li>
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
                        <a href="index.html"> Withdraw</a>
                    </li>
			    </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper1">
            <div class="col-lg-12">
                <label  style="float:right; margin:1% 1%"><h4>Uang anda Rp. <?= $uangku ?></h4></label>
            </div>
            <form action="<?= base_url()?>dompet/withdrawal" method="post">
            <div class="form-group"> 
                <div class="col-lg-6"><input type="number" class="form-control" placeholder="Jumlah Penarikan" name="input_money" required=""></div>
            </div>
            <div class="col-lg-8" style="margin-top:2%">
                <label><h4>Pilih Metode</h4></label>
                <br></br>
                <div class="col-lg-2">
                    <label class="radio-inline">
                        <input type="radio" name="optradio">Bank A
                    </label>
                </div>
                <div class="col-lg-2">
                    <label class="radio-inline">
                        <input type="radio" name="optradio">Bank B
                    </label>
                </div>
                <div class="col-lg-2">
                    <label class="radio-inline">
                        <input type="radio" name="optradio">Bank C
                    </label>
                </div>
                <div class="col-lg-2">
                    <label class="radio-inline">
                        <input type="radio" name="optradio">Bank D
                    </label>
                </div>
            </div>
        
        <div class="col-lg-12" style="margin-top:2%"><input type="submit" value="Proses"></div>
        </div>
        </form>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url()?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?= base_url()?>assets/js/plugins/morris/raphael.min.js"></script>
    <script src="<?= base_url()?>assets/js/plugins/morris/morris.min.js"></script>
    <script src="<?= base_url()?>assets/js/plugins/morris/morris-data.js"></script>

</body>

</html>
