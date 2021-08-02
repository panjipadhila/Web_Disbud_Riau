<div class="container">
    <div class="row">
        <div class="col-6 col-offset-3" style="max-width:100%">
            <div class="card">
                <form id="saveNaskah" action="AdminController/saveNaskah" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="kodeNaskah">Kode Naskah</label>
                        <input type="text" class="form-control" name="kodeNaskah" placeholder="Kode Naskah">
                    </div>
                    <div class="form-group">
                        <label for="judulNaskah">Judul Naskah</label>
                        <input type="text" class="form-control" name="judulNaskah" placeholder="Judul Naskah">
                    </div>
                    <div class="form-group">
                        <label for="ukuranNaskah">Ukuran Naskah</label>
                        <input type="text" class="form-control" name="ukuranNaskah" placeholder="Ukuran Naskah">
                    </div>
                    <div class="form-group">
                        <label for="watermark">Watermark</label>
                        <input type="text" class="form-control" name="watermark" placeholder="Watermark">
                    </div>
                    <div class="form-group">
                        <label for="kondisiNaskah">Kondisi Naskah</label>
                        <input type="text" class="form-control" name="kondisiNaskah" placeholder="Kondisi Naskah">
                    </div>
                    <div class="form-group">
                        <label for="jumlahHalaman">Jumlah Halaman</label>
                        <input type="text" class="form-control" name="jumlahHalaman" placeholder="Jumlah Halaman">
                    </div>
                    <div class="form-group">
                        <label for="jumlahBarisPerHalaman">Jumlah Baris</label>
                        <input type="text" class="form-control" name="jumlahBarisPerHalaman" placeholder="Jumlah Baris">
                    </div>
                    <div class="form-group">
                        <label for="iluminasi">Iluminasi</label>
                        <input type="text" class="form-control" name="iluminasi" placeholder="Iluminasi">
                    </div>
                    <div class="form-group">
                        <label for="aksara">Aksara</label>
                        <input type="text" class="form-control" name="aksara" placeholder="Aksara">
                    </div>
                    <div class="form-group">
                        <label for="rubrikasi">Rubrikasi</label>
                        <input type="text" class="form-control" name="rubrikasi" placeholder="Rubrikasi">
                    </div>
                    <div class="form-group">
                        <label for="bahasa">Bahasa</label>
                        <input type="text" class="form-control" name="bahasa" placeholder="Bahasa">
                    </div>
                    <div class="form-group">
                        <label for="kolofon">Kolofon</label>
                        <input type="text" class="form-control" name="kolofon" placeholder="Kolofon">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>