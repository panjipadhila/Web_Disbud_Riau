<div class="container">
    <div class="row">
        <div class="col-6 col-offset-3" style="max-width:100%">
            <div class="card">
                <form id="save" action="AdminController/saveKegiatan" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="namaKegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="namaKegiatan" placeholder="Nama Kegiatan">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" class="form-control" name="tanggal" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="save">Foto</label>
                        <input style="display:inline-block" type="file" id="myFile" name="foto" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>