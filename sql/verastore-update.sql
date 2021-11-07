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
keterangan varchar(max),
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
(2, 'Dibayar'),
(3,'Diproses'),
(4,'Selesai'),
(5,'Dibatalkan');


create table rf_info(
id_info int(6) NOT NULL  auto_increment,
nama varchar(100),
alamat varchar(100),
primary key (id_info)
);

insert into rf_info
values
(1, 'VERA STORE', 'Jln.Wahid Hasyim No 12, Pringgolayan, Depok, Sleman');

-- produk
create view vw_produk
as
select s.id_stok, concat(k. nama,' ', p.nama) as nama_produk, k.deskripsi,  s.size, p.harga, s.stok  
from produk p 
join stok s  on s.id_produk = p.id_produk
join kategori k on k.id_kategori = p.id_kategori;    


-- transaksi
-- drop view vw_transaksi

Create definer = root@localhost view vw_transaksi as
select `t`.`id_transaksi`                                         AS `id_transaksi`,
       `c`.`nama_lengkap`                                         AS `nama_lengkap`,
       `c`.`email`                                                AS `email`,
       `c`.`telp`                                                 AS `telp`,
       concat(`c`.`alamat`, ' ', `c`.`kota`, ' ', `c`.`provinsi`) AS `alamat`,
       `t`.`tgl_transaksi`                                        AS `tgl_transaksi`,
        `t`.`status_bayar`                                        AS `id_status_pembayaran`,
       `s`.`nama`                                                 AS `status_pembayaran`,
       `t`.`harga_awal`                                           AS `harga_awal`,
       `t`.`harga_ongkir`                                         AS `harga_ongkir`,
       `t`.`total_berat`                                          AS `total_berat`,
       `t`.`harga_total`                                          AS `harga_total`,
       `ku`.`nama`                                                AS `nama_kurir`,
       concat(`k`.`nama`, ' ', `p`.`nama`)                        AS `nama_produk`,
       `p`.`harga`                                                AS `harga_per_produk`,
       `ti`.`size`                                                AS `size`,
       `ti`.`jumlah_produk`                                       AS `jumlah_produk`,
       `ti`.`berat_produk`                                        AS `berat_produk`,
       `ti`.`harga`                                               AS `harga_per_item`
from ((((((`dbverastore`.`transaksi` `t` join `dbverastore`.`transaksi_item` `ti` on (`t`.`id_transaksi` = `ti`.`id_transaksi`)) join `dbverastore`.`produk` `p` on (`ti`.`id_produk` = `p`.`id_produk`)) join `dbverastore`.`kategori` `k` on (`k`.`id_kategori` = `p`.`id_kategori`)) join `dbverastore`.`kurir` `ku` on (`ku`.`id_kurir` = `t`.`id_kurir`)) join `dbverastore`.`customer` `c` on (`c`.`id_customer` = `t`.`id_customer`))
         join `dbverastore`.`rf_status` `s` on (`t`.`status_bayar` = `s`.`id_status`));

-- presentase
create view vw_produk_percentage
as
select nama_produk, concat(count(nama_produk)*100/(select count(nama_produk) from vw_transaksi))  as amount  from vw_transaksi group by nama_produk

-- sp product

DELIMITER //
CREATE PROCEDURE SP_INSERT_PRODUK(
idKategori int(6),
namaProduk VARCHAR(50),
namaGambar VARCHAR(100),
hargaProduk int(10),
stokProduk int(10),
sizeProduk VARCHAR(50),
deskripsiProduk VARCHAR(200),
idStok int(6),
isInsert BOOLEAN
)
BEGIN
IF (isInsert) THEN
    INSERT INTO produk (nama, harga, deskripsi, id_kategori, nama_gambar)
    VALUES (namaProduk, hargaProduk, deskripsiProduk,idKategori , namaGambar );

    SELECT @lastId := MAX(id_produk) From produk;

    IF(idKategori != 1) THEN
        INSERT INTO stok (id_produk, size, stok)
        VALUES (@lastId, NULL, stokProduk); 
    ELSE
        INSERT INTO stok (id_produk, size, stok)
        VALUES (@lastId, sizeProduk, stokProduk);
    end if ;
ELSE
    SELECT @idProduk := id_produk from stok where id_stok = idStok;
    UPDATE produk SET nama = namaProduk, harga  = hargaProduk , deskripsi = deskripsiProduk,
                      id_kategori = id_kategori , nama_gambar = namaGambar WHERE id_produk = @idProduk;

    IF(idKategori != 1) THEN
    UPDATE stok set size = NULL, stok = stokProduk WHERE  id_stok = idStok;
    ELSE
    UPDATE stok set size = sizeProduk, stok = stokProduk WHERE  id_stok = idStok;
    end if ;


end if ;
END //

DELIMITER ;


DELIMITER //
CREATE PROCEDURE SP_DELETE_DATA(
    idStok int(6),
    idTransaksai int(6),
    isTransaksi BOOLEAN
)
BEGIN
    IF(isTransaksi) THEN
        -- delete transaksi
        DELETE FROM kurir WHERE id_kurir = 999;
    ELSE
        SELECT @idProduk := id_produk from stok where id_stok = idStok;
        DELETE FROM STOK WHERE id_stok = idStok;
        DELETE FROM produk WHERE id_produk = @idProduk;
    END IF ;

END //

DELIMITER ;













