<section class="container p-t-3">
  <div class="row">
    <div class="col-lg-12">
      <h2 style="text-align : center">Gallery Dinas Kebudayaan Provinsi Riau</h2>
    </div>
  </div>
</section>
<div class="container">
  <?php if (logged_in()) : ?>
  <br>
    <a href="/tambahgallery" class="btn btn-primary">Tambah Gallery</a>
    <br></br>
  <?php endif; ?>
  <?php if (session()->getFlashData('pesan')) : ?>
    <div class="alert alert-success" role="alert"><?= session()->getFlashData('pesan'); ?></div>
  <?php endif; ?>
</div>
<section class="carousel slide" data-ride="carousel" id="postsCarousel">
  <div class="container">
    <div class="row row-flex">
      <div class="col-12 text-right mb-4">
        <a class="btn btn-outline-secondary prev" href="" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
        <a class="btn btn-outline-secondary next" href="" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
      </div>
    </div>
  </div>
  <div class="container p-t-0 m-t-2 carousel-inner">
    <div class=" row row-flex row-equal carousel-item active m-t-0">
      <div class="col-md-4">
        <div class="card">
          <div class="card-img-top card-img-top-250">
            <img style="height: 300px; width: 300px;" class="img-fluid" src="assets/images/img-04.jpg" alt="Carousel 1">
          </div>
          <div class="card-block p-t-2">
            <div class="card-header">
              <h3>flower1</h3>
            </div>
            <div class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium
              animi molestias veritatis, pariatur dolorem error non reprehenderit vero, id. Incidunt
              hic laudantium soluta recusandae, voluptas libero et! Ipsa, maiores, ratione.</div>
          </div>
        </div>
      </div>
     
    </div>
  </div>
</section>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script>
  (function($) {
    "use strict";
    $('.next').click(function() {
      $('.carousel').carousel('next');
      return false;
    });
    $('.prev').click(function() {
      $('.carousel').carousel('prev');
      return false;
    });
  })
  (jQuery);
</script>