<!DOCTYPE html>

<?php
include "connection/koneksi.php";
session_start();
ob_start();

$id = $_SESSION['id_user'];

if(isset($_SESSION['edit_menu'])){
  echo $_SESSION['edit_menu'];
  unset($_SESSION['edit_menu']);

}

if(isset ($_SESSION['username'])){
  
  $query = "select * from tb_user natural join tb_level where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);

  while($r = mysqli_fetch_array($sql)){
    
    $nama_user = $r['nama_user'];

?>

<html lang="en">

<head>
    <title>List Pesanan</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="template/dashboard/css/bootstrap.min.css" />
    <link rel="stylesheet" href="template/dashboard/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="template/dashboard/css/fullcalendar.css" />
    <link rel="stylesheet" href="template/dashboard/css/matrix-style.css" />
    <link rel="stylesheet" href="template/dashboard/css/matrix-media.css" />
    <link href="template/dashboard/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="template/dashboard/css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

    <!--Header-part-->
    <div id="header">
        <h1><a href="list_pesanan.php">List Pesanan</a></h1>
    </div>
    <!--close-Header-part-->


    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
                    data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span
                        class="text">Welcome <?php echo $r['nama_user'];?></span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i><?php echo "&nbsp;&nbsp;".$r['nama_level'];?></a></li>
                    <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
            <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span
                        class="text">Logout</span></a></li>
        </ul>
    </div>
    <!--close-top-Header-menu-->
    <!--start-top-serch-->

    <!--close-top-serch-->
    <!--sidebar-menu-->
    <div id="sidebar"><a href="list_pesanan.php" class="visible-phone"><i class="icon shopping-cart"></i> <span>List
                Pesanan</span></a>
        <ul>
            <?php
    if($r['id_level'] == 1){
  ?>
            <li> <a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="menu.php"><i class="icon icon-tasks"></i> <span>Entri Referensi</span></a> </li>
            <li class="active"> <a href="pesanan.php"><i class="icon icon-shopping-cart"></i> <span>Entri
                        Order</span></a> </li>
            <li> <a href="laporan_transaksi.php"><i class="icon icon-inbox"></i> <span>Entri Transaksi</span></a> </li>
            <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
            <?php
    } else if($r['id_level'] == 2){
  ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li class="active"> <a href="pesanan.php"><i class="icon icon-shopping-cart"></i> <span>Entri
                        Order</span></a> </li>
            <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
            <?php
    } else if($r['id_level'] == 3){
  ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="laporan_transaksi.php"><i class="icon icon-inbox"></i> <span>Entri Transaksi</span></a> </li>
            <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
            <?php
    } else if($r['id_level'] == 4){
  ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
            <?php
    } else if($r['id_level'] == 5){
  ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li class="active"> <a href="pesanan.php"><i class="icon icon-shopping-cart"></i> <span>Entri
                        Order</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
            <?php
    } else if($r['id_level'] == 6){
      ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li class="active"> <a href="list_pesanan.php"><i class="icon icon-shopping-cart"></i> <span>List
                        Pesanan</span></a> </li>
            <li> <a href="stok_menu.php"><i class="icon icon-shopping-cart"></i> <span>Stok Menu</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
            <?php
        }
  ?>
        </ul>
    </div>
    <!--sidebar-menu-->

    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="list_pesanan.php" title="Go to here" class="tip-bottom"><i
                        class="icon icon-tasks"></i> List Pesanan</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="span9">
            <div class="widget-box">
                <div class="widget-title bg_lg"><span class="icon"><i class="icon-th-large"></i></span>
                    <h5>Menu yang dipesan</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-invoice-full">
                        <thead>
                            <tr>
                                <th class="head0">No.</th>
                                <th class="head1">Menu</th>
                                <th class="head0 right">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                  $no_order_fiks = 1;
                  $query_order_fiks = "SELECT * FROM tb_order INNER JOIN tb_pesan ON tb_order.`id_order` = tb_pesan.`id_order` AND status_order = 'belum bayar' INNER JOIN tb_masakan ON tb_pesan.`id_masakan` = tb_masakan.`id_masakan`";
                  $sql_order_fiks = mysqli_query($conn, $query_order_fiks);
                  //echo $query_order_fiks;
                  while($r_order_fiks = mysqli_fetch_array($sql_order_fiks)){
                ?>
                            <tr>
                                <td>
                                    <center><?php echo $no_order_fiks++; ?>. </center>
                                </td>
                                <td><?php echo $r_order_fiks['nama_masakan'];?></td>
                                <td class="right">
                                    <center><?php echo $r_order_fiks['jumlah'];?></center>
                                </td>
                            </tr>
                            <?php
                  }
                  $query_harga = "select * from tb_order where status_order = 'belum bayar'";
                  $sql_harga = mysqli_query($conn, $query_harga);
                  $result_harga = mysqli_fetch_array($sql_harga);
                ?>

                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <?php
if(isset($_POST['proses_pesanan'])){
   $no_meja = $result_harga['no_meja'];
   $status_order = 'Pesanan Siap';
   $id_order = $result_harga['id_order'];

   $query_simpan_pesanan = "INSERT INTO tb_pesanan (id_order, no_meja, status_order) VALUES(? ,?, ?)";
   $stmt = mysqli_prepare($conn, $query_simpan_pesanan);
 
   mysqli_stmt_bind_param($stmt, "sss", $id_order, $no_meja, $status_order);
   $sql_simpan_pesanan = mysqli_stmt_execute($stmt);

   if($sql_simpan_pesanan){
       echo "<script>alert('Pesanan Siap Disampaikan Ke Pelayan');</script>";
       echo "<script>document.getElementById('proses_pesanan_button').style.display = 'none';</script>";
   } else {
       echo "<script>alert('Gagal menyampaikan');</script>";
   }
}
?>


                <!-- HTML code -->
                <form action="" method="POST" onsubmit="return submitForm(this);">
                    <!-- Rest of the HTML code -->
                    <input type="hidden" name="no_meja" value="<?php echo $result_harga['no_meja']; ?>">
                    <center><button id="proses_pesanan_button" type="submit" name="proses_pesanan" class="btn btn-success"><i
                            class='icon-ok'></i>&nbsp; Pesanan Siap</button></center>
                </form>

                <script>
                function submitForm(form) {
                    var button = form.querySelector("#proses_pesanan_button");

                    if (button.getAttribute('data-disabled') !== 'true') {
                        button.setAttribute('data-disabled', 'true');
                        button.style.pointerEvents = 'none';

                        // tambahkan kode AJAX atau manipulasi DOM lainnya untuk menyimpan data di sini

                        return true;
                    } else {
                        return false;
                    }
                }
                </script>
            </div>
        </div>
    </div>
    <!--End-Action boxes-->
    </div>
    </div>

    <!--end-main-container-part-->

    <!--Footer-part-->

    <div class="row-fluid">
        <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; Resto-ant</div>
    </div>

    <!--end-Footer-part-->

    <script type="text/javascript">
    function operasi() {
        var pesan = new Array();
        var jumlah = new Array();
        var total = 0;
        for (var a = 0; a < 1000; a++) {
            pesan[a] = $("#harga" + a).val();
            jumlah[a] = $("#jumlah" + a).val();
        }
        for (var a = 0; a < 1000; a++) {
            if (pesan[a] == null || pesan[a] == "") {
                pesan[a] = 0;
                jumlah[a] = 0;
            }
            total += Number(pesan[a] * jumlah[a]);
        }

        //alert(total);
        $("#total_harga").text(total);
        $("#tot").val(total);
    }
    </script>

    <script src="template/dashboard/js/excanvas.min.js"></script>
    <script src="template/dashboard/js/jquery.min.js"></script>
    <script src="template/dashboard/js/jquery.ui.custom.js"></script>
    <script src="template/dashboard/js/bootstrap.min.js"></script>
    <script src="template/dashboard/js/jquery.flot.min.js"></script>
    <script src="template/dashboard/js/jquery.flot.resize.min.js"></script>
    <script src="template/dashboard/js/jquery.peity.min.js"></script>
    <script src="template/dashboard/js/fullcalendar.min.js"></script>
    <script src="template/dashboard/js/matrix.js"></script>
    <script src="template/dashboard/js/matrix.dashboard.js"></script>
    <script src="template/dashboard/js/jquery.gritter.min.js"></script>
    <script src="template/dashboard/js/matrix.interface.js"></script>
    <script src="template/dashboard/js/matrix.chat.js"></script>
    <script src="template/dashboard/js/jquery.validate.js"></script>
    <script src="template/dashboard/js/matrix.form_validation.js"></script>
    <script src="template/dashboard/js/jquery.wizard.js"></script>
    <script src="template/dashboard/js/jquery.uniform.js"></script>
    <script src="template/dashboard/js/select2.min.js"></script>
    <script src="template/dashboard/js/matrix.popover.js"></script>
    <script src="template/dashboard/js/jquery.dataTables.min.js"></script>
    <script src="template/dashboard/js/matrix.tables.js"></script>

    <script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage(newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-") {
                resetMenu();
            }
            // else, send page to designated URL            
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
    </script>
</body>

</html>
<?php
  }
} else {
  header('location: logout.php');
}
ob_flush();
?>