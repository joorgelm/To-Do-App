CREATE DATABASE login;
USE login;

CREATE TABLE login.usuario (
  usuario_id INT NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(200) NOT NULL,
  senha VARCHAR(32) NOT NULL,
  nome VARCHAR(100) NOT NULL,
  PRIMARY KEY (usuario_id));

INSERT INTO usuario (usuario_id,usuario,senha, nome) VALUES (1,'todo','', 'To Do');
