create database pagina_telefone;

create table cliente(
id  integer primary key auto_increment,
nome varchar(50),
email varchar(50),
ddd int,
telefone int,
cpf int8,
created datetime,
modified datetime null 
);

drop table cliente;