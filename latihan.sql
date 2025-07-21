-- create database
create database "KEPEGAWAIAN";

drop database "KEPEGAWAIAN";

alter database kepegawaian rename to "KEPEGAWAIAN";

-- create table
create table "OPD" (
    id SERIAL primary key,
    name VARCHAR(100) not null unique,
    address TEXT,
    phoneNumber VARCHAR(15)
);

create table "Pegawai" (
    id SERIAL primary key,
    name varchar(50) not null,
    gender char(1) not null,
    dateOfBirth date,
    salary decimal(11, 2) default 0,
    opd_id int not null references "Opd" (id) on delete restrict on update cascade
);

drop table "Pegawai";

drop table "OPD";

alter table "OPD" rename to "Opd";

alter table "Opd" rename column phoneNumber to phone_number;

alter table "Opd" drop column phone_number;

alter table "Opd" add column phone_number varchar(15);

-- CRUD

-- C = Create (Insert)

insert into
    "Opd" (name, address)
values ('BPKAD', 'Jalan Diponegoro');

insert into "Opd" values ( default, 'Disdik', 'Jalan Mustofa' );

insert into
    "Opd"
values (default, 'Dinas 1'),
    (default, 'Dinas 2'),
    (default, 'Dinas 3')
returning
    *;

insert into "Opd" values (default, UPPER('dinas 3')) returning *;

insert into
    "Pegawai" (
        name,
        gender,
        dateofbirth,
        salary,
        opd_id
    )
values (
        'Arief',
        'L',
        '1990-01-01',
        15000000,
        1
    );

insert into
    "Pegawai" (
        name,
        gender,
        dateofbirth,
        salary,
        opd_id
    )
values (
        'Davis',
        'L',
        '1990-01-01',
        15000000,
        1
    ),
    (
        'Rahmat',
        'L',
        '1990-01-01',
        15000000,
        1
    ),
    (
        'Andi',
        'L',
        '1990-01-01',
        15000000,
        1
    )
returning
    name,
    salary;

insert into
    "Pegawai" (
        name,
        gender,
        dateofbirth,
        salary,
        opd_id
    )
values (
        'Putri',
        'P',
        '1990-01-01',
        120000,
        2
    );

-- R = read (Select)

/*
select [...column]
from [table]
join [table] on pk = fk
where [...condition]
group by [...column]
having [...column]
order by [...column]
limit [number]
offset [number]
*/

-- select all columns
select * from "Pegawai";

-- select some columns
select id, name from "Pegawai";

-- column alias
select id as "ID", name as "Nama Pegawai" from "Pegawai";

-- distinct
select distinct (opd_id) from "Pegawai";

-- where
select * from "Pegawai" where opd_id != 2;

select * from "Pegawai" where opd_id = 1 or gender = 'P';

select * from "Pegawai" where opd_id = 1 or opd_id = 2 or opd_id = 3;

select * from "Pegawai" where opd_id not in (1, 2, 3);

select *
from "Pegawai"
where
    dateofbirth not between '1990-01-01' and '1990-12-31';

select * from "Pegawai" where name not ilike '_a%';

select * from "Opd" where address is not null;

-- order : mengurutkan data
select * from "Pegawai" order by name asc, dateofbirth asc;

-- limit: ambil beberapa data
select * from "Pegawai" order by salary asc limit 1;

-- offset
select * from "Pegawai" order by id asc offset 2;

-- pagination
SELECT * from "Pegawai" order by id asc limit 3;

SELECT * from "Pegawai" order by id asc limit 3 offset 3;

SELECT * from "Pegawai" order by id asc limit 3 offset 6;

-- aggregate function
-- sum, count, avg, min, max
select sum(salary) as "Total Gaji" from "Pegawai";

select count(id) from "Pegawai";

select count(id) from "Opd";

select avg(salary) as "Rata - Rata Gaji" from "Pegawai";

select min(salary) as "Gaji Terkecil" from "Pegawai";

select max(salary) as "Gaji Terkecil" from "Pegawai";

-- group
select o.name, sum(salary)
from "Pegawai" p
    join "Opd" o on p.opd_id = o.id
group by
    o.name;

-- having: filter after grouping
select opd_id, sum(salary)
from "Pegawai"
group by
    opd_id
having
    sum(salary) >= 50000000;

-- join
select "Pegawai".*, "Opd".name
from "Pegawai"
    join "Opd" on "Opd".id = "Pegawai".opd_id;

select p.*, o.name from "Pegawai" p join "Opd" o on o.id = p.opd_id;

-- U = update
select * from "Pegawai" where salary = 12000000;

update "Pegawai"
set
    salary = 13000000,
    opd_id = 6
where
    salary = 12000000
returning
    *;

-- D = delete
delete from "Pegawai" where id = 19 returning *;

-- truncate
select * from "Pegawai";

truncate table "Pegawai" restart identity;

-- sub query
select max(salary) from "Pegawai";

select *
from "Pegawai"
where
    salary = (
        select max(salary)
        from "Pegawai"
    );