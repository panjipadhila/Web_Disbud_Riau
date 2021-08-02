<div class="container">
    <div class="row">
        <div class="col-6 col-offset-3" style="max-width:100%">
            <div class="card">
                <form id="editNaskah" action="AdminController/do_edit_Naskah" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="kodeNaskah">Kode Naskah</label>
                        <input type="text" class="form-control" name="kodeNaskah" placeholder="Kode Naskah" value="<?= $naskah['kodeNaskah'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="judulNaskah">Judul Naskah</label>
                        <input type="text" class="form-control" name="judulNaskah" placeholder="Judul Naskah" value="<?= $naskah['judulNaskah'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="ukuranNaskah">Ukuran Naskah</label>
                        <input type="text" class="form-control" name="ukuranNaskah" placeholder="Ukuran Naskah" value="<?= $naskah['ukuranNaskah'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="watermark">Watermark</label>
                        <input type="text" class="form-control" name="watermark" placeholder="Watermark" value="<?= $naskah['watermark'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kondisiNaskah">Kondisi Naskah</label>
                        <input type="text" class="form-control" name="kondisiNaskah" placeholder="Kondisi Naskah" value="<?= $naskah['kondisiNaskah'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jumlahHalaman">Jumlah Halaman</label>
                        <input type="text" class="form-control" name="jumlahHalaman" placeholder="Jumlah Halaman" value="<?= $naskah['jumlahHalaman'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jumlahBarisPerHalaman">Jumlah Baris</label>
                        <input type="text" class="form-control" name="jumlahBarisPerHalaman" placeholder="Jumlah Baris" value="<?= $naskah['jumlahBarisPerHalaman'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="iluminasi">Iluminasi</label>
                        <input type="text" class="form-control" name="iluminasi" placeholder="Iluminasi" value="<?= $naskah['iluminasi'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="aksara">Aksara</label>
                        <input type="text" class="form-control" name="aksara" placeholder="Aksara" value="<?= $naskah['aksara'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="rubrikasi">Rubrikasi</label>
                        <input type="text" class="form-control" name="rubrikasi" placeholder="Rubrikasi" value="<?= $naskah['rubrikasi'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="bahasa">Bahasa</label>
                        <input type="text" class="form-control" name="bahasa" placeholder="Bahasa" value="<?= $naskah['bahasa'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kolofon">Kolofon</label>
                        <input type="text" class="form-control" name="kolofon" placeholder="Kolofon" value="<?= $naskah['kolofon'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>