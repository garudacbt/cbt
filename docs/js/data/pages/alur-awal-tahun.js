if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['alur-awal-tahun'] = {
    title: 'Alur Persiapan Awal Tahun Ajaran',
    desc: 'Panduan langkah demi langkah untuk menyiapkan sistem pada awal tahun ajaran baru.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-project-diagram"></i> Alur Kerja: Persiapan Awal Tahun Ajaran Baru</h2>
        <p>Halaman ini menjelaskan urutan langkah yang direkomendasikan untuk dilakukan oleh Administrator pada setiap awal tahun ajaran baru. Mengikuti alur ini akan memastikan data di sistem terstruktur dengan benar.</p>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Lakukan langkah-langkah ini secara berurutan untuk menghindari masalah data. Selalu lakukan backup database sebelum memulai proses ini.</div>
        </div>

        <hr>
        <h3>Langkah 1: Membuat dan Mengaktifkan Tahun Ajaran Baru</h3>
        <p>Langkah pertama adalah mendefinisikan periode akademik yang akan berjalan.</p>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Data Umum > Tahun Pelajaran</code>.</li>
            <li>Jika tahun ajaran baru (misal: 2024/2025) belum ada, klik <code class="inline">Tambah Tahun Pelajaran</code> untuk membuatnya.</li>
            <li>Setelah itu, klik tombol <code class="inline">AKTIFKAN</code> pada tahun ajaran baru tersebut.</li>
            <li>Pastikan juga semester yang sesuai (biasanya Ganjil) sudah diaktifkan.</li>
            <li>Lihat panduan detail di halaman <a href="#/tahun-ajaran">Tahun Pelajaran</a>.</li>
        </ol>

        <hr>
        <h3>Langkah 2: Mengelola Data Siswa</h3>
        <p>Setelah tahun ajaran baru aktif, langkah selanjutnya adalah memperbarui data siswa. Ada dua skenario utama: menaikkan kelas siswa lama dan menambahkan siswa baru.</p>
        
        <h4>2.1. Menaikkan Kelas Siswa Lama</h4>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Data Umum > Kelas / Rombel</code>.</li>
            <li>Pilih tab <code class="inline">Kenaikan Kelas</code>.</li>
            <li>Pilih kelas asal (misal: kelas X-A tahun lalu) dan kelas tujuan (misal: kelas XI-A tahun ini).</li>
            <li>Pilih siswa yang akan dinaikkan kelasnya, lalu klik proses.</li>
            <li>Ulangi untuk semua kelas.</li>
        </ol>

        <h4>2.2. Menambahkan Siswa Baru</h4>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Data Umum > Siswa</code>.</li>
            <li>Gunakan fitur <code class="inline">Import Siswa</code> untuk menambahkan data siswa baru (biasanya kelas 10) secara massal dari file Excel.</li>
            <li>Atau, gunakan tombol <code class="inline">Tambah Siswa</code> untuk menambah satu per satu.</li>
            <li>Lihat panduan detail di halaman <a href="#/data-siswa">Siswa</a>.</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Siswa yang sudah lulus sebaiknya diubah statusnya menjadi "Lulus" dan dinonaktifkan akunnya, bukan dihapus.</div>
        </div>

        <hr>
        <h3>Langkah 3: Membuat Rombongan Belajar (Kelas)</h3>
        <p>Buat kelas-kelas yang akan digunakan pada tahun ajaran baru.</p>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Data Umum > Kelas / Rombel</code>.</li>
            <li>Pada tab <code class="inline">Kelas</code>, klik <code class="inline">Tambah Kelas</code>.</li>
            <li>Isi detail kelas seperti jenjang, jurusan, dan nama kelas.</li>
            <li>Ulangi hingga semua kelas untuk tahun ajaran baru selesai dibuat.</li>
            <li>Lihat panduan detail di halaman <a href="#/kelas-rombel">Kelas / Rombel</a>.</li>
        </ol>

        <hr>
        <h3>Langkah 4: Memasukkan Siswa ke Kelas</h3>
        <p>Setelah kelas dan data siswa siap, masukkan siswa ke dalam rombongan belajarnya masing-masing.</p>
        <ol class="step-list">
            <li>Masih di menu <code class="inline">Data Umum > Kelas / Rombel</code>.</li>
            <li>Pilih salah satu kelas yang sudah dibuat, lalu klik tombol <code class="inline">Atur Anggota Kelas</code>.</li>
            <li>Sebuah modal akan muncul. Pilih siswa dari daftar "Siswa Belum Punya Kelas" di sebelah kiri, lalu pindahkan ke "Anggota Kelas" di sebelah kanan.</li>
            <li>Klik <code class="inline">Simpan</code>. Ulangi untuk semua kelas.</li>
        </ol>

        <hr>
        <h3>Langkah 5: Menetapkan Wali Kelas</h3>
        <p>Langkah terakhir dalam persiapan awal adalah menetapkan wali kelas untuk setiap rombongan belajar.</p>
        <ol class="step-list">
            <li>Masih di menu <code class="inline">Data Umum > Kelas / Rombel</code>.</li>
            <li>Pada tabel daftar kelas, klik tombol <code class="inline">Atur Wali Kelas</code> (ikon orang) pada baris kelas yang diinginkan.</li>
            <li>Pilih guru yang akan menjadi wali kelas tersebut dari dropdown, lalu simpan.</li>
        </ol>

        <div class="info-box success">
            <i class="fas fa-check-circle"></i>
            <div><strong>Selesai!</strong> Setelah menyelesaikan lima langkah ini, sistem Anda siap digunakan untuk kegiatan belajar mengajar di tahun ajaran baru.</div>
        </div>
        
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ul class="step-list">
            <li><strong>Backup Rutin:</strong> Selalu lakukan backup database melalui menu <code class="inline">Database > Backup & Restore</code> sebelum memulai setiap langkah besar, terutama sebelum kenaikan kelas.</li>
            <li><strong>Kerjakan per Jenjang:</strong> Selesaikan proses kenaikan kelas untuk satu jenjang (misal, semua kelas 10 ke 11) sebelum melanjutkan ke jenjang berikutnya.</li>
            <li><strong>Nonaktifkan Alumni:</strong> Untuk siswa yang sudah lulus, ubah statusnya menjadi "Lulus" dan nonaktifkan akun mereka melalui menu <code class="inline">Data Umum > Siswa</code>. Jangan menghapus data mereka untuk menjaga rekam jejak.</li>
            <li><strong>Verifikasi Data:</strong> Setelah memasukkan siswa ke kelas, lakukan verifikasi cepat dengan memeriksa jumlah siswa di setiap kelas untuk memastikan tidak ada yang terlewat.</li>
        </ul>

        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul di daftar Kenaikan Kelas.</strong>
                <span>Pastikan Anda memilih Tahun Ajaran dan Semester yang benar untuk kelas asal. Siswa mungkin sudah dipindahkan atau statusnya tidak aktif.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Gagal mengimpor siswa baru.</strong>
                <span>Periksa kembali file Excel Anda. Pastikan tidak ada duplikasi NIS/NISN dan semua kolom wajib telah terisi sesuai format template.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kelas baru tidak muncul saat mengatur anggota kelas.</strong>
                <span>Pastikan kelas tersebut dibuat untuk Tahun Ajaran dan Semester yang sedang aktif. Coba refresh halaman.</span>
            </div>
        </div>
    </div>`
};