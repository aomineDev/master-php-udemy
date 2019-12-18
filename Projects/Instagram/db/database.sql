/* Creando base de datos */
CREATE DATABASE IF NOT EXISTS master_instagram;
USE master_instagram;

/* Creando tabla users */
CREATE TABLE IF NOT EXISTS users(
id int auto_increment not null,
role varchar(20)  not null,
name varchar(45)  not null,
surname varchar(90)  not null,
nick varchar(45)  not null,
email varchar(60)  not null,
password varchar(255)  not null,
image varchar(255)  not null,
created_at DATETIME not null,
updated_at DATETIME not null,
remember_token varchar(255)  not null,
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

/* Creando tabla images */
CREATE TABLE IF NOT EXISTS images(
    id int auto_increment not null,
    user_id int not null,
    image_path varchar(255) not null,
    description text not null,
    created_at DATETIME not null,
    updated_at DATETIME not null,
    CONSTRAINT pk_images PRIMARY KEY(id),
    CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

/* Creando tabla comments */
CREATE TABLE IF NOT EXISTS comments(
    id int auto_increment not null,
    user_id int not null,
    image_id int not null,
    content text not null,
    created_at DATETIME not null,
    updated_at DATETIME not null,
    CONSTRAINT pk_comments PRIMARY KEY(id),
    CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDb;

/* Creando tabla likes */
CREATE TABLE IF NOT EXISTS likes(
    id int auto_increment not null,
    user_id int not null,
    image_id int not null,
    created_at DATETIME not null,
    updated_at DATETIME not null,
    CONSTRAINT pk_likes PRIMARY KEY(id),
    CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_likes_images FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDb;
