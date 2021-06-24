<div class="container text-center">
    <div class="col-xs-12 col-md-12">
        <h2>Kegiatan</h2>
    </div>
</div>
<div class="container ">

    <table class="table table-color table-border-radius10 " id="dataTabelOpk">
        <thead class="thead thead-white-font">
            <tr>
                <th scope="col">no</th>
                <th scope="col">nama</th>
                <th scope="col">tanggal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Kompetisi Olahraga Tradisional</td>
                <td>26-27 Juli 2021</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Festival Film Pendek Melayu Riau</td>
                <td>21 Juni - 31 Juli 2021</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Anugerah Budaya</td>
                <td>9 Agustus 2021</td>
            </tr>
        </tbody>
    </table>
</div>

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