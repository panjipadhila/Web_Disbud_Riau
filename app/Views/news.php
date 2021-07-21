<div class="container">
    <h2 style="text-align:center;">GALLERY</h2>

    <?php if (logged_in() && in_groups('admin-pusat')) : ?>
        <a style="margin-left:1.3%;" href="/tambahGallery" class="btn btn-primary">Tambah data</a>
        <br></br>
        <?php if (session()->getFlashData('pesan')) : ?>
            <div style="margin-left:1.3%;" class="alert alert-success" role="alert"><?= session()->getFlashData('pesan'); ?></div>
        <?php endif; ?>
        <div class="row-fluid ">
            <?php foreach ($news as $elements) : ?>
                <div class="col-sm-4 ">
                    <div class="card-columns-fluid">
                        <div class="card" style="width: 35rem; height:63rem; ">
                            <img class="card-img-top" src="/doc/gallery/<?= $elements['foto']; ?>" alt="Card image cap">

                            <div class="card-body">
                                <h5 class="card-title"><b><?= $elements['judul']; ?></b></h5>
                                <b><?= $elements['created_at']; ?></b><br>
                                <p style="width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="card-text"><?= $elements['isi']; ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="/detailGallery/<?= $elements['id']; ?>" class="btn btn-primary">Full Details</a>
                                <a href="/deleteGallery/<?= $elements['id']; ?>" class="btn btn-info">Hapus data</a>
                            </div>
                        </div>
                    </div>
                </div>


            <?php endforeach; ?>

        </div>

</div>
<div class="container">
    <div class="col-sm-4">
        <?= $pager->links('news', 'bootstrap_pagination') ?>
    </div>
</div>
<?php else : ?>
    <div class="row-fluid ">

        <?php foreach ($news as $elements) : ?>
            <div class="col-sm-4 ">
                <div class="card-columns-fluid">
                    <div class="card" style="width: 35rem; height:63rem; ">
                        <img class="card-img-top" src="/doc/gallery/<?= $elements['foto']; ?>" alt="Card image cap">

                        <div class="card-body">
                            <h5 class="card-title"><b><?= $elements['judul']; ?></b></h5>
                            <b><?= $elements['created_at']; ?></b><br>
                            <p style="width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="card-text"><?= $elements['isi']; ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="/detailGallery/<?= $elements['id']; ?>" class="btn btn-primary">Full Details</a>
                        </div>
                    </div>
                </div>
            </div>


        <?php endforeach; ?>

    </div>

    </div>
    <div class="container">
        <div class="col-sm-4">
            <?= $pager->links('news', 'bootstrap_pagination') ?>
        </div>
    </div>
<?php endif; ?>


</div>