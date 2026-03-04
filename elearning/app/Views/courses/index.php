<section>
    <h2>Daftar Kelas</h2>
    <p class="muted">Data diambil dari tabel <code>kelas</code> dan <code>users</code> sesuai ERD.</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kelas</th>
                <th>Pengajar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($classes as $class): ?>
            <tr>
                <td><?= htmlspecialchars((string) $class['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string) $class['nama_kelas'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string) $class['pengajar'], ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>