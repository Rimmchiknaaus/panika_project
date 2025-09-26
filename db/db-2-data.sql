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

-- Termine la transaction
-- (si _toutes_ les commandes à l'interieur de la 'transaction' se sont bien passé, c'est parfait; sinon, tout est annulé. c'est très pratique !)
COMMIT
;
