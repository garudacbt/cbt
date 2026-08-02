if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['atur-ruang-sesi'] = {
    title: 'Atur Ruang/Sesi',
    desc: 'Panduan lengkap mengatur alokasi ruang dan sesi untuk peserta ujian di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-user-clock"></i> Atur Ruang/Sesi Peserta Ujian</h2>
        <p>Atur Ruang/Sesi digunakan untuk mengalokasikan peserta ujian ke ruang dan sesi tertentu. Alokasi yang tepat akan memastikan setiap siswa mendapatkan tempat duduk dan waktu ujian yang sesuai, serta memudahkan pengawasan selama pelaksanaan ujian.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Atur Ruang/Sesi</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Atur Ruang/Sesi</code></li>
            <li>Halaman Atur Ruang/Sesi akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Atur Ruang/Sesi harus dilakukan setelah jadwal ujian dibuat dan sebelum pelaksanaan ujian dimulai. Pastikan ruang dan sesi sudah dibuat sebelum melakukan alokasi.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Alokasi Ruang dan Sesi</h3>
        <ol class="step-list">
            <li>Pada halaman Atur Ruang/Sesi, pilih jadwal ujian yang akan diatur</li>
            <li>Daftar ruang dan sesi yang tersedia akan ditampilkan</li>
            <li>Pilih ruang yang akan digunakan untuk alokasi</li>
            <li>Pilih sesi ujian untuk ruang tersebut</li>
            <li>Daftar siswa yang tersedia akan ditampilkan</li>
            <li>Pilih siswa yang akan mengikuti ujian di ruang dan sesi tersebut:
                <ul class="step-list">
                    <li>Gunakan checkbox untuk memilih siswa satu per satu</li>
                    <li>Atau gunakan tombol <code class="inline">Pilih Semua</code> untuk memilih semua siswa</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Tambah</code> untuk memasukkan siswa ke alokasi</li>
            <li>Siswa akan ditambahkan ke tabel alokasi</li>
            <li>Ulangi langkah untuk ruang dan sesi lainnya</li>
            <li>Klik <code class="inline">Simpan</code> untuk menyimpan semua alokasi</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Pastikan jumlah siswa yang dialokasikan tidak melebihi kapasitas ruang. Sistem akan memberikan peringatan jika kapasitas terlampaui.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Alokasi</h3>
        <ul class="step-list">
            <li><strong>Kapasitas Ruang:</strong> Jumlah siswa per ruang tidak boleh melebihi kapasitas ruang</li>
            <li><strong>Unik:</strong> Setiap siswa hanya dapat dialokasikan ke satu ruang dan satu sesi</li>
            <li><strong>Kompleteness:</strong> Pastikan semua siswa telah dialokasikan sebelum ujian dimulai</li>
            <li><strong>Validitas:</strong> Ruang dan sesi harus sudah dibuat sebelum alokasi</li>
            <li><strong>Waktu:</strong> Sesi yang dialokasikan harus sesuai dengan jadwal ujian</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Kesalahan alokasi dapat menyebabkan siswa tidak dapat mengikuti ujian</li>
                    <li>Siswa yang tidak dialokasikan tidak akan muncul di sistem ujian</li>
                    <li>Verifikasi alokasi sebelum ujian dimulai</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Melihat Alokasi yang Sudah Ada</h3>
        <ol class="step-list">
            <li>Pada halaman Atur Ruang/Sesi, pilih jadwal ujian</li>
            <li>Tabel alokasi akan menampilkan siswa yang sudah dialokasikan</li>
            <li>Informasi yang ditampilkan:
                <ul class="step-list">
                    <li>Nama siswa</li>
                    <li>Kelas</li>
                    <li>Ruang ujian</li>
                    <li>Sesi ujian</li>
                    <li>Nomor meja/komputer (jika tersedia)</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan filter untuk melihat alokasi per ruang atau per sesi. Ini akan memudahkan verifikasi alokasi.</div>
        </div>
        <hr>
        <h3>🠊 Mengubah Alokasi</h3>
        <ol class="step-list">
            <li>Pada tabel alokasi, cari siswa yang ingin diubah alokasinya</li>
            <li>Klik tombol <code class="inline">Edit</code> pada siswa tersebut</li>
            <li>Modal edit alokasi akan ditampilkan</li>
            <li>Ubah ruang atau sesi sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Alokasi siswa akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan ruang dan sesi baru masih memiliki kapasitas tersedia</li>
                    <li>Informasikan perubahan alokasi kepada siswa yang bersangkutan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Menghapus Alokasi</h3>
        <ol class="step-list">
            <li>Pada tabel alokasi, pilih siswa yang ingin dihapus alokasinya</li>
            <li>Klik tombol <code class="inline">Hapus</code></li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Alokasi siswa akan dihapus</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Siswa yang alokasinya dihapus tidak akan dapat mengikuti ujian</li>
                    <li>Alokasikan ulang siswa ke ruang dan sesi lain jika diperlukan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Perencanaan:</strong> Rencanakan alokasi sebelum ujian dimulai</li>
            <li><strong>Kapasitas:</strong> Sesuaikan jumlah siswa dengan kapasitas ruang</li>
            <li><strong>Verifikasi:</strong> Verifikasi alokasi sebelum ujian dimulai</li>
            <li><strong>Komunikasi:</strong> Informasikan alokasi kepada semua siswa</li>
            <li><strong>Backup:</strong> Simpan daftar alokasi sebagai backup</li>
            <li><strong>Review:</strong> Review alokasi secara berkala</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan prosedur alokasi</li>
            <li><strong>Testing:</strong> Uji coba sistem dengan alokasi sebelum ujian</li>
            <li><strong>Fleksibilitas:</strong> Siapkan rencana cadangan jika ada perubahan</li>
            <li><strong>Koordinasi:</strong> Koordinasi dengan pengawas untuk distribusi alokasi</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menambah alokasi:</strong>
                <span>Pastikan jadwal ujian sudah dipilih. Pastikan ruang dan sesi sudah dipilih. Pastikan siswa tersedia. Pastikan kapasitas ruang belum penuh.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kapasitas terlampaui:</strong>
                <span>Pastikan jumlah siswa tidak melebihi kapasitas ruang. Kurangi jumlah siswa atau pilih ruang dengan kapasitas lebih besar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa duplikat:</strong>
                <span>Pastikan siswa belum dialokasikan ke ruang dan sesi lain. Hapus alokasi lama sebelum menambah alokasi baru.</span>
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
                <strong>Tidak bisa mengedit alokasi:</strong>
                <span>Pastikan alokasi masih valid. Pastikan tidak ada error koneksi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Per Jadwal:</strong> Alokasi ruang dan sesi dilakukan per jadwal ujian. Setiap jadwal ujian memiliki alokasi yang terpisah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan:</strong> Alokasi tergantung pada jadwal ujian, ruang, dan sesi. Perubahan pada data terkait akan mempengaruhi alokasi.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Kapasitas:</strong> Sistem akan memvalidasi kapasitas ruang saat alokasi. Pastikan kapasitas ruang diatur dengan benar.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat dan mengedit alokasi untuk jadwal ujian yang mereka ampu. Administrator memiliki akses penuh ke semua alokasi.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Semua operasi Atur Ruang/Sesi menggunakan AJAX POST ke controller <code>Cbtjadwal</code> dan mengembalikan respons JSON. Administrator dan Guru memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtjadwal/aturRuangSesi/{id_jadwal}</code></td><td>Tampilkan halaman atur ruang/sesi</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/saveAlokasi</code></td><td>Simpan alokasi ruang dan sesi</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/updateAlokasi</code></td><td>Update alokasi ruang dan sesi</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/deleteAlokasi</code></td><td>Hapus alokasi ruang dan sesi</td></tr>
                <tr><td>GET</td><td><code>cbtjadwal/getAlokasi/{id_jadwal}</code></td><td>Ambil data alokasi berdasarkan jadwal</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtjadwal/saveAlokasi</code> — Simpan Alokasi</h3>
        <p>Endpoint ini menangani operasi penyimpanan alokasi peserta ke ruang dan sesi.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
                <tr><td><code>id_ruang</code></td><td>Ya</td><td>ID ruang ujian</td></tr>
                <tr><td><code>id_sesi</code></td><td>Ya</td><td>ID sesi ujian</td></tr>
                <tr><td><code>siswa</code></td><td>Ya</td><td>Array ID siswa yang dialokasikan</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Alokasi berhasil disimpan", "total": 30 }</pre>
        <p style="margin-top:8px;"><strong>Respons JSON — gagal:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": false, "message": "Kapasitas ruang terlampaui" }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtjadwal/updateAlokasi</code> — Update Alokasi</h3>
        <p>Endpoint ini menangani operasi update alokasi peserta ke ruang dan sesi yang berbeda.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_alokasi</code></td><td>Ya</td><td>ID alokasi yang akan diupdate</td></tr>
                <tr><td><code>id_ruang_baru</code></td><td>Ya</td><td>ID ruang ujian baru</td></tr>
                <tr><td><code>id_sesi_baru</code></td><td>Ya</td><td>ID sesi ujian baru</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Alokasi berhasil diupdate" }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Sistem akan memvalidasi kapasitas ruang sebelum menyimpan alokasi. Jika kapasitas terlampaui, sistem akan menolak penyimpanan.</div>
        </div>
    </div>`
};
