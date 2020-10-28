CREATE TABLE clientes(
	id int(255) NOT NULL AUTO_INCREMENT,
	nomeFantasia varchar(255) NOT NULL,
	razaoSocial varchar(255) NOT NULL,
	Cnpj varchar(18) NOT NULL,
	updated_at datetime,
	created_at datetime,

	PRIMARY KEY(ClienteId)
);

CREATE TABLE enderecos(
	id int(255) NOT NULL AUTO_INCREMENT,
	ClienteId int(255) NOT NULL,
	logradouro varchar(64) NOT NULL,
	bairro varchar(32) NOT NULL,
	numero varchar(32) NOT NULL,
	Cep varchar(10) NOT NULL,
	updated_at datetime,
	created_at datetime,


	PRIMARY KEY(id),
	FOREIGN KEY(ClienteId) REFERENCES clientes(id) ON DELETE CASCADE ON UPDATE CASCADE);
);