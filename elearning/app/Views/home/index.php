<section class="hero">
    <p class="badge">Starter Kit Pemula</p>
    <h2>Belajar PHP OOP MVC dengan Struktur yang Rapi</h2>
    <p>
        Project ini menunjukkan cara membuat aplikasi PHP tanpa framework dengan konsep MVC,
        OOP, router, controller, model, dan view secara sederhana.
        Struktur databasenya mengikuti ERD: users, kelas, materi, tugas, pengumpulan_tugas.
    </p>
    <a class="button" href="<?= htmlspecialchars(url('kelas'), ENT_QUOTES, 'UTF-8') ?>">Lihat Daftar Kelas</a>
</section>

<section class="grid">
    <article class="card">
        <h3>Single Responsibility</h3>
        <p>Controller fokus ke alur request, model fokus data, view fokus tampilan.</p>
    </article>
    <article class="card">
        <h3>Mudah Dikembangkan</h3>
        <p>Tinggal tambah route, controller, model, lalu view untuk fitur baru.</p>
    </article>
    <article class="card">
        <h3>Siap Database</h3>
        <p>Sudah ada kelas PDO, dan tetap jalan dengan data dummy jika DB belum siap.</p>
    </article>
</section>