if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['aktivasi-peserta'] = {
    title: 'Aktivasi Peserta',
    desc: 'Panduan lengkap mengaktifkan akun peserta ujian di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-users-cog"></i> Aktivasi Peserta Ujian</h2>
        <p>Aktivasi Peserta digunakan untuk mengaktifkan akun siswa agar dapat mengikuti ujian CBT. Hanya peserta yang diaktifkan yang dapat login ke sistem ujian. Aktivasi peserta adalah langkah penting untuk memastikan keamanan dan kontrol akses ujian.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Aktivasi Peserta</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Pelaksanaan CBT</code></li>
            <li>Klik <code class="inline">Aktivasi Peserta</code></li>
            <li>Halaman Aktivasi Peserta akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Aktivasi Peserta harus dilakukan sebelum pelaksanaan ujian dimulai. Siswa yang tidak diaktifkan tidak akan dapat login ke sistem ujian.</div>
        </div>
        <hr>
        <h3>🠊 Mengaktifkan Peserta</h3>
        <ol class="step-list">
            <li>Pada halaman Aktivasi Peserta, pilih jadwal ujian yang akan diatur</li>
            <li>Daftar siswa yang terdaftar di jadwal ujian akan ditampilkan</li>
            <li>Pilih siswa yang akan diaktifkan:
                <ul class="step-list">
                    <li><strong>Aktifkan Semua:</strong> Aktifkan semua siswa sekaligus dengan tombol <code class="inline">Aktifkan Semua</code></li>
                    <li><strong>Aktifkan Per Kelas:</strong> Aktifkan berdasarkan kelas dengan filter kelas</li>
                    <li><strong>Aktifkan Per Siswa:</strong> Pilih siswa satu per satu dengan checkbox</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Aktifkan</code></li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Siswa yang dipilih akan diaktifkan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan fitur "Aktifkan Semua" untuk mengaktifkan semua siswa sekaligus jika semua siswa akan mengikuti ujian. Ini akan menghemat waktu.</div>
        </div>
        <hr>
        <h3>🠊 Status Peserta</h3>
        <p>Sistem menampilkan status aktivasi peserta:</p>
        <ul class="step-list">
            <li><strong>Belum Aktif:</strong> Siswa belum dapat login ujian (status default)</li>
            <li><strong>Aktif:</strong> Siswa dapat login ujian</li>
            <li><strong>Sedang Ujian:</strong> Siswa sedang mengerjakan ujian</li>
            <li><strong>Selesai:</strong> Siswa telah menyelesaikan ujian</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Update Real-Time:</strong> Status peserta di-update secara real-time. Status akan berubah sesuai aktivitas siswa selama ujian.</div>
        </div>
        <hr>
        <h3>🠊 Menonaktifkan Peserta</h3>
        <ol class="step-list">
            <li>Pada halaman Aktivasi Peserta, pilih jadwal ujian</li>
            <li>Pilih siswa yang akan dinonaktifkan</li>
            <li>Klik tombol <code class="inline">Nonaktifkan</code></li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Siswa akan dinonaktifkan</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Siswa yang dinonaktifkan tidak dapat login ke sistem ujian</li>
                    <li>Siswa yang sedang ujian akan terputus jika dinonaktifkan</li>
                    <li>Gunakan nonaktifkan hanya jika benar-benar diperlukan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter Kelas</code> untuk memfilter berdasarkan kelas</li>
            <li>Gunakan dropdown <code class="inline">Filter Status</code> untuk memfilter berdasarkan status aktivasi</li>
            <li>Gunakan kolom <code class="inline">Cari</code> untuk mencari siswa berdasarkan nama atau NIS</li>
            <li>Hasil akan ditampilkan sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk menemukan siswa tertentu atau melihat siswa berdasarkan status aktivasi.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Aktivasi</h3>
        <ul class="step-list">
            <li><strong>Per Jadwal:</strong> Aktivasi dilakukan per jadwal ujian</li>
            <li><strong>Prasyarat:</strong> Siswa harus memiliki nomor peserta sebelum diaktifkan</li>
            <li><strong>Alokasi:</strong> Siswa harus dialokasikan ke ruang dan sesi sebelum diaktifkan</li>
            <li><strong>Waktu:</strong> Aktivasi dapat dilakukan kapan saja sebelum ujian dimulai</li>
            <li><strong>Reversibel:</strong> Aktivasi dapat dibatalkan dengan menonaktifkan peserta</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan semua siswa yang diaktifkan benar-benar akan mengikuti ujian</li>
                    <li>Verifikasi data peserta sebelum aktivasi</li>
                    <li>Komunikasikan aktivasi kepada siswa</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Aktivasi awal:</strong> Aktifkan peserta sebelum ujian dimulai</li>
            <li><strong>Verifikasi:</strong> Verifikasi data peserta sebelum aktivasi</li>
            <li><strong>Komunikasi:</strong> Informasikan aktivasi kepada semua siswa</li>
            <li><strong>Filter:</strong> Gunakan filter untuk aktivasi per kelas</li>
            <li><strong>Backup:</strong> Catat daftar peserta yang diaktifkan</li>
            <li><strong>Review:</strong> Review status aktivasi secara berkala</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan prosedur aktivasi</li>
            <li><strong>Testing:</strong> Uji coba login dengan peserta yang diaktifkan</li>
            <li><strong>Keamanan:</strong> Jangan aktifkan peserta yang tidak berhak</li>
            <li><strong>Monitoring:</strong> Monitor status peserta selama ujian</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengaktifkan:</strong>
                <span>Pastikan jadwal ujian sudah dipilih. Pastikan siswa memiliki nomor peserta. Pastikan siswa sudah dialokasikan ke ruang dan sesi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul:</strong>
                <span>Pastikan jadwal ujian sudah dipilih. Pastikan siswa terdaftar di jadwal ujian. Refresh halaman untuk melihat data terbaru.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak bisa login:</strong>
                <span>Pastikan siswa sudah diaktifkan. Pastikan nomor peserta benar. Periksa status aktivasi siswa.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Aktivasi gagal:</strong>
                <span>Pastikan tidak ada error koneksi. Coba refresh halaman dan ulangi proses. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Status tidak berubah:</strong>
                <span>Refresh halaman untuk melihat status terbaru. Pastikan aktivasi berhasil disimpan.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Per Jadwal:</strong> Aktivasi peserta dilakukan per jadwal ujian. Setiap jadwal ujian memiliki aktivasi peserta yang terpisah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan:</strong> Aktivasi peserta tergantung pada jadwal ujian, nomor peserta, dan alokasi ruang/sesi. Pastikan data terkait sudah lengkap sebelum aktivasi.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Keamanan:</strong> Aktivasi peserta adalah mekanisme keamanan untuk memastikan hanya siswa yang berhak yang dapat mengikuti ujian.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat mengaktifkan peserta untuk jadwal ujian yang mereka ampu. Administrator memiliki akses penuh ke semua aktivasi peserta.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Semua operasi Aktivasi Peserta menggunakan AJAX POST ke controller <code>Cbtjadwal</code> dan mengembalikan respons JSON. Administrator dan Guru memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtjadwal/aktivasi/{id_jadwal}</code></td><td>Tampilkan halaman aktivasi peserta</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/aktifkanPeserta</code></td><td>Aktifkan peserta untuk ujian</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/nonaktifkanPeserta</code></td><td>Nonaktifkan peserta</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/aktifkanSemua</code></td><td>Aktifkan semua peserta sekaligus</td></tr>
                <tr><td>GET</td><td><code>cbtjadwal/getStatusAktivasi/{id_jadwal}</code></td><td>Ambil status aktivasi peserta</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtjadwal/aktifkanPeserta</code> — Aktifkan Peserta</h3>
        <p>Endpoint ini menangani operasi aktivasi peserta untuk ujian.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
                <tr><td><code>siswa</code></td><td>Ya</td><td>Array ID siswa yang akan diaktifkan</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Peserta berhasil diaktifkan", "total": 30 }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtjadwal/nonaktifkanPeserta</code> — Nonaktifkan Peserta</h3>
        <p>Endpoint ini menangani operasi nonaktifkan peserta.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
                <tr><td><code>siswa</code></td><td>Ya</td><td>Array ID siswa yang akan dinonaktifkan</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Peserta berhasil dinonaktifkan", "total": 5 }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Peserta yang dinonaktifkan akan terputus dari ujian jika sedang mengerjakan. Gunakan dengan hati-hati.</div>
        </div>
    </div>`
};
