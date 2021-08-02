<!-- Add your site or app content here -->
<!-- <div class="hero-full-container background-image-container white-text-container"> -->
<!-- <style>
  body {
    background-color: #ffffff;
    background-attachment: fixed;
  }
</style> -->
<!-- <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>OBJEK PEMAJUAN KEBUDAYAAN DAERAH<br>PROVINSI RIAU</h2>
                <p>Selamat datang di portal data Objek Pemajuan Kebudayaan<br>yang dikelola oleh Dinas Kebudayaan Provinsi Riau</p>
                <br>
            </div>
        </div>
    </div>
</div> -->


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src=".\assets\images\carousel1.svg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h3 style="color:white;">OBJEK PEMAJUAN KEBUDAYAAN</h3>
        <p>Website ini memuat 3000 lebih data mengenai objek pemajuan kebudayaan <br>di Provinsi Riau</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src=".\assets\images\carousel2.svg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h3 style="color:white;">JOM KITA KE MUSEUM SANG NILAI UTAMA</h3>
        <p>Museum ini memiliki koleksi budaya melayu terlengkap<br>di daerah Provinsi Riau</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src=".\assets\images\carousel3.svg" alt="Third slide">
      <div style="height:25rem;" class="carousel-caption d-none d-md-block">
        <h3 style="color:#3C814E;">MERAWAT BUDAYA MELAYU</h3>
        <p style="color:#3C814E;">Website ini memberikan edukasi objek kebudayaan budaya Melayu<br>di daerah Provinsi Riau</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="section-container">
  <div class="container text-center">
    <div class="row section-container-spacer">
      <div class="col-xs-12 col-md-12">
        <h2>BIDANG DINAS KEBUDAYAAN</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <img src="./assets/images/bahasa-seni.svg" alt="" class="reveal img-responsive reveal-content image-center image-size-125">
        <h3>Bidang Bahasa & Seni</h3>
        <p><a href="/detailBidang/bahasaseni" class="btn btn-primary">Detail </a></p>
      </div>

      <div class="col-xs-12 col-md-4">
        <img src="./assets/images/kepala-dinas.svg" alt="" class="reveal img-responsive reveal-content image-center image-size-125">
        <h3>Kepala Dinas</h3>
        <p><a href="/detailBidang/kepaladinas" class="btn btn-primary">Detail </a></p>
      </div>
      <div class="col-xs-12 col-md-4">
        <img src="./assets/images/sekretariat.svg" alt="" class="reveal img-responsive reveal-content image-center image-size-125">
        <h3>Sekertariat</h3>
        <p><a href="/detailBidang/sekretariat" class="btn btn-primary">Detail </a></p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-4">
        <img src="./assets/images/rekayasa-budaya.svg" alt="" class="reveal img-responsive reveal-content image-center image-size-125">
        <h3>Bidang Diplomasi dan Promosi Budaya</h3><br>
        <p><a href="/detailBidang/rekayasabudaya" class="btn btn-primary">Detail </a></p>
      </div>

      <div class="col-xs-12 col-md-4">
        <img src="./assets/images/pelestarian-adat.svg" alt="" class="reveal img-responsive reveal-content image-center image-size-125">
        <h3>Bidang Pelestarian Adat dan Nilai Budaya</h3><br>
        <p><a href="/detailBidang/pelestarianadat" class="btn btn-primary">Detail </a></p>
      </div>
      <div class="col-xs-12 col-md-4">
        <img src="./assets/images/sejarah.svg" alt="" class="reveal img-responsive reveal-content image-center image-size-125">
        <h3>Bidang Sejarah Pelestarian Cagar Budaya dan Permuseuman</h3>
        <p><a href="/detailBidang/sejarah" class="btn btn-primary">Detail </a></p>
      </div>
    </div>
  </div>
</div>
<div class="section-container">
  <div class="container text-center">
    <div class="row section-container-spacer">
      <div class="col-xs-12 col-md-12">
        <h2>OBJEK PEMAJUAN KEBUDAYAAN</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="card card-opk-home">
          <h3>Jumlah Objek</h3>
          <h3><?= $opk; ?></h3>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card card-opk-home">
          <h3>Kategori</h3>
          <h3>11</h3>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card card-opk-home">
          <h3>Subkategori</h3>
          <h3>44</h3>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="container text-center">
    <div class="map-wrapper">
      <h2>LOKASI DINAS KEBUDAYAAN PROVINSI RIAU</h2>
      <iframe class="googlemap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1571.5004993708194!2d101.4533128700024!3d0.49467570388239357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aec052f966bf%3A0x1dd2d0617977a3ae!2sDinas%20Kebudayaan%20Provinsi%20Riau!5e0!3m2!1sid!2sid!4v1626854028784!5m2!1sid!2sid" width="1100" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>


  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      navbarFixedTopAnimation();
    });
  </script>