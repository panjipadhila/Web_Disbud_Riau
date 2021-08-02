<div class="container text-center">
    <div class="col-xs-12 col-md-12">
        <h2>Naskah</h2>
    </div>
</div>
<div class="container ">
    <?php if (logged_in()) : ?>
        <a href="#" class="btn btn-primary">Tambah data</a>
        <br></br>
    <?php endif; ?>
    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashData('pesan'); ?></div>
    <?php endif; ?>
    <table class="table table-color table-border-radius10 " id="dataTabelOpk">
        <thead class="thead thead-white-font">
            <?php if (logged_in()) : ?>
                <tr>
                    <th scope="col">Kode Naskah</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Ukuran</th>
                    <th scope="col">Watermark</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Halaman</th>
                    <th scope="col">Baris</th>
                    <th scope="col">Aksara</th>
                    <th scope="col">Rubrikasi</th>
                    <th scope="col">Bahasa</th>
                    <th scope="col">Kolofon</th>
                </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($naskah as $naskah) : ?>
                <tr class='clickable-row' data-href='/museum/<?= $naskah['id']; ?>'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $naskah['kodeNaskah'] ?></td>
                    <td><?= $naskah['judulNaskah'] ?></td>
                    <td><?= $naskah['ukuranNaskah'] ?></td>
                    <td><?= $naskah['watermark'] ?></td>
                    <td><?= $naskah['kondisiNaskah'] ?></td>
                    <td><?= $naskah['jumlahHalaman'] ?></td>
                    <td><?= $naskah['jumlahBarisPerHalaman'] ?></td>
                    <td><?= $naskah['iluminasi'] ?></td>
                    <td><?= $naskah['aksara'] ?></td>
                    <td><?= $naskah['rubrikasi'] ?></td>
                    <td><?= $naskah['bahasan'] ?></td>
                    <td><?= $naskah['kolofon'] ?></td>
                    <td><a href="/naskah/edit/<?= $naskah['id']; ?>" class="btn btn-primary btn-sm">Edit</a> <a href="/naskah/delete/<?= $naskah['id']; ?>" onclick="return confirm('Are you sure you want to delete this item')" class="btn btn-info btn-sm">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php else : ?>
        <tr>
        <th scope="col">Judul</th>
            <th scope="col">Ukuran</th>
            <th scope="col">Watermark</th>
            <th scope="col">Kondisi</th>
            <th scope="col">Halaman</th>
            <th scope="col">Baris</th>
            <th scope="col">Aksara</th>
            <th scope="col">Rubrikasi</th>
            <th scope="col">Bahasa</th>
            <th scope="col">Kolofon</th>
        </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($naskah as $naskah) : ?>
                <tr class='clickable-row' data-href='/museum/<?= $naskah['id']; ?>'>
                    <td><?= $naskah['judulNaskah'] ?></td>
                    <td><?= $naskah['ukuranNaskah'] ?></td>
                    <td><?= $naskah['watermark'] ?></td>
                    <td><?= $naskah['kondisiNaskah'] ?></td>
                    <td><?= $naskah['jumlahHalaman'] ?></td>
                    <td><?= $naskah['jumlahBarisPerHalaman'] ?></td>
                    <td><?= $naskah['iluminasi'] ?></td>
                    <td><?= $naskah['aksara'] ?></td>
                    <td><?= $naskah['rubrikasi'] ?></td>
                    <td><?= $naskah['bahasan'] ?></td>
                    <td><?= $naskah['kolofon'] ?></td>
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
                searchPlaceholder: "Nama/Judul"
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