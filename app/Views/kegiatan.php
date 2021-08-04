<div class="container text-center">
    <div class="col-xs-12 col-md-12">
        <h2>Kegiatan</h2>
    </div>
</div>
<div class="container ">
    <?php if (logged_in() && in_groups('admin-pusat')) : ?>
        <a href="tambahKegiatan" class="btn btn-primary">Tambah kegiatan</a>
        <br></br>
    <?php endif; ?>
    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashData('pesan'); ?></div>
    <?php endif; ?>
    <?php if (logged_in() && in_groups('admin-pusat')) : ?>
        <table class="table table-color table-border-radius10 " id="dataTabelOpk">
            <thead class="thead thead-white-font">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kegiatan as $kegiatan) : ?>
                    <tr class='clickable-row' data-href='kegiatan/<?= $kegiatan['id']; ?>'>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $kegiatan['nama_kegiatan'] ?></td>
                        <td><?= $kegiatan['tanggal'] ?></td>
                        <td><a href="/AdminController/editKegiatan/<?= $kegiatan['id']; ?>" class="btn btn-primary btn-sm">Edit</a> <a href="/AdminController/deleteKegiatan/<?= $kegiatan['id']; ?>" class="btn btn-info btn-sm">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>

<?php else : ?>
    <table class="table table-color table-border-radius10 " id="dataTabelOpk">
        <thead class="thead thead-white-font">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($kegiatan as $kegiatan) : ?>
                <tr class='clickable-row' data-href='kegiatan/<?= $kegiatan['id']; ?>'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $kegiatan['nama_kegiatan']; ?></td>
                    <td><?= $kegiatan['tanggal'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

<?php endif; ?>


<script>
    $(document).ready(function() {
        $('#dataTabelOpk').DataTable({
            language: {
                searchPlaceholder: "Kegiatan"
            }
        });
    });

    // jQuery(document).ready(function($) {
    //     $(".clickable-row").click(function() {
    //         window.location = $(this).data("href");
    //     });
    // });

    $(function() {
        $("#dataTabelOpk").dataTable();
        $(document).on('click', ".clickable-row", function() {
            window.location = $(this).data("href");
        });
    });
</script>