<div class="container">
    <div class="row">
        <div class="col-6 col-offset-3" style="max-width:100%">
            <div class="card">
                <form id="edit" action="/AdminController/do_editMuseum/<?= $museum['id']; ?>" method="post">
                    <input type="hidden" name="id" value="<?= $museum['id'] ?>">
                    <div class="form-group">
                        <label for="namaopk">Nama Benda</label>
                        <input type="text" class="form-control" name="namaBenda" placeholder="Nama Benda" value="<?= $museum['namaBenda'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Uraian</label>
                        <input type="text" class="form-control" name="uraian" placeholder="Uraian" value="<?= $museum['uraian'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">No. Inventaris Lama</label>
                        <input type="text" class="form-control" name="noInventarisLama" placeholder="No. Inventaris Lama" value="<?= $museum['noInventarisLama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">No. Inventaris Baru</label>
                        <input type="text" class="form-control" name="noInventarisBaru" placeholder="No. Inventaris baru" value="<?= $museum['noInventarisBaru'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">No. Regristrasi</label>
                        <input type="text" class="form-control" name="noRegister" placeholder="No. Regristrasi" value="<?= $museum['noRegister'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Bahan</label>
                        <input type="text" class="form-control" name="bahan" placeholder="Bahan" value="<?= $museum['bahan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Bentuk</label>
                        <input type="text" class="form-control" name="bentuk" placeholder="Bentuk" value="<?= $museum['bentuk'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Fungsi</label>
                        <input type="text" class="form-control" name="fungsi" placeholder="Fungsi" value="<?= $museum['fungsi'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Ukuran</label>
                        <input type="text" class="form-control" name="ukuran" placeholder="Ukuran" value="<?= $museum['ukuran'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="start">Tanggal Masuk Barang</label>
                        <span style="display:inline-block;width:10px;"></span>
                        <input type="date" id="start" name="tanggalMasuk" value="<?= $museum['tanggalMasuk'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Kondisi Benda</label>
                        <input type="text" class="form-control" name="kondisiBenda" placeholder="Kondisi Benda" value="<?= $museum['kondisiBenda'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Tempat Penyimpanan</label>
                        <input type="text" class="form-control" name="tempatPenyimpanan" placeholder="Tempat Penyimpanan" value="<?= $museum['tempatPenyimpanan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Dicatat Oleh</label>
                        <input type="text" class="form-control" name="dicatatOleh" placeholder="Dicatat Oleh" value="<?= $museum['dicatatOleh'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="linkVideo">Lainnya</label>
                        <input type="text" class="form-control" name="lainnya" placeholder="Lainnya" value="<?= $museum['lainnya'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="start">Tanggal Pencatatan</label>
                        <span style="display:inline-block;width:10px;"></span>
                        <input type="date" id="start" name="tanggal" value="<?= $museum['tanggal'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="save">Jenis</label>
                        <span style="display:inline-block;width:24px;"></span>
                        <select name="jenis" id="jenis" value="<?= $museum['jenis'] ?>">
                            <option><?= $museum['jenis']; ?></option>
                            <option>Biologika</option>
                            <option>Arkeologika</option>
                            <option>Geologika</option>
                            <option>Keramik</option>
                            <option>Historika</option>
                            <option>Seni Rupa</option>
                            <option>EtnoLogika</option>
                            <option>Katalogisasi Nasional</option>
                            <option>Teknologika</option>
                            <option>Pelalawan</option>
                            <option>Kuantan Singingi</option>
                            <option>Kepulauan Meranti</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="save">Asal Buat</label>
                        <span style="display:inline-block;width:24px;"></span>

                        <select name="asalBuat" id="kabupaten" value="<?= $museum['asalBuat'] ?>">
                            <option><?= $museum['asalBuat'] ?></option>
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
                        <label for="save">Asal Dapat</label>
                        <span style="display:inline-block;width:24px;"></span>

                        <select name="asalDapat" id="kabupaten" value="<?= $museum['asalDapat'] ?>">
                            <option><?= $museum['asalDapat'] ?></option>
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
                        <label for="save">Gambar</label>
                        <input style="display:inline-block" type="file" id="foto" name="gambar" placeholder="" value="<?= $museum['gambar'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>

        </div>
    </div>
</div>

</body>

</html>