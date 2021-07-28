<div class="container">
    <div class="row-fluid ">
        <div class=" col-sm-4 ">
            <div class=" card-columns-fluid">
                <div class="card" style="width: 35rem; height:42rem; ">
                    <div class="card-header-center">
                        <img style="width: 20rem; height:20rem;" class="card-img-top" src="/assets/images/user.png" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><b><?= user()->lokasi; ?></b></h5>
                        <h7 style="color:blue">Admin Sekarang</h7>
                    </div>
                    <div class="card-footer">
                        <b><?= user()->username; ?></b><br>
                        <p style="width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="card-text"><?= user()->email; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashData('pesan'); ?></div>
    <?php endif; ?>
    <div class=" row-fluid ">

        <?php foreach ($users as $elements) : ?>
            <?php if ($elements['id'] != user_id()) : ?>
                <div class=" col-sm-4 ">
                    <div class=" card-columns-fluid">
                        <div class="card" style="width: 35rem; height:48rem; ">
                            <div class="card-header-center">
                                <img style="width: 20rem; height:20rem;" class="card-img-top" src="/assets/images/user.png" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><b><?= $elements['lokasi']; ?></b></h5>
                            </div>
                            <div class="card-footer">
                                <b><?= $elements['username']; ?></b><br>
                                <p style="width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="card-text"><?= $elements['email']; ?></p>
                                <a href="/deleteUsers/<?= $elements['id']; ?>" class="btn btn-info" onclick="return confirm('Yakin ingin menghapus Admin ini?')">Hapus Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
</div>