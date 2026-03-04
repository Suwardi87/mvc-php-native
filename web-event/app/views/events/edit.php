<h2>Edit Event</h2>

<form method="POST" action="index.php?url=events/update/<?= (int) $event['id']; ?>">
    <input type="text" name="judul_event" value="<?= htmlspecialchars($event['judul_event'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="Judul"><br><br>
    <textarea name="deskripsi" placeholder="Deskripsi"><?= htmlspecialchars($event['deskripsi'], ENT_QUOTES, 'UTF-8'); ?></textarea><br><br>
    <input type="date" name="tanggal_event" value="<?= htmlspecialchars($event['tanggal_event'], ENT_QUOTES, 'UTF-8'); ?>"><br><br>
    <input type="text" name="lokasi" value="<?= htmlspecialchars($event['lokasi'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="Lokasi"><br><br>
    <input type="number" name="kuota" value="<?= (int) $event['kuota']; ?>" placeholder="Kuota"><br><br>
    <button type="submit">Update</button>
</form>

<p><a href="index.php?url=events/show/<?= (int) $event['id']; ?>">Batal</a></p>
