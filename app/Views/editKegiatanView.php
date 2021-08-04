<div class="container">
    <div class="row">
        <div class="col-6 col-offset-3" style="max-width:100%">
            <div class="card">
                <form id="save" action="/AdminController/do_editKegiatan/<?= $kegiatan['id']; ?>" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="namaKegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="namaKegiatan" value="<?= $kegiatan['nama_kegiatan']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" class="form-control" name="tanggal" value="<?= $kegiatan['tanggal']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" value="<?= $kegiatan['deskripsi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="save">Foto</label>
                        <input style="display:inline-block" type="file" id="myFile" name="foto" placeholder="" value="<?= $kegiatan['foto']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>