if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['nilai-keterampilan'] = {
    title: 'Nilai Keterampilan',
    desc: 'Panduan lengkap input nilai keterampilan siswa di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-hands"></i> Input Nilai Keterampilan</h2>
        <p>Nilai Keterampilan adalah nilai yang diperoleh siswa dari praktik, demonstrasi, dan kinerja. Nilai ini mencakup penilaian praktik, demonstrasi, proyek, dan portofolio.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Nilai Keterampilan</h3>
        <ol class="step-list">
            <li>Login sebagai Guru atau Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Input Nilai</code></li>
            <li>Klik <code class="inline">Keterampilan</code></li>
            <li>Halaman Input Nilai Keterampilan akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Guru hanya dapat menginput nilai untuk mata pelajaran yang mereka ampu. Administrator dapat menginput nilai untuk semua mata pelajaran.</div>
        </div>
        <hr>
        <h3>🠊 Melakukan Input Nilai</h3>
        <ol class="step-list">
            <li>Pada halaman Input Nilai Keterampilan, pilih tahun ajaran dan semester</li>
            <li>Pilih kelas</li>
            <li>Pilih mata pelajaran</li>
            <li>Daftar siswa akan ditampilkan</li>
            <li>Isi nilai keterampilan untuk setiap siswa:
                <ul class="step-list">
                    <li><strong>Praktik 1:</strong> Nilai praktik pertama</li>
                    <li><strong>Praktik 2:</strong> Nilai praktik kedua</li>
                    <li><strong>Demonstrasi:</strong> Nilai demonstrasi</li>
                    <li><strong>Proyek:</strong> Nilai proyek</li>
                    <li><strong>Portofolio:</strong> Nilai portofolio</li>
                </ul>
            </li>
            <li>Tambahkan catatan jika diperlukan</li>
            <li>Nilai akhir akan dihitung otomatis berdasarkan bobot</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Nilai akan tersimpan dan ditampilkan di rapor</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Nilai keterampilan biasanya diberikan untuk mapel praktik seperti IPA, Seni Budaya, dan PJOK. Gunakan rubrik penilaian untuk objektivitas.</div>
        </div>
        <hr>
        <h3>🠊 Aspek Penilaian Keterampilan</h3>
        <ul class="step-list">
            <li><strong>Praktik:</strong> Penilaian berdasarkan praktik langsung</li>
            <li><strong>Demonstrasi:</strong> Penilaian berdasarkan demonstrasi keterampilan</li>
            <li><strong>Proyek:</strong> Penilaian berdasarkan hasil proyek</li>
            <li><strong>Portofolio:</strong> Penilaian berdasarkan kumpulan karya</li>
            <li><strong>Observasi:</strong> Penilaian berdasarkan observasi kinerja</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Rubrik Penilaian:</strong> Gunakan rubrik penilaian untuk memastikan objektivitas. Rubrik membantu dalam memberikan penilaian yang konsisten dan adil.</div>
        </div>
        <hr>
        <h3>🠊 Edit dan Hapus Nilai</h3>
        <ol class="step-list">
            <li>Pada halaman Input Nilai Keterampilan, nilai yang sudah ada akan ditampilkan</li>
            <li>Ubah nilai sesuai kebutuhan</li>
            <li>Update catatan jika diperlukan</li>
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
        <h3>🠊 Ketentuan Nilai Keterampilan</h3>
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
            <li><strong>Rubrik:</strong> Gunakan rubrik penilaian untuk objektivitas</li>
            <li><strong>Observasi:</strong> Lakukan observasi secara teratur</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan bukti penilaian</li>
            <li><strong>Konkret:</strong> Berikan contoh konkret dalam catatan</li>
            <li><strong>Objektif:</strong> Berikan penilaian yang objektif dan adil</li>
            <li><strong>Konsisten:</strong> Jaga konsistensi penilaian antar siswa</li>
            <li><strong>Feedback:</strong> Berikan feedback kepada siswa</li>
            <li><strong>Backup:</strong> Backup data nilai secara berkala</li>
            <li><strong>Review:</strong> Review nilai sebelum menyimpan</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data nilai</li>
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
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Mapel tidak muncul:</strong>
                <span>Pastikan mata pelajaran sudah ditambahkan di sistem. Periksa data mapel. Refresh halaman dan coba lagi.</span>
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
                <strong>Rubrik Penilaian:</strong> Gunakan rubrik penilaian untuk memastikan objektivitas. Rubrik membantu dalam memberikan penilaian yang konsisten dan adil.</div>
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
