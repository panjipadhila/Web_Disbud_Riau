<div class="section-container">
    <div class="container text-left">
        <div class="card">
            <div class="card-body">
                <?php if (logged_in()) : ?>
                    <a href="/museum/edit/<?= $museum['id']; ?>" class="btn btn-primary btn-sm">Edit</a> 
                    <a href="/museum/delete/<?= $museum['id']; ?>" onclick="return confirm('Are you sure you want to delete this item')" class="btn btn-info btn-sm">Delete</a>
                <?php else : ?>
                <?php endif; ?>
                <h5 class="card-title"><?= $museum['namaBenda'] ?></h5>
            </div>
            <img style="width:70rem" src="/assets/museum-images/<?= $museum['gambar']; ?>" alt="<?= $museum['gambar']; ?>" class="card-img-bottom">

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="bahan" class="col-sm-2">Bahan</label>
                    <div>
                        <?= $museum['bahan'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="uraian" class="col-sm-2">Uraian</label>
                    <div>
                        <?= $museum['uraian'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="noinventarislama" class="col-sm-2">No. Inventaris Lama</label>
                    <div>
                        <?= $museum['noInventarisLama'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="noinventarisbaru" class="col-sm-2">No. Inventaris Baru</label>
                    <div>
                        <?= $museum['noInventarisBaru'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="noregister" class="col-sm-2">No. Registrasi</label>
                    <div>
                        <?= $museum['noRegister'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="bentuk" class="col-sm-2">bentuk</label>
                    <div>
                        <?= $museum['bentuk'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="fungsi" class="col-sm-2">Fungsi</label>
                    <div>
                        <?= $museum['fungsi'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="ukuran" class="col-sm-2">Ukuran</label>
                    <div>
                        <?= $museum['ukuran'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="asalbuat" class="col-sm-2">Asal Buat</label>
                    <div>
                        <?= $museum['asalBuat'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="asalDapat" class="col-sm-2">Asal Dapat</label>
                    <div>
                        <?= $museum['asalDapat'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="caraDapat" class="col-sm-2">Cara Dapat</label>
                    <div>
                        <?= $museum['caraDapat'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="tanggal" class="col-sm-2">Tanggal Masuk Barang</label>
                    <div>
                        <?= $museum['tanggalMasuk'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="kondisiBenda" class="col-sm-2">Kondisi Benda</label>
                    <div>
                        <?= $museum['kondisiBenda'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="tempatPenyimpanan" class="col-sm-2">Tempat Penyimpanan</label>
                    <div>
                        <?= $museum['tempatPenyimpanan'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="dicatatOleh" class="col-sm-2">Dicatat Oleh</label>
                    <div>
                        <?= $museum['dicatatOleh'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="lainnya" class="col-sm-2">Lainnya</label>
                    <div>
                        <?= $museum['lainnya'] ?>
                    </div>
                </li>
            </ul>
            
        </div>
    </div>
</div>