if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['kehadiran-harian'] = {
    title: 'Kehadiran Harian',
    desc: 'Panduan lengkap mencatat dan memantau kehadiran harian siswa e-learning di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-user-check"></i> Kehadiran Harian E-Learning</h2>
        <p>Kehadiran Harian digunakan untuk mencatat dan memantau kehadiran siswa dalam pembelajaran e-learning. Fitur ini memungkinkan guru mencatat partisipasi siswa dan memantau aktivitas pembelajaran daring secara harian.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Kehadiran Harian</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">E-Learning</code></li>
            <li>Klik submenu <code class="inline">Hasil E-Learning</code></li>
            <li>Klik <code class="inline">Kehadiran Harian</code></li>
            <li>Halaman Kehadiran Harian akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Kehadiran Harian mencatat partisipasi siswa dalam pembelajaran e-learning. Pastikan jadwal pelajaran sudah diatur sebelum mencatat kehadiran.</div>
        </div>
        <hr>
        <h3>🠊 Mencatat Kehadiran Harian</h3>
        <ol class="step-list">
            <li>Pada halaman Kehadiran Harian, pilih tanggal</li>
            <li>Pilih kelas</li>
            <li>Pilih mata pelajaran (jika diperlukan)</li>
            <li>Daftar siswa akan ditampilkan</li>
            <li>Input kehadiran untuk setiap siswa:
                <ul class="step-list">
                    <li><strong>Hadir:</strong> Siswa hadir dan mengikuti pembelajaran</li>
                    <li><strong>Izin:</strong> Siswa tidak hadir dengan izin</li>
                    <li><strong>Sakit:</strong> Siswa tidak hadir karena sakit</li>
                    <li><strong>Alpha:</strong> Siswa tidak hadir tanpa keterangan</li>
                </ul>
            </li>
            <li>Tambahkan keterangan jika diperlukan (misal: alasan izin/sakit)</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Kehadiran akan disimpan dan dapat dilihat di rekap bulanan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Catat kehadiran secara konsisten setiap hari pembelajaran. Data kehadiran akan digunakan untuk evaluasi kedisiplinan dan laporan ke orang tua.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Status Kehadiran</h3>
        <p>Sistem menyediakan empat status kehadiran:</p>
        <ul class="step-list">
            <li><strong>Hadir:</strong>
                <ul class="step-list">
                    <li>Siswa hadir dan mengikuti pembelajaran</li>
                    <li>Siswa login dan mengakses materi/tugas</li>
                    <li>Dihitung sebagai kehadiran penuh</li>
                </ul>
            </li>
            <li><strong>Izin:</strong>
                <ul class="step-list">
                    <li>Siswa tidak hadir dengan izin resmi</li>
                    <li>Memerlukan surat izin dari orang tua</li>
                    <li>Tidak dihitung sebagai ketidakhadiran negatif</li>
                </ul>
            </li>
            <li><strong>Sakit:</strong>
                <ul class="step-list">
                    <li>Siswa tidak hadir karena sakit</li>
                    <li>Memerlukan surat dokter atau keterangan</li>
                    <li>Tidak dihitung sebagai ketidakhadiran negatif</li>
                </ul>
            </li>
            <li><strong>Alpha:</strong>
                <ul class="step-list">
                    <li>Siswa tidak hadir tanpa keterangan</li>
                    <li>Dihitung sebagai ketidakhadiran negatif</li>
                    <li>Dapat mempengaruhi evaluasi kedisiplinan</li>
                </ul>
            </li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan status kehadiran dicatat dengan benar</li>
                    <li>Alpha dapat mempengaruhi evaluasi siswa</li>
                    <li>Simpan dokumen pendukung untuk izin dan sakit</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Edit Kehadiran</h3>
        <ol class="step-list">
            <li>Pada halaman Kehadiran Harian, pilih tanggal dan kelas</li>
            <li>Kehadiran yang sudah ada akan ditampilkan</li>
            <li>Ubah status kehadiran sesuai kebutuhan</li>
            <li>Update keterangan jika diperlukan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Kehadiran akan diperbarui</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Edit kehadiran hanya jika ada kesalahan atau informasi baru. Catat alasan perubahan untuk dokumentasi.</div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter Kelas</code> untuk memfilter berdasarkan kelas</li>
            <li>Gunakan dropdown <code class="inline">Filter Mapel</code> untuk memfilter berdasarkan mata pelajaran</li>
            <li>Gunakan date picker untuk memilih tanggal spesifik</li>
            <li>Gunakan kolom <code class="inline">Cari</code> untuk mencari siswa berdasarkan nama atau NIS</li>
            <li>Hasil akan ditampilkan sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk melihat kehadiran kelas tertentu atau mata pelajaran spesifik pada tanggal tertentu.</div>
        </div>
        <hr>
        <h3>🠊 Export Kehadiran</h3>
        <ol class="step-list">
            <li>Pada halaman Kehadiran Harian, klik tombol <code class="inline">Export</code></li>
            <li>Pilih format export:
                <ul class="step-list">
                    <li><strong>PDF:</strong> Untuk laporan resmi dan distribusi</li>
                    <li><strong>Excel:</strong> Untuk analisis data dan pengolahan lebih lanjut</li>
                </ul>
            </li>
            <li>Pilih rentang tanggal yang akan di-export</li>
            <li>Pilih kelas (opsional)</li>
            <li>Klik tombol <code class="inline">Download</code></li>
            <li>File akan di-generate dan didownload ke komputer</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Export dalam format Excel jika perlu mengolah data lebih lanjut atau membuat analisis statistik kehadiran.</div>
        </div>
        <hr>
        <h3>🠊 Statistik Kehadiran</h3>
        <ol class="step-list">
            <li>Pada halaman Kehadiran Harian, klik tombol <code class="inline">Statistik</code></li>
            <li>Statistik kehadiran akan ditampilkan:
                <ul class="step-list">
                    <li>Total siswa hadir</li>
                    <li>Total siswa izin</li>
                    <li>Total siswa sakit</li>
                    <li>Total siswa alpha</li>
                    <li>Persentase kehadiran</li>
                    <li>Grafik tren kehadiran</li>
                </ul>
            </li>
            <li>Statistik dapat dilihat per kelas, per mapel, atau per rentang tanggal</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Statistik kehadiran berguna untuk evaluasi partisipasi siswa dan identifikasi pola ketidakhadiran.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Kehadiran</h3>
        <ul class="step-list">
            <li><strong>Harian:</strong> Kehadiran dicatat per hari pembelajaran</li>
            <li><strong>Per Kelas:</strong> Kehadiran dicatat per kelas dan mapel</li>
            <li><strong>Dokumentasi:</strong> Simpan dokumen pendukung untuk izin dan sakit</li>
            <li><strong>Revisi:</strong> Kehadiran dapat di-edit jika diperlukan</li>
            <li><strong>Komponen:</strong> Kehadiran dapat menjadi komponen penilaian sikap</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Catat kehadiran dengan jujur dan akurat</li>
                    <li>Kehadiran mempengaruhi evaluasi kedisiplinan</li>
                    <li>Komunikasikan ketidakhadiran kepada orang tua</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Konsistensi:</strong> Catat kehadiran secara konsisten setiap hari</li>
            <li><strong>Waktu:</strong> Catat kehadiran segera setelah pembelajaran</li>
            <li><strong>Dokumentasi:</strong> Simpan dokumen pendukung untuk izin dan sakit</li>
            <li><strong>Komunikasi:</strong> Komunikasikan ketidakhadiran kepada orang tua</li>
            <li><strong>Follow-up:</strong> Follow-up siswa dengan alpha tinggi</li>
            <li><strong>Review:</strong> Review kehadiran secara berkala</li>
            <li><strong>Analisis:</strong> Analisis pola ketidakhadiran</li>
            <li><strong>Intervensi:</strong> Berikan intervensi jika diperlukan</li>
            <li><strong>Transparansi:</strong> Jaga transparansi dalam pencatatan</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data kehadiran</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kehadiran tidak muncul:</strong>
                <span>Pastikan tanggal dan kelas sudah dipilih. Pastikan data tersimpan. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mencatat:</strong>
                <span>Pastikan Anda memiliki izin untuk mencatat kehadiran. Pastikan tanggal valid. Periksa apakah ada error koneksi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul:</strong>
                <span>Pastikan siswa terdaftar di kelas. Pastikan jadwal pelajaran sudah diatur. Periksa data siswa.</span>
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
                <strong>Edit tidak tersimpan:</strong>
                <span>Pastikan tombol Simpan diklik. Pastikan tidak ada error koneksi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Partisipasi E-Learning:</strong> Kehadiran e-learning mencatat partisipasi siswa dalam pembelajaran daring. Ini berbeda dengan kehadiran fisik di kelas.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Bukti Aktivitas:</strong> Kehadiran e-learning dapat didasarkan pada login, akses materi, atau penyelesaian tugas sesuai kebijakan sekolah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Komponen Sikap:</strong> Kehadiran dapat digunakan sebagai komponen penilaian sikap dalam rapor sesuai dengan aturan penilaian sekolah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat mencatat dan melihat kehadiran siswa di kelas yang mereka ampu. Administrator memiliki akses penuh ke semua data kehadiran.</div>
        </div>
    </div>`
};
