<h2>Daftar Event</h2>
<a href="index.php?url=events/create">Tambah Event</a>
<table border="1" cellpadding="8">
    <tr>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Kuota</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($events as $event): ?>
        <tr>
            <td><?= htmlspecialchars($event['judul_event'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($event['tanggal_event'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($event['lokasi'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= (int) $event['kuota']; ?></td>
            <td>
                <a href="index.php?url=events/show/<?= (int) $event['id']; ?>">Detail</a> |
                <a href="index.php?url=events/edit/<?= (int) $event['id']; ?>">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
