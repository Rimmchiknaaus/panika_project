USE `rimma_panika`
;

 -- Ouvre une 'transaction' (tout le script qui suit est exécuté en entier, à la moindre erreur, tout est annulé. c'est très pratique !)
START TRANSACTION
;

INSERT INTO categorie (fr_libelle, ru_libelle, image) VALUES 
('Manucure', 'Маникюр', 'img/manicure.jpeg'),
('Pédicure', 'Педикюр', 'img/padicure.jpeg'),
('Extension de cils', 'Наращивание ресниц', 'img/cils.jpeg')
;

INSERT INTO utilisateur (prenom, nom, email, phone, password, hashedPassword, role)
VALUES (
    'Rimma',
    'Panika',
    'admin@panika.com',
    '+33000000000',
    NULL,
    '$2b$12$E1RzsA5TKzgLlCDsQwRQausRKdzoaXWRfPucBFhKSmwcgAAyAe.fK',
    'admin'
);

INSERT INTO galerie (idCategorie, image) VALUES 
(2, '/img/gallery_01.png'),
(1, '/img/gallery_02.png'),
(3, '/img/gallery_03.png'),
(1, '/img/gallery_04.png'),
(1, '/img/gallery_05.png'),
(3, '/img/gallery_06.png'),
(1, '/img/gallery_07.png'),
(1, '/img/gallery_08.png'),
(1, '/img/gallery_09.png'),
(3, '/img/gallery_10.png'),
(2, '/img/gallery_11.png'),
(1, '/img/gallery_12.png')
;

INSERT INTO prestation (idCategorie, fr_libelle, ru_libelle, prix, duree) VALUES 
(1, 'Les ongles americains', 'Американское наращивание', '100$', '50')
;

INSERT INTO prestataire (prenom, idCategorie) VALUES 
('Olha', 1),
('Alina', 2),
('Irina', 3)
;


-- Termine la transaction
-- (si _toutes_ les commandes à l'interieur de la 'transaction' se sont bien passé, c'est parfait; sinon, tout est annulé. c'est très pratique !)
COMMIT
;
