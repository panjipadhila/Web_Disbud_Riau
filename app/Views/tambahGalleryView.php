<div class="container">
    <div class="row">
        <div class="col-6 col-offset-3" style="max-width:100%">
            <div class="card">
                <form id="save" action="AdminController/saveGallery" method="post">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea type="text" rows="10" class="form-control" name="isi" placeholder="Isi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" name="penulis" placeholder="Penulis">
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