<div class="container">
    <div class="row">
        <div class="col-6 col-offset-3">
            <div class="card">
                <form id="save" action="AdminController/save" method="post">
                    <div class="form-group">
                        <label for="namaopk">Nama OPK</label>
                        <input type="text" class="form-control" name="namaopk" placeholder="nama OPK">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <input type="text" class="form-control" name="kondisi" placeholder="Kondisi">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Link Video</label>
                        <input type="text" class="form-control" name="linkVideo" placeholder="Link Video">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <span style="display:inline-block;width:43px;"></span>
                        <select name="Kategori" id="kategori">
                            <option>Pilih Kategori</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="save">sub-Kategori</label>
                        <span style="display:inline-block;width:10px;"></span>
                        <select name="subKategori" id="subKategori">
                            <option>Pilih Sub Kategori</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="save">Kabupaten</label>
                        <span style="display:inline-block;width:24px;"></span>
                        <select name="kabupaten" id="kabupaten">
                            <option>Pilih Kabupaten</option>
                            <option>Pekanbaru</option>
                            <option>Kampar</option>
                            <option>Siak Sri Indrapura</option>
                            <option>Rokan Hulu</option>
                            <option>Rokan Hilir</option>
                            <option>Indragiri Hulu</option>
                            <option>Indragiri Hilir</option>
                            <option>Bengkalis</option>
                            <option>Dumai</option>
                            <option>Pelalawan</option>
                            <option>Kuantan Singingi</option>
                            <option>Kepulauan Meranti</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="save">Gambar OPK</label>
                        <input style="display:inline-block" type="file" id="myFile" name="filename" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>

        </div>
    </div>
</div>

</body>

</html>