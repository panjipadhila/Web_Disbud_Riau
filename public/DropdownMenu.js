var kat_subKat = {
    "Kesenian": {
        "Seni Musik": [],
        "Seni Tari": [],
        "Seni Rupa": [],
        "Seni Sastra": [],
        "Seni Teater": [],
        "Seni Pertunjukan": []
    },
    "Bahasa": {
        "Bahasa Indonesia": [],
        "Bahasa Daerah": [],
        "Dialek/Aksen/Logat": []
    },
    "Permainan Tradisional": {
        "-": []
    },
    "Olahraga Tradisional": {
        "-": []
    },
    "Warisan Budaya Bendawi": {
        "Struktur": [],
        "Situs": [],
        "Bangunan": [],
        "Benda": [],
        "Kawasan": []
    },
    "Tradisi Lisan": {
        "Sejarah Lisan": [],
        "Dongeng": [],
        "Rapalan": [],
        "Pantun": [],
        "Cerita Rakyat": [],
        "Senandung/Ratapan": []
    },
    "Manuskrip": {
        "Hikayat": [],
        "Serat": [],
        "Naskah": [],
        "Kitab": []
    },
    "Adat Istiadat": {
        "Lingkungan": [],
        "Masyarakat": []
    },
    "Ritus": {
        "Perayaan": [],
        "Peringatan Kelahiran": [],
        "Upacara Perkawinan": [],
        "Upacara Kematian": [],
        "Ritual Kepercayaan": []
    },
    "Pengetahuan Tradisional": {
        "kerajinan": [],
        "Busana": [],
        "Metode Penyehatan": [],
        "Jamu/Ramuan Tradisional": [],
        "Makanan Dan Minuman Tradisional": [],
        "Pengetahuan/Kebiasaan Tentang Alam Semesta": []
    },
    "Teknologi Tradisional": {
        "Alat Tangkap": [],
        "Arsitektur/Ornamen": [],
        "Perkakas Pertanian": [],
        "Alat Transportasi": [],
        "Sistem Irigtasi": [],
        "Peralatan Rumah Tangga": []

    }
}

window.onload = function () {
    var kategoriSel = document.getElementById("kategori");
    var subKategoriSel = document.getElementById("subKategori");
    for (var x in kat_subKat) {
        kategoriSel.options[kategoriSel.options.length] = new Option(x, x);
    }
    kategoriSel.onchange = function () {
        //empty Chapters- and Topics- dropdowns
        subKategoriSel.length = 1;
        //display correct values
        for (var y in kat_subKat[this.value]) {
            subKategoriSel.options[subKategoriSel.options.length] = new Option(y, y);
        }
    }

}

