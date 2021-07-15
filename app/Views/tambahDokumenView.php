<div class="container">
    <div class="row">
        <div class="col-6 col-offset-3" style="max-width:100%">
            <div class="card">
                <form id="savedokumen" action="AdminController/savedokumen" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="judul">Judul/Nama File</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <label for="save">File</label>
                        <input style="display:inline-block" type="file" id="file" name="file" placeholder="" >
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>

        </div>
    </div>
</div>

</body>

</html>