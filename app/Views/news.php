<div class="container">
  <h2 style="text-align:center">Gallery Dinas Kebudayaan Provinsi Riau</h2>
    <!-- foreach disini -->
      <div class="col-md-4">
        <div class="card" style="width: 30rem;">
          <img style="width: 220px; height: 220px;" class="card-img-top" src="\assets\images\img-04.jpg" alt="Card image cap">
            <div class="card-body">
             <h6 class="card-title">Istana Siak</h6>
             <a href="#" class="btn btn-primary">Read More</a>
            </div>
        </div>
      </div>
     <!-- tutup foreach disini -->
    </div>
  </div>
</div>






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