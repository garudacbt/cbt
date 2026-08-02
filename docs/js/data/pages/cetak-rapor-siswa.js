if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['cetak-rapor-siswa'] = {
    title: 'Cetak Rapor Siswa',
    desc: 'Panduan lengkap mencetak rapor siswa di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-print"></i> Cetak Rapor Siswa</h2>
        <p>Cetak Rapor Siswa menyediakan fitur untuk mencetak rapor siswa dalam format PDF atau langsung ke printer. Fitur ini memungkinkan sekolah untuk menghasilkan rapor resmi untuk setiap siswa dengan mudah dan cepat.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Cetak Rapor Siswa</h3>
        <ol class="step-list">
            <li>Login sebagai Guru, Wali Kelas, atau Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Cetak Rapor</code></li>
            <li>Klik <code class="inline">Cetak Rapor Siswa</code></li>
            <li>Halaman Cetak Rapor Siswa akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan semua data nilai dan catatan sudah lengkap sebelum mencetak rapor. Rapor yang sudah dicetak tidak dapat diubah secara otomatis.</div>
        </div>
        <hr>
        <h3>🠊 Mencetak Rapor</h3>
        <ol class="step-list">
            <li>Pada halaman Cetak Rapor Siswa, pilih tahun ajaran dan semester</li>
            <li>Pilih kelas</li>
            <li>Pilih siswa yang akan dicetak:
                <ul class="step-list">
                    <li><strong>Per Siswa:</strong> Pilih siswa satu per satu</li>
                    <li><strong>Semua Siswa:</strong> Cetak semua siswa di kelas</li>
                    <li><strong>Berdasarkan Kriteria:</strong> Filter berdasarkan kriteria tertentu</li>
                </ul>
            </li>
            <li>Review preview rapor</li>
            <li>Pilih format output:
                <ul class="step-list">
                    <li><strong>PDF:</strong> Simpan sebagai file PDF</li>
                    <li><strong>Print:</strong> Cetak langsung ke printer</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Cetak</code> atau <code class="inline">Download</code></li>
            <li>Rapor akan dihasilkan sesuai format yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Simpan file PDF rapor sebagai arsip digital selain mencetak fisik. Hal ini berguna untuk backup dan kemudahan distribusi.</div>
        </div>
        <hr>
        <h3>🠊 Persyaratan Sebelum Cetak</h3>
        <ul class="step-list">
            <li><strong>Nilai Lengkap:</strong> Semua nilai telah diinput dengan lengkap</li>
            <li><strong>Catatan Wali:</strong> Catatan wali kelas telah diisi</li>
            <li><strong>KKM dan Predikat:</strong> KKM dan predikat telah diatur</li>
            <li><strong>Template:</strong> Template rapor telah dikonfigurasi</li>
            <li><strong>Data Sekolah:</strong> Data sekolah telah dilengkapi</li>
            <li><strong>Nilai Sikap:</strong> Nilai sikap telah diinput (jika diperlukan)</li>
            <li><strong>Ekstrakurikuler:</strong> Nilai ekstrakurikuler telah diinput (jika ada)</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan semua data telah lengkap dan benar sebelum mencetak</li>
                    <li>Rapor yang sudah dicetak tidak dapat diubah secara otomatis</li>
                    <li>Test cetak satu siswa sebelum cetak massal</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Preview Rapor</h3>
        <ol class="step-list">
            <li>Pada halaman Cetak Rapor Siswa, pilih siswa</li>
            <li>Klik tombol <code class="inline">Preview</code></li>
            <li>Preview rapor akan ditampilkan</li>
            <li>Review semua informasi di rapor:
                <ul class="step-list">
                    <li>Informasi siswa (nama, NISN, kelas)</li>
                    <li>Nilai akademik (pengetahuan dan keterampilan)</li>
                    <li>Nilai sikap</li>
                    <li>Ekstrakurikuler</li>
                    <li>Catatan wali kelas</li>
                    <li>Kehadiran</li>
                </ul>
            </li>
            <li>Jika ada error, perbaiki data sebelum mencetak</li>
            <li>Jika sudah benar, lanjutkan ke proses cetak</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Selalu gunakan fitur preview sebelum mencetak massal. Ini akan membantu mengidentifikasi error sebelum cetak.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Cetak Rapor</h3>
        <ul class="step-list">
            <li><strong>Format:</strong> Rapor dapat dicetak dalam format PDF atau langsung ke printer</li>
            <li><strong>Template:</strong> Rapor menggunakan template yang telah dikonfigurasi</li>
            <li><strong>Validasi:</strong> Sistem akan memvalidasi data sebelum mencetak</li>
            <li><strong>Arsip:</strong> Rapor yang dicetak akan diarsipkan di sistem</li>
            <li><strong>Dokumentasi:</strong> Semua cetakan terdokumentasi</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan printer dalam kondisi baik sebelum cetak massal</li>
                    <li>Siapkan kertas yang cukup untuk cetak massal</li>
                    <li>Backup data sebelum cetak massal</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Preview:</strong> Selalu preview sebelum cetak massal</li>
            <li><strong>Test:</strong> Test cetak satu siswa sebelum cetak massal</li>
            <li><strong>Backup:</strong> Simpan file PDF sebagai backup digital</li>
            <li><strong>Review:</strong> Review semua data sebelum mencetak</li>
            <li><strong>Konsisten:</strong> Jaga konsistensi format rapor</li>
            <li><strong>Printer:</strong> Pastikan printer dalam kondisi baik</li>
            <li><strong>Kertas:</strong> Siapkan kertas yang cukup</li>
            <li><strong>Arsip:</strong> Arsipkan rapor yang sudah dicetak</li>
            <li><strong>Distribusi:</strong> Rencanakan distribusi rapor</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data siswa</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Rapor tidak dapat dicetak:</strong>
                <span>Pastikan semua data nilai dan catatan sudah lengkap. Periksa apakah ada error validasi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Preview tidak muncul:</strong>
                <span>Pastikan data siswa lengkap. Periksa apakah template rapor sudah dikonfigurasi. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>PDF tidak terdownload:</strong>
                <span>Pastikan browser mengizinkan download. Periksa koneksi internet. Coba gunakan browser lain.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Printer tidak merespon:</strong>
                <span>Pastikan printer terhubung dan dalam kondisi baik. Periksa driver printer. Coba restart printer.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Data tidak lengkap:</strong>
                <span>Pastikan semua nilai dan catatan sudah diinput. Periksa data yang belum lengkap. Lengkapi data sebelum mencetak.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Backup Digital:</strong> Selalu simpan file PDF rapor sebagai backup digital. Ini berguna untuk arsip dan kemudahan distribusi jika rapor fisik hilang atau rusak.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Preview Wajib:</strong> Selalu gunakan fitur preview sebelum mencetak massal. Ini akan membantu mengidentifikasi error dan menghemat kertas.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Sistem:</strong> Sistem akan memvalidasi data sebelum mencetak. Pastikan semua data valid untuk menghindari error saat cetak.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses:</strong> Guru, Wali Kelas, dan Administrator dapat mencetak rapor. Guru hanya dapat mencetak rapor untuk kelas yang mereka ampu.</div>
        </div>
    </div>`
};
