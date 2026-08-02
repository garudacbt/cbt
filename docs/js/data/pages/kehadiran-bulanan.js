if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['kehadiran-bulanan'] = {
    title: 'Kehadiran Bulanan',
    desc: 'Panduan lengkap melihat rekapitulasi kehadiran bulanan siswa e-learning di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-tasks"></i> Kehadiran Bulanan E-Learning</h2>
        <p>Kehadiran Bulanan menampilkan rekapitulasi kehadiran siswa per bulan. Fitur ini memungkinkan guru dan administrator melihat tren kehadiran, statistik partisipasi, dan evaluasi kedisiplinan siswa dalam pembelajaran e-learning.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Kehadiran Bulanan</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">E-Learning</code></li>
            <li>Klik submenu <code class="inline">Hasil E-Learning</code></li>
            <li>Klik <code class="inline">Kehadiran Bulanan</code></li>
            <li>Halaman Kehadiran Bulanan akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Kehadiran Bulanan menampilkan rekapitulasi dari data kehadiran harian. Pastikan kehadiran harian sudah dicatat sebelum melihat rekap bulanan.</div>
        </div>
        <hr>
        <h3>🠊 Melihat Kehadiran Bulanan</h3>
        <ol class="step-list">
            <li>Pada halaman Kehadiran Bulanan, pilih bulan dan tahun</li>
            <li>Pilih kelas</li>
            <li>Pilih mata pelajaran (opsional)</li>
            <li>Rekap kehadiran akan ditampilkan:
                <ul class="step-list">
                    <li><strong>Nama Siswa:</strong> Nama peserta</li>
                    <li><strong>NIS:</strong> Nomor Induk Siswa</li>
                    <li><strong>Kelas:</strong> Kelas siswa</li>
                    <li><strong>Total Hadir:</strong> Jumlah hari hadir</li>
                    <li><strong>Total Izin:</strong> Jumlah hari izin</li>
                    <li><strong>Total Sakit:</strong> Jumlah hari sakit</li>
                    <li><strong>Total Alpha:</strong> Jumlah hari alpha</li>
                    <li><strong>Persentase:</strong> Persentase kehadiran</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan filter untuk melihat rekap per kelas atau per mata pelajaran. Ini akan memudahkan analisis kehadiran spesifik.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Persentase Kehadiran</h3>
        <p>Persentase kehadiran dihitung berdasarkan formula:</p>
        <div class="info-box info">
            <i class="fas fa-calculator"></i>
            <div>
                <strong>Formula:</strong> Persentase = (Total Hadir / Total Hari Pembelajaran) × 100
            </div>
        </div>
        <ul class="step-list">
            <li><strong>≥ 90%:</strong> Kehadiran sangat baik</li>
            <li><strong>75-89%:</strong> Kehadiran baik</li>
            <li><strong>60-74%:</strong> Kehadiran cukup</li>
            <li><strong>< 60%:</strong> Kehadiran kurang (memerlukan perhatian)</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Siswa dengan persentase rendah memerlukan perhatian khusus</li>
                    <li>Komunikasikan kehadiran rendah kepada orang tua</li>
                    <li>Berikan intervensi jika diperlukan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter Kelas</code> untuk memfilter berdasarkan kelas</li>
            <li>Gunakan dropdown <code class="inline">Filter Mapel</code> untuk memfilter berdasarkan mata pelajaran</li>
            <li>Gunakan dropdown <code class="inline">Filter Rentang Persentase</code> untuk memfilter berdasarkan persentase</li>
            <li>Gunakan kolom <code class="inline">Cari</code> untuk mencari siswa berdasarkan nama atau NIS</li>
            <li>Hasil akan ditampilkan sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter rentang persentase berguna untuk mengidentifikasi siswa dengan kehadiran rendah yang memerlukan perhatian khusus.</div>
        </div>
        <hr>
        <h3>🠊 Export Kehadiran Bulanan</h3>
        <ol class="step-list">
            <li>Pada halaman Kehadiran Bulanan, klik tombol <code class="inline">Export</code></li>
            <li>Pilih format export:
                <ul class="step-list">
                    <li><strong>PDF:</strong> Untuk laporan resmi dan distribusi</li>
                    <li><strong>Excel:</strong> Untuk analisis data dan pengolahan lebih lanjut</li>
                </ul>
            </li>
            <li>Pilih bulan dan tahun yang akan di-export</li>
            <li>Pilih kelas (opsional)</li>
            <li>Klik tombol <code class="inline">Download</code></li>
            <li>File akan di-generate dan didownload ke komputer</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Export dalam format Excel jika perlu mengolah data lebih lanjut atau membuat analisis statistik kehadiran.</div>
        </div>
        <hr>
        <h3>🠊 Cetak Kehadiran Bulanan</h3>
        <ol class="step-list">
            <li>Pada halaman Kehadiran Bulanan, klik tombol <code class="inline">Cetak</code></li>
            <li>Pilih format cetak:
                <ul class="step-list">
                    <li><strong>Per Siswa:</strong> Cetak rekap per siswa</li>
                    <li><strong>Per Kelas:</strong> Cetak rekap per kelas</li>
                    <li><strong>Rekap Lengkap:</strong> Cetak semua rekap</li>
                </ul>
            </li>
            <li>Pilih bulan dan tahun</li>
            <li>Pilih kelas (opsional)</li>
            <li>Klik tombol <code class="inline">Cetak</code></li>
            <li>Dokumen akan di-generate untuk dicetak</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Cetak rekap kehadiran untuk dokumentasi dan laporan ke orang tua atau pihak sekolah.</div>
        </div>
        <hr>
        <h3>🠊 Statistik Kehadiran Bulanan</h3>
        <ol class="step-list">
            <li>Pada halaman Kehadiran Bulanan, klik tombol <code class="inline">Statistik</code></li>
            <li>Statistik kehadiran bulanan akan ditampilkan:
                <ul class="step-list">
                    <li>Rata-rata kehadiran kelas</li>
                    <li>Siswa dengan kehadiran tertinggi</li>
                    <li>Siswa dengan kehadiran terendah</li>
                    <li>Distribusi status kehadiran</li>
                    <li>Grafik tren kehadiran bulanan</li>
                    <li>Perbandingan antar kelas</li>
                </ul>
            </li>
            <li>Statistik dapat dilihat per kelas atau per mapel</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Statistik kehadiran bulanan berguna untuk evaluasi partisipasi siswa dan identifikasi tren kehadiran jangka panjang.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Rekap Kehadiran</h3>
        <ul class="step-list">
            <li><strong>Bulanan:</strong> Rekap dihitung per bulan kalender</li>
            <li><strong>Akumulatif:</strong> Data diakumulasi dari kehadiran harian</li>
            <li><strong>Real-time:</strong> Rekap di-update secara real-time</li>
            <li><strong>Per Kelas:</strong> Rekap diorganisir per kelas dan mapel</li>
            <li><strong>Komponen:</strong> Rekap dapat digunakan untuk evaluasi sikap</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan kehadiran harian dicatat dengan benar</li>
                    <li>Rekap bulanan bergantung pada data harian</li>
                    <li>Gunakan rekap untuk evaluasi dan intervensi</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Review Bulanan:</strong> Review rekap kehadiran setiap bulan</li>
            <li><strong>Analisis Tren:</strong> Analisis tren kehadiran jangka panjang</li>
            <li><strong>Identifikasi:</strong> Identifikasi siswa dengan kehadiran rendah</li>
            <li><strong>Intervensi:</strong> Berikan intervensi dini untuk siswa bermasalah</li>
            <li><strong>Komunikasi:</strong> Komunikasikan rekap kepada orang tua</li>
            <li><strong>Dokumentasi:</strong> Simpan rekap sebagai arsip</li>
            <li><strong>Perbandingan:</strong> Bandingkan kehadiran antar bulan</li>
            <li><strong>Evaluasi:</strong> Evaluasi efektivitas pembelajaran e-learning</li>
            <li><strong>Transparansi:</strong> Jaga transparansi dalam pelaporan</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data kehadiran</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Rekap tidak muncul:</strong>
                <span>Pastikan bulan dan tahun sudah dipilih. Pastikan kehadiran harian sudah dicatat. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Persentase tidak sesuai:</strong>
                <span>Pastikan kehadiran harian dicatat dengan benar. Periksa total hari pembelajaran. Refresh halaman untuk update data.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul:</strong>
                <span>Pastikan siswa terdaftar di kelas. Pastikan kehadiran harian tersedia. Periksa data siswa.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Export gagal:</strong>
                <span>Pastikan koneksi internet stabil. Coba refresh halaman dan ulangi proses. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Cetak gagal:</strong>
                <span>Pastikan printer terhubung. Coba refresh halaman dan ulangi proses. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data Harian:</strong> Rekap bulanan dihitung dari data kehadiran harian. Pastikan kehadiran harian dicatat secara konsisten untuk hasil yang akurat.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Update Real-time:</strong> Rekap bulanan di-update secara real-time saat kehadiran harian dicatat atau diubah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Evaluasi Kedisiplinan:</strong> Rekap bulanan dapat digunakan untuk evaluasi kedisiplinan siswa dan laporan ke orang tua atau pihak sekolah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat rekap kehadiran siswa di kelas yang mereka ampu. Administrator memiliki akses penuh ke semua rekap kehadiran.</div>
        </div>
    </div>`
};
