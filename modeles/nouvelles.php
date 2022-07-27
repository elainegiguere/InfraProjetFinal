<?php

include_once "./include/config.php";

class modele_nouvelle {
    public $id;
    public $titre; 
    public $description_courte; 
    public $description_longue;
    public $date_nouvelle;
    public $actif;
    public $fk_categorie;

    public function __construct($id, $titre, $description_courte, $description_longue, $date_nouvelle, $actif, $fk_categorie) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description_courte = $description_courte;
        $this->description_longue = $description_longue;
        $this->date_nouvelle = $date_nouvelle;
        $this->actif = $actif;
        $this->fk_categorie = $fk_categorie;
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
     * Fonction permettant de récupérer 3 nouvelles actives par date descendantes
     */

    public static function ObtenirTroisNouvellesActives() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query ("SELECT * FROM nouvelles WHERE actif = true ORDER BY date_nouvelle DESC LIMIT 3");

        foreach ($resultatRequete as $enregistrement) {
      
            $liste[] = new modele_nouvelle($enregistrement['id'], $enregistrement['titre'], $enregistrement['description_courte'], $enregistrement['description_longue'], $enregistrement['date_nouvelle'], $enregistrement['actif'], $enregistrement['fk_categorie']);
        }

        return $liste;
    }

    /***
     * Fonction permettant de récupérer toutes les  nouvelles actives par date descendantes
     */

    public static function ObtenirNouvellesActives() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query ("SELECT * FROM nouvelles WHERE actif = true ORDER BY date_nouvelle DESC");

        foreach ($resultatRequete as $enregistrement) {
      
            $liste[] = new modele_nouvelle($enregistrement['id'], $enregistrement['titre'], $enregistrement['description_courte'], $enregistrement['description_longue'], $enregistrement['date_nouvelle'], $enregistrement['actif'], $enregistrement['fk_categorie']);
        }

        return $liste;
    }
   
   
    /***
     * Fonction permettant de récupérer une nouvelle en fonction de son identifiant (pour faire le singleNouvelle)
     */
    public static function ObtenirUn($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM nouvelles WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("i", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $nouvelle = new modele_nouvelle($enregistrement['id'], $enregistrement['titre'], $enregistrement['description_courte'], $enregistrement['description_longue'], $enregistrement['date_nouvelle'], $enregistrement['actif'], $enregistrement['fk_categorie']);
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

        return $nouvelle;
    }


    /***
     * Fonction permettant de récupérer les nouvelles d'une catégorie
     */
        public static function ObtenirNouvellesDeLaCategorie($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM nouvelles WHERE actif = true AND fk_categorie=?")) {  // Création d'une requête préparée 
            $requete->bind_param("i", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            

            foreach ($result as $enregistrement) {
                //$id, $titre, $description_courte, $description_longue, $date_nouvelle, $actif, $fk_categorie
                $liste[] = new modele_nouvelle($enregistrement['id'], $enregistrement['titre'], $enregistrement['description_courte'], $enregistrement['description_longue'], $enregistrement['date_nouvelle'], $enregistrement['actif'], $enregistrement['fk_categorie']);
            }
        
            return $liste;
           
        }
    }

}

?>