use vagas;

create table vagas (
nome varchar(40),
empresa varchar (40),
descricao varchar(300),
requisitos varchar (240),
salario float,
localizacao varchar (40)
);

create table vagasti (
nome varchar(40),
empresa varchar (40),
descricao varchar(300),
requisitos varchar (240),
salario float,
localizacao varchar (40)
);

use cursos;
create table cursosti (
nome varchar(40),
descricao varchar(300),
duracao time,
preco float
);

create table cursos (
nome varchar(40),
descricao varchar(300),
duracao time,
preco float
);
