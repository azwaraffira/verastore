-- use dbverastore

create table kategori (
id_kategori int(6) NOT NULL auto_increment,
nama varchar(100),
deskripsi varchar(200),
berat int,
PRIMARY KEY (id_kategori)
);

insert into kategori 
VALUES
(1, 'Gamis' , 'lorem ipsum' , '900'),
(2, 'Jilbab' , 'lorem ipsum' , '300'),
(3, 'Mukena' , 'lorem ipsum' , '700');


create table produk(
id_produk int(6) NOT NULL auto_increment,
nama varchar(100),
harga int(11),
id_kategori int(6),
PRIMARY KEY (id_produk)
);

INSERT INTO produk
VALUES
(1, 'Kaftan', 75000, 1),
(2, 'Katun', 50000, 1),
(3, 'Katun', 20000, 2),
(4, 'Sutra', 25000, 2),
(5, 'Anak-anak', 30000, 3),
(6, 'Dewasa', 40000, 3 );

create table stok(
id_stok int(6) NOT NULL auto_increment,
id_produk int(11),
size varchar(10),
stok int(11),
primary key (id_stok)
);

insert into stok
values
(1, 1 , 'S', 50),
(2, 1 , 'M', 50),
(3, 1 , 'L', 50),
(4, 1 , 'XL', 50),
(5, 2 , 'S', 50),
(6, 2 , 'M', 50),
(7, 2 , 'L', 50),
(8, 2 , 'XL', 50),
(9, 3 , null, 50),
(10, 4 , null, 50),
(11, 5 , null, 50),
(12, 6 , null, 50);

-- drop table user
create table user(
id_user int(6) NOT NULL auto_increment,
nama varchar(50) NOT NULL,
username varchar(10) NOT NULL,
passwd varchar(100) NOT NULL, 
level varchar(100),
PRIMARY KEY (id_user)
);

insert into user 
value
(1, 'admin','admin', 'admin',''),
(2, 'Azwar','azwar', 'azwar','Administrator'),
(3, 'Andreas','andreas', 'alskdj12','user');



create table customer(
id_customer int(6) NOT NULL auto_increment,
nama_lengkap varchar(100),
email varchar(100),
telp varchar(50),
alamat varchar(200),
kota varchar(100),
provinsi varchar(50),
kode_pos varchar(10),
passwd varchar(50),
PRIMARY KEY (id_customer)
);

insert into customer
values 
(1, 'Azwar Affira' , 'azwaraffira@gmail', '089000000', 'RT 1 RW 2','TURI', 'Yogyakarta', '05462', 'Azwar123'),
(2, 'Alif Wiji' , 'alifwiji@gmail', '089000000', 'RT 1 RW 2','Tambak Boyo', 'Semarang', '05462', 'Alif123'),
(3, 'Andreas Nofri' , 'andreaswhildant@gmail', '089000000', 'RT 1 RW 2','Pasekan', 'Semarang', '05462', 'Andreas123');

create table transaksi(
id_transaksi int(6)  NOT NULL auto_increment,
id_customer int(6),
tgl_transaksi date ,
status_bayar int(6),
harga_awal int,
harga_ongkir int,
total_berat int,
harga_total int ,
id_kurir int(6),
PRIMARY KEY (id_transaksi)
);

insert into transaksi
values
(1, 1, now(), '2', 100000, 18000, 1800, 180000, 1),
(2, 2, now(), '2', 100000, 11000, 1100, 110000, 1),
(3, 3, now(), '1', 100000, 13000, 1300, 130000, 1 );


-- problems
-- how to insert size to table ?
-- with dropdown by stok table, we can get more than 1 size type
-- solution 1 = hardcode 
-- solution 2 = create table rf_size

create table transaksi_item(
id_transaksi int(6),
id_produk int(6),
size varchar(10),
jumlah_produk int,
berat_produk int,
harga int
);

insert into transaksi_item
value 
(1, 1, 'S' , 2, 1200, 20000 ),
(1, 2, 'S' , 2, 12000, 20000 ),
(2, 2, 'M' , 1, 900, 11000 );


create table kurir(
id_kurir int(6),
nama varchar(100),
PRIMARY KEY (id_kurir)
);

insert into kurir
value 
(1, 'JNE' );

create table tbl_gambar(
id_gambar int(6),
nama varchar(100),
gambar blob,
PRIMARY KEY (id_gambar)
);

create table rf_status(
id_status int(6),
nama varchar(50),
PRIMARY KEY (id_status)
);

insert into rf_status
values
(1, 'Disimpan'),
(2, 'Dibayar');

-- produk
create view vw_viewproduk
as
select s.id_stok, concat(k. nama,' ', p.nama) as nama_produk, k.deskripsi,  s.size, p.harga, s.stok  
from produk p 
join stok s  on s.id_produk = p.id_produk
join kategori k on k.id_kategori = p.id_kategori;    

-- transaksi
create view vw_viewtransaksi
as
select t.id_transaksi, c.nama_lengkap, t.tgl_transaksi , s.nama as status_pembayaran, t.harga_awal, t.harga_ongkir, t.total_berat, t.harga_total, ku.nama as nama_kurir
from transaksi t join transaksi_item ti on t.id_transaksi = ti.id_transaksi
join produk p on  ti.id_produk = p.id_produk
join kategori k on k.id_kategori = p.id_kategori
join kurir ku on ku.id_kurir = t.id_kurir
join customer c on c.id_customer = t.id_customer
join rf_status s on t.status_bayar = s.id_status;















