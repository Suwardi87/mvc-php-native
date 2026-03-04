<h2>Detail Event: <?= htmlspecialchars($event['judul_event'], ENT_QUOTES, 'UTF-8'); ?></h2>

<p><strong>Tanggal:</strong> <?= htmlspecialchars($event['tanggal_event'], ENT_QUOTES, 'UTF-8'); ?></p>
<p><strong>Lokasi:</strong> <?= htmlspecialchars($event['lokasi'], ENT_QUOTES, 'UTF-8'); ?></p>
<p><strong>Kuota:</strong> <?= (int) $event['kuota']; ?></p>
<p><strong>Deskripsi:</strong> <?= nl2br(htmlspecialchars($event['deskripsi'], ENT_QUOTES, 'UTF-8')); ?></p>

<p>
    <a href="index.php?url=events">Kembali</a> |
    <a href="index.php?url=events/edit/<?= (int) $event['id']; ?>">Edit Event</a>
</p>
