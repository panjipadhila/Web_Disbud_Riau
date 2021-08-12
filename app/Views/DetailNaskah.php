<div class="section-container">
    <div class="container text-left">
        <div class="card">
            <div class="card-body">
                <?php if (logged_in()) : ?>
                    <a href="/naskah/edit/<?= $naskah['id']; ?>" class="btn btn-primary btn-sm">Edit</a> 
                    <a href="/naskah/delete/<?= $naskah['id']; ?>" onclick="return confirm('Are you sure you want to delete this item')" class="btn btn-info btn-sm">Delete</a>
                <?php else : ?>
                <?php endif; ?>
                <h5 class="card-title"><?= $naskah['judulNaskah'] ?></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="kodeNaskah" class="col-sm-2">Kode Naskah</label>
                    <div>
                        <?= $naskah['kodeNaskah'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="ukuranNaskah" class="col-sm-2">Ukuran Naskah</label>
                    <div>
                        <?= $naskah['ukuranNaskah'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="watermark" class="col-sm-2">Watermark</label>
                    <div>
                        <?= $naskah['watermark'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="kondisiNaskah" class="col-sm-2">Kondisi Naskah</label>
                    <div>
                        <?= $naskah['kondisiNaskah'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="jumlahHalaman" class="col-sm-2">Jumlah Halaman</label>
                    <div>
                        <?= $naskah['jumlahHalaman'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="jumlahBarisPerHalaman" class="col-sm-2">Jumlah Baris</label>
                    <div>
                        <?= $naskah['jumlahBarisPerHalaman'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="iluminasi" class="col-sm-2">Iluminasi</label>
                    <div>
                        <?= $naskah['iluminasi'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="aksara" class="col-sm-2">Aksara</label>
                    <div>
                        <?= $naskah['aksara'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="rubrikasi" class="col-sm-2">Rubrikasi</label>
                    <div>
                        <?= $naskah['rubrikasi'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="bahasa" class="col-sm-2">Bahasa</label>
                    <div>
                        <?= $naskah['bahasa'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="kolofon" class="col-sm-2">Kolofon</label>
                    <div>
                        <?= $naskah['kolofon'] ?>
                    </div>
                </li>
            </ul>    
        </div>
    </div>
</div>