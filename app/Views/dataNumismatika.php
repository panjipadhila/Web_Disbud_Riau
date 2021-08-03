<div class="container text-center">
    <div class="col-xs-12 col-md-12">
        <h2>Numismatika</h2>
    </div>
</div>
<div class="container ">
    <?php if (logged_in()) : ?>
        <a href="tambahNumismatika" class="btn btn-primary">Tambah data</a>
        <br></br>
    <?php endif; ?>
    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashData('pesan'); ?></div>
    <?php endif; ?>
    <table class="table table-color table-border-radius10 " id="dataTabelnumismatika">
        <thead class="thead thead-white-font">
            <?php if (logged_in()) : ?>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Koleksi</th>
                    <th scope="col">No. Inventaris</th>
                    <th scope="col">Sisi Depan</th>
                    <th scope="col">Sisi Belakang</th>
                    <th scope="col">Masa Peredaran</th>
                    <th scope="col">Delinavit</th>
                    <th scope="col">Ukuran</th>
                </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($numismatika as $numismatika) : ?>
                <tr class='clickable-row' data-href='/museum/<?= $numismatika['id']; ?>'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $numismatika['namaKoleksi'] ?></td>
                    <td><?= $numismatika['noInventaris'] ?></td>
                    <td><?= $numismatika['sisiMuka'] ?></td>
                    <td><?= $numismatika['sisiBelakang'] ?></td>
                    <td><?= $numismatika['delinavit'] ?></td>
                    <td><?= $numismatika['ukuran'] ?></td>
                    <td><a href="/numismatika/edit/<?= $numismatika['id']; ?>" class="btn btn-primary btn-sm">Edit</a> <a href="/numismatika/delete/<?= $numismatika['id']; ?>" onclick="return confirm('Are you sure you want to delete this item')" class="btn btn-info btn-sm">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php else : ?>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Koleksi</th>
            <th scope="col">No. Inventaris</th>
            <th scope="col">sisiMuka</th>
            <th scope="col">sisiBelakang</th>
            <th scope="col">Masa Peredaran</th>
            <th scope="col">Delinavit</th>
            <th scope="col">Ukuran</th>
        </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($numismatika as $numismatika) : ?>
                <tr class='clickable-row' data-href='/museum/<?= $numismatika['id']; ?>'>
                    <td><?= $numismatika['namaKoleksi'] ?></td>
                    <td><?= $numismatika['noInventaris'] ?></td>
                    <td><?= $numismatika['sisiMuka'] ?></td>
                    <td><?= $numismatika['sisiBelakang'] ?></td>
                    <td><?= $numismatika['delinavit'] ?></td>
                    <td><?= $numismatika['ukuran'] ?></td>
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
        $('#dataTabelnumismatika').DataTable({
            language: {
                searchPlaceholder: "Nama/Judul",
            },

        });
    });

    // jQuery(document).ready(function($) {
    //     $(".clickable-row").click(function() {
    //         window.location = $(this).data("href");
    //     });
    // });

    $(function() {
        $("#dataTabelnumismatika").dataTable();
        $(document).on('click', ".clickable-row", function() {
            window.location = $(this).data("href");
        });
    });
</script>