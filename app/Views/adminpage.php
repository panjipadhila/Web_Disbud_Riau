<br><br><br>
<div class="section-container text-center">
    <h2>WELCOME</h2>
    <a href="/" class="btn btn-primary btn-sm">Kembali ke Home</a>
    <br></br>
    <a href="/tambahdata" class="btn btn-primary btn-sm">Tambah Data OPK</a>
    <br></br>
    <?php if (in_groups('admin-pusat')) : ?>
        <a href="/" class="btn btn-primary btn-sm">List Admin Kabupaten/Kota</a>
        <br></br>
        <a href="/" class="btn btn-primary btn-sm">Tambah Dokumen</a>
        <br></br>
        <a href="/" class="btn btn-primary btn-sm">Tambah Gallery</a>
        <br></br>
        <a href="/" class="btn btn-primary btn-sm">Tambah Kegiatan</a>
    <?php endif; ?>
</div>