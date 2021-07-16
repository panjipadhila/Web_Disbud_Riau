<div class="section-container">
  <div class="container text-left">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?= $news['judul'] ?></h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><?= $news['created_at'] ?></li>
        </ul>

        <img src="/doc/gallery/<?= $news['foto']; ?>" class="card-img-bottom">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><?= $news['isi'] ?></li>
        </ul>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Penulis: <?= $news['penulis'] ?></li>
        </ul>
    </div>
  </div>
</div>