create database vagas;
create database vagasti;
create database cursos;
create database cursosti;
create database localizacao;

use vagas;
use vagasti;
use cursos;
use cursosti;
use localizacao;

create table vagas (
nome varchar(100),
localizacao varchar (50),
salario varchar(60),
empresa varchar (100),
link varchar(200)
);

create table vagasti (
nome varchar(100),
localizacao varchar (50),
salario varchar(60),
empresa varchar (100),
link varchar(200)
);

create table localizacao (
nome varchar(100),
localizacao varchar (50),
salario varchar(60),
empresa varchar (100),
link varchar(200)
);

drop table vagas;

drop table vagasti;

drop table cursosti;

drop table cursos;

use cursos;

create table cursosti (
nome varchar(100),
valor varchar(20),
modo varchar(30),
duracao varchar (40),
conclusao varchar (60),
link varchar (200)
);

create table cursos (
nome varchar(100),
valor varchar(20),
modo varchar(30),
duracao varchar (40),
conclusao varchar (60),
link varchar (200)
);

CREATE view vw_cursosti as
SELECT nome as nome_cursosti, valor as valor_cursosti, modo as modo_cursosti, duracao as duracao_cursosti, conclusao as conclusao_cursosti, link as link_cursosti
from cursosti;

SELECT  * from vw_cursosti;

CREATE view vw_curso as
SELECT nome as nome_cursos, valor as valor_cursos, modo as modo_cursos, duracao as duracao_cursos, conclusao as conclusao_cursos, link as link_cursos
from cursos;

SELECT  * from vw_cursos;

CREATE view vw_vagasti as
SELECT nome as nome_vagasti, localizacao as localizacao_vagasti, salario as salario_vagasti, empresa as empresa_vagasti, link as link_vagasti 
from vagasti;

SELECT  * from vw_vagasti;

CREATE view vw_vagas as
SELECT nome as nome_vagas, localizacao as localizacao_vagas, salario as salario_vagas, empresa as empresa_vagas, link as link_vagas
from vagas;

SELECT  * from vw_vagas;

CREATE view vw_localizacao as
SELECT nome as nome_localizacao, localizacao as localizacao_localizacao, salario as salario_localizacao, empresa as empresa_localizacao, link as link_localizacao
from localizacao;

SELECT  * from vw_localizacao;