create database latihanCrudK1;
use latihanCrudK1;

create table mahasiswa(id int not null primary key auto_increment,
nim varchar(10) not null, nama varchar (50) not null,
alamat varchar (50) not null, prodi varchar(50) not null);