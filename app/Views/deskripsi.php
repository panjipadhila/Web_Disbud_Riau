<div class="section-container">
  <div class="container text-left">
    <div class="card">
      <?php foreach ($opk as $detail) : ?>
        <div class="card-body">
        <?php if (logged_in()) : ?>
          <a href="/opk/edit/<?= $detail['id']; ?>" class="btn btn-primary btn-sm">Edit</a> 
          <a href="/opk/delete/<?= $detail['kategori']; ?>/<?= $detail['id']; ?>" class="btn btn-info btn-sm">Delete</a>
        <?php endif; ?>
          <h5 class="card-title"><?= $detail['nama'] ?></h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><?= $detail['kategori']; ?> - <?= $detail['subkategori'] ?></li>
        </ul>

        <img src="./assets/opk-images/<?= $detail['foto']; ?>" class="card-img-bottom">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><?= $detail['deskripsi'] ?></li>
        </ul>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Kondisi: <?= $detail['kondisi'] ?></li>
        </ul>
      <?php endforeach; ?>
    </div>
  </div>
</div>