<div class="section-container">
    <div class="container text-left">
        <div style="min-width:30rem;" class="card">
            <div class="card-body">
                <?php if (logged_in()) : ?>
                    <a href="/AdminController/editKegiatan/<?= $kegiatan['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="/AdminController/deleteKegiatan/<?= $kegiatan['id']; ?>" class="btn btn-info btn-sm">Delete</a>
                <?php else : ?>
                <?php endif; ?>
                <h5 class="card-title"><?= $kegiatan['nama_kegiatan'] ?></h5>
            </div>
            <img style="min-width:25rem;" src="/doc/kegiatan/<?= $kegiatan['foto']; ?>" class="card-img-bottom">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $kegiatan['tanggal'] ?></li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $kegiatan['deskripsi'] ?></li>
            </ul>

        </div>
    </div>
</div>