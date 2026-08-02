if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['nomor-peserta'] = {
    title: 'Nomor Peserta',
    desc: 'Panduan lengkap mengelola nomor peserta ujian di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-id-card"></i> Nomor Peserta Ujian</h2>
        <p>Nomor peserta ujian digunakan untuk memberikan identitas unik bagi setiap peserta ujian. Nomor peserta diperlukan untuk login ke sistem ujian CBT dan memastikan setiap siswa memiliki identitas yang valid selama pelaksanaan ujian.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Nomor Peserta</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Nomor Peserta</code></li>
            <li>Halaman Nomor Peserta akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Nomor peserta harus di-generate sebelum pelaksanaan ujian. Siswa tidak dapat login ke sistem ujian tanpa nomor peserta.</div>
        </div>
        <hr>
        <h3>🠊 Generate Nomor Peserta</h3>
        <ol class="step-list">
            <li>Pada halaman Nomor Peserta, pilih tahun ajaran dan semester</li>
            <li>Pilih kelas yang akan diberikan nomor peserta</li>
            <li>Daftar siswa di kelas tersebut akan ditampilkan</li>
            <li>Klik tombol <code class="inline">Generate Nomor</code></li>
            <li>Sistem akan otomatis membuat nomor peserta untuk setiap siswa</li>
            <li>Nomor peserta akan ditampilkan di tabel</li>
            <li>Klik <code class="inline">Simpan</code> untuk menyimpan nomor peserta</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Generate nomor peserta cukup dilakukan sekali per tahun pelajaran untuk setiap siswa. Nomor peserta akan tetap sama untuk semua ujian dalam tahun pelajaran tersebut.</div>
        </div>
        <hr>
        <h3>🠊 Format Nomor Peserta</h3>
        <p>Nomor peserta biasanya terdiri dari beberapa komponen:</p>
        <ul class="step-list">
            <li><strong>Kode Sekolah:</strong> Kode unik sekolah (misal: 001, 12345)</li>
            <li><strong>Tahun Pelajaran:</strong> Tahun pelajaran (misal: 2024, 2025)</li>
            <li><strong>Nomor Urut:</strong> Nomor urut siswa (misal: 001, 002, 003)</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Contoh Format:</strong> 001-2024-001 (Kode Sekolah 001, Tahun 2024, Nomor Urut 001). Format dapat disesuaikan dengan kebutuhan sekolah.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Nomor Peserta</h3>
        <ul class="step-list">
            <li><strong>Unik:</strong> Nomor peserta bersifat unik untuk setiap siswa</li>
            <li><strong>Per Tahun Pelajaran:</strong> Nomor peserta di-generate per tahun pelajaran</li>
            <li><strong>Login:</strong> Nomor peserta digunakan untuk login ujian CBT</li>
            <li><strong>Tidak Dapat Diedit:</strong> Nomor peserta yang sudah di-generate tidak dapat diedit</li>
            <li><strong>Regenerate:</strong> Nomor peserta dapat di-regenerate jika diperlukan</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Regenerate nomor peserta akan mengganti nomor yang sudah ada</li>
                    <li>Siswa harus menggunakan nomor peserta baru untuk login</li>
                    <li>Gunakan regenerate hanya jika benar-benar diperlukan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Melihat Daftar Nomor Peserta</h3>
        <ol class="step-list">
            <li>Pada halaman Nomor Peserta, pilih tahun ajaran dan semester</li>
            <li>Pilih kelas untuk melihat nomor peserta siswa di kelas tersebut</li>
            <li>Daftar siswa dengan nomor peserta akan ditampilkan</li>
            <li>Informasi yang ditampilkan:
                <ul class="step-list">
                    <li>Nama siswa</li>
                    <li>NIS</li>
                    <li>Kelas</li>
                    <li>Nomor Peserta</li>
                    <li>Status (Sudah/Belum generate)</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan filter untuk mencari siswa tertentu atau melihat nomor peserta per kelas.</div>
        </div>
        <hr>
        <h3>🠊 Regenerate Nomor Peserta</h3>
        <ol class="step-list">
            <li>Pada halaman Nomor Peserta, pilih tahun ajaran dan semester</li>
            <li>Pilih kelas yang akan di-regenerate nomor pesertanya</li>
            <li>Klik tombol <code class="inline">Regenerate Nomor</code></li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Nomor peserta baru akan di-generate untuk semua siswa</li>
            <li>Klik <code class="inline">Simpan</code> untuk menyimpan</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Regenerate akan mengganti semua nomor peserta di kelas tersebut</li>
                    <li>Siswa harus menggunakan nomor peserta baru untuk login</li>
                    <li>Informasikan perubahan nomor peserta kepada semua siswa</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Generate awal tahun:</strong> Generate nomor peserta di awal tahun pelajaran</li>
            <li><strong>Komunikasi:</strong> Informasikan nomor peserta kepada semua siswa</li>
            <li><strong>Distribusi:</strong> Bagikan nomor peserta melalui kartu peserta atau email</li>
            <li><strong>Backup:</strong> Simpan daftar nomor peserta sebagai backup</li>
            <li><strong>Verifikasi:</strong> Verifikasi nomor peserta sebelum ujian dimulai</li>
            <li><strong>Konsistensi:</strong> Gunakan format nomor peserta yang konsisten</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan prosedur generate nomor peserta</li>
            <li><strong>Testing:</strong> Uji coba login dengan nomor peserta sebelum ujian</li>
            <li><strong>Review:</strong> Review daftar nomor peserta secara berkala</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan nomor peserta untuk mencegah kecurangan</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa generate nomor:</strong>
                <span>Pastikan tahun ajaran dan semester sudah dipilih. Pastikan kelas memiliki siswa. Pastikan tidak ada error koneksi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nomor peserta duplikat:</strong>
                <span>Pastikan format nomor peserta benar. Regenerate nomor peserta jika terjadi duplikasi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak bisa login:</strong>
                <span>Pastikan siswa memiliki nomor peserta. Pastikan nomor peserta dimasukkan dengan benar. Periksa status aktivasi siswa.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nomor peserta tidak muncul:</strong>
                <span>Pastikan generate sudah dilakukan. Refresh halaman untuk melihat data terbaru. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Regenerate gagal:</strong>
                <span>Pastikan tidak ada error koneksi. Coba refresh halaman dan ulangi proses. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Per Tahun Pelajaran:</strong> Nomor peserta di-generate per tahun pelajaran. Siswa akan memiliki nomor peserta yang sama untuk semua ujian dalam tahun pelajaran tersebut.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Login CBT:</strong> Nomor peserta adalah salah satu kredensial untuk login ke sistem ujian CBT. Siswa harus menggunakan nomor peserta yang benar untuk dapat mengikuti ujian.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Format Fleksibel:</strong> Format nomor peserta dapat disesuaikan dengan kebutuhan sekolah. Hubungi administrator untuk mengubah format nomor peserta.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat nomor peserta siswa di kelas yang mereka ampu. Administrator memiliki akses penuh untuk generate dan regenerate nomor peserta.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Semua operasi Nomor Peserta menggunakan AJAX POST ke controller <code>Cbtpeserta</code> dan mengembalikan respons JSON. Hanya Administrator yang memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtpeserta</code></td><td>Tampilkan halaman nomor peserta</td></tr>
                <tr><td>POST</td><td><code>cbtpeserta/generate</code></td><td>Generate nomor peserta untuk siswa</td></tr>
                <tr><td>POST</td><td><code>cbtpeserta/regenerate</code></td><td>Regenerate nomor peserta untuk siswa</td></tr>
                <tr><td>GET</td><td><code>cbtpeserta/data/{tp}/{smt}/{kelas}</code></td><td>Ambil data nomor peserta berdasarkan kelas</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtpeserta/generate</code> — Generate Nomor Peserta</h3>
        <p>Endpoint ini menangani operasi generate nomor peserta untuk siswa.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>tp</code></td><td>Ya</td><td>ID tahun pelajaran</td></tr>
                <tr><td><code>smt</code></td><td>Ya</td><td>ID semester</td></tr>
                <tr><td><code>kelas</code></td><td>Ya</td><td>ID kelas</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Nomor peserta berhasil di-generate", "total": 30 }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtpeserta/regenerate</code> — Regenerate Nomor Peserta</h3>
        <p>Endpoint ini menangani operasi regenerate nomor peserta untuk siswa.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>tp</code></td><td>Ya</td><td>ID tahun pelajaran</td></tr>
                <tr><td><code>smt</code></td><td>Ya</td><td>ID semester</td></tr>
                <tr><td><code>kelas</code></td><td>Ya</td><td>ID kelas</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Nomor peserta berhasil di-regenerate", "total": 30 }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Operasi generate dan regenerate dicatat ke tabel log aktivitas. Format nomor peserta dapat dikonfigurasi melalui pengaturan sistem.</div>
        </div>
    </div>`
};
