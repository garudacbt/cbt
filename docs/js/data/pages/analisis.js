if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['analisis'] = {
    title: 'Analisis Soal',
    desc: 'Panduan lengkap analisis statistik soal untuk evaluasi kualitas di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-chart-line"></i> Analisis Soal</h2>
        <p>Analisis soal memberikan statistik tentang kualitas soal berdasarkan hasil ujian, termasuk tingkat kesulitan dan daya pembeda. Analisis soal adalah alat penting untuk evaluasi dan perbaikan bank soal, memastikan soal yang digunakan berkualitas tinggi dan adil.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Analisis Soal</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Hasil CBT</code></li>
            <li>Klik <code class="inline">Analisis Soal</code></li>
            <li>Halaman Analisis Soal akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan ujian sudah selesai dan koreksi manual sudah selesai sebelum melakukan analisis soal. Analisis memerlukan data nilai yang lengkap.</div>
        </div>
        <hr>
        <h3>🠊 Melakukan Analisis Soal</h3>
        <ol class="step-list">
            <li>Pada halaman Analisis Soal, pilih jadwal ujian yang ingin dianalisis</li>
            <li>Dropdown jadwal ujian akan menampilkan semua jadwal yang sudah selesai</li>
            <li>Pilih jadwal ujian dari dropdown</li>
            <li>Sistem akan menghitung statistik untuk setiap soal</li>
            <li>Hasil analisis akan ditampilkan dalam tabel</li>
            <li>Informasi yang ditampilkan:
                <ul class="step-list">
                    <li><strong>Nomor Soal:</strong> Nomor urut soal</li>
                    <li><strong>Jenis Soal:</strong> Jenis soal (Pilihan Ganda, Essay, dll)</li>
                    <li><strong>Daya Pembeda (DP):</strong> Kemampuan soal membedakan siswa pandai dan kurang pandai</li>
                    <li><strong>Tingkat Kesulitan (TK):</strong> Tingkat kesulitan soal berdasarkan persentase jawaban benar</li>
                    <li><strong>Penipu:</strong> Persentase siswa yang menjawab sama</li>
                    <li><strong>Validitas:</strong> Validitas soal</li>
                    <li><strong>Benar:</strong> Persentase siswa yang menjawab benar</li>
                    <li><strong>Salah:</strong> Persentase siswa yang menjawab salah</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Analisis soal dihitung secara otomatis berdasarkan data ujian. Semakin banyak siswa yang mengikuti ujian, semakin akurat hasil analisis.</div>
        </div>
        <hr>
        <h3>🠊 Statistik yang Ditampilkan</h3>
        <p>Analisis soal menampilkan beberapa indikator statistik:</p>
        <ul class="step-list">
            <li><strong>Daya Pembeda (DP):</strong> Kemampuan soal membedakan siswa pandai dan kurang pandai</li>
            <li><strong>Tingkat Kesulitan (TK):</strong> Tingkat kesulitan soal berdasarkan persentase jawaban benar</li>
            <li><strong>Penipu:</strong> Persentase siswa yang menjawab sama (indikasi kecurangan)</li>
            <li><strong>Validitas:</strong> Validitas soal berdasarkan korelasi dengan nilai total</li>
            <li><strong>Persen Benar:</strong> Persentase siswa yang menjawab benar</li>
            <li><strong>Persen Salah:</strong> Persentase siswa yang menjawab salah</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Perhitungan:</strong> Statistik dihitung menggunakan rumus standar dalam psikometri. Hasil analisis membantu mengevaluasi kualitas soal secara objektif.</div>
        </div>
        <hr>
        <h3>🠊 Interpretasi Daya Pembeda (DP)</h3>
        <p>Daya Pembeda mengukur kemampuan soal membedakan siswa yang pandai dan kurang pandai:</p>
        <table class="table-custom">
            <thead><tr><th>Nilai DP</th><th>Kategori</th><th>Arti</th><th>Tindakan</th></tr></thead>
            <tbody>
                <tr><td>0.00 - 0.20</td><td>Sangat Buruk</td><td>Soal tidak dapat membedakan siswa</td><td>Ganti atau revisi total</td></tr>
                <tr><td>0.21 - 0.40</td><td>Buruk</td><td>Soal kurang dapat membedakan siswa</td><td>Revisi atau ganti</td></tr>
                <tr><td>0.41 - 0.70</td><td>Cukup</td><td>Soal cukup dapat membedakan siswa</td><td>Pertahankan atau revisi minor</td></tr>
                <tr><td>0.71 - 1.00</td><td>Baik</td><td>Soal baik dalam membedakan siswa</td><td>Pertahankan</td></tr>
            </tbody>
        </table>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Soal dengan DP rendah (< 0.40) sebaiknya direvisi atau diganti karena tidak efektif dalam membedakan kemampuan siswa.</div>
        </div>
        <hr>
        <h3>🠊 Interpretasi Tingkat Kesulitan (TK)</h3>
        <p>Tingkat Kesulitan mengukur seberapa sulit soal bagi siswa:</p>
        <table class="table-custom">
            <thead><tr><th>Nilai TK</th><th>Kategori</th><th>Arti</th><th>Tindakan</th></tr></thead>
            <tbody>
                <tr><td>0.00 - 0.30</td><td>Sangat Sulit</td><td>Sangat sedikit siswa yang menjawab benar</td><td>Review apakah terlalu sulit</td></tr>
                <tr><td>0.31 - 0.70</td><td>Sedang</td><td>Kesulitan yang wajar</td><td>Pertahankan</td></tr>
                <tr><td>0.71 - 1.00</td><td>Mudah</td><td>Banyak siswa yang menjawab benar</td><td>Review apakah terlalu mudah</td></tr>
            </tbody>
        </table>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Campuran soal dengan berbagai tingkat kesulitan (mudah, sedang, sulit) akan menghasilkan ujian yang seimbang dan adil.</div>
        </div>
        <hr>
        <h3>🠊 Interpretasi Penipu</h3>
        <p>Penipu mengukur persentase siswa yang menjawab sama (indikasi kecurangan):</p>
        <table class="table-custom">
            <thead><tr><th>Nilai Penipu</th><th>Kategori</th><th>Arti</th><th>Tindakan</th></tr></thead>
            <tbody>
                <tr><td>0% - 20%</td><td>Rendah</td><td>Tidak ada indikasi kecurangan</td><td>Tidak perlu tindakan</td></tr>
                <tr><td>21% - 50%</td><td>Sedang</td><td>Ada indikasi kecurangan</td><td>Investigasi lebih lanjut</td></tr>
                <tr><td>51% - 100%</td><td>Tinggi</td><td>Indikasi kecurangan kuat</td><td>Investigasi dan tindakan</td></tr>
            </tbody>
        </table>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Nilai penipu tinggi dapat mengindikasikan kecurangan atau soal yang terlalu mudah</li>
                    <li>Investigasi lebih lanjut diperlukan untuk memastikan penyebabnya</li>
                    <li>Soal dengan penipu tinggi sebaiknya direvisi atau diganti</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter Jenis</code> untuk memfilter berdasarkan jenis soal</li>
            <li>Gunakan dropdown <code class="inline">Filter Kualitas</code> untuk memfilter berdasarkan kualitas (DP/TK)</li>
            <li>Gunakan kolom <code class="inline">Cari</code> untuk mencari soal berdasarkan nomor</li>
            <li>Hasil akan ditampilkan sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk fokus pada soal dengan kualitas rendah yang perlu perbaikan.</div>
        </div>
        <hr>
        <h3>🠊 Export Analisis</h3>
        <ol class="step-list">
            <li>Pada halaman Analisis Soal, klik tombol <code class="inline">Export Excel</code></li>
            <li>File Excel akan didownload ke komputer</li>
            <li>File berisi data analisis soal yang sedang ditampilkan</li>
            <li>Data dapat diolah lebih lanjut menggunakan Microsoft Excel</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Export Excel berguna untuk dokumentasi, laporan, atau analisis lebih lanjut menggunakan tools statistik lainnya.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Analisis berkala:</strong> Lakukan analisis soal secara berkala untuk evaluasi kualitas</li>
            <li><strong>Revisi soal:</strong> Revisi soal dengan kualitas rendah berdasarkan hasil analisis</li>
            <li><strong>Campuran kesulitan:</strong> Gunakan campuran soal dengan berbagai tingkat kesulitan</li>
            <li><strong>DP tinggi:</strong> Prioritaskan soal dengan DP tinggi untuk ujian penting</li>
            <li><strong>Investigasi penipu:</strong> Investigasi soal dengan penipu tinggi</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan hasil analisis untuk referensi</li>
            <li><strong>Perbaikan:</strong> Gunakan hasil analisis untuk perbaikan bank soal</li>
            <li><strong>Validasi:</strong> Validasi hasil analisis dengan review manual</li>
            <li><strong>Sharing:</strong> Share hasil analisis dengan tim guru</li>
            <li><strong>Review:</strong> Review prosedur analisis untuk perbaikan berikutnya</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Data tidak muncul:</strong>
                <span>Pastikan jadwal ujian sudah dipilih. Pastikan ujian sudah selesai. Pastikan koreksi manual sudah selesai. Pastikan ada siswa yang mengikuti ujian.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Statistik tidak dihitung:</strong>
                <span>Pastikan data nilai lengkap. Pastikan tidak ada error koneksi. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Export gagal:</strong>
                <span>Pastikan koneksi internet stabil. Coba refresh halaman dan ulangi export. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Filter tidak berfungsi:</strong>
                <span>Pastikan filter dipilih dengan benar. Refresh halaman dan coba lagi. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tidak valid:</strong>
                <span>Pastikan jumlah siswa cukup untuk analisis (minimal 30 siswa). Analisis dengan sampel kecil mungkin tidak akurat.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Soal essay tidak muncul:</strong>
                <span>Analisis DP dan TK hanya berlaku untuk soal objektif (pilihan ganda, ganda kompleks). Soal essay tidak dihitung dalam analisis ini.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Sampel Minimum:</strong> Analisis soal memerlukan sampel minimum (biasanya 30 siswa) untuk hasil yang akurat. Analisis dengan sampel kecil mungkin tidak representatif.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Soal Objektif:</strong> Analisis DP dan TK hanya berlaku untuk soal objektif. Soal essay dan isian singkat tidak dihitung dalam analisis ini karena penilaian subjektif.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Revisi Bank Soal:</strong> Gunakan hasil analisis untuk revisi bank soal. Soal dengan kualitas rendah sebaiknya direvisi atau diganti.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Konsistensi:</strong> Analisis soal yang konsisten dari waktu ke waktu menunjukkan kualitas bank soal yang baik. Variasi besar dalam hasil analisis menunjukkan perlu perbaikan.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Analisis Soal menggunakan endpoint untuk menghitung statistik kualitas soal berdasarkan data ujian. Statistik dihitung secara otomatis dan diambil melalui AJAX GET.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtanalisis/analisis/{id_jadwal}</code></td><td>Tampilkan halaman analisis soal</td></tr>
                <tr><td>GET</td><td><code>cbtanalisis/hitung/{id_jadwal}</code></td><td>Hitung statistik analisis soal</td></tr>
                <tr><td>GET</td><td><code>cbtanalisis/getAnalisis/{id_jadwal}</code></td><td>Ambil data analisis soal</td></tr>
                <tr><td>GET</td><td><code>cbtanalisis/exportExcel/{id_jadwal}</code></td><td>Export analisis ke Excel</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">GET <code>cbtanalisis/getAnalisis/{id_jadwal}</code> — Ambil Analisis Soal</h3>
        <p>Endpoint ini menangani pengambilan data analisis statistik soal.</p>
        <table class="table-custom">
            <thead><tr><th>Parameter URL</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "soal": [
    { "nomor": 1, "jenis": "Pilihan Ganda", "dp": 0.65, "tk": 0.72, "penipu": 15, "validitas": 0.8 },
    { "nomor": 2, "jenis": "Pilihan Ganda", "dp": 0.45, "tk": 0.55, "penipu": 25, "validitas": 0.6 }
  ],
  "statistik": { "total_soal": 40, "dp_rata": 0.55, "tk_rata": 0.65 }
}</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Analisis soal memerlukan sampel minimum (biasanya 30 siswa) untuk hasil yang akurat. Analisis hanya berlaku untuk soal objektif.</div>
        </div>
    </div>`
};
