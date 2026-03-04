<h1>Daftar Artikel</h1>

<form method="POST" action="?url=article/store">
    <input type="text" name="title" placeholder="Judul" required>
    <textarea name="content" placeholder="Isi Artikel" required></textarea>
    <button type="submit">Simpan</button>
</form>

<hr>

<?php if (!empty($articles)): ?>
    <?php foreach($articles as $row): ?>
        <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0;">
            <h3><?= htmlspecialchars($row['title']) ?></h3>
            <p><?= htmlspecialchars($row['content']) ?></p>
            <a href="?url=article/destroy/<?= $row['id'] ?>" onclick="return confirm('Hapus artikel?')">Hapus</a>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Tidak ada artikel</p>
<?php endif; ?>