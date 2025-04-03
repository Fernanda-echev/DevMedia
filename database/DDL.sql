create database DevMedia;
use DevMedia;

create table categoria(
id_cat int not null auto_increment,
    nome varchar(150),
    primary key(id_cat)
);


select * from categoria;

create table artigo(
id_artigo int not null auto_increment,
titulo varchar(200) not null,
    id_cat int not null,
conteudo text not null,
    primary key(id_artigo)
);

select * from artigo;


create table usuario(
id_user int not null auto_increment,
nome  varchar(150) not null,
email varchar(120) not null,
data_nasc date not null,
cpf char(11) not null,
telefone char(30) not null,
primary key(id_user)
);
select * from usuario;

