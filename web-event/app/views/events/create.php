<h2>Tambah Event</h2>

<form method="POST" action="index.php?url=events/store">
    <input type="text" name="judul_event" placeholder="Judul"><br><br>
    <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br><br>
    <input type="date" name="tanggal_event"><br><br>
    <input type="text" name="lokasi" placeholder="Lokasi"><br><br>
    <input type="number" name="kuota" placeholder="Kuota"><br><br>
    <button type="submit">Simpan</button>
</form>
