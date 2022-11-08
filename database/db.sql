CREATE database latihanCrudK1;

USE latihanCrudK1;

CREATE TABLE mahasiswa(
    id INT NOT NULL primary key auto_increment,
    nim VARCHAR(10) NOT NULL,
    nama VARCHAR (50) NOT NULL,
    alamat VARCHAR (50) NOT NULL,
    prodi VARCHAR(50) NOT NULL
);