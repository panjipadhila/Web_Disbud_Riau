<div class="container">
    <div class="row">
        <div class="col-6 col-offset-3" style="max-width:100%">
            <div class="card">
                <form id="save" action="AdminController/saveMuseum" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="namaopk">Nama Benda</label>
                        <input type="text" class="form-control" name="namaBenda" placeholder="nama OPK">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Uraian</label>
                        <input type="text" class="form-control" name="uraian" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">No. Inventaris Lama</label>
                        <input type="text" class="form-control" name="noInventarisLama" placeholder="Kondisi">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">No. Inventaris Baru</label>
                        <input type="text" class="form-control" name="noInventarisBaru" placeholder="Link Video">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">No. Regristrasi</label>
                        <input type="text" class="form-control" name="noRegister" placeholder="Link Video">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Bahan</label>
                        <input type="text" class="form-control" name="bahan" placeholder="Link Video">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Bentuk</label>
                        <input type="text" class="form-control" name="bentuk" placeholder="Link Video">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Fungsi</label>
                        <input type="text" class="form-control" name="fungsi" placeholder="Link Video">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Ukuran</label>
                        <input type="text" class="form-control" name="ukuran" placeholder="Link Video">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Tanggal Masuk</label>
                        <input type="text" class="form-control" name="tanggalMasuk" placeholder="Link Video">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Kondisi Benda</label>
                        <input type="text" class="form-control" name="kondisiBenda" placeholder="Link Video">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Tempat Penyimpanan</label>
                        <input type="text" class="form-control" name="tempatPenyimpanan" placeholder="Link Video">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Dicatat Oleh</label>
                        <input type="text" class="form-control" name="dicatatOleh" placeholder="Link Video">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Lainnya</label>
                        <input type="text" class="form-control" name="lainnya" placeholder="Link Video">
                    </div>

                    <div class="form-group">
                        <label for="start">Tanggal</label>
                        <span style="display:inline-block;width:10px;"></span>
                        <input type="date" id="start" name="tanggal">
                    </div>

                    <div class="form-group">
                        <label for="save">Asal Buat</label>
                        <span style="display:inline-block;width:24px;"></span>
                        <?php if (in_groups('admin-kabupaten')) : ?>
                            <select name="kabupaten" id="kabupaten">
                                <option><?= user()->lokasi; ?></option>
                            </select>
                        <?php else : ?>
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
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="save">Asal Dapat</label>
                        <span style="display:inline-block;width:24px;"></span>
                        <?php if (in_groups('admin-kabupaten')) : ?>
                            <select name="kabupaten" id="kabupaten">
                                <option><?= user()->lokasi; ?></option>
                            </select>
                        <?php else : ?>
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
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="save">Gambar</label>
                        <input style="display:inline-block" type="file" id="foto" name="foto" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>

        </div>
    </div>
</div>

</body>

</html>