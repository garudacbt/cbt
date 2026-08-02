if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['jenis-soal'] = {
    title: 'Jenis Soal',
    desc: 'Panduan lengkap jenis-jenis soal yang didukung oleh GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-list"></i> Jenis Soal yang Didukung</h2>
        <p>GarudaCBT mendukung berbagai jenis soal untuk fleksibilitas dalam pembuatan ujian. Setiap jenis soal memiliki karakteristik dan cara penilaian yang berbeda. Pemilihan jenis soal yang tepat akan mempengaruhi efektivitas evaluasi pembelajaran.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Ringkasan Jenis Soal</h3>
        <table class="table-custom">
            <thead><tr><th>Jenis Soal</th><th>Deskripsi</th><th>Auto-Grade</th><th>Opsi Jawaban</th></tr></thead>
            <tbody>
                <tr><td>Pilihan Ganda</td><td>Soal dengan beberapa opsi jawaban</td><td><i class="fas fa-check" style="color:var(--accent)"></i></td><td>3-5 opsi</td></tr>
                <tr><td>Ganda Kompleks</td><td>Soal dengan lebih dari satu jawaban benar</td><td><i class="fas fa-check" style="color:var(--accent)"></i></td><td>Multiple</td></tr>
                <tr><td>Menjodohkan</td><td>Soal pasangan item</td><td><i class="fas fa-check" style="color:var(--accent)"></i></td><td>Pasangan</td></tr>
                <tr><td>Isian Singkat</td><td>Soal dengan jawaban singkat</td><td><i class="fas fa-times" style="color:var(--danger)"></i></td><td>Teks</td></tr>
                <tr><td>Essay</td><td>Soal dengan jawaban panjang</td><td><i class="fas fa-times" style="color:var(--danger)"></i></td><td>Teks panjang</td></tr>
            </tbody>
        </table>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>Soal dengan auto-grade akan dinilai secara otomatis oleh sistem. Soal essay dan isian singkat perlu dikoreksi manual oleh guru melalui menu Koreksi.</div>
        </div>
        <hr>
        <h3>🠊 Pilihan Ganda</h3>
        <p>Soal Pilihan Ganda adalah jenis soal yang paling umum digunakan dalam ujian. Siswa diminta memilih satu jawaban benar dari beberapa opsi yang tersedia.</p>
        
        <h4>Karakteristik:</h4>
        <ul class="step-list">
            <li><strong>Opsi Jawaban:</strong> 3, 4, atau 5 opsi (dikonfigurasi di bank soal)</li>
            <li><strong>Jawaban Benar:</strong> Hanya satu jawaban yang benar</li>
            <li><strong>Penilaian:</strong> Otomatis oleh sistem (auto-grade)</li>
            <li><strong>Bobot:</strong> Dapat diatur sesuai kebutuhan</li>
        </ul>

        <h4>Kelebihan:</h4>
        <ul class="step-list">
            <li>Penilaian objektif dan cepat</li>
            <li>Mudah dibuat dalam jumlah besar</li>
            <li>Cakupan materi yang luas</li>
            <li>Hasil instan tersedia untuk siswa</li>
        </ul>

        <h4>Kekurangan:</h4>
        <ul class="step-list">
            <li>Risiko tebakan (guessing)</li>
            <li>Tidak mengukur kemampuan mendalam</li>
            <li>Dapat dibuat dengan opsi yang mudah ditebak</li>
        </ul>

        <h4>Best Practices:</h4>
        <ul class="step-list">
            <li>Buat opsi jawaban yang homogen (semua angka, semua kalimat, dll)</li>
            <li>Hindari opsi "semua jawaban benar" atau "semua jawaban salah"</li>
            <li>Gunakan opsi yang logis dan masuk akal</li>
            <li>Pastikan hanya satu jawaban yang jelas benar</li>
            <li>Hindari petunjuk dalam opsi jawaban (misal: opsi terpanjang biasanya benar)</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan 4 opsi untuk keseimbangan antara variasi dan waktu pengerjaan. 5 opsi memberikan variasi lebih namun memakan waktu lebih lama.</div>
        </div>
        <hr>
        <h3>🠊 Ganda Kompleks</h3>
        <p>Soal Ganda Kompleks (Multiple Choice) memungkinkan lebih dari satu jawaban yang benar. Siswa harus memilih semua jawaban yang benar untuk mendapatkan nilai penuh.</p>
        
        <h4>Karakteristik:</h4>
        <ul class="step-list">
            <li><strong>Opsi Jawaban:</strong> Banyak opsi (biasanya 4-6)</li>
            <li><strong>Jawaban Benar:</strong> Dua atau lebih jawaban yang benar</li>
            <li><strong>Penilaian:</strong> Otomatis oleh sistem (auto-grade)</li>
            <li><strong>Bobot:</strong> Dapat diatur sesuai kebutuhan</li>
        </ul>

        <h4>Kelebihan:</h4>
        <ul class="step-list">
            <li>Mengurangi risiko tebakan</li>
            <li>Menguji pemahaman yang lebih mendalam</li>
            <li>Dapat menguji hubungan antar konsep</li>
            <li>Lebih menantang bagi siswa</li>
        </ul>

        <h4>Kekurangan:</h4>
        <ul class="step-list">
            <li>Lebih sulit dibuat</li>
            <li>Waktu pengerjaan lebih lama</li>
            <li>Dapat membingungkan jika tidak jelas</li>
        </ul>

        <h4>Best Practices:</h4>
        <ul class="step-list">
            <li>Jelaskan dengan jelas bahwa ada lebih dari satu jawaban benar</li>
            <li>Sebutkan jumlah jawaban benar yang diharapkan</li>
            <li>Buat opsi yang jelas benar atau salah</li>
            <li>Hindari jawaban yang ambigu</li>
            <li>Gunakan untuk materi yang memiliki banyak aspek</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Berikan petunjuk seperti "Pilih dua jawaban yang benar" atau "Pilih semua yang berlaku" untuk mengurangi kebingungan siswa.</div>
        </div>
        <hr>
        <h3>🠊 Menjodohkan</h3>
        <p>Soal Menjodohkan meminta siswa untuk memasangkan item di kolom kiri dengan item yang sesuai di kolom kanan. Jenis soal ini cocok untuk menguji hubungan antar konsep.</p>
        
        <h4>Karakteristik:</h4>
        <ul class="step-list">
            <li><strong>Format:</strong> Dua kolom dengan item yang harus dipasangkan</li>
            <li><strong>Jawaban Benar:</strong> Pasangan item yang sesuai</li>
            <li><strong>Penilaian:</strong> Otomatis oleh sistem (auto-grade)</li>
            <li><strong>Bobot:</strong> Dapat diatur sesuai kebutuhan</li>
        </ul>

        <h4>Kelebihan:</h4>
        <ul class="step-list">
            <li>Menguji pemahaman hubungan antar konsep</li>
            <li>Menarik dan tidak monoton</li>
            <li>Cakupan materi yang luas dalam satu soal</li>
            <li>Penilaian objektif</li>
        </ul>

        <h4>Kekurangan:</h4>
        <ul class="step-list">
            <li>Sulit dibuat dengan pasangan yang jelas</li>
            <li>Risiko tebakan jika opsi terlalu sedikit</li>
            <li>Dapat membingungkan jika item tidak jelas</li>
        </ul>

        <h4>Best Practices:</h4>
        <ul class="step-list">
            <li>Pastikan jumlah item di kedua kolom sama</li>
            <li>Buat pasangan yang jelas dan unik</li>
            <li>Hindari pasangan yang ambigu</li>
            <li>Gunakan item yang homogen dalam setiap kolom</li>
            <li>Berikan instruksi yang jelas</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan 5-7 pasangan item untuk keseimbangan antara variasi dan waktu pengerjaan. Terlalu banyak pasangan akan membingungkan siswa.</div>
        </div>
        <hr>
        <h3>🠊 Isian Singkat</h3>
        <p>Soal Isian Singkat meminta siswa untuk mengisi jawaban singkat, biasanya satu kata atau frasa pendek. Jenis soal ini cocok untuk menguji ingatan dan pemahaman dasar.</p>
        
        <h4>Karakteristik:</h4>
        <ul class="step-list">
            <li><strong>Format:</strong> Pertanyaan dengan bagian yang harus diisi</li>
            <li><strong>Jawaban Benar:</strong> Teks singkat (bisa multiple jawaban yang diterima)</li>
            <li><strong>Penilaian:</strong> Manual oleh guru (melalui menu Koreksi)</li>
            <li><strong>Bobot:</strong> Dapat diatur sesuai kebutuhan</li>
        </ul>

        <h4>Kelebihan:</h4>
        <ul class="step-list">
            <li>Mengurangi risiko tebakan</li>
            <li>Menguji ingatan dan pemahaman</li>
            <li>Mudah dibuat</li>
            <li>Fleksibel untuk berbagai materi</li>
        </ul>

        <h4>Kekurangan:</h4>
        <ul class="step-list">
            <li>Penilaian subjektif</li>
            <li>Memerlukan waktu koreksi</li>
            <li>Risiko jawaban yang tidak tepat tapi benar secara konteks</li>
            <li>D sulit untuk soal yang kompleks</li>
        </ul>

        <h4>Best Practices:</h4>
        <ul class="step-list">
            <li>Buat pertanyaan yang jelas dan spesifik</li>
            <li>Sediakan beberapa jawaban yang diterima (multiple key)</li>
            <li>Hindari pertanyaan yang ambigu</li>
            <li>Gunakan untuk fakta dan definisi</li>
            <li>Berikan petunjuk tentang format jawaban yang diharapkan</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Berikan beberapa variasi jawaban yang diterima. Misalnya, jika jawaban adalah "Jakarta", terima juga "jakarta" atau "JAKARTA" jika case-insensitive.</div>
        </div>
        <hr>
        <h3>🠊 Essay</h3>
        <p>Soal Essay meminta siswa untuk menjawab dengan teks panjang yang menjelaskan atau menganalisis suatu topik. Jenis soal ini cocok untuk menguji kemampuan berpikir kritis dan analisis.</p>
        
        <h4>Karakteristik:</h4>
        <ul class="step-list">
            <li><strong>Format:</strong> Pertanyaan atau instruksi terbuka</li>
            <li><strong>Jawaban Benar:</strong> Teks panjang (tidak ada jawaban tunggal yang benar)</li>
            <li><strong>Penilaian:</strong> Manual oleh guru (melalui menu Koreksi)</li>
            <li><strong>Bobot:</strong> Dapat diatur sesuai kebutuhan</li>
        </ul>

        <h4>Kelebihan:</h4>
        <ul class="step-list">
            <li>Menguji kemampuan berpikir kritis dan analisis</li>
            <li>Mengukur pemahaman mendalam</li>
            <li>Tidak ada risiko tebakan</li>
            <li>Fleksibel untuk berbagai topik</li>
        </ul>

        <h4>Kekurangan:</h4>
        <ul class="step-list">
            <li>Penilaian subjektif</li>
            <li>Memerlukan waktu koreksi yang lama</li>
            <li>Waktu pengerjaan lama</li>
            <li>Sulit dibuat dalam jumlah besar</li>
        </ul>

        <h4>Best Practices:</h4>
        <ul class="step-list">
            <li>Buat pertanyaan yang jelas dan spesifik</li>
            <li>Berikan batasan panjang jawaban</li>
            <li>Sediakan rubrik penilaian yang jelas</li>
            <li>Berikan jawaban ideal sebagai referensi</li>
            <li>Gunakan untuk materi yang memerlukan analisis</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Berikan instruksi yang jelas tentang apa yang dinilai (misal: "Jelaskan dengan contoh" atau "Bandingkan dua konsep"). Ini membantu siswa fokus pada aspek yang dinilai.</div>
        </div>
        <hr>
        <h3>🠊 Memilih Jenis Soal yang Tepat</h3>
        <p>Pemilihan jenis soal yang tepat akan mempengaruhi efektivitas evaluasi. Berikut panduan untuk memilih jenis soal:</p>

        <table class="table-custom">
            <thead><tr><th>Tujuan Evaluasi</th><th>Jenis Soal yang Disarankan</th><th>Alasan</th></tr></thead>
            <tbody>
                <tr><td>Menguji ingatan fakta</td><td>Pilihan Ganda, Isian Singkat</td><td>Objektif dan cepat dinilai</td></tr>
                <tr><td>Menguji pemahaman konsep</td><td>Pilihan Ganda, Ganda Kompleks</td><td>Dapat menguji pemahaman mendalam</td></tr>
                <tr><td>Menguji hubungan antar konsep</td><td>Menjodohkan</td><td>Khusus untuk pasangan konsep</td></tr>
                <tr><td>Menguji analisis dan sintesis</td><td>Essay</td><td>Memerlukan jawaban panjang</td></tr>
                <tr><td>Evaluasi cepat dengan cakupan luas</td><td>Pilihan Ganda</td><td>Objektif dan efisien</td></tr>
                <tr><td>Mengurangi risiko tebakan</td><td>Ganda Kompleks, Isian Singkat, Essay</td><td>Tidak ada opsi tunggal</td></tr>
            </tbody>
        </table>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Kombinasikan berbagai jenis soal dalam satu ujian untuk evaluasi yang komprehensif. Misalnya: 70% Pilihan Ganda, 20% Isian Singkat, 10% Essay.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices Umum</h3>
        <ol class="step-list">
            <li><strong>Keseimbangan:</strong> Gunakan kombinasi jenis soal untuk evaluasi yang seimbang</li>
            <li><strong>Kesesuaian materi:</strong> Pilih jenis soal yang sesuai dengan materi yang diuji</li>
            <li><strong>Waktu pengerjaan:</strong> Pertimbangkan waktu yang tersedia untuk ujian</li>
            <li><strong>Waktu koreksi:</strong> Pertimbangkan waktu yang dibutuhkan untuk koreksi</li>
            <li><strong>Tingkat kesulitan:</strong> Variasikan tingkat kesulitan dalam setiap jenis soal</li>
            <li><strong>Instruksi jelas:</strong> Berikan instruksi yang jelas untuk setiap jenis soal</li>
            <li><strong>Testing:</strong> Uji coba soal sebelum digunakan dalam ujian sebenarnya</li>
            <li><strong>Review:</strong> Review soal secara berkala untuk perbaikan</li>
            <li><strong>Feedback:</strong> Gunakan pembahasan untuk memberikan feedback kepada siswa</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan standar pembuatan soal untuk konsistensi</li>
        </ol>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Auto-grade vs Manual:</strong> Soal dengan auto-grade (Pilihan Ganda, Ganda Kompleks, Menjodohkan) akan dinilai otomatis dan hasilnya langsung tersedia. Soal manual (Isian Singkat, Essay) perlu dikoreksi melalui menu Koreksi sebelum nilai final tersedia.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Konfigurasi Bank Soal:</strong> Jenis soal yang tersedia tergantung pada konfigurasi bank soal. Pastikan jenis soal yang diinginkan sudah dikonfigurasi dengan jumlah dan bobot yang sesuai sebelum membuat soal.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Pembahasan:</strong> Semua jenis soal dapat memiliki pembahasan. Pembahasan sangat berguna untuk memberikan feedback kepada siswa setelah ujian selesai.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Soal Terpilih:</strong> Tidak semua soal di bank soal harus ditampilkan dalam ujian. Anda dapat memilih soal mana yang akan ditampilkan dengan mencentang soal tersebut di halaman Detail Bank Soal.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Jenis soal adalah bagian dari konfigurasi bank soal dan tidak memiliki endpoint terpisah. Pengaturan jenis soal dilakukan melalui endpoint bank soal.</p>

        <h3>Endpoint Terkait</h3>
        <p>Jenis soal dikonfigurasi saat membuat atau mengedit bank soal melalui endpoint:</p>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>POST</td><td><code>cbtbanksoal/saveBank</code></td><td>Simpan bank soal dengan konfigurasi jenis soal</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">Konfigurasi Jenis Soal di <code>cbtbanksoal/saveBank</code></h3>
        <p>Endpoint ini menangani konfigurasi jenis soal sebagai bagian dari pembuatan/edit bank soal.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>tampil_pg</code></td><td>Tidak</td><td>Jumlah soal pilihan ganda yang ditampilkan</td></tr>
                <tr><td><code>tampil_kompleks</code></td><td>Tidak</td><td>Jumlah soal pilihan ganda kompleks yang ditampilkan</td></tr>
                <tr><td><code>tampil_jodohkan</code></td><td>Tidak</td><td>Jumlah soal menjodohkan yang ditampilkan</td></tr>
                <tr><td><code>tampil_isian</code></td><td>Tidak</td><td>Jumlah soal isian yang ditampilkan</td></tr>
                <tr><td><code>tampil_esai</code></td><td>Tidak</td><td>Jumlah soal esai yang ditampilkan</td></tr>
                <tr><td><code>bobot_pg</code></td><td>Tidak</td><td>Bobot soal pilihan ganda</td></tr>
                <tr><td><code>bobot_kompleks</code></td><td>Tidak</td><td>Bobot soal pilihan ganda kompleks</td></tr>
                <tr><td><code>bobot_jodohkan</code></td><td>Tidak</td><td>Bobot soal menjodohkan</td></tr>
                <tr><td><code>bobot_isian</code></td><td>Tidak</td><td>Bobot soal isian</td></tr>
                <tr><td><code>bobot_esai</code></td><td>Tidak</td><td>Bobot soal esai</td></tr>
                <tr><td><code>opsi</code></td><td>Tidak</td><td>Jumlah opsi jawaban pilihan ganda (3/4/5)</td></tr>
            </tbody>
        </table>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Jenis soal yang dikonfigurasi akan menentukan sheet yang tersedia saat download template import soal.</div>
        </div>
    </div>`
};
