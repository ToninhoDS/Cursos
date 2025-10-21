-

-- show databases;
-- SELECT @@autocommit;

-- drop database db_tcc_estacionamento;
-- create database db_tcc_estacionamento;
-- use db_tcc_estacionamento;

create table if not exists tb_uf(
cd_uf int not null auto_increment,
sg_uf char(10),
constraint pk_uf
primary key(cd_uf))
engine=InnoDB;


create table if not exists tb_cidade(
cd_cidade int not null auto_increment,
nm_cidade varchar(45),
cd_uf int,
constraint 
primary key(cd_cidade),
foreign key(cd_uf)
references tb_uf(cd_uf)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;


create table if not exists tb_bairro(
cd_bairro int not null auto_increment,
nm_bairro varchar(45),
cd_cidade int,
constraint pk_bairro
primary key (cd_bairro),
foreign key(cd_cidade)
references tb_cidade(cd_cidade)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;


create table if not exists tb_login(
cd_login int not null auto_increment,
cd_email_login varchar(45),
cd_senha_login varchar (20),
constraint pk_login
primary key(cd_login))
engine=InnoDB;

create table if not exists tb_cliente(
cd_cliente int not null auto_increment,
cd_email_cliente varchar(45),
cd_senha_cliente varchar (20),
cd_login int,
nm_cliente varchar (75),
constraint pk_cliente
primary key(cd_cliente),
foreign key(cd_login)
references tb_login(cd_login)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;


create table if not exists tb_telefone(
cd_telefone int not null auto_increment,
cd_numero1 varchar (20),
cd_numero2 varchar (20),
cd_cliente int,
constraint pk_telefone
primary key(cd_telefone),
foreign key(cd_cliente)
references tb_cliente(cd_cliente)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;


create table if not exists tb_pessoa_juridica(
cd_pessoa_juridica int not null auto_increment,
cd_cnpj varchar(20),
cd_bairro int,
cd_cliente int,
constraint pk_pessoa_juridica
primary key(cd_pessoa_juridica),
foreign key(cd_cliente)
references tb_cliente(cd_cliente)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;


create table if not exists tb_pessoa_fisica(
cd_pessoa_fisica int not null auto_increment,
cd_cpf varchar (20),
cd_cliente int,
cd_bairro int, 
constraint pk_pessoa_fisica
primary key(cd_pessoa_fisica),
foreign key(cd_bairro)
references tb_bairro(cd_bairro)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;

create table if not exists tb_marca(
cd_marca int not null auto_increment,
nm_marca varchar (45),
constraint pk_marca
primary key(cd_marca))
engine=InnoDB;


create table if not exists tb_cor(
cd_cor int not null auto_increment,
nm_cor varchar (45),
constraint pk_cor
primary key(cd_cor))
engine=InnoDB;

create table if not exists tb_modelo(
cd_modelo int not null auto_increment,
nm_modelo varchar (45),
cd_marca int,
constraint pk_modelo
primary key(cd_modelo),
foreign key(cd_marca)
references tb_marca(cd_marca)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;


create table if not exists tb_veiculo(
cd_veiculo int not null auto_increment,
cd_placa varchar (20),
cd_cliente int,
cd_cor int,
cd_modelo int,
constraint pk_veiculo
primary key(cd_veiculo),
constraint fk_cliente
foreign key(cd_cliente)
references tb_cliente(cd_cliente)
 ON DELETE CASCADE 
 ON UPDATE CASCADE,
constraint fk_modelo
foreign key(cd_modelo)
references tb_modelo(cd_modelo)
 ON DELETE CASCADE 
 ON UPDATE CASCADE,
constraint fk_cor
foreign key(cd_cor)
references tb_cor(cd_cor)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;

-- tirar do banco de dados
create table if not exists tb_horario(
cd_horario int not null auto_increment,
hr_entrada time,
hr_saida time,
constraint pk_horario
primary key (cd_horario))
engine=InnoDB;

create table if not exists tb_patio(
cd_patio int not null auto_increment,
ds_patio varchar (25),
constraint pk_patio
primary key(cd_patio))
engine=InnoDB;
-- fim 

create table if not exists tb_estacionamento(
cd_estacionamento int not null auto_increment,
nm_estacionamento varchar(100),
dt_entrada date,
dt_saida date,
cd_veiculo int,
cd_horario int,
constraint pk_estacionamento
primary key(cd_estacionamento),
foreign key (cd_horario)
references tb_horario(cd_horario)
 ON DELETE CASCADE 
 ON UPDATE CASCADE,
foreign key(cd_veiculo)
references tb_veiculo(cd_veiculo)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB; 


create table if not exists tb_vaga(
cd_vaga int not null auto_increment,
cd_numero int ,
cd_patio int,
ds_status varchar(20),
cd_estacionamento int,
constraint pk_vaga
primary key(cd_vaga),
constraint fk_patio
foreign key(cd_patio)
references tb_patio(cd_patio)
 ON DELETE CASCADE 
 ON UPDATE CASCADE,
constraint fk_estacionamento
foreign key(cd_estacionamento)
references tb_estacionamento(cd_estacionamento)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;

-- tabelas novas 22/04/2023 -------
create table if not exists tb_uf_empresa(
cd_uf int not null auto_increment,
sg_uf char(10),
constraint pk_uf
primary key(cd_uf))
engine=InnoDB;

create table if not exists tb_cidade_empresa(
cd_cidade int not null auto_increment,
nm_cidade varchar(45),
cd_uf int,
constraint pk_cidade
primary key(cd_cidade),
foreign key(cd_uf)
references tb_uf_empresa(cd_uf)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;

create table if not exists tb_bairro_empresa(
cd_bairro int not null auto_increment,
nm_bairro varchar(45),
cd_cidade int,
constraint pk_bairro
primary key (cd_bairro),
foreign key(cd_cidade)
references tb_cidade_empresa(cd_cidade)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;

create table if not exists tb_relatorio_atividade(
cd_relatorio_atividade int not null auto_increment,
nm_nome_acao varchar(20),
nm_origem varchar (50),
nm_funcionario varchar (100),
cd_funcionario int,
dt_hora time,
dt_data date,
img_icon varchar (150),
constraint pk_relatorio_atividade
primary key (cd_relatorio_atividade)
) engine=InnoDB auto_increment=0;

create table if not exists tb_relatorio_atividade_lixeira(
cd_relatorio_atividade_lixeira int not null auto_increment,
nm_nome_acao varchar(20),
nm_origem varchar (50),
nm_funcionario varchar (100),
cd_funcionario int,
dt_hora time,
dt_data date,
img_icon varchar (150),
constraint pk_relatorio_atividade_lixeira
primary key (cd_relatorio_atividade_lixeira)
) engine=InnoDB auto_increment=0;




create table if not exists tb_gerente(
cd_gerente int not null auto_increment,
nm_gerente varchar(45),
nm_cargo varchar (60),
nm_descricao varchar (500),
nm_reviews varchar (500),
nm_idade varchar (10),
nm_email varchar (75),
nm_senha varchar (75),
cd_telefone varchar (20),
cd_img varchar (150),
cd_bairro int,
constraint pk_gerente
primary key(cd_gerente),
foreign key(cd_bairro)
references tb_bairro_empresa(cd_bairro)
 ON DELETE CASCADE 
 ON UPDATE CASCADE)
engine=InnoDB;


create table if not exists tb_funcionario(
cd_funcionario int not null auto_increment,
nm_nome varchar (150),
nm_cargo varchar (150),
nm_formacao varchar (100) null,
dt_emissao_contratual date,
nm_sexo varchar (20),
nm_maternidade varchar(150) null,
nm_estado_civil varchar(50) null,
cd_data_nascimento varchar (20),
cd_idade varchar (5) null,
cd_cpf varchar (20),
cd_rg varchar (20) null,
cd_credencial varchar (30), -- usuario podera usar credencial para logar junto com a senha a baixo
cd_email_funcionario varchar(45),
cd_senha_funcionario varchar (20),
cd_telefone varchar (20),
img_imagem varchar (250),
cd_bairro int,
cd_gerente int,
constraint pk_funcionario
primary key(cd_funcionario),
foreign key(cd_bairro)
references tb_bairro_empresa(cd_bairro),
foreign key(cd_gerente)
references tb_gerente(cd_gerente))
engine=InnoDB;

create table if not exists tb_status_vagas(
cd_status_vagas int not null auto_increment,
cd_numero_vaga double,
nm_nome varchar (50) default 'Cliente',
img_icon varchar (50) check (img_icon in ('Carro','Moto','Bicicleta','Patins','Outros','Livre')),
dt_entrada time,
sg_placa varchar (20),
cd_cpf varchar (20),
nm_status varchar(20) check (nm_status in('Ocupado','Livre','Reserva')),
constraint pk_status_vagas
primary key (cd_status_vagas)
) engine=InnoDB auto_increment=0;

-- tabela teste de login sessao
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
    `usuario` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_usuario` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- fim login sessao
create table if not exists tb_bike_outros(
cd_bike_outros int not null auto_increment,
cd_transporte varchar (50),
cd_detalhes varchar (150),
cd_nome varchar (100),
cd_observacao varchar (150),
constraint pk_bike_outros
primary key(cd_bike_outros))
engine=InnoDB;


-- criar tabela que resgistra tudo que foi apagado na lixeira 'registros_apagados'

-- fim -- 
