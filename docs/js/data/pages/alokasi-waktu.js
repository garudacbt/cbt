if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['alokasi-waktu'] = {
    title: 'Alokasi Waktu',
    desc: 'Panduan lengkap mengatur alokasi waktu untuk soal ujian di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-clock"></i> Alokasi Waktu Ujian</h2>
        <p>Alokasi Waktu digunakan untuk mengatur waktu pengerjaan untuk setiap soal atau bagian soal dalam ujian. Pengaturan waktu yang tepat akan memastikan siswa memiliki waktu yang cukup untuk mengerjakan setiap soal sesuai dengan tingkat kesulitannya.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Alokasi Waktu</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Alokasi Waktu</code></li>
            <li>Halaman Alokasi Waktu akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Alokasi Waktu harus dilakukan setelah jadwal ujian dibuat dan soal sudah ditambahkan ke jadwal. Pastikan soal sudah tersedia sebelum mengatur alokasi waktu.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Alokasi Waktu</h3>
        <ol class="step-list">
            <li>Pada halaman Alokasi Waktu, pilih jadwal ujian yang akan diatur</li>
            <li>Daftar soal dalam jadwal ujian akan ditampilkan</li>
            <li>Pilih mode alokasi waktu:
                <ul class="step-list">
                    <li><strong>Waktu Global:</strong> Semua soal memiliki waktu yang sama</li>
                    <li><strong>Waktu per Soal:</strong> Setiap soal memiliki waktu berbeda</li>
                    <li><strong>Waktu per Bagian:</strong> Waktu diatur berdasarkan bagian/section</li>
                </ul>
            </li>
            <li>Atur waktu sesuai mode yang dipilih:
                <ul class="step-list">
                    <li><strong>Waktu Global:</strong> Masukkan waktu dalam menit untuk semua soal</li>
                    <li><strong>Waktu per Soal:</strong> Masukkan waktu untuk setiap soal secara individual</li>
                    <li><strong>Waktu per Bagian:</strong> Masukkan waktu untuk setiap bagian/section soal</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code> untuk menyimpan alokasi waktu</li>
            <li>Alokasi waktu akan diterapkan ke jadwal ujian</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan alokasi waktu per soal untuk ujian dengan tingkat kesulitan yang berbeda-beda. Berikan waktu lebih lama untuk soal yang lebih sulit.</div>
        </div>
        <hr>
        <h3>🠊 Mode Alokasi Waktu</h3>
        <p>Sistem menyediakan tiga mode alokasi waktu:</p>
        <ul class="step-list">
            <li><strong>Waktu Global:</strong>
                <ul class="step-list">
                    <li>Semua soal memiliki waktu yang sama</li>
                    <li>Cocok untuk ujian dengan tingkat kesulitan yang seragam</li>
                    <li>Lebih mudah diatur dan dikelola</li>
                    <li>Contoh: 60 menit untuk 40 soal = 1.5 menit per soal</li>
                </ul>
            </li>
            <li><strong>Waktu per Soal:</strong>
                <ul class="step-list">
                    <li>Setiap soal memiliki waktu berbeda</li>
                    <li>Cocok untuk ujian dengan tingkat kesulitan bervariasi</li>
                    <li>Membutuhkan lebih banyak waktu untuk pengaturan</li>
                    <li>Contoh: Soal mudah 1 menit, soal sedang 2 menit, soal sulit 3 menit</li>
                </ul>
            </li>
            <li><strong>Waktu per Bagian:</strong>
                <ul class="step-list">
                    <li>Waktu diatur berdasarkan bagian/section soal</li>
                    <li>Cocok untuk ujian dengan beberapa bagian (misal: A, B, C)</li>
                    <li>Memungkinkan kontrol waktu per bagian</li>
                    <li>Contoh: Bagian A 30 menit, Bagian B 40 menit, Bagian C 50 menit</li>
                </ul>
            </li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Waktu Total:</strong> Waktu total ujian adalah jumlah dari semua waktu yang dialokasikan. Pastikan waktu total sesuai dengan durasi ujian yang direncanakan.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Alokasi Waktu</h3>
        <ul class="step-list">
            <li><strong>Positif:</strong> Waktu harus bernilai positif (lebih dari 0)</li>
            <li><strong>Realistis:</strong> Waktu harus realistis untuk dikerjakan siswa</li>
            <li><strong>Konsisten:</strong> Waktu harus konsisten dengan tingkat kesulitan soal</li>
            <li><strong>Total:</strong> Waktu total harus sesuai dengan durasi ujian</li>
            <li><strong>Fleksibel:</strong> Waktu dapat diubah kapan saja sebelum ujian dimulai</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan alokasi waktu akan mempengaruhi ujian yang sudah dijadwalkan</li>
                    <li>Informasikan perubahan waktu kepada siswa jika diperlukan</li>
                    <li>Verifikasi alokasi waktu sebelum ujian dimulai</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Mengubah Alokasi Waktu</h3>
        <ol class="step-list">
            <li>Pada halaman Alokasi Waktu, pilih jadwal ujian</li>
            <li>Alokasi waktu yang sudah ada akan ditampilkan</li>
            <li>Ubah waktu sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Alokasi waktu akan diperbarui</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Ubah alokasi waktu hanya jika benar-benar diperlukan. Perubahan yang sering dapat membingungkan siswa.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Perencanaan:</strong> Rencanakan alokasi waktu sebelum membuat jadwal ujian</li>
            <li><strong>Tingkat kesulitan:</strong> Sesuaikan waktu dengan tingkat kesulitan soal</li>
            <li><strong>Realistis:</strong> Gunakan waktu yang realistis untuk dikerjakan siswa</li>
            <li><strong>Uji coba:</strong> Uji coba alokasi waktu dengan beberapa siswa</li>
            <li><strong>Konsistensi:</strong> Gunakan standar waktu yang konsisten</li>
            <li><strong>Review:</strong> Review alokasi waktu secara berkala</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan standar alokasi waktu</li>
            <li><strong>Komunikasi:</strong> Informasikan alokasi waktu kepada siswa</li>
            <li><strong>Backup:</strong> Simpan alokasi waktu sebagai referensi</li>
            <li><strong>Analisis:</strong> Analisis hasil ujian untuk evaluasi alokasi waktu</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengatur waktu:</strong>
                <span>Pastikan jadwal ujian sudah dipilih. Pastikan soal sudah ditambahkan ke jadwal. Pastikan tidak ada error koneksi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Waktu tidak valid:</strong>
                <span>Pastikan waktu bernilai positif. Waktu tidak boleh 0 atau negatif. Gunakan format waktu yang benar (menit).</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Waktu total tidak sesuai:</strong>
                <span>Pastikan jumlah waktu sesuai dengan durasi ujian yang direncanakan. Sesuaikan waktu per soal atau per bagian.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Alokasi tidak muncul:</strong>
                <span>Pastikan jadwal ujian sudah dipilih. Refresh halaman untuk melihat data terbaru. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengubah waktu:</strong>
                <span>Pastikan ujian belum dimulai. Alokasi waktu tidak dapat diubah setelah ujian dimulai.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Per Jadwal:</strong> Alokasi waktu dilakukan per jadwal ujian. Setiap jadwal ujian memiliki alokasi waktu yang terpisah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan:</strong> Alokasi waktu tergantung pada jadwal ujian dan soal. Perubahan pada data terkait akan mempengaruhi alokasi waktu.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Waktu:</strong> Sistem akan memvalidasi waktu yang dimasukkan. Pastikan waktu dalam format yang benar dan bernilai positif.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat dan mengedit alokasi waktu untuk jadwal ujian yang mereka ampu. Administrator memiliki akses penuh ke semua alokasi waktu.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Alokasi Waktu adalah bagian dari konfigurasi bank soal dan jadwal ujian. Pengaturan waktu dilakukan melalui endpoint bank soal saat menyimpan konfigurasi.</p>

        <h3>Endpoint Terkait</h3>
        <p>Alokasi waktu dikonfigurasi saat membuat atau mengedit bank soal melalui endpoint:</p>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>POST</td><td><code>cbtbanksoal/saveBank</code></td><td>Simpan bank soal dengan konfigurasi waktu per soal</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">Konfigurasi Waktu di <code>cbtbanksoal/saveBank</code></h3>
        <p>Endpoint ini menangani konfigurasi alokasi waktu sebagai bagian dari pembuatan/edit bank soal.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>waktu_pg</code></td><td>Tidak</td><td>Waktu untuk soal pilihan ganda (detik)</td></tr>
                <tr><td><code>waktu_kompleks</code></td><td>Tidak</td><td>Waktu untuk soal pilihan ganda kompleks (detik)</td></tr>
                <tr><td><code>waktu_jodohkan</code></td><td>Tidak</td><td>Waktu untuk soal menjodohkan (detik)</td></tr>
                <tr><td><code>waktu_isian</code></td><td>Tidak</td><td>Waktu untuk soal isian (detik)</td></tr>
                <tr><td><code>waktu_esai</code></td><td>Tidak</td><td>Waktu untuk soal esai (detik)</td></tr>
            </tbody>
        </table>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Waktu yang dikonfigurasi akan menentukan waktu default untuk setiap jenis soal. Waktu dapat di-override per soal jika diperlukan.</div>
        </div>
    </div>`
};
