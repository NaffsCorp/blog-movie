CREATE TABLE category (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    kategori VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE movie (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100) NOT NULL,
    sutradara VARCHAR(100) NOT NULL,
    konten TEXT NOT NULL,
    overview TEXT NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    thumbnail VARCHAR(100) NOT NULL,
    category_id INT(11) NOT NULL,
    rilis INT(4) NOT NULL,
    CONSTRAINT fk_category_movie FOREIGN KEY (category_id) REFERENCES category(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);