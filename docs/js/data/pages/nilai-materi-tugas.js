if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['nilai-materi-tugas'] = {
    title: 'Nilai Materi/Tugas',
    desc: 'Panduan lengkap mengelola nilai materi dan tugas e-learning di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-clipboard"></i> Nilai Materi/Tugas E-Learning</h2>
        <p>Nilai Materi/Tugas digunakan untuk melihat dan mengelola nilai siswa untuk materi dan tugas yang telah dikerjakan melalui e-learning. Fitur ini memungkinkan guru memberikan penilaian dan feedback kepada siswa berdasarkan aktivitas pembelajaran daring.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Nilai Materi/Tugas</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">E-Learning</code></li>
            <li>Klik submenu <code class="inline">Hasil E-Learning</code></li>
            <li>Klik <code class="inline">Nilai Materi/Tugas</code></li>
            <li>Halaman Nilai Materi/Tugas akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Nilai Materi/Tugas hanya tersedia setelah materi atau tugas dibuat dan siswa sudah mengerjakan. Pastikan materi/tugas sudah tersedia sebelum melihat nilai.</div>
        </div>
        <hr>
        <h3>🠊 Melihat Nilai Materi/Tugas</h3>
        <ol class="step-list">
            <li>Pada halaman Nilai Materi/Tugas, pilih tahun ajaran dan semester</li>
            <li>Pilih mata pelajaran</li>
            <li>Pilih jenis (Materi atau Tugas)</li>
            <li>Pilih materi/tugas spesifik (jika diperlukan)</li>
            <li>Daftar nilai siswa akan ditampilkan:
                <ul class="step-list">
                    <li><strong>Nama Siswa:</strong> Nama peserta</li>
                    <li><strong>NIS:</strong> Nomor Induk Siswa</li>
                    <li><strong>Kelas:</strong> Kelas siswa</li>
                    <li><strong>Judul:</strong> Judul materi/tugas</li>
                    <li><strong>Nilai:</strong> Nilai yang diperoleh</li>
                    <li><strong>Tanggal Submit:</strong> Tanggal pengumpulan</li>
                    <li><strong>Status:</strong> Status pengerjaan (Selesai/Belum/Dalam Proses)</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan filter untuk melihat nilai per kelas, per mata pelajaran, atau per materi/tugas tertentu. Ini akan memudahkan analisis nilai.</div>
        </div>
        <hr>
        <h3>🠊 Input Nilai Manual</h3>
        <ol class="step-list">
            <li>Pada halaman Nilai Materi/Tugas, pilih tugas yang akan dinilai</li>
            <li>Daftar siswa akan ditampilkan</li>
            <li>Input nilai untuk setiap siswa di kolom nilai</li>
            <li>Tambahkan komentar atau feedback jika diperlukan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Nilai akan disimpan dan dapat dilihat oleh siswa</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Input nilai manual biasanya digunakan untuk tugas yang memerlukan penilaian subjektif seperti essay atau proyek. Materi dengan kuis otomatis akan dinilai secara otomatis.</div>
        </div>
        <hr>
        <h3>🠊 Edit Nilai</h3>
        <ol class="step-list">
            <li>Pada halaman Nilai Materi/Tugas, pilih materi/tugas</li>
            <li>Klik tombol <code class="inline">Edit</code> pada siswa yang nilainya akan diubah</li>
            <li>Modal edit nilai akan ditampilkan</li>
            <li>Ubah nilai sesuai kebutuhan</li>
            <li>Update komentar atau feedback jika diperlukan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Nilai akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Edit nilai akan mengubah nilai yang sudah ada</li>
                    <li>Informasikan perubahan nilai kepada siswa jika diperlukan</li>
                    <li>Catat alasan perubahan untuk dokumentasi</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter Kelas</code> untuk memfilter berdasarkan kelas</li>
            <li>Gunakan dropdown <code class="inline">Filter Mapel</code> untuk memfilter berdasarkan mata pelajaran</li>
            <li>Gunakan dropdown <code class="inline">Filter Jenis</code> untuk memfilter berdasarkan jenis (Materi/Tugas)</li>
            <li>Gunakan kolom <code class="inline">Cari</code> untuk mencari siswa berdasarkan nama atau NIS</li>
            <li>Hasil akan ditampilkan sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk fokus pada kelompok siswa tertentu atau melihat nilai untuk mata pelajaran spesifik.</div>
        </div>
        <hr>
        <h3>🠊 Export Nilai</h3>
        <ol class="step-list">
            <li>Pada halaman Nilai Materi/Tugas, klik tombol <code class="inline">Export</code></li>
            <li>Pilih format export:
                <ul class="step-list">
                    <li><strong>PDF:</strong> Untuk laporan resmi dan distribusi</li>
                    <li><strong>Excel:</strong> Untuk analisis data dan pengolahan lebih lanjut</li>
                </ul>
            </li>
            <li>Pilih data yang akan di-export:
                <ul class="step-list">
                    <li><strong>Semua Data:</strong> Semua nilai yang tersedia</li>
                    <li><strong>Per Kelas:</strong> Hanya nilai kelas tertentu</li>
                    <li><strong>Per Mapel:</strong> Hanya nilai mata pelajaran tertentu</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Download</code></li>
            <li>File akan di-generate dan didownload ke komputer</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Export dalam format Excel jika perlu mengolah data lebih lanjut atau membuat analisis statistik nilai.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Nilai</h3>
        <ul class="step-list">
            <li><strong>Skala Nilai:</strong> Nilai menggunakan skala 0-100</li>
            <li><strong>Otomatis:</strong> Kuis otomatis dinilai oleh sistem</li>
            <li><strong>Manual:</strong> Tugas subjektif dinilai manual oleh guru</li>
            <li><strong>Revisi:</strong> Nilai dapat di-edit jika diperlukan</li>
            <li><strong>Komponen:</strong> Nilai e-learning dapat menjadi komponen rapor</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Nilai bersifat sensitif dan harus dijaga kerahasiaannya</li>
                    <li>Hanya bagikan nilai kepada pihak yang berhak</li>
                    <li>Gunakan nilai untuk evaluasi dan perbaikan pembelajaran</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Konsistensi:</strong> Gunakan standar penilaian yang konsisten</li>
            <li><strong>Feedback:</strong> Berikan feedback konstruktif kepada siswa</li>
            <li><strong>Waktu:</strong> Input nilai secepat mungkin setelah tugas selesai</li>
            <li><strong>Komunikasi:</strong> Informasikan kriteria penilaian kepada siswa</li>
            <li><strong>Dokumentasi:</strong> Simpan nilai sebagai arsip</li>
            <li><strong>Review:</strong> Review nilai secara berkala</li>
            <li><strong>Analisis:</strong> Analisis nilai untuk identifikasi area perbaikan</li>
            <li><strong>Transparansi:</strong> Jaga transparansi dalam penilaian</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data nilai</li>
            <li><strong>Perbaikan:</strong> Gunakan nilai untuk perbaikan metode pengajaran</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tidak muncul:</strong>
                <span>Pastikan materi/tugas sudah dipilih. Pastikan siswa sudah mengerjakan. Pastikan data tersimpan. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa input nilai:</strong>
                <span>Pastikan tugas memerlukan penilaian manual. Pastikan Anda memiliki izin untuk menilai. Periksa apakah ada error koneksi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul:</strong>
                <span>Pastikan siswa terdaftar di kelas. Pastikan siswa memiliki akses ke materi/tugas. Periksa status pengerjaan siswa.</span>
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
                <strong>Post-Pengerjaan:</strong> Nilai hanya tersedia setelah siswa mengerjakan materi/tugas. Pastikan siswa sudah menyelesaikan tugas sebelum melihat nilai.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Nilai Otomatis:</strong> Kuis dengan pilihan ganda dinilai secara otomatis oleh sistem. Tugas dengan essay atau upload file memerlukan penilaian manual.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Komponen Rapor:</strong> Nilai e-learning dapat digunakan sebagai komponen penilaian dalam rapor sesuai dengan aturan penilaian sekolah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat dan mengedit nilai siswa di kelas yang mereka ampu. Administrator memiliki akses penuh ke semua nilai.</div>
        </div>
    </div>`
};
