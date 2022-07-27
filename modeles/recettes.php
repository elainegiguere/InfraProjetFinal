<?php

include_once "./include/config.php";

class modele_recette {
    public $id;
    public $nom_recette;
    public $ingredients; 
    public $preparation;
    public $theme;

    public function __construct($id, $nom_recette, $ingredients, $preparation, $theme) {
        $this->id = $id;
        $this->nom_recette = $nom_recette;
        $this->ingredients = $ingredients;
        $this->preparation = $preparation;
        $this->theme = $theme;
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


  // Fonction pour obtenir tout les recettes avec un inner join pour afficher le thème

    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT recettes.id AS id, nom_recette, ingredients, preparation, theme FROM recettes INNER JOIN themes ON recettes.id_theme = themes.id;");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_recette($enregistrement['id'], $enregistrement['nom_recette'], $enregistrement['ingredients'], $enregistrement['preparation'], $enregistrement['theme']);
        }

        return $liste;
    }

 
    /***
     * Fonction permettant de récupérer un produit en fonction de son identifiant
     */
    public static function ObtenirUn($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT recettes.id AS id, nom_recette, ingredients, preparation, theme FROM recettes INNER JOIN themes ON recettes.id_theme = themes.id WHERE recettes.id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("s", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $recette = new modele_recette($enregistrement['id'], $enregistrement['nom_recette'], $enregistrement['ingredients'], $enregistrement['preparation'], $enregistrement['theme']);
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

        return $recette;
    }



    /* Fonction permettant d'ajouter une recette*/
   public static function ajouter( $nom_recette, $ingredients, $preparation, $id_theme) {
    $messageAjout = '';

    $mysqli = self::connecter();
    
    // Création d'une requête préparée
    if ($requete = $mysqli->prepare("INSERT INTO recettes( nom_recette, ingredients, preparation, id_theme) VALUES(?, ?, ?, ?)")) {      

    /************************* ATTENTION **************************/
    /* On ne fait présentement peu de validation des données.     */
    /* On revient sur cette partie dans les prochaines semaines!! */
    /**************************************************************/

    $requete->bind_param("sssi", $nom_recette, $ingredients, $preparation, $id_theme);

    if($requete->execute()) { // Exécution de la requête
        $messageAjout = "Recette ajouté";  // Message ajouté dans la page en cas d'ajout réussi
    } else {
        $messageAjout =  "Une erreur est survenue lors de l'ajout: " . $requete->error;  // Message ajouté dans la page en cas d’échec
    }

    $requete->close(); // Fermeture du traitement

    } else  {
        echo "Une erreur a été détectée dans la requête utilisée : ";
        echo $mysqli->error;
        echo "<br>";
        exit();
    }

    return $messageAjout;
}



  /***
     * Fonction permettant d'éditer unune recette
     */
    public static function editer($id, $nom_recette, $ingredients, $preparation, $id_theme) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("UPDATE recettes SET nom_recette=?, ingredients=?, preparation=?, id_theme=? WHERE id=?")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("sssii", $nom_recette, $ingredients, $preparation, $id_theme, $id);

        if($requete->execute()) { // Exécution de la requête
            $message = "Recette modifié";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'édition: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }


  /***
     * Fonction permettant de supprimer une recette
     */

    
    public static function supprimer($id) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("DELETE FROM recettes WHERE id=?")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("i", $id);

        if($requete->execute()) { // Exécution de la requête
            $message = "Recette supprimé";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de la suppression: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }


}
?>