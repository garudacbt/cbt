if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['kkm'] = {
    title: 'KKM',
    desc: 'Panduan lengkap mengelola Kriteria Ketuntasan Minimal di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-bullseye"></i> Kriteria Ketuntasan Minimal (KKM)</h2>
        <p>KKM adalah nilai minimal yang harus dicapai siswa untuk dinyatakan tuntas dalam suatu mata pelajaran. KKM ditentukan berdasarkan tingkat kesulitan mata pelajaran dan kemampuan rata-rata siswa.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu KKM</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Pengaturan Rapor</code></li>
            <li>Klik <code class="inline">KKM</code></li>
            <li>Halaman KKM akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> KKM harus diatur sebelum input nilai. Nilai KKM akan digunakan sebagai dasar untuk menentukan ketuntasan siswa dan predikat nilai.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur KKM</h3>
        <hr>
        <h3>🠊 Mengakses Menu KKM</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Pengaturan Rapor</code></li>
            <li>Klik <code class="inline">KKM</code></li>
            <li>Halaman KKM akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> KKM harus ditentukan sebelum penilaian dimulai. KKM digunakan untuk menentukan predikat dan status ketuntasan siswa.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur KKM</h3>
        <ol class="step-list">
            <li>Pada halaman KKM, pilih tahun ajaran dan semester</li>
            <li>Pilih kelas</li>
            <li>Daftar mata pelajaran akan ditampilkan</li>
            <li>Isi nilai KKM untuk setiap mata pelajaran:
                <ul class="step-list">
                    <li><strong>KKM Mapel:</strong> Nilai KKM spesifik per mata pelajaran</li>
                    <li><strong>KKM Kelas:</strong> Nilai KKM rata-rata per kelas (opsional)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>KKM akan diterapkan dan digunakan dalam perhitungan nilai</li>
            <li>Pada halaman KKM, pilih tahun ajaran dari dropdown</li>
            <li>Pilih semester dari dropdown</li>
            <li>Pilih kelas dari dropdown (opsional, untuk filter)</li>
            <li>Daftar mata pelajaran akan ditampilkan</li>
            <li>Isi nilai KKM untuk setiap mata pelajaran:
                <ul class="step-list">
                    <li><strong>Mapel:</strong> Nama mata pelajaran</li>
                    <li><strong>KKM:</strong> Nilai KKM (0-100)</li>
                    <li><strong>Keterangan:</strong> Keterangan tambahan (opsional)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>KKM akan disimpan dan berlaku untuk tahun ajaran dan semester yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> KKM sebaiknya ditentukan berdasarkan tingkat kesulitan mapel dan kemampuan rata-rata siswa. Nilai KKM yang realistis akan membantu dalam penilaian.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit KKM</h3>
        <ol class="step-list">
            <li>Pada halaman KKM, pilih tahun ajaran dan semester yang ingin diedit</li>
            <li>Daftar KKM yang sudah ada akan ditampilkan</li>
            <li>Ubah nilai KKM sesuai kebutuhan</li>
            <li>Ubah keterangan jika diperlukan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>KKM akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan KKM akan mempengaruhi penentuan ketuntasan siswa</li>
                    <li>Pastikan untuk mengkomunikasikan perubahan kepada guru</li>
                    <li>KKM yang sudah digunakan untuk nilai tidak dapat diubah</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Filter KKM</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter</code> untuk memfilter berdasarkan:
                <ul class="step-list">
                    <li>Semua: Menampilkan semua KKM</li>
                    <li>Tahun Ajaran: Filter berdasarkan tahun ajaran</li>
                    <li>Semester: Filter berdasarkan semester</li>
                    <li>Kelas: Filter berdasarkan kelas</li>
                </ul>
            </li>
            <li>Pilih filter yang diinginkan</li>
            <li>Dropdown tambahan akan muncul sesuai filter yang dipilih</li>
            <li>Tabel akan menampilkan KKM sesuai filter</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> KKM sebaiknya ditentukan berdasarkan tingkat kesulitan mapel dan kemampuan rata-rata siswa. Konsultasikan dengan guru mapel untuk menentukan KKM yang tepat.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan KKM</h3>
        <ul class="step-list">
            <li><strong>Per Mapel:</strong> KKM dapat berbeda untuk setiap mata pelajaran</li>
            <li><strong>Per Kelas:</strong> KKM dapat berbeda untuk setiap kelas</li>
            <li><strong>Per Semester:</strong> KKM dapat berbeda setiap semester</li>
            <li><strong>Range:</strong> KKM biasanya berkisar antara 70-85</li>
            <li><strong>Predikat:</strong> KKM digunakan untuk menentukan predikat siswa</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>KKM tidak boleh lebih rendah dari standar minimal</li>
                    <li>Perubahan KKM akan mempengaruhi predikat siswa</li>
                    <li>Informasikan perubahan KKM kepada guru mapel</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Edit KKM</h3>
        <ol class="step-list">
            <li>Pada halaman KKM, pilih tahun ajaran, semester, dan kelas</li>
            <li>KKM yang sudah ada akan ditampilkan</li>
            <li>Ubah nilai KKM sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>KKM akan diperbarui</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Edit KKM hanya jika ada perubahan signifikan dalam kondisi pembelajaran atau kebijakan sekolah. Catat alasan perubahan untuk dokumentasi.</div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter Kelas</code> untuk memfilter berdasarkan kelas</li>
            <li>Gunakan dropdown <code class="inline">Filter Mapel</code> untuk memfilter berdasarkan mata pelajaran</li>
            <li>Gunakan dropdown <code class="inline">Filter Semester</code> untuk memfilter berdasarkan semester</li>
            <li>Hasil akan ditampilkan sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk menemukan KKM tertentu dengan cepat, terutama jika jumlah mapel sangat banyak.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan KKM</h3>
        <ol class="step-list">
            <li><strong>KKM per Mapel:</strong> KKM dapat berbeda untuk setiap mata pelajaran</li>
            <li><strong>KKM per Kelas:</strong> KKM dapat berbeda untuk setiap kelas</li>
            <li><strong>Nilai KKM:</strong> Nilai KKM berkisar antara 0-100</li>
            <li><strong>Penentuan Predikat:</strong> Nilai KKM digunakan untuk menentukan predikat</li>
            <li><strong>Ketuntasan:</strong> Siswa dinyatakan tuntas jika nilai >= KKM</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>KKM yang terlalu tinggi akan menyulitkan siswa</li>
                    <li>KKM yang terlalu rendah akan mengurangi standar penilaian</li>
                    <li>Pastikan KKM sesuai dengan kurikulum yang digunakan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Realistis:</strong> Tetapkan KKM yang realistis berdasarkan kemampuan siswa</li>
            <li><strong>Sesuai kesulitan:</strong> Sesuaikan KKM dengan tingkat kesulitan mapel</li>
            <li><strong>Konsistensi:</strong> Gunakan KKM yang konsisten untuk mapel yang sama</li>
            <li><strong>Komunikasi:</strong> Komunikasikan KKM kepada guru dan siswa</li>
            <li><strong>Review:</strong> Review KKM sebelum menyimpan</li>
            <li><strong>Backup:</strong> Catat KKM sebelum mengubah untuk referensi</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan kebijakan KKM untuk referensi</li>
            <li><strong>Testing:</strong> Coba uji coba KKM sebelum implementasi penuh</li>
            <li><strong>Update berkala:</strong> Review dan update KKM secara berkala</li>
            <li><strong>Sesuaikan kebutuhan:</strong> Sesuaikan dengan kebutuhan sekolah dan kurikulum</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>KKM tidak tersimpan:</strong>
                <span>Pastikan nilai KKM sudah diisi dengan benar (0-100). Periksa koneksi internet saat menyimpan. Coba lagi atau hubungi administrator.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Mapel tidak muncul:</strong>
                <span>Pastikan mapel sudah dibuat untuk tahun pelajaran dan semester aktif. Pastikan mapel sudah ditugaskan ke kelas yang dipilih.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengedit KKM:</strong>
                <span>KKM yang sudah digunakan untuk nilai tidak dapat diubah. Hubungi administrator jika perlu perubahan KKM.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tidak sesuai:</strong>
                <span>Pastikan nilai KKM berada dalam rentang 0-100. Nilai di luar rentang ini tidak akan disimpan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Filter tidak berfungsi:</strong>
                <span>Pastikan filter dipilih dengan benar. Periksa apakah ada data yang sesuai dengan filter yang dipilih.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> KKM dibuat per tahun pelajaran dan semester. Data di tahun pelajaran berbeda adalah data yang terpisah.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan Nilai:</strong> KKM menjadi dasar untuk penentuan ketuntasan siswa. Perubahan KKM akan mempengaruhi status ketuntasan siswa.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat melihat dan mengedit KKM untuk mapel yang mereka ampu. Administrator memiliki akses penuh ke semua KKM.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Integrasi dengan Predikat:</strong> KKM digunakan bersama dengan setting Predikat untuk menentukan nilai huruf di rapor.
            </div>
            <div><strong>Tips:</strong> Filter sangat berguna untuk melihat KKM kelas atau mapel tertentu tanpa mengubah tampilan.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Konsultasi:</strong> Konsultasikan dengan guru mapel untuk menentukan KKM</li>
            <li><strong>Analisis:</strong> Analisis hasil ujian sebelum menentukan KKM</li>
            <li><strong>Realistis:</strong> Tetapkan KKM yang realistis dan dapat dicapai</li>
            <li><strong>Konsisten:</strong> Jaga konsistensi KKM antar semester</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan alasan penentuan KKM</li>
            <li><strong>Review:</strong> Review KKM secara berkala</li>
            <li><strong>Komunikasi:</strong> Informasikan KKM kepada siswa dan orang tua</li>
            <li><strong>Standar:</strong> Sesuaikan dengan standar kurikulum</li>
            <li><strong>Monitoring:</strong> Monitor pencapaian siswa terhadap KKM</li>
            <li><strong>Intervensi:</strong> Berikan intervensi untuk siswa di bawah KKM</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>KKM tidak muncul:</strong>
                <span>Pastikan tahun ajaran dan semester sudah dipilih. Pastikan mata pelajaran sudah ada. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>KKM tidak tersimpan:</strong>
                <span>Pastikan nilai KKM diisi dengan benar. Periksa apakah ada error validasi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Predikat tidak sesuai:</strong>
                <span>Pastikan KKM sudah diatur dengan benar. Periksa setting predikat. Refresh halaman untuk update data.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai di luar range:</strong>
                <span>KKM harus dalam range 0-100. Pastikan nilai yang dimasukkan valid dan sesuai standar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa edit:</strong>
                <span>Pastikan Anda memiliki izin untuk edit KKM. Periksa apakah penilaian sudah selesai. KKM mungkin dikunci setelah penilaian selesai.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Standar Kurikulum:</strong> KKM harus sesuai dengan standar kurikulum yang digunakan. Kurikulum 2013 dan Kurikulum Merdeka memiliki standar KKM yang berbeda.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Dampak Predikat:</strong> KKM digunakan untuk menentukan predikat siswa. Siswa dengan nilai di bawah KKM akan mendapatkan predikat yang lebih rendah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Status Ketuntasan:</strong> Siswa dengan nilai ≥ KKM dinyatakan tuntas. Siswa dengan nilai < KKM dinyatakan belum tuntas dan mungkin perlu remedial.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat KKM untuk mata pelajaran yang mereka ampu. Administrator dapat mengedit KKM untuk semua mata pelajaran.</div>
        </div>
    </div>`
};
