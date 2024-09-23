create database crud_aula;
use crud_aula;
create table professores(
id_professor int auto_increment primary key,
nome_professor varchar(255) not null,
disciplina varchar(100),
email varchar(100),
telefone varchar(20)
);

create table aulas(
id_aula int auto_increment primary key,
nome_aula varchar(100) not null,
data_aula date,
horario time
);

create table diario(
id_diario int auto_increment primary key,
id_professor int,
id_aula int,
observacao text,
data_registro timestamp default current_timestamp,
foreign key (id_professor) references professores(id_professor),
foreign key (id_aula) references aulas(id_aula)
);

select * from professores;