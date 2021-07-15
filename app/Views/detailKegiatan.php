<div class="section-container">
    <div class="container text-left">
        <div class="card">

            <div class="card-body">
                <h5 class="card-title"><?= $kegiatan['nama_kegiatan'] ?></h5>
            </div>
            <img src="/doc/kegiatan/<?= $kegiatan['foto']; ?>" class="card-img-bottom">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $kegiatan['tanggal'] ?></li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $kegiatan['deskripsi'] ?></li>
            </ul>

        </div>
    </div>
</div>