<div class="card">
<?php foreach($opk as $detail): ?>  
  <div class="card-body">
    <h5 class="card-title"><?= $detail['nama']?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?= $detail['kategori']?></li>
  </ul>

  <img src="./assets/images/profil-01.jpg" class="card-img-bottom">
<?php endforeach; ?>
</div>