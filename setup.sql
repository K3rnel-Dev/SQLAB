-- Создание пользователя и базы данных
CREATE USER 'capsule'@'localhost' IDENTIFIED BY 'capsule';
CREATE DATABASE capsule;
GRANT ALL PRIVILEGES ON capsule.* TO 'capsule'@'localhost';
FLUSH PRIVILEGES;

-- Использование базы данных
USE capsule;

-- Создание таблицы users
CREATE TABLE users (
  login VARCHAR(200),
  password VARCHAR(200)
);

-- Вставка данных в таблицу
INSERT INTO users (login, password) VALUES ('admin', 'lazyadmin');
