if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['cetak-cbt'] = {
    title: 'Cetak CBT',
    desc: 'Panduan lengkap mencetak dokumen terkait pelaksanaan CBT di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-print"></i> Cetak Dokumen CBT</h2>
        <p>Cetak CBT menyediakan fitur untuk mencetak berbagai dokumen terkait pelaksanaan ujian CBT. Dokumen-dokumen ini penting untuk administrasi, dokumentasi, dan distribusi informasi kepada peserta ujian dan pengawas.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Cetak CBT</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Pelaksanaan CBT</code></li>
            <li>Klik <code class="inline">Cetak CBT</code></li>
            <li>Halaman Cetak CBT akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Cetak dokumen ujian sebelum pelaksanaan untuk persiapan administrasi dan distribusi ke ruang ujian. Pastikan jadwal ujian sudah dibuat sebelum mencetak dokumen.</div>
        </div>
        <hr>
        <h3>🠊 Jenis Dokumen yang Dapat Dicetak</h3>
        <p>Sistem menyediakan berbagai jenis dokumen yang dapat dicetak:</p>
        <ul class="step-list">
            <li><strong>Berita Acara Ujian:</strong> Dokumentasi pelaksanaan ujian secara keseluruhan</li>
            <li><strong>Berita Acara Ruang:</strong> Dokumentasi pelaksanaan ujian per ruang</li>
            <li><strong>Daftar Hadir Peserta:</strong> Daftar kehadiran siswa per ruang dan sesi</li>
            <li><strong>Kartu Peserta:</strong> Kartu ujian untuk siswa berisi nomor peserta dan informasi ujian</li>
            <li><strong>Jadwal Ujian:</strong> Jadwal pelaksanaan ujian lengkap</li>
            <li><strong>Label Meja:</strong> Label nomor meja/komputer untuk setiap peserta</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Format Output:</strong> Semua dokumen dapat dicetak dalam format PDF untuk distribusi atau format Excel untuk pengolahan lebih lanjut.</div>
        </div>
        <hr>
        <h3>🠊 Mencetak Dokumen</h3>
        <ol class="step-list">
            <li>Pada halaman Cetak CBT, pilih jenis dokumen yang akan dicetak</li>
            <li>Pilih jadwal ujian yang terkait</li>
            <li>Pilih ruang atau sesi (jika diperlukan untuk jenis dokumen tertentu)</li>
            <li>Pilih format output:
                <ul class="step-list">
                    <li><strong>PDF:</strong> Untuk dokumen resmi dan distribusi</li>
                    <li><strong>Excel:</strong> Untuk analisis data dan pengolahan lebih lanjut</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Cetak</code> atau <code class="inline">Download</code></li>
            <li>File akan di-generate dan didownload ke komputer</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Cetak dokumen dalam format PDF untuk distribusi resmi. Gunakan format Excel jika perlu mengolah data lebih lanjut.</div>
        </div>
        <hr>
        <h3>🠊 Detail Jenis Dokumen</h3>
        <h4>Berita Acara Ujian</h4>
        <ul class="step-list">
            <li>Memuat informasi pelaksanaan ujian secara keseluruhan</li>
            <li>Termasuk: tanggal, waktu, jumlah peserta, jumlah hadir, tidak hadir</li>
            <li>Digunakan untuk dokumentasi resmi pelaksanaan ujian</li>
            <li>Dapat ditandatangani oleh pengawas dan kepala sekolah</li>
        </ul>

        <h4>Berita Acara Ruang</h4>
        <ul class="step-list">
            <li>Memuat informasi pelaksanaan ujian per ruang</li>
            <li>Termasuk: nama ruang, kapasitas, jumlah peserta, daftar peserta</li>
            <li>Digunakan untuk dokumentasi per ruang ujian</li>
            <li>Dapat ditandatangani oleh pengawas ruang</li>
        </ul>

        <h4>Daftar Hadir Peserta</h4>
        <ul class="step-list">
            <li>Memuat daftar kehadiran siswa per ruang dan sesi</li>
            <li>Termasuk: nama, NIS, kelas, nomor peserta, status kehadiran</li>
            <li>Digunakan untuk absensi saat ujian</li>
            <li>Dapat diisi manual saat ujian berlangsung</li>
        </ul>

        <h4>Kartu Peserta</h4>
        <ul class="step-list">
            <li>Memuat informasi identitas peserta ujian</li>
            <li>Termasuk: nama, NIS, kelas, nomor peserta, jadwal ujian</li>
            <li>Digunakan sebagai identitas saat ujian</li>
            <li>Dapat dibagikan kepada siswa sebelum ujian</li>
        </ul>

        <h4>Jadwal Ujian</h4>
        <ul class="step-list">
            <li>Memuat jadwal pelaksanaan ujian lengkap</li>
            <li>Termasuk: tanggal, waktu, ruang, sesi, mata pelajaran</li>
            <li>Digunakan untuk informasi kepada siswa dan guru</li>
            <li>Dapat dipasang di papan pengumuman</li>
        </ul>

        <h4>Label Meja</h4>
        <ul class="step-list">
            <li>Memuat label nomor meja/komputer untuk setiap peserta</li>
            <li>Termasuk: nomor meja, nama siswa, nomor peserta</li>
            <li>Digunakan untuk penempatan peserta di ruang ujian</li>
            <li>Dapat ditempel di meja atau komputer</li>
        </ul>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Cetak awal:</strong> Cetak dokumen sebelum pelaksanaan ujian</li>
            <li><strong>Verifikasi:</strong> Verifikasi data sebelum mencetak</li>
            <li><strong>Backup:</strong> Simpan file cetakan sebagai backup</li>
            <li><strong>Distribusi:</strong> Distribusi dokumen kepada pihak terkait</li>
            <li><strong>Format sesuai:</strong> Pilih format sesuai kebutuhan (PDF/Excel)</li>
            <li><strong>Komunikasi:</strong> Informasikan dokumen kepada siswa dan pengawas</li>
            <li><strong>Dokumentasi:</strong> Simpan dokumen sebagai arsip resmi</li>
            <li><strong>Review:</strong> Review dokumen sebelum distribusi</li>
            <li><strong>Testing:</strong> Uji coba cetak sebelum produksi massal</li>
            <li><strong>Kualitas:</strong> Pastikan kualitas cetak baik dan terbaca</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mencetak:</strong>
                <span>Pastikan jadwal ujian sudah dipilih. Pastikan jenis dokumen sudah dipilih. Pastikan tidak ada error koneksi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Data kosong:</strong>
                <span>Pastikan jadwal ujian memiliki data. Pastikan alokasi peserta sudah dilakukan. Pastikan data siswa lengkap.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>File tidak terdownload:</strong>
                <span>Pastikan browser mengizinkan download. Periksa folder download. Coba cetak ulang jika file tidak muncul.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Format tidak sesuai:</strong>
                <span>Pastikan format output dipilih dengan benar. Coba cetak ulang dengan format yang berbeda.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Cetak gagal:</strong>
                <span>Pastikan koneksi internet stabil. Coba refresh halaman dan ulangi cetak. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Per Jadwal:</strong> Dokumen dicetak berdasarkan jadwal ujian. Setiap jadwal ujian memiliki dokumen yang terpisah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan:</strong> Dokumen tergantung pada jadwal ujian, alokasi peserta, dan data siswa. Pastikan data terkait sudah lengkap sebelum mencetak.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Format PDF:</strong> PDF adalah format standar untuk dokumen resmi yang tidak dapat diedit. Cocok untuk distribusi dan dokumentasi.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Format Excel:</strong> Excel adalah format spreadsheet yang dapat diedit. Cocok untuk analisis data dan pengolahan lebih lanjut.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Semua operasi Cetak CBT menggunakan AJAX POST ke controller <code>Cbtjadwal</code> dan mengembalikan respons JSON atau file download. Administrator dan Guru memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtjadwal/cetak/{id_jadwal}/{jenis}</code></td><td>Cetak dokumen ujian (berita acara, daftar hadir, dll)</td></tr>
                <tr><td>GET</td><td><code>cbtjadwal/download/{id_jadwal}/{format}</code></td><td>Download dokumen dalam format PDF/Excel</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/generateBeritaAcara</code></td><td>Generate berita acara ujian</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/generateKartuPeserta</code></td><td>Generate kartu peserta ujian</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/generateLabelMeja</code></td><td>Generate label meja/komputer</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">GET <code>cbtjadwal/cetak/{id_jadwal}/{jenis}</code> — Cetak Dokumen</h3>
        <p>Endpoint ini menangani operasi cetak berbagai jenis dokumen ujian.</p>
        <table class="table-custom">
            <thead><tr><th>Parameter URL</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
                <tr><td><code>jenis</code></td><td>Ya</td><td>Jenis dokumen (berita_acara, daftar_hadir, kartu_peserta, label_meja)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons:</strong> File PDF atau Excel untuk download</p>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Dokumen di-generate secara dinamis berdasarkan data jadwal ujian, alokasi peserta, dan data siswa yang tersedia.</div>
        </div>
    </div>`
};
