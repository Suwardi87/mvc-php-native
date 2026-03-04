CREATE DATABASE event_management;
USE event_management;

-- ========================
-- TABEL USERS
-- ========================
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin') DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ========================
-- TABEL EVENTS
-- ========================
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul_event VARCHAR(150) NOT NULL,
    deskripsi TEXT NOT NULL,
    tanggal_event DATE NOT NULL,
    lokasi VARCHAR(150) NOT NULL,
    kuota INT NOT NULL,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_events_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ========================
-- TABEL PENDAFTARAN
-- ========================
CREATE TABLE pendaftaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    nama_peserta VARCHAR(100) NOT NULL,
    email_peserta VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_pendaftaran_event
        FOREIGN KEY (event_id)
        REFERENCES events(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;



-- ========================
-- INSERT USERS (ADMIN)
-- ========================
INSERT INTO users (nama, email, password, role)
VALUES 
('Admin Event', 'admin@email.com', '$2y$10$examplehashpassword', 'admin');

-- ========================
-- INSERT EVENTS
-- ========================
INSERT INTO events (judul_event, deskripsi, tanggal_event, lokasi, kuota, user_id)
VALUES
('Workshop PHP MVC', 'Belajar dasar PHP OOP dan MVC', '2026-04-10', 'Padang', 50, 1),
('Seminar Web Development', 'Mengenal dunia frontend dan backend', '2026-04-15', 'Bukittinggi', 100, 1);

-- ========================
-- INSERT PENDAFTARAN
-- ========================
INSERT INTO pendaftaran (event_id, nama_peserta, email_peserta)
VALUES
(1, 'Budi', 'budi@email.com'),
(1, 'Siti', 'siti@email.com'),
(2, 'Andi', 'andi@email.com');  