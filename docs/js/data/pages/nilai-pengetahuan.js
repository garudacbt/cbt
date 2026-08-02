if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['nilai-pengetahuan'] = {
    title: 'Nilai Pengetahuan',
    desc: 'Panduan lengkap input nilai pengetahuan siswa di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-brain"></i> Input Nilai Pengetahuan</h2>
        <p>Nilai Pengetahuan adalah nilai yang diperoleh siswa dari ujian dan tes tertulis. Nilai ini mencakup ulangan harian, ujian tengah semester, ujian akhir semester, dan tugas tertulis.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Nilai Pengetahuan</h3>
        <ol class="step-list">
            <li>Login sebagai Guru atau Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Input Nilai</code></li>
            <li>Klik <code class="inline">Pengetahuan</code></li>
            <li>Halaman Input Nilai Pengetahuan akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Guru hanya dapat menginput nilai untuk mata pelajaran yang mereka ampu. Administrator dapat menginput nilai untuk semua mata pelajaran.</div>
        </div>
        <hr>
        <h3>🠊 Melakukan Input Nilai</h3>
        <ol class="step-list">
            <li>Pada halaman Input Nilai Pengetahuan, pilih tahun ajaran dan semester</li>
            <li>Pilih kelas</li>
            <li>Pilih mata pelajaran</li>
            <li>Daftar siswa akan ditampilkan</li>
            <li>Isi nilai pengetahuan untuk setiap siswa:
                <ul class="step-list">
                    <li><strong>Ulangan Harian 1:</strong> Nilai ulangan pertama</li>
                    <li><strong>Ulangan Harian 2:</strong> Nilai ulangan kedua</li>
                    <li><strong>Ulangan Harian 3:</strong> Nilai ulangan ketiga (opsional)</li>
                    <li><strong>Nilai Tugas:</strong> Nilai tugas tertulis</li>
                    <li><strong>Nilai UTS:</strong> Nilai tengah semester</li>
                    <li><strong>Nilai UAS:</strong> Nilai akhir semester</li>
                </ul>
            </li>
            <li>Nilai akhir akan dihitung otomatis berdasarkan bobot</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Nilai akan tersimpan dan ditampilkan di rapor</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Nilai CBT dapat diimport otomatis ke nilai pengetahuan. Gunakan fitur import untuk menghemat waktu input.</div>
        </div>
        <hr>
        <h3>🠊 Sumber Nilai Pengetahuan</h3>
        <ul class="step-list">
            <li><strong>Nilai Ujian CBT:</strong> Diimport dari sistem CBT</li>
            <li><strong>Nilai Ulangan Harian:</strong> Diinput manual oleh guru</li>
            <li><strong>Nilai Tugas Tertulis:</strong> Diinput manual oleh guru</li>
            <li><strong>Nilai Proyek:</strong> Diinput manual oleh guru</li>
            <li><strong>Nilai Portofolio:</strong> Diinput manual oleh guru</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Import CBT:</strong> Nilai dari ujian CBT dapat diimport otomatis. Pastikan jadwal CBT sudah selesai dan nilai sudah tersedia.</div>
        </div>
        <hr>
        <h3>🠊 Import Nilai dari CBT</h3>
        <ol class="step-list">
            <li>Pada halaman Input Nilai Pengetahuan, klik tombol <code class="inline">Import CBT</code></li>
            <li>Pilih jadwal CBT yang akan diimport</li>
            <li>Pilih jenis nilai (UTS/UAS)</li>
            <li>Klik tombol <code class="inline">Import</code></li>
            <li>Nilai akan diimport ke kolom yang sesuai</li>
            <li>Review nilai yang diimport</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Import CBT menghemat waktu dan mengurangi error input manual. Pastikan jadwal CBT sudah selesai sebelum melakukan import.</div>
        </div>
        <hr>
        <h3>🠊 Edit dan Hapus Nilai</h3>
        <ol class="step-list">
            <li>Pada halaman Input Nilai Pengetahuan, nilai yang sudah ada akan ditampilkan</li>
            <li>Ubah nilai sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Nilai akan diperbarui</li>
            <li>Untuk menghapus, klik tombol <code class="inline">Reset</code></li>
            <li>Konfirmasi reset nilai</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Reset nilai akan menghapus semua nilai untuk siswa tersebut</li>
                    <li>Pastikan untuk backup data sebelum reset</li>
                    <li>Review perubahan sebelum menyimpan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Nilai Pengetahuan</h3>
        <ul class="step-list">
            <li><strong>Range:</strong> Nilai harus dalam range 0-100</li>
            <li><strong>Bobot:</strong> Nilai akhir dihitung berdasarkan bobot yang ditentukan</li>
            <li><strong>Validasi:</strong> Sistem akan memvalidasi nilai sebelum disimpan</li>
            <li><strong>Real-time:</strong> Nilai akhir dihitung secara real-time</li>
            <li><strong>Dokumentasi:</strong> Semua nilai terdokumentasi di rapor</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan nilai diinput dengan benar dan akurat</li>
                    <li>Review nilai sebelum rapor dicetak</li>
                    <li>Komunikasikan perubahan nilai kepada siswa</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Import CBT:</strong> Gunakan fitur import CBT untuk efisiensi</li>
            <li><strong>Backup:</strong> Backup data nilai secara berkala</li>
            <li><strong>Review:</strong> Review nilai sebelum menyimpan</li>
            <li><strong>Konsisten:</strong> Jaga konsistensi penilaian antar siswa</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan alasan perubahan nilai</li>
            <li><strong>Komunikasi:</strong> Komunikasikan nilai kepada siswa</li>
            <li><strong>Objektif:</strong> Berikan penilaian yang objektif dan adil</li>
            <li><strong>Transparansi:</strong> Jaga transparansi dalam penilaian</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data nilai</li>
            <li><strong>Validasi:</strong> Validasi nilai sebelum menyimpan</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tidak tersimpan:</strong>
                <span>Pastikan semua field diisi dengan benar. Periksa apakah nilai dalam range 0-100. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai akhir tidak sesuai:</strong>
                <span>Pastikan bobot penilaian sudah diatur dengan benar. Periksa setting bobot. Refresh halaman untuk update data.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Import CBT gagal:</strong>
                <span>Pastikan jadwal CBT sudah selesai. Periksa apakah nilai CBT tersedia. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul:</strong>
                <span>Pastikan siswa terdaftar di kelas. Periksa data siswa. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa edit:</strong>
                <span>Pastikan Anda memiliki izin untuk edit. Periksa apakah rapor sudah dicetak. Data mungkin dikunci setelah cetak.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Bobot Penilaian:</strong> Nilai akhir dihitung berdasarkan bobot yang ditentukan di menu Bobot Nilai. Pastikan bobot sudah diatur dengan benar.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Import CBT:</strong> Nilai dari ujian CBT dapat diimport otomatis. Fitur ini menghemat waktu dan mengurangi error input manual.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Sistem:</strong> Sistem akan memvalidasi nilai sebelum menyimpan. Nilai harus dalam range 0-100 untuk diterima.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat menginput nilai untuk mata pelajaran yang mereka ampu. Administrator dapat menginput nilai untuk semua mata pelajaran.</div>
        </div>
    </div>`
};
