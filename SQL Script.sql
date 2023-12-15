create database breakTime;

create database breakTime;

create table providers (
	id int primary key auto_increment,
    name varchar(200) not null,
    email varchar(200) not null unique,
    phone varchar(200) unique
);

create table categories (
	id int primary key auto_increment,
    category varchar(200) not null
);

create table recipes (
	id int primary key auto_increment,
    title varchar(200),
    descrption text not null,
    image varchar(400),
    type varchar(200),
    category_id int,
    provider_id int,
    foreign key(category_id) references categories(id),
    foreign key(provider_id) references providers(id)
);

create table admin (
	id varchar(200) primary key default(uuid()),
    email varchar(100) unique not null,
    password varchar(300) unique not null
);