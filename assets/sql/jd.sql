CREATE DATABASE `pk_joannadevis` /*!40100 COLLATE 'utf8mb4_general_ci' */

CREATE TABLE jd_avis (
    a_id INT NOT NULL AUTO_INCREMENT,
    a_nomComplet VARCHAR(55) NOT NULL,
    a_img VARCHAR(100) NOT NULL,
    a_message VARCHAR(255) NOT NULL,
    a_date DATE NOT NULL,
    PRIMARY KEY (a_id)
);

CREATE TABLE jd_user (
    u_id INT NOT NULL AUTO_INCREMENT,
    u_role INT NOT NULL,
    u_username VARCHAR(100) NOT NULL,
    u_mdp VARCHAR(100) NOT NULL,
    u_nomComplet VARCHAR(55) NOT NULL,
    PRIMARY KEY (u_id)
);

CREATE TABLE jd_message (
    m_id INT NOT NULL AUTO_INCREMENT,
    m_nom VARCHAR(55) NOT NULL,
    m_mail VARCHAR(100) NOT NULL,
    m_message VARCHAR(255) NOT NULL,
    PRIMARY KEY (m_id)
);

CREATE TABLE jd_news (
    n_id INT NOT NULL AUTO_INCREMENT,
    n_mail VARCHAR(100) NOT NULL,
    PRIMARY KEY (n_id)
);

INSERT INTO jd_avis (a_nomComplet, a_img, a_message, a_date)
VALUES 
    ('Fanny Delgado', 'Avis1.jpg', 'Joanna est une photographe très professionnelle et travaille dans de très bonnes conditions. Il s\'agissait d\'une séance Famille avec un bébé de seulement 5 jours, elle a su être très douce, patiente et attentionnée. Je recommande', '2023-05-25'),
    ('Anne Guillet', 'Avis2.jpg', 'Joanna nous a accompagnées tout au long de l\'année pour un projet artistique inclusif pour les enfants avec autisme que nous accompagnons au sein du DAME CIGALE. Elle a été plein de conseils, et surtout de bonne humeur et de patience.', '2023-01-15'),
    ('Caroline Cholet', 'Avis3.jpg', 'Nous avons fais appel à Joanna pour immortaliser notre spectacle de danse annuel. Professionnelle et à l\'écoute, nous sommes plus que ravie du résultat obtenu! Joanna a su mettre en valeur le travail des danseuses!', '2023-04-24');

INSERT INTO jd_user(u_role ,u_username, u_mdp, u_nomComplet) VALUES (1,'administrateur','$2y$10$GIXj69NjpuZ3qGrPKM1qSeKh35wXi0k03M7zyIuM6.onh3nMcvPCO','Olivier Lasserre');
INSERT INTO jd_user(u_role ,u_username, u_mdp, u_nomComplet) VALUES (1,'kimbdr','$2y$10$yQtRue8NUb32Qwc42BVqtuj45Jt/56HhpJg8roinxrta65lIzpnZy','Kimberley Bordier');

INSERT INTO `jd_news`(`n_mail`) VALUES ('bdrkim41600@gmail.com');
INSERT INTO `jd_news`(`n_mail`) VALUES ('dddddd0@gmail.com');

INSERT INTO `jd_message`(`m_nom`, `m_mail`, `m_message`) VALUES ('Kimberley Bordier','bdrkim41600@gmail.com','Je sais pas quoi mettre.');
INSERT INTO `jd_message`(`m_nom`, `m_mail`, `m_message`) VALUES ('Fanny Delgado','fannyd@gmail.com','Quel beau message !');