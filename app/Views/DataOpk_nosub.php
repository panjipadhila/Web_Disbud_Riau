<div class="container text-center">
    <div class="col-xs-12 col-md-12">
        <h2><?= $kategori; ?></h2>
    </div>
</div>
<div class="container ">
    <table class="table table-color table-border-radius10 " id="dataTabelOpk">
        <thead class="thead thead-white-font">
            <tr>
                <th scope="col">no</th>
                <th scope="col">nama</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Kondisi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($opk as $opk) : ?>
                <tr class='clickable-row' data-href='/<?= $opk['no']; ?>'>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $opk['nama'] ?></td>
                    <td><?= $opk['lokasi'] ?></td>
                    <td><?= $opk['kondisi'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
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

    $(function() {
        $("#dataTabelOpk").dataTable();
        $(document).on('click', ".clickable-row", function() {
            window.location = $(this).data("href");
        });
    });
</script>