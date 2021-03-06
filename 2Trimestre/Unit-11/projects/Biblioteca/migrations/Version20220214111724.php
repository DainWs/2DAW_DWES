<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220214111724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE libros (id INT AUTO_INCREMENT NOT NULL, titulo VARCHAR(60) NOT NULL, editorial VARCHAR(25) DEFAULT NULL, autor VARCHAR(25) DEFAULT NULL, genero VARCHAR(20) NOT NULL, pais VARCHAR(20) DEFAULT NULL, n_paginas INT DEFAULT NULL, year DATETIME DEFAULT NULL, precio DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestamos (id INT AUTO_INCREMENT NOT NULL, libro_id_id INT NOT NULL, usuario_id_id INT NOT NULL, completion_date DATETIME NOT NULL, max_delay_date DATETIME NOT NULL, return_date DATETIME NOT NULL, INDEX IDX_4849844FB91B4A02 (libro_id_id), INDEX IDX_4849844F629AF449 (usuario_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(15) NOT NULL, apellidos VARCHAR(25) DEFAULT NULL, dni VARCHAR(9) NOT NULL, domicilio VARCHAR(50) DEFAULT NULL, poblacion VARCHAR(30) DEFAULT NULL, provincia VARCHAR(20) DEFAULT NULL, birthday DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestamos ADD CONSTRAINT FK_4849844FB91B4A02 FOREIGN KEY (libro_id_id) REFERENCES libros (id)');
        $this->addSql('ALTER TABLE prestamos ADD CONSTRAINT FK_4849844F629AF449 FOREIGN KEY (usuario_id_id) REFERENCES usuarios (id)');
        
        $this->addSql("INSERT INTO LIBROS VALUES (1, 'Don Quijote de La Mancha I', 'Anaya', 'Miguel de Cervantes', 'Caballeresco', 'Espa??a', 517, '01-01-1991', 2750);");
        $this->addSql("INSERT INTO LIBROS VALUES (2, 'Don Quijote de La Mancha II', 'Anaya', 'Miguel de Cervantes', 'Caballeresco', 'Espa??a', 611, '01-01-1991', 3125);");
        $this->addSql("INSERT INTO LIBROS VALUES (3, 'Historias de Nueva Orleans', 'Alfaguara', 'William Faulkner', 'Novela', 'Estados Unidos', 186, '01-01-1985', 675);");
        $this->addSql("INSERT INTO LIBROS VALUES (4, 'El principito', 'Andina', 'Antoine Saint-Exupery', 'Aventura', 'Francia', 120, '01-01-1996', 750);");
        $this->addSql("INSERT INTO LIBROS VALUES (5, 'El pr??ncipe', 'S.M.', 'Maquiavelo', 'Pol??tico', 'Italia', 210, '01-01-1995', 1125);");
        $this->addSql("INSERT INTO LIBROS VALUES (6, 'Diplomacia', 'S.M.', 'Henry Kissinger', 'Pol??tico', 'Alemania', 825, '01-01-1997', 1750);");
        $this->addSql("INSERT INTO LIBROS VALUES (7, 'Los Windsor', 'Plaza & Jan??s', 'Kitty Kelley', 'Biograf??as', 'Gran Breta??a', 620, '01-01-1998', 1130);");
        $this->addSql("INSERT INTO LIBROS VALUES (8, 'El ??ltimo Emperador', 'Caralt', 'Pu-Yi', 'Autobiograf??as', 'China', 353, '01-01-1989', 995);");
        $this->addSql("INSERT INTO LIBROS VALUES (9, 'Fortunata y Jacinta', 'Plaza & Jan??s', 'P??rez Gald??s', 'Novela', 'Espa??a', 625, '01-01-1984', 72);");

        $this->addSql("INSERT INTO USUARIOS VALUES (1, 'In??s', 'Posadas Gil', '42117892S', 'Av. Escaleritas 12', 'Las Palmas G.C.', 'Las Palmas', '7-4-71');");
        $this->addSql("INSERT INTO USUARIOS VALUES (2, 'Jos??', 'S??nchez Pons', '31765348D', 'Mesa y L??pez 51', 'Las Palmas G.C.', 'Las Palmas', '6-9-66');");
        $this->addSql("INSERT INTO USUARIOS VALUES (3, 'Miguel', 'G??mez S??ez', '11542981G', 'Gran V??a 71', 'Madrid', 'Madrid', '12-9-76');");
        $this->addSql("INSERT INTO USUARIOS VALUES (4, 'Eva', 'Santana P??ez', '78542450L', 'P??o Baroja 23', 'Bilbao', 'Vizcaya', '23-5-80');");
        $this->addSql("INSERT INTO USUARIOS VALUES (5, 'Yolanda', 'Betancor D??az', '44312870Z', 'El Cid 45', 'Miranda de Ebro', 'Burgos', '17-9-76');");
        $this->addSql("INSERT INTO USUARIOS VALUES (6, 'Juan Luis', 'Blasco Pita', '47234471P', 'Jaime I, 65', 'Alcira', 'Valencia', '1-3-82');");

        $this->addSql("INSERT INTO PRESTAMOS VALUES (1, 1, 3, '99-11-1', '99-11-15', '99-11-13');");
        $this->addSql("INSERT INTO PRESTAMOS VALUES (2, 3, 2, '99-11-3', '99-11-20', '99-11-22');");
        $this->addSql("INSERT INTO PRESTAMOS VALUES (3, 2, 5, '99-11-18', '99-11-30', '99-11-25');");
        $this->addSql("INSERT INTO PRESTAMOS VALUES (4, 5, 6, '99-11-21', '99-12-3', '99-12-5');");
        $this->addSql("INSERT INTO PRESTAMOS VALUES (5, 9, 2, '99-11-21', '99-12-5', '99-11-30');");
        $this->addSql("INSERT INTO PRESTAMOS VALUES (6, 2, 4, '99-11-26', '99-12-7', '99-12-1');");
        $this->addSql("INSERT INTO PRESTAMOS VALUES (7, 4, 3, '99-11-30', '99-12-7', '99-12-8');");
        $this->addSql("INSERT INTO PRESTAMOS VALUES (8, 1, 1, '99-12-1', '99-12-9', '99-12-11');");
        $this->addSql("INSERT INTO PRESTAMOS VALUES (9, 3, 6, '99-12-3', '99-12-9', '99-12-9');");
        $this->addSql("INSERT INTO PRESTAMOS VALUES (10, 7, 3, '99-12-3', '99-12-18', '99-12-15');");
        $this->addSql("INSERT INTO PRESTAMOS VALUES (11, 3, 2, '99-12-5', '99-12-22', '99-12-20');");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestamos DROP FOREIGN KEY FK_4849844FB91B4A02');
        $this->addSql('ALTER TABLE prestamos DROP FOREIGN KEY FK_4849844F629AF449');
        $this->addSql('DROP TABLE libros');
        $this->addSql('DROP TABLE prestamos');
        $this->addSql('DROP TABLE usuarios');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
