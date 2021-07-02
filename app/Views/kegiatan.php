<div class="container text-center">
    <div class="col-xs-12 col-md-12">
        <h2>Kegiatan</h2>
    </div>
</div>
<div class="container ">
<?php if (logged_in()) : ?>
        <a href="/tambahdata" class="btn btn-primary">Tambah data</a>
        <br></br>
    <?php endif; ?>

                        <?php if (logged_in()) : ?>
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
                <tr class='clickable-row' data-href='/<?= $kegiatan['no_kegiatan']; ?>'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $kegiatan['nama_kegiatan'] ?></td>
                    <td><?= $kegiatan['tanggal'] ?></td>
                    <td><a href="/AdminController/edit" class="btn btn-primary btn-sm">Edit</a> <a href="/AdminController/delete" class="btn btn-info btn-sm">Delete</a></td>
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
                <tr class='clickable-row' data-href='/<?= $kegiatan['no_kegiatan']; ?>'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $kegiatan['nama_kegiatan'] ?></td>
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