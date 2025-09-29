USE `rimma_panika`;

CREATE TABLE utilisateur (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(100) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255),
    hashedPassword VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'client',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE categorie (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fr_libelle VARCHAR(150) NOT NULL,
    ru_libelle VARCHAR(150) NOT NULL,
    image VARCHAR(255)
) ENGINE=InnoDB;

CREATE TABLE prestataire (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(100) NOT NULL,
    actif BOOLEAN DEFAULT TRUE,
    idCategorie INT UNSIGNED NOT NULL,
    FOREIGN KEY (idCategorie) REFERENCES categorie(id)
) ENGINE=InnoDB;

CREATE TABLE prestation (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idCategorie INT UNSIGNED NOT NULL,
    fr_libelle VARCHAR(150),
    ru_libelle VARCHAR(150),
    prix DECIMAL(10,2) NOT NULL,
    duree INT,
    actif BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (idCategorie) REFERENCES categorie(id)
) ENGINE=InnoDB;

CREATE TABLE rdv (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idUtilisateur INT UNSIGNED NOT NULL,
    idPrestataire INT UNSIGNED NOT NULL,
    date_rdv DATE NOT NULL,
    heure_rdv TIME NOT NULL,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(id),
    FOREIGN KEY (idPrestataire) REFERENCES prestataire(id)
) ENGINE=InnoDB;

CREATE TABLE rdv_prestation (
    idRdv INT UNSIGNED NOT NULL,
    idPrestation INT UNSIGNED NOT NULL,
    PRIMARY KEY (idRdv, idPrestation),
    FOREIGN KEY (idRdv) REFERENCES rdv(id),
    FOREIGN KEY (idPrestation) REFERENCES prestation(id)
) ENGINE=InnoDB;

CREATE TABLE galerie (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idCategorie INT UNSIGNED NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idCategorie) REFERENCES categorie(id)
) ENGINE=InnoDB;

CREATE TABLE produit (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fr_libelle VARCHAR(150),
    ru_libelle VARCHAR(150),
    fr_description TEXT,
    ru_description TEXT,
    prix DECIMAL(10,2),
    stock INT DEFAULT 0,
    image VARCHAR(255),
    actif BOOLEAN DEFAULT TRUE
) ENGINE=InnoDB;

CREATE TABLE commande (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idUtilisateur INT UNSIGNED NOT NULL,
    prix_total DECIMAL(10,2) NOT NULL,
    quantite INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(id)
) ENGINE=InnoDB;

CREATE TABLE commande_produit (
    idCommande INT UNSIGNED NOT NULL,
    idProduit INT UNSIGNED NOT NULL,
    PRIMARY KEY (idCommande, idProduit),
    FOREIGN KEY (idCommande) REFERENCES commande(id),
    FOREIGN KEY (idProduit) REFERENCES produit(id)
) ENGINE=InnoDB;

CREATE TABLE avis (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idUtilisateur INT UNSIGNED NOT NULL,
    contenu TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(id)
) ENGINE=InnoDB;

CREATE TABLE commentaire (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idUtilisateur INT UNSIGNED NOT NULL,
    idAvis INT UNSIGNED NOT NULL,
    contenu TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(id),
    FOREIGN KEY (idAvis) REFERENCES avis(id)
) ENGINE=InnoDB;
