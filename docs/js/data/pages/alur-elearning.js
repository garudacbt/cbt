if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['alur-elearning'] = {
    title: 'Alur Pengelolaan E-Learning',
    desc: 'Panduan langkah demi langkah untuk mengelola materi dan tugas dalam E-Learning.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-project-diagram"></i> Alur Kerja: Pengelolaan E-Learning (Materi & Tugas)</h2>
        <p>Halaman ini menjelaskan urutan langkah yang direkomendasikan untuk guru dalam mengelola kegiatan belajar mengajar online, mulai dari membuat jadwal hingga menilai tugas siswa.</p>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Alur ini ditujukan untuk peran Guru. Pastikan Anda sudah login sebagai Guru.</div>
        </div>

        <hr>
        <h3>Langkah 1: Membuat Jadwal Pelajaran</h3>
        <p>Jadwal adalah dasar dari semua kegiatan E-Learning. Semua materi dan tugas akan dikaitkan dengan jadwal yang telah dibuat.</p>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Data E-Learning > Jadwal Pelajaran</code>.</li>
            <li>Buat jadwal mengajar Anda untuk setiap kelas yang Anda ampu. Tentukan hari, jam, dan mata pelajaran.</li>
            <li>Fitur ini biasanya dikelola oleh admin, namun guru mungkin diberi akses untuk mengaturnya.</li>
            <li>Lihat panduan detail di halaman <a href="#/atur-jadwal">Atur Jadwal</a>.</li>
        </ol>

        <hr>
        <h3>Langkah 2: Menambah Materi Pembelajaran</h3>
        <p>Setelah jadwal siap, Anda dapat mulai membagikan materi kepada siswa.</p>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Data E-Learning > Materi</code>.</li>
            <li>Klik <code class="inline">Tambah Materi</code>.</li>
            <li>Tulis judul dan isi materi. Anda bisa menyisipkan teks, gambar, video, atau melampirkan file (PDF, PPT, dll).</li>
            <li>Pilih jadwal (kelas dan mapel) yang akan menerima materi ini. Anda bisa memilih lebih dari satu kelas.</li>
            <li>Klik <code class="inline">Simpan</code> untuk mempublikasikan materi.</li>
            <li>Lihat panduan detail di halaman <a href="#/tambah-materi">Tambah Materi</a>.</li>
        </ol>

        <hr>
        <h3>Langkah 3: Memberikan Tugas</h3>
        <p>Selain materi, Anda juga dapat memberikan tugas terstruktur kepada siswa.</p>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Data E-Learning > Tugas</code>.</li>
            <li>Klik <code class="inline">Tambah Tugas</code>.</li>
            <li>Tulis judul dan instruksi tugas. Anda juga bisa melampirkan file pendukung.</li>
            <li>Pilih jadwal (kelas dan mapel) yang akan menerima tugas ini.</li>
            <li>Tentukan batas waktu pengumpulan tugas.</li>
            <li>Klik <code class="inline">Simpan</code> untuk memberikan tugas.</li>
            <li>Lihat panduan detail di halaman <a href="#/buat-tugas">Buat Tugas</a>.</li>
        </ol>

        <hr>
        <h3>Langkah 4: Memantau dan Menilai Hasil Belajar</h3>
        <p>Setelah materi dan tugas dibagikan, Anda dapat memantau aktivitas dan menilai pekerjaan siswa.</p>
        <ol class="step-list">
            <li><strong>Melihat Status Siswa:</strong> Buka menu <code class="inline">Hasil E-Learning > Nilai Materi/Tugas</code>. Di sini Anda bisa melihat siapa saja yang sudah membaca materi atau mengumpulkan tugas.</li>
            <li><strong>Menilai Tugas:</strong> Masih di halaman yang sama, klik tombol <code class="inline">Lihat Jawaban</code> atau <code class="inline">Nilai</code> pada setiap siswa yang telah mengumpulkan tugas. Berikan skor dan umpan balik.</li>
            <li><strong>Melihat Kehadiran:</strong> Buka menu <code class="inline">Hasil E-Learning > Kehadiran Harian</code> atau <code class="inline">Bulanan</code> untuk memantau absensi siswa.</li>
            <li><strong>Melihat Rekap Nilai:</strong> Gunakan menu <code class="inline">Hasil E-Learning > Rekap Nilai</code> untuk melihat rangkuman nilai E-Learning per semester.</li>
        </ol>

        <div class="info-box success">
            <i class="fas fa-check-circle"></i>
            <div><strong>Selesai!</strong> Dengan mengikuti alur ini, Anda telah berhasil mengelola satu siklus kegiatan E-Learning secara lengkap.</div>
        </div>

        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ul class="step-list">
            <li><strong>Satu Materi untuk Banyak Kelas:</strong> Saat membuat materi atau tugas, Anda bisa memilih beberapa jadwal sekaligus untuk membagikannya ke banyak kelas secara bersamaan.</li>
            <li><strong>Gunakan Kembali Materi:</strong> Manfaatkan menu <code class="inline">Arsip Materi</code> untuk melihat dan menggunakan kembali materi yang pernah Anda buat di semester atau tahun ajaran sebelumnya.</li>
            <li><strong>Batas Waktu Realistis:</strong> Berikan batas waktu pengumpulan tugas yang wajar agar siswa memiliki cukup waktu untuk mengerjakannya.</li>
            <li><strong>Umpan Balik Konstruktif:</strong> Saat menilai tugas, berikan umpan balik yang jelas dan membangun untuk membantu siswa memahami kesalahannya.</li>
        </ul>

        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Materi/Tugas tidak muncul di akun siswa.</strong>
                <span>Pastikan Anda telah memilih jadwal (kelas dan mapel) yang benar saat membuat materi/tugas. Periksa juga apakah jadwal pelajaran sudah diatur dengan benar oleh admin.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak bisa mengunggah jawaban tugas.</strong>
                <span>Periksa apakah batas waktu pengumpulan tugas sudah terlewat. Pastikan juga format dan ukuran file yang diunggah siswa sesuai dengan yang diizinkan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tugas tidak tersimpan.</strong>
                <span>Pastikan Anda mengklik tombol <code class="inline">Simpan</code> setelah memberikan skor. Coba refresh halaman dan ulangi proses penilaian.</span>
            </div>
        </div>
    </div>`
};