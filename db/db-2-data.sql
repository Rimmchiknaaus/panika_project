USE `rimma_panika`
;

 -- Ouvre une 'transaction' (tout le script qui suit est exécuté en entier, à la moindre erreur, tout est annulé. c'est très pratique !)
START TRANSACTION
;

INSERT INTO categorie (fr_libelle, ru_libelle, image) VALUES 
('Manucure', 'Маникюр', 'images/manucure.jpg'),
('Pédicure', 'Педикюр', 'images/pedicure.jpg'),
('Extension de cils', 'Наращивание ресниц', 'images/cils.jpg')
;


 -- Termine la transaction
 -- (si _toutes_ les commandes à l'interieur de la 'transaction' se sont bien passé, c'est parfait; sinon, tout est annulé. c'est très pratique !)
COMMIT
;
