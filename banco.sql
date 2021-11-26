CREATE DATABASE login;
USE login;

CREATE TABLE login.usuario (
  usuario_id INT NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(200) NOT NULL,
  senha VARCHAR(32) NOT NULL,
  nome VARCHAR(100) NOT NULL,
  data_cadastro DATETIME NOT NULL,
  PRIMARY KEY (usuario_id));

INSERT INTO usuario (usuario_id,usuario,senha, nome, data_cadastro) VALUES (1,'todo','', 'To Do', '25-11-2021 20:35:00');
