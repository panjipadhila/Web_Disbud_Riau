<div class="container text-center">
    <div class="col-xs-12 col-md-12">
        <h2><?= $kategori; ?></h2>
    </div>
</div>
<div class="container ">
    <?php if (logged_in()) : ?>
        <a href="/tambahdata" class="btn btn-primary">Tambah data</a>
        <br></br>
    <?php endif; ?>
    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashData('pesan'); ?></div>
    <?php endif; ?>
    <table class="table table-color table-border-radius10 " id="dataTabelOpk">
        <thead class="thead thead-white-font">
            <?php if (logged_in()) : ?>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Sub-kategori</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col"></th>
                </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($opk as $opk) : ?>
                <tr class='clickable-row' data-href='/<?= $opk['id']; ?>'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $opk['nama'] ?></td>
                    <td><?= $opk['subkategori'] ?></td>
                    <td><?= $opk['lokasi'] ?></td>
                    <td><?= $opk['kondisi'] ?></td>
                    <td><a href="/opk/edit/<?= $opk['id']; ?>" class="btn btn-primary btn-sm">Edit</a> <a href="/opk/delete/<?= $kategori; ?>/<?= $opk['id']; ?>" class="btn btn-info btn-sm">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php else : ?>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Sub-kategori</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Kondisi</th>

        </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($opk as $opk) : ?>
                <tr class='clickable-row' data-href='/<?= $opk['id']; ?>'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $opk['nama'] ?></td>
                    <td><?= $opk['subkategori'] ?></td>
                    <td><?= $opk['lokasi'] ?></td>
                    <td><?= $opk['kondisi'] ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php endif; ?>

    </table>
</div>

<script>
    $(document).ready(function() {
        $('#dataTabelOpk').DataTable({
            language: {
                searchPlaceholder: "Nama/SubKategori/Lokasi"
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