<div class="section-container">
    <div class="container text-left">
        <div class="card">
            <div class="card-body">
                <?php if (logged_in()) : ?>
                    <a href="/numismatika/edit/<?= $numismatika['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="/numismatika/delete/<?= $numismatika['id']; ?>" onclick="return confirm('Are you sure you want to delete this item')" class="btn btn-info btn-sm">Delete</a>
                <?php else : ?>
                <?php endif; ?>
                <h5 class="card-title"><?= $numismatika['namaKoleksi'] ?></h5>
            </div>
            <img style="width:70rem" src="/assets/museum-images/<?= $numismatika['foto']; ?>" class="card-img-bottom">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="noInventaris" class="col-sm-2">Np. Inventaris</label>
                    <div>
                        <?= $numismatika['noInventaris'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="sisiMuka" class="col-sm-2">Sisi Muka</label>
                    <div>
                        <?= $numismatika['sisiMuka'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="sisiBelakang" class="col-sm-2">Sisi Belakang</label>
                    <div>
                        <?= $numismatika['sisiBelakang'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="emisi" class="col-sm-2">Emisi</label>
                    <div>
                        <?= $numismatika['emisi'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="seri" class="col-sm-2">Seri</label>
                    <div>
                        <?= $numismatika['seri'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="tandaTangan" class="col-sm-2">Tanda Tangan</label>
                    <div>
                        <?= $numismatika['tandaTangan'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="pengaman" class="col-sm-2">Pengaman</label>
                    <div>
                        <?= $numismatika['pengaman'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="mintmaster" class="col-sm-2">Mintmaster</label>
                    <div>
                        <?= $numismatika['mintmaster'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="mintmark" class="col-sm-2">Mintmark</label>
                    <div>
                        <?= $numismatika['mintmark'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="masaPeredaran" class="col-sm-2">Masa Peredaran</label>
                    <div>
                        <?= $numismatika['masaPeredaran'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="delinavit" class="col-sm-2">Delinavit</label>
                    <div>
                        <?= $numismatika['delinavit'] ?>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="ukuran" class="col-sm-2">Ukuran</label>
                    <div>
                        <?= $numismatika['ukuran'] ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>