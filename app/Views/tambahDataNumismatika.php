<div class="container">
    <div class="row">
        <div class="col-6 col-offset-3" style="max-width:100%">
            <div class="card">
                <form id="saveNumismatika" action="AdminController/saveNumismatika" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="namaKoleksi">Nama Koleksi</label>
                        <input type="text" class="form-control" name="namaKoleksi" placeholder="Kode Naskah">
                    </div>
                    <div class="form-group">
                        <label for="noInventaris">No.Inventaris</label>
                        <input type="text" class="form-control" name="noInventaris" placeholder="No.Inventaris">
                    </div>
                    <div class="form-group">
                        <label for="sisiMuka">Sisi Muka</label>
                        <input type="text" class="form-control" name="sisiMuka" placeholder="Sisi Muka">
                    </div>
                    <div class="form-group">
                        <label for="sisiBelakang">Sisi Belakang</label>
                        <input type="text" class="form-control" name="sisiBelakang" placeholder="Sisi Belakang">
                    </div>
                    <div class="form-group">
                        <label for="emisi">Emisi</label>
                        <input type="text" class="form-control" name="emisi" placeholder="emisi">
                    </div>
                    <div class="form-group">
                        <label for="seri">Seri</label>
                        <input type="text" class="form-control" name="seri" placeholder="Seri">
                    </div>
                    <div class="form-group">
                        <label for="tandaTangan">Tanda Tangan</label>
                        <input type="text" class="form-control" name="tandaTangan" placeholder="Tanda Tangan">
                    </div>
                    <div class="form-group">
                        <label for="pengaman">Pengaman</label>
                        <input type="text" class="form-control" name="pengaman" placeholder="Pengaman">
                    </div>
                    <div class="form-group">
                        <label for="mintmaster">Mintmaster</label>
                        <input type="text" class="form-control" name="mintmaster" placeholder="Mintmaster">
                    </div>
                    <div class="form-group">
                        <label for="mintmark">Rubrikasi</label>
                        <input type="text" class="form-control" name="mintmark" placeholder="Rubrikasi">
                    </div>
                    <div class="form-group">
                        <label for="masaPeredaran">Masa Peredaran</label>
                        <input type="text" class="form-control" name="masaPeredaran" placeholder="Masa Peredaran">
                    </div>
                    <div class="form-group">
                        <label for="delinavit">Delinavit</label>
                        <input type="text" class="form-control" name="delinavit" placeholder="Delinavit">
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Ukuran</label>
                        <input type="text" class="form-control" name="kolofon" placeholder="Ukuran">
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