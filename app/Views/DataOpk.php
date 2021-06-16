
<div class="container text-center">
    <div class="col-xs-12 col-md-12">
        <h2></h2>
    </div>
</div>
<div class="container ">
    <table class="table table-fluid" id="dataTabelOpk">
        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">nama</th>
                <th scope="col">kategori</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Kondisi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($opk as $opk) : ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $opk['nama'] ?></td>
                    <td><?= $opk['kategori'] ?></td>
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
            searching: false,
        });
    });
</script>