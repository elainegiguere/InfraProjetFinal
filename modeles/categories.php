<?php

include_once "./include/config.php";

class modele_categorie {
    public $id; 
    public $categorie; 
    
    public function __construct($id, $categorie) {
        $this->id = $id;
        $this->categorie = $categorie;
    }

    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        // Vérifier la connexion
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;
            exit();
        } 

        return $mysqli;
    }

    /***
     * Fonction permettant de récupérer l'ensemble des produits 
     */
    public static function ObtenirToutes() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, categorie FROM categories WHERE 1");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_categorie ($enregistrement['id'], $enregistrement['categorie']);
        }

        return $liste;
    }

    // obtenir 1

    public static function ObtenirUn($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM categories WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("i", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $categorie = new modele_categorie($enregistrement['id'], $enregistrement['categorie']);
            } else {
                echo "Erreur: Aucun enregistrement trouvé";
                exit();
            }   
            
            $requete->close(); // Fermeture du traitement 
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $categorie;
    }


}