<?php include('./koneksi.php'); ?>
<style>
  ul {
    list-style-type: none;
  }

  .socialconnect {
    overflow: hidden;
    padding: 100px 0;
  }

  @media (max-width: 767px) {
    .socialconnect {
      padding: 40px 0;
    }
  }

  .socialconnect h2 {
    font-size: 46px;
    line-height: 56px;
    margin-bottom: 20px;
  }

  .socialconnect h2 span {
    color: #ff6c0f;
    display: block;
  }

  .socialconnect .featurelist {
    padding: 20px 0 30px;
  }

  .socialconnect .featurelist>li {
    color: #3f525f;
    line-height: 36px;
    font-size: 18px;
  }

  @media (max-width: 767px) {
    .socialconnect .featurelist>li {
      font-size: 16px;
      line-height: 26px;
    }
  }

  .socialconnect .featurelist>li:before {
    content: "\f105";
    font: normal normal normal 14px/1 FontAwesome;
    padding-right: 10px;
  }

  .socialconnect h4 {
    color: #ff6c0f;
    font-size: 18px;
    font-weight: bold;
    margin: 0;
  }

  .socialconnect list-inline li {
    font-weight: bold;
    text-transform: uppercase;
    font-size: 12px;
  }

  .map-section {
    background: url("assets/images/image-mapbandung.png") no-repeat;
    background-size: contain;
    height: 100%;
  }

  .map-section .slider-bullets {
    position: relative;
    min-height: 300px;
  }

  @media (max-width: 767px) {
    .map-section .slider-bullets {
      min-height: auto;
    }
  }

  .map-section .slider-bullets li {
    position: absolute;
    cursor: pointer;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
    -moz-transform: scale(1);
    -o-transform: scale(1);
    -ms-transform: scale(1);
    -webkit-transform: scale(1);
    transform: scale(1);
    -webkit-transition: all 0.41s ease-in-out;
    -moz-transition: all 0.41s ease-in-out;
    -ms-transition: all 0.41s ease-in-out;
    -o-transition: all 0.41s ease-in-out;
    transition: all 0.41s ease-in-out;
  }

  .map-section .slider-bullets li img {
    max-width: 90px;
  }

  @media (max-width: 992px) {
    .map-section .slider-bullets li img {
      max-width: 60px;
    }
  }

  @media (max-width: 767px) {
    .map-section .slider-bullets li img {
      max-width: 40px;
    }
  }

  @media (max-width: 767px) {
    .map-section .slider-bullets li {
      position: static;
      display: inline-block;
      margin: 0 2px;
    }
  }

  .map-section .slider-bullets li.active {
    -moz-transform: scale(1.1);
    -o-transform: scale(1.1);
    -ms-transform: scale(1.1);
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    -moz-box-shadow: 0px 2px 6px 0px #777;
    -webkit-box-shadow: 0px 2px 6px 0px #777;
    box-shadow: 0px 2px 6px 0px #777;
  }

  .map-section .slider-bullets li:nth-child(1) {
    top: 0%;
    left: 10%;
  }

  @media (max-width: 992px) {
    .map-section .slider-bullets li:nth-child(1) {
      top: 8%;
    }
  }

  .map-section .slider-bullets li:nth-child(2) {
    top: 0;
    right: 33%;
  }

  .map-section .slider-bullets li:nth-child(3) {
    top: 34%;
    left: 22%;
  }

  @media (max-width: 992px) {
    .map-section .slider-bullets li:nth-child(3) {
      top: 20%;
    }
  }

  .map-section .slider-bullets li:nth-child(4) {
    bottom: 30%;
    right: 30%;
  }

  @media (max-width: 992px) {
    .map-section .slider-bullets li:nth-child(4) {
      bottom: 55%;
    }
  }

  .map-section .slider-bullets li:nth-child(5) {
    top: 25%;
    right: 12%;
  }

  @media (max-width: 992px) {
    .map-section .slider-bullets li:nth-child(5) {
      top: 15%;
    }
  }

  @brand-color: #b20000;

  #tcb-testimonial-carousel {
    a {
      color: @brand-color;
    }

    .text-brand {
      color: @brand-color;
    }

    margin-top: 30px;

    .carousel-indicators .active {
      background: @brand-color;
    }

    .no-margin {
      margin: 0;
    }

    .carousel-indicators li {
      border: 1px solid #ccc;
    }

    .carousel-control {
      color: @brand-color;
      width: 5%;
    }

    .carousel-control:hover,
    .carousel-control:focus {
      color: @brand-color;
    }

    .carousel-control.left,
    .carousel-control.right {
      background-image: none;
    }

    .item {
      padding: 15px 40px;
      background: #f8f8f8;
    }

    .media-object {
      margin: auto;
    }

    @media screen and (max-width: 768px) {
      .media-object {
        margin-bottom: 15px;
      }
    }
  }

  /* COMMON PRICING STYLES */
  .panel.price,
  .panel.price>.panel-heading {
    border-radius: 0px;
    -moz-transition: all .3s ease;
    -o-transition: all .3s ease;
    -webkit-transition: all .3s ease;
  }

  .panel.price:hover {
    box-shadow: 0px 0px 30px rgba(0, 0, 0, .2);
  }

  .panel.price:hover>.panel-heading {
    box-shadow: 0px 0px 30px rgba(0, 0, 0, .2) inset;
  }


  .panel.price>.panel-heading {
    box-shadow: 0px 5px 0px rgba(50, 50, 50, .2) inset;
    text-shadow: 0px 3px 0px rgba(50, 50, 50, .6);
  }

  .price .list-group-item {
    border-bottom-: 1px solid rgba(250, 250, 250, .5);
  }

  .panel.price .list-group-item:last-child {
    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;
  }

  .panel.price .list-group-item:first-child {
    border-top-right-radius: 0px;
    border-top-left-radius: 0px;
  }

  .price .panel-footer {
    color: #fff;
    border-bottom: 0px;
    background-color: rgba(0, 0, 0, .1);
    box-shadow: 0px 3px 0px rgba(0, 0, 0, .3);
  }


  .panel.price .btn {
    box-shadow: 0 -1px 0px rgba(50, 50, 50, .2) inset;
    border: 0px;
  }

  /* green panel */


  .price.panel-green>.panel-heading {
    color: #fff;
    background-color: #57AC57;
    border-color: #71DF71;
    border-bottom: 1px solid #71DF71;
  }


  .price.panel-green>.panel-body {
    color: #fff;
    background-color: #65C965;
  }


  .price.panel-green>.panel-body .lead {
    text-shadow: 0px 3px 0px rgba(50, 50, 50, .3);
  }

  .price.panel-green .list-group-item {
    color: #333;
    background-color: rgba(50, 50, 50, .01);
    font-weight: 600;
    text-shadow: 0px 1px 0px rgba(250, 250, 250, .75);
  }

  /* blue panel */


  .price.panel-blue>.panel-heading {
    color: #fff;
    background-color: #608BB4;
    border-color: #78AEE1;
    border-bottom: 1px solid #78AEE1;
  }


  .price.panel-blue>.panel-body {
    color: #fff;
    background-color: #73A3D4;
  }


  .price.panel-blue>.panel-body .lead {
    text-shadow: 0px 3px 0px rgba(50, 50, 50, .3);
  }

  .price.panel-blue .list-group-item {
    color: #333;
    background-color: rgba(50, 50, 50, .01);
    font-weight: 600;
    text-shadow: 0px 1px 0px rgba(250, 250, 250, .75);
  }

  /* red price */


  .price.panel-red>.panel-heading {
    color: #fff;
    background-color: #D04E50;
    border-color: #FF6062;
    border-bottom: 1px solid #FF6062;
  }


  .price.panel-red>.panel-body {
    color: #fff;
    background-color: #EF5A5C;
  }




  .price.panel-red>.panel-body .lead {
    text-shadow: 0px 3px 0px rgba(50, 50, 50, .3);
  }

  .price.panel-red .list-group-item {
    color: #333;
    background-color: rgba(50, 50, 50, .01);
    font-weight: 600;
    text-shadow: 0px 1px 0px rgba(250, 250, 250, .75);
  }

  /* grey price */


  .price.panel-grey>.panel-heading {
    color: #fff;
    background-color: #6D6D6D;
    border-color: #B7B7B7;
    border-bottom: 1px solid #B7B7B7;
  }


  .price.panel-grey>.panel-body {
    color: #fff;
    background-color: #808080;
  }



  .price.panel-grey>.panel-body .lead {
    text-shadow: 0px 3px 0px rgba(50, 50, 50, .3);
  }

  .price.panel-grey .list-group-item {
    color: #333;
    background-color: rgba(50, 50, 50, .01);
    font-weight: 600;
    text-shadow: 0px 1px 0px rgba(250, 250, 250, .75);
  }

  /* white price */


  .price.panel-white>.panel-heading {
    color: #333;
    background-color: #f9f9f9;
    border-color: #ccc;
    border-bottom: 1px solid #ccc;
    text-shadow: 0px 2px 0px rgba(250, 250, 250, .7);
  }

  .panel.panel-white.price:hover>.panel-heading {
    box-shadow: 0px 0px 30px rgba(0, 0, 0, .05) inset;
  }

  .price.panel-white>.panel-body {
    color: #fff;
    background-color: #dfdfdf;
  }

  .price.panel-white>.panel-body .lead {
    text-shadow: 0px 2px 0px rgba(250, 250, 250, .8);
    color: #666;
  }

  .price:hover.panel-white>.panel-body .lead {
    text-shadow: 0px 2px 0px rgba(250, 250, 250, .9);
    color: #333;
  }

  .price.panel-white .list-group-item {
    color: #333;
    background-color: rgba(50, 50, 50, .01);
    font-weight: 600;
    text-shadow: 0px 1px 0px rgba(250, 250, 250, .75);
  }
</style>

<section class="socialconnect" id="social">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 wow slideInLeft" style="visibility: visible; animation-name: slideInLeft;">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <h3>Penyedia lembaga pendidikan dan pelatihan yang berkualitas untuk menghasilkan lulusan berkarakter dan berkompetensi unggul</h3>

              <ul class="featurelist">
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="map-section">
            <a href="#"><img src="assets/images/bbc/bbc1.jpg" alt="" width="785" height="449"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<h3 class=" text-center">Pilihan paket terbaik.</h3>
<p class="text-center">Pilih paket sesuai dengan kebutuhan anda.</p>
<div class="container">
  <div class="row">
    <?php
    $sql = mysql_query("SELECT *,a.pertemuan as pertemuan, a.nama,a.deskripsi,a.biaya, b.nama_mobil as mobil1, c.nama_mobil as mobil2 ,d.nama_mobil as mobil3
										  from mst_paket a
										  left join mst_mobil b on a.kode_mobil_1=b.kode_mobil
										  left join mst_mobil c on a.kode_mobil_2=c.kode_mobil
										  left join mst_mobil d on a.kode_mobil_3=d.kode_mobil ORDER BY RAND() LIMIT 4");
    $no = 0;
    while ($row = mysql_fetch_array($sql)) {
      $a = array("red", "green", "blue", "grey");
      $random_keys = array_rand($a, 4);
      $no++;
    ?>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <!-- PRICE ITEM -->
        <div class="panel price panel-<?php echo $a[$random_keys[$no]]; ?>">
          <div class="panel-heading  text-center" style="height:160px">
            <h3><?php echo $row['nama']; ?></h3>
            Jumlah pertemuan <?php echo $row['pertemuan']; ?>x
          </div>
          <div class="panel-body text-center">
            <p class="lead" style="font-size:30px"><strong>Rp. <?php echo number_format($row['biaya']); ?></strong></p>
          </div>
          <ul class="list-group list-group-flush text-center" style="height:130px">

            <div class="panel-footer">
              <a href="?menu=daftar&id_paket=<?php echo $row['id_paket']; ?>" class="btn btn-lg btn-block btn-<?php echo $a[$random_keys[$no]]; ?>" href="#">Pilih</a>
            </div>
        </div>
        <!-- /PRICE ITEM -->
      </div>
    <?php } ?>

  </div>
  <a href="index.php?menu=paket">
    <h3 class=" text-center">Tidak cocok dengan pilihan anda? lihat paket lainya disini.</h3>
  </a>
  <p class="text-center"><br></p>
</div>