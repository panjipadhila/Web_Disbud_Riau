<div class="container">
    <div class="row-fluid ">
    
    <?php foreach ( $news as $elements) : ?>
        <div class="col-sm-4 ">
            <div class="card-columns-fluid">
                <div class="card" style = "width: 33rem; " >
                    <img class="card-img-top"  src="assets/images/<?= $elements['foto']; ?>" alt="Card image cap">

                    <div class="card-body">
                        <h5 class="card-title"><b><?= $elements['judul']; ?></b></h5>
                        <p style="width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="card-text"><b><?= $elements['created_at']; ?></b></p>
                        <a href="#" class="btn btn-primary">Full Details</a>
                    </div>
                </div>
            </div>
        </div>
        

    <?php endforeach; ?>
    <?= $pager->links('bootstrap','bootstrap_pagination') ?>
    </div>
</div>
</div>