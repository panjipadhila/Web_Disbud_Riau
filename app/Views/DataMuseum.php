<div class="container text-center">
    <div class="col-xs-12 col-md-12">
        <h2><?= $jenis; ?></h2>
    </div>
</div>
<div class="container ">
    <?php if (logged_in()) : ?>
        <a href="/tambahdatamuseum" class="btn btn-primary">Tambah data</a>
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
                    <th scope="col">Kondisi Benda</th>
                    <th scope="col">Asal Dapat</th>
                    <th scope="col">Tempat Penyimpanan</th>
                    <th scope="col"></th>
                </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($museums as $museum) : ?>
                <tr class='clickable-row' data-href='/museum/<?= $museum['id']; ?>'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $museum['namaBenda'] ?></td>
                    <td><?= $museum['kondisiBenda'] ?></td>
                    <td><?= $museum['asalDapat'] ?></td>
                    <td><?= $museum['tempatPenyimpanan'] ?></td>
                    <td><a href="/museum/edit/<?= $museum['id']; ?>" class="btn btn-primary btn-sm">Edit</a> <a href="/museum/delete/<?= $museum['id']; ?>" onclick="return confirm('Are you sure you want to delete this item')" class="btn btn-info btn-sm">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php else : ?>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Kondisi Benda</th>
            <th scope="col">Asal Dapat</th>
            <th scope="col">Tempat Penyimpanan</th>

        </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($museums as $museum) : ?>
                <tr class='clickable-row' data-href='/museum/<?= $museum['id']; ?>'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $museum['namaBenda'] ?></td>
                    <td><?= $museum['kondisiBenda'] ?></td>
                    <td><?= $museum['tanggalMasuk'] ?></td>
                    <td><?= $museum['tempatPenyimpanan'] ?></td>

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
                searchPlaceholder: "Nama/Jenis"
            },
            rowReorder: {
                selector: 'td:nth-child(0)'
            },
            responsive: true
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