if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['cetak-hasil'] = {
    title: 'Cetak Hasil Ujian',
    desc: 'Panduan lengkap mencetak hasil ujian siswa di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-print"></i> Mencetak Hasil Ujian</h2>
        <p>Hasil ujian dapat dicetak dalam berbagai format untuk dokumentasi atau distribusi kepada siswa dan orang tua. Fitur cetak hasil ujian memungkinkan pembuatan laporan resmi, dokumentasi nilai, dan komunikasi hasil kepada pihak terkait.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Cetak Hasil</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Hasil CBT</code></li>
            <li>Klik <code class="inline">Cetak Hasil</code></li>
            <li>Halaman Cetak Hasil akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan ujian sudah selesai dan koreksi manual sudah selesai sebelum mencetak hasil. Nilai yang belum dikoreksi tidak akan termasuk dalam cetakan.</div>
        </div>
        <hr>
        <h3>🠊 Mencetak Hasil Ujian</h3>
        <ol class="step-list">
            <li>Pada halaman Cetak Hasil, pilih jadwal ujian yang ingin dicetak</li>
            <li>Dropdown jadwal ujian akan menampilkan semua jadwal yang sudah selesai</li>
            <li>Pilih jadwal ujian dari dropdown</li>
            <li>Pilih format cetakan:
                <ul class="step-list">
                    <li><strong>Per Siswa:</strong> Cetak hasil per siswa (individual)</li>
                    <li><strong>Per Kelas:</strong> Cetak hasil seluruh kelas dalam satu dokumen</li>
                    <li><strong>Rekap:</strong> Cetak rekapitulasi nilai seluruh siswa</li>
                </ul>
            </li>
            <li>Pilih format output:
                <ul class="step-list">
                    <li><strong>PDF:</strong> Untuk dokumen resmi dan distribusi</li>
                    <li><strong>Excel:</strong> Untuk analisis data dan pengolahan lebih lanjut</li>
                </ul>
            </li>
            <li>Jika memilih format Per Siswa, pilih siswa yang ingin dicetak</li>
            <li>Jika memilih format Per Kelas, pilih kelas yang ingin dicetak</li>
            <li>Klik tombol <code class="inline">Cetak</code></li>
            <li>File akan di-generate dan didownload ke komputer</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Format PDF cocok untuk dokumentasi resmi dan distribusi kepada siswa/orang tua. Format Excel cocok untuk analisis data dan pengolahan lebih lanjut.</div>
        </div>
        <hr>
        <h3>🠊 Format Cetak Per Siswa</h3>
        <p>Cetak per siswa menghasilkan dokumen individual untuk setiap siswa:</p>
        <ul class="step-list">
            <li><strong>Informasi Siswa:</strong> Nama, NIS, kelas, dan foto siswa (jika tersedia)</li>
            <li><strong>Informasi Ujian:</strong> Nama ujian, mata pelajaran, tanggal, dan waktu</li>
            <li><strong>Nilai Akhir:</strong> Nilai akhir ujian (0-100)</li>
            <li><strong>Detail Nilai:</strong> Jumlah benar, salah, dan tidak dijawab</li>
            <li><strong>Waktu:</strong> Waktu pengerjaan</li>
            <li><strong>Ranking:</strong> Ranking dalam kelas (opsional)</li>
            <li><strong>Predikat:</strong> Predikat nilai (A, B, C, dll)</li>
            <li><strong>Catatan:</strong> Catatan guru (jika ada)</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Cetak per siswa ideal untuk distribusi individual kepada siswa dan orang tua sebagai dokumentasi resmi.</div>
        </div>
        <hr>
        <h3>🠊 Format Cetak Per Kelas</h3>
        <p>Cetak per kelas menghasilkan dokumen untuk seluruh siswa dalam satu kelas:</p>
        <ul class="step-list">
            <li><strong>Informasi Kelas:</strong> Nama kelas dan jumlah siswa</li>
            <li><strong>Informasi Ujian:</strong> Nama ujian, mata pelajaran, tanggal, dan waktu</li>
            <li><strong>Tabel Nilai:</strong> Tabel berisi nilai seluruh siswa dalam kelas</li>
            <li><strong>Statistik Kelas:</strong> Rata-rata, nilai tertinggi, nilai terendah</li>
            <li><strong>Distribusi Nilai:</strong> Distribusi nilai (A, B, C, dll)</li>
            <li><strong>Kelulusan:</strong> Jumlah dan persentase siswa lulus</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Cetak per kelas ideal untuk dokumentasi guru, laporan ke sekolah, dan analisis performa kelas.</div>
        </div>
        <hr>
        <h3>🠊 Format Cetak Rekap</h3>
        <p>Cetak rekap menghasilkan dokumen rekapitulasi seluruh hasil ujian:</p>
        <ul class="step-list">
            <li><strong>Informasi Ujian:</strong> Nama ujian, mata pelajaran, tanggal, dan waktu</li>
            <li><strong>Tabel Rekap:</strong> Tabel berisi nilai seluruh siswa yang mengikuti ujian</li>
            <li><strong>Statistik Keseluruhan:</strong> Rata-rata, nilai tertinggi, nilai terendah</li>
            <li><strong>Statistik per Kelas:</strong> Statistik untuk setiap kelas</li>
            <li><strong>Distribusi Nilai:</strong> Distribusi nilai keseluruhan</li>
            <li><strong>Kelulusan:</strong> Jumlah dan persentase kelulusan keseluruhan</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Cetak rekap ideal untuk laporan ke sekolah, dokumentasi arsip, dan analisis performa keseluruhan.</div>
        </div>
        <hr>
        <h3>🠊 Format Output</h3>
        <p>Sistem menyediakan dua format output:</p>
        <ul class="step-list">
            <li><strong>PDF:</strong>
                <ul class="step-list">
                    <li>Format dokumen resmi yang tidak dapat diedit</li>
                    <li>Cocok untuk distribusi dan dokumentasi</li>
                    <li>Dapat dibuka dengan Adobe Reader atau aplikasi PDF lainnya</li>
                    <li>Format standar untuk dokumen resmi</li>
                </ul>
            </li>
            <li><strong>Excel:</strong>
                <ul class="step-list">
                    <li>Format spreadsheet yang dapat diedit</li>
                    <li>Cocok untuk analisis data dan pengolahan lebih lanjut</li>
                    <li>Dapat dibuka dengan Microsoft Excel atau aplikasi spreadsheet lainnya</li>
                    <li>Memungkinkan pengolahan data lebih lanjut</li>
                </ul>
            </li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Pilih format output sesuai kebutuhan. PDF untuk dokumentasi resmi, Excel untuk analisis data.</div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter Kelas</code> untuk memfilter berdasarkan kelas</li>
            <li>Gunakan dropdown <code class="inline">Filter Status</code></strong> untuk memfilter berdasarkan status kelulusan</li>
            <li>Gunakan kolom <code class="inline">Cari</code> untuk mencari siswa berdasarkan nama atau NIS</li>
            <li>Hasil akan ditampilkan sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk mencetak hasil untuk kelompok siswa tertentu.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Koreksi selesai:</strong> Pastikan koreksi manual selesai sebelum mencetak</li>
            <li><strong>Review data:</strong> Review data sebelum mencetak untuk memastikan akurasi</li>
            <li><strong>Format sesuai:</strong> Pilih format cetakan sesuai kebutuhan</li>
            <li><strong>Backup:</strong> Simpan file cetakan sebagai backup</li>
            <li><strong>Distribusi:</strong> Distribusi hasil kepada siswa dan orang tua</li>
            <li><strong>Dokumentasi:</strong> Simpan cetakan sebagai dokumentasi resmi</li>
            <li><strong>Analisis:</strong> Gunakan format Excel untuk analisis data</li>
            <li><strong>Komunikasi:</strong> Gunakan hasil untuk komunikasi dengan pihak terkait</li>
            <li><strong>Perbaikan:</strong> Gunakan hasil untuk perbaikan pembelajaran</li>
            <li><strong>Review:</strong> Review prosedur cetak untuk perbaikan berikutnya</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Daftar tidak muncul:</strong>
                <span>Pastikan jadwal ujian sudah dipilih. Pastikan ujian sudah selesai. Pastikan ada siswa yang mengikuti ujian.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Cetak gagal:</strong>
                <span>Pastikan koneksi internet stabil. Coba refresh halaman dan ulangi cetak. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>File tidak terdownload:</strong>
                <span>Pastikan browser mengizinkan download. Periksa folder download. Coba cetak ulang jika file tidak muncul.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>File rusak:</strong>
                <span>Pastikan koneksi internet stabil saat download. Coba cetak ulang. Periksa apakah ada error koneksi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Data tidak lengkap:</strong>
                <span>Pastikan koreksi manual sudah selesai. Refresh halaman untuk update data. Periksa apakah ada data yang belum lengkap.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Format tidak sesuai:</strong>
                <span>Pastikan format output dipilih dengan benar. Coba cetak ulang dengan format yang berbeda. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Koreksi Manual:</strong> Nilai soal essay dan isian singkat perlu dikoreksi manual melalui menu Koreksi sebelum nilai final tersedia untuk cetak.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>KKM:</strong> Statistik kelulusan berdasarkan KKM (Kriteria Ketuntasan Minimal) yang ditetapkan untuk mata pelajaran tersebut.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Format PDF:</strong> PDF adalah format standar untuk dokumen resmi yang tidak dapat diedit. Cocok untuk distribusi dan dokumentasi.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Format Excel:</strong> Excel adalah format spreadsheet yang dapat diedit. Cocok untuk analisis data dan pengolahan lebih lanjut.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Cetak Hasil menggunakan endpoint untuk generate dan download dokumen hasil ujian dalam berbagai format. Dokumen di-generate secara dinamis dan di-download sebagai file.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtcetak/cetak/{id_jadwal}</code></td><td>Tampilkan halaman cetak hasil</td></tr>
                <tr><td>GET</td><td><code>cbtcetak/cetakPerSiswa/{id_jadwal}/{id_siswa}/{format}</code></td><td>Cetak hasil per siswa (PDF/Excel)</td></tr>
                <tr><td>GET</td><td><code>cbtcetak/cetakPerKelas/{id_jadwal}/{id_kelas}/{format}</code></td><td>Cetak hasil per kelas (PDF/Excel)</td></tr>
                <tr><td>GET</td><td><code>cbtcetak/cetakRekap/{id_jadwal}/{format}</code></td><td>Cetak rekap nilai (PDF/Excel)</td></tr>
                <tr><td>GET</td><td><code>cbtcetak/getData/{id_jadwal}</code></td><td>Ambil data untuk cetakan</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">GET <code>cbtcetak/cetakPerSiswa/{id_jadwal}/{id_siswa}/{format}</code> — Cetak Per Siswa</h3>
        <p>Endpoint ini menangani operasi cetak hasil ujian per siswa.</p>
        <table class="table-custom">
            <thead><tr><th>Parameter URL</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
                <tr><td><code>id_siswa</code></td><td>Ya</td><td>ID siswa</td></tr>
                <tr><td><code>format</code></td><td>Ya</td><td>Format output (pdf/excel)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons:</strong> File PDF atau Excel untuk download</p>

        <h3 style="margin-top:20px;">GET <code>cbtcetak/cetakRekap/{id_jadwal}/{format}</code> — Cetak Rekap</h3>
        <p>Endpoint ini menangani operasi cetak rekapitulasi nilai seluruh siswa.</p>
        <table class="table-custom">
            <thead><tr><th>Parameter URL</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
                <tr><td><code>format</code></td><td>Ya</td><td>Format output (pdf/excel)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons:</strong> File PDF atau Excel untuk download</p>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Dokumen di-generate secara dinamis berdasarkan data hasil ujian yang sudah dikoreksi. Pastikan koreksi manual selesai sebelum mencetak.</div>
        </div>
    </div>`
};
