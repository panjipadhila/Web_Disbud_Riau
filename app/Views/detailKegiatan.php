<div class="section-container">
    <div class="container text-left">
        <div style="min-width:30rem;" class="card">

            <div class="card-body">
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