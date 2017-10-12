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
				<a class="navbar-brand" href="<?= base_url()?>dompet">Tabungan</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $username; ?> <b class="caret"></b></a>
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
                    <li  class="active">
                        <a href="#"> Lelang</a>
                    </li>
                     <li>
                        <a href="index.html"> Ditawar</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div class="col-lg-8">
		<div class="panel panel-green">

		<div id="page-wrapper">
		<div class="panel-body">
				<?php foreach ($barang as $b) { ?>
                               
                <div class="well">
                    <h1><?= $b['nama'] ?></h1>
                    <p>Harga Awal RP. <?= $b['harga_awal'] ?></p>
                    <p><?= ($b['detail']==NULL)? 'Detail tidak tersedia': $b['detail']; ?></p>  
                    <div class="gambar">
                        <?= ($b['gambar']==NULL)? 'Gambar tidak tersedia': '<img src="'.$b['gambar'].'">' ;?>
                    </div>          
                    <style type="text/css">
                        .gambar{
                            height: 200px; width: 200px; background-color: grey;
                        }
                        .gambar img{
                            height: 150px; width: 150px;
                        }
                    </style>
                    <?php 
                        $sql = 'SELECT MAX(tawaran) AS jumlh FROM penawaran_tabel WHERE id_barang="'.$b['id_barang'].'";';
                        $highestOffer = (float)$this->GeneralModel->query($sql)[0]['jumlh'];
                        $iduser = $this->session->userdata('login')['id'];
                    ?>
                    <label>Penawaran Tertinggi</label><h4>RP. <?= $highestOffer; ?></h4>
                    <label>Deadline </label><h4 class="countdown" data-ts="<?= $b['deadline']; ?>"></h4><h4></h4>
                    <div class="checkbox">
                    <?php if (strtotime(date('Y-m-d H:i:s'))<strtotime($b['deadline'])) { ?>
                        <form method="post" action="<?= base_url()?>penawaran/doOffer/<?=$b['id_barang'].'/'.$iduser ?>">
                            <input type="number" name="hargaBid"> <input type="submit" value="Tawar" class="btn btn-success"><a href="<?= base_url()?>penawaran/withdrawOffer/<?=$b['id_barang'].'/'.$iduser ?>" class="btn btn-danger">Mundur</a>
                        </form>
                    <?php } ?>
                    </div> 
                </div>
            <?php } ?>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url()?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/js/countdown.js"></script>

    <script type="text/javascript">
    $(function(){

        $('.countdown').each(function() {
            var $this = $(this),
                ts = $this.data('ts');

            // Set the date we're counting down to
            var countDownDate = new Date(ts).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

              // Get todays date and time
              var now = new Date().getTime();

              // Find the distance between now an the count down date
              var distance = countDownDate - now;

              // Time calculations for days, hours, minutes and seconds
              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);

              // Display the result in the element with id="demo"
              $this.next().html(days + " days, " + hours + ":" + minutes + ":" + seconds); // display

              // If the count down is finished, write some text
              if (distance < 0) {
                clearInterval(x);
                $this.next().html("Waktu Habis");
              }
            }, 1000);
            
        });

    });

</script>

</body>

</html>
