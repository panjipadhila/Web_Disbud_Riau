<div class="section-container text-center">
    <h2>WELCOME</h2>
    <a href="/" class="btn btn-primary btn-sm admin-view">Kembali ke Home</a>
    <br></br>
    <a href="/tambahdata" class="btn btn-primary btn-sm admin-view">Tambah Data OPK</a>
    <br></br>
    <?php if (in_groups('admin-pusat')) : ?>
        <a href="/listAdmin" class="btn btn-primary btn-sm admin-view">List Admin Kabupaten/Kota</a>
        <br></br>
        <a href="<?= route_to('register') ?>" class="btn btn-primary btn-sm admin-view">Tambah Admin Kabupaten/Kota</a>
        <br></br>
        <a href="/tambahdokumen" class="btn btn-primary btn-sm admin-view">Tambah Dokumen</a>
        <br></br>
        <a href="/tambahGallery" class="btn btn-primary btn-sm admin-view">Tambah Gallery</a>
        <br></br>
        <a href="/tambahKegiatan" class="btn btn-primary btn-sm admin-view">Tambah Kegiatan</a>
    <?php endif; ?>
</div>