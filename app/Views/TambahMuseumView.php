<div class="container">
    <div class="row">
        <div class="col-6 col-offset-3" style="max-width:100%">
            <div class="card">
                <form id="saveMuseum" action="AdminController/saveMuseum" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="namaopk">Nama Benda</label>
                        <input type="text" class="form-control" name="namaBenda" placeholder="Nama Benda">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Uraian</label>
                        <input type="text" class="form-control" name="uraian" placeholder="Uraian">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">No. Inventaris Lama</label>
                        <input type="text" class="form-control" name="noInventarisLama" placeholder="No. Inventatis Lama">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">No. Inventaris Baru</label>
                        <input type="text" class="form-control" name="noInventarisBaru" placeholder="No. Inventaris Baru">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">No. Regristrasi</label>
                        <input type="text" class="form-control" name="noRegister" placeholder="No. Registrasi">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Bahan</label>
                        <input type="text" class="form-control" name="bahan" placeholder="Bahan">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Bentuk</label>
                        <input type="text" class="form-control" name="bentuk" placeholder="Bentuk">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Fungsi</label>
                        <input type="text" class="form-control" name="fungsi" placeholder="Fungsi">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Ukuran</label>
                        <input type="text" class="form-control" name="ukuran" placeholder="Ukuran">
                    </div>
                    <div class="form-group">
                        <label for="start">Tanggal Masuk Barang</label>
                        <span style="display:inline-block;width:10px;"></span>
                        <input type="date" id="start" name="tanggal">
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
                        <label for="saveMuseum">Tanggal Pencatatan</label>
                        <span style="display:inline-block;width:10px;"></span>
                        <input type="date" id="start" name="tanggal">
                    </div>

                    <div class="form-group">
                        <label for="saveMuseum">Jenis</label>
                        <span style="display:inline-block;width:24px;"></span>
                        <select name="jenis" id="jenis">
                            <option>Pilih jenis inventaris</option>
                            <option>Biologika</option>
                            <option>Arkeologika</option>
                            <option>Geologika</option>
                            <option>Keramik</option>
                            <option>Historika</option>
                            <option>Seni Rupa</option>
                            <option>EtnoLogika</option>
                            <option>Katalogisasi Nasional</option>
                            <option>Teknologika</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="save">Asal Buat</label>
                        <span style="display:inline-block;width:24px;"></span>
                        <?php if (in_groups('admin-kabupaten')) : ?>
                            <select name="kabupaten" id="kabupaten">
                                <option><?= user()->lokasi; ?></option>
                            </select>
                        <?php else : ?>
                            <select name="asalBuat" id="kabupaten">
                                <option>Pilih Asal</option>
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
                            <select name="asalDapat" id="kabupaten">
                                <option>Pilih Asal</option>
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
                        <input style="display:inline-block" type="file" id="foto" name="gambar" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>

        </div>
    </div>
</div>

</body>

</html>