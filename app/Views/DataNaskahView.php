<div class="container text-center">
    <div class="col-xs-12 col-md-12">
        <h2>Naskah</h2>
    </div>
</div>
<div class="container ">
    <?php if (logged_in()) : ?>
        <a href="tambahNaskah" class="btn btn-primary">Tambah data</a>
        <br></br>
    <?php endif; ?>
    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashData('pesan'); ?></div>
    <?php endif; ?>
    <table class="table table-color table-border-radius10 " id="dataTabelnaskah">
        <thead class="thead thead-white-font">
            <?php if (logged_in()) : ?>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Naskah</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Aksara</th>
                    <th scope="col">Bahasa</th>
                    <th scope="col"></th>
                </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($naskah as $naskah) : ?>
                <tr class='clickable-row' data-href='Naskah'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $naskah['kodeNaskah'] ?></td>
                    <td><?= $naskah['judulNaskah'] ?></td>
                    <td><?= $naskah['aksara'] ?></td>
                    <td><?= $naskah['bahasa'] ?></td>
                    <td><a href="/naskah/edit/<?= $naskah['id']; ?>" class="btn btn-primary btn-sm">Edit</a> <a href="/naskah/delete/<?= $naskah['id']; ?>" onclick="return confirm('Are you sure you want to delete this item')" class="btn btn-info btn-sm">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php else : ?>
        <tr>
            <th scope="col">Judul</th>
            <th scope="col">Kode Naskah</th>
            <th scope="col">Rubrikasi</th>
            <th scope="col">Bahasa</th>
        </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($naskah as $naskah) : ?>
                <tr class='clickable-row' data-href='Naskah'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $naskah['kodeNaskah'] ?></td>
                    <td><?= $naskah['judulNaskah'] ?></td>
                    <td><?= $naskah['aksara'] ?></td>
                    <td><?= $naskah['bahasa'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php endif; ?>

    </table>
</div>

<script>
    $(document).ready(function() {
        $('#dataTabelnaskah').DataTable({
            language: {
                searchPlaceholder: "Nama/Judul",
            },
            "paging": true,
        });
    });

    // jQuery(document).ready(function($) {
    //     $(".clickable-row").click(function() {
    //         window.location = $(this).data("href");
    //     });
    // });

    $(function() {
        $("#dataTabelnaskah").dataTable();
        $(document).on('click', ".clickable-row", function() {
            window.location = $(this).data("href");
        });
    });
</script>