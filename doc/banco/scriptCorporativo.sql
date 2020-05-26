#create database intranet_corporativa;
#use intranet_corporativa;


#create table cargo(
#	cod_cargo int not null auto_increment,
#	nomenclatura varchar(100) not null,
#	PRIMARY KEY(cod_cargo)
#);
create table setor(
	cod_setor int not null auto_increment,
	nome varchar(200) not null,
	sigla varchar(45) not null,
	gerente varchar(255),
	PRIMARY KEY(cod_setor)
);
create table funcionario(
	cod_funcionario int not null auto_increment,
	nome varchar(200) not null,
	telefone varchar(15),
	email varchar(100),
	data_nascimento date,
	ramal varchar(10),
	senha varchar(150) not null,
	login varchar(200) not null,
	permissao int not null,
	cargo int,
	setor int,
	PRIMARY KEY(cod_funcionario),
	FOREIGN KEY (cargo) REFERENCES cargo(cod_cargo),
	FOREIGN KEY (setor) REFERENCES setor(cod_setor)
);

create table foto(
	cod_foto int not null auto_increment,
	nome varchar(100) not null,
	caminho varchar(200) not null,
	tamanho int,
	funcionario int not null,
	PRIMARY KEY(cod_foto),
	FOREIGN KEY (funcionario) REFERENCES funcionario(cod_funcionario)
);
create table controle_acesso(
	cod_acesso int not null auto_increment,
	funcionario int,
	acesso datetime not null,
	PRIMARY KEY(cod_acesso),
	FOREIGN KEY (funcionario) REFERENCES funcionario(cod_funcionario)
);
create table comunicado_cip(
	cod_comunicado int not null auto_increment,
	texto text  not null,
	titulo varchar(100) not null,
	remetentes text not null,
	responsavel int not null,
	data_emissao datetime not null,
	autor int not null,
	PRIMARY KEY(cod_comunicado),
	FOREIGN KEY (responsavel) REFERENCES funcionario(cod_funcionario),
	FOREIGN KEY (autor) REFERENCES funcionario(cod_funcionario)
);
create table publicacao(
	cod_publicacao int not null auto_increment,
	titulo varchar(100) not null,
	texto text not null,
	data_publicacao datetime not null,
	comentario varchar(255),
	responsavel int not null,
	autor int not null,
	PRIMARY KEY(cod_publicacao),
	FOREIGN KEY (responsavel) REFERENCES funcionario(cod_funcionario),
	FOREIGN KEY (autor) REFERENCES funcionario(cod_funcionario)
);
create table banner(
	cod_banner int not null auto_increment,
	nome varchar(100) not null,
	caminho varchar(200) not null,
	tamanho int not null,
	responsavel int not null,
	autor int not null,
	comentario varchar(255),
	PRIMARY KEY(cod_banner),
	FOREIGN KEY (responsavel) REFERENCES funcionario(cod_funcionario),
	FOREIGN KEY (autor) REFERENCES funcionario(cod_funcionario)
);
create table documento(
	cod_documento int not null auto_increment,
	nome varchar(100) not null,
	caminho varchar(200) not null,
	tamanho int not null,
	responsavel int not null,
	autor int not null,
	comentario varchar(255),
	PRIMARY KEY(cod_documento),
	FOREIGN KEY (responsavel) REFERENCES funcionario(cod_funcionario),
	FOREIGN KEY (autor) REFERENCES funcionario(cod_funcionario)
);
create table sala(
	cod_sala int not null auto_increment,
	nome varchar(200) not null,
	especificacoes text not null,
	status_funcionamento int not null,
	PRIMARY KEY(cod_sala)
);
create table reserva(
	cod_reserva int not null auto_increment,
	data_inicio datetime not null,
	data_fim datetime not null,
	observacoes text,
	descricao text not null,
	comentario varchar(255),
	solicitante int not null,
	responsavel int not null, 
	PRIMARY KEY(cod_reserva),
	FOREIGN KEY (responsavel) REFERENCES funcionario(cod_funcionario),
	FOREIGN KEY (solicitante) REFERENCES funcionario(cod_funcionario)
);