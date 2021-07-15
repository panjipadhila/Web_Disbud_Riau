<div class="container text-center">
    <div class="col-xs-12 col-md-12">
        <h2>Dokumen</h2>
    </div>
</div>
<div class="container ">
    <?php if (logged_in()) : ?>
        <a href="/tambahdokumen" class="btn btn-primary">Tambah data</a>
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
                    <th scope="col">File</th>
                    <th scope="col"></th>
                </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($dokumen as $dokumen) : ?>
                <tr class='clickable-row' data-href='#'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $dokumen['nama'] ?></td>
                    <td><?= $dokumen['file'] ?></td>
                    <td><a href="/dokumen/download/<?= $dokumen['id']; ?>" class="btn btn-normal btn-sm">Download</a> <a href="/dokumen/readOnline/<?= $dokumen['id']; ?>" class="btn btn-normal-blue btn-sm">Read Online</a> <a href="/dokumen/delete/<?= $dokumen['id']; ?>" class="btn btn-info btn-sm">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php else : ?>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">File</th>

        </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($dokumen as $dokumen) : ?>
                <tr class='clickable-row' data-href='#'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $dokumen['nama'] ?></td>
                    <td><a href="/dokumen/download/<?= $dokumen['id']; ?>" class="btn btn-normal btn-sm">Download</a> <a href="/dokumen/readOnline/<?= $dokumen['id']; ?>" class="btn btn-normal-blue btn-sm">Read Online</a></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php endif; ?>

    </table>
</div>

<script>
    // function deleteAlert(){
    //     var alert=confirm("Delete Item?");
    //     if(alert){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

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