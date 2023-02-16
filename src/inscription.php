<?php
/*
namespace App;
use \PDO;
*/
$_SESSION["nom"] = $_POST["nom"];
$_SESSION["prenom"] = $_POST["prenom"];

class Database{
    
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    //connection à la bdd
    public function __construct($db_name, $db_user='root', $db_pass='root', $db_host ='localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
        
    }
    
    private function getPDO(){
    $pdo = new PDO('mysql:host=localhost;dbname=Gmail;charset=utf8','root','root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            return $pdo;
    
    }
    public function prepared($_state){ //envoyer en paramètre la requête sql
    $req = $this->getPDO()->prepare($_state);
    //$datas = $req->fetchAll(PDO::FETCH_OBJ);
    return $req;
    }
}

    $inscription = new Database("Gmail");
        try{
            $inscription; 
        }
        catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
        if(!isset($_POST['nom']) || !isset($_POST['prenom']))
        {
            $_SESSION['nom'] = "null";
            $_SESSION['prenom'] = "null";
        }
        else
        {
            $_SESSION['nom'] = $_POST['nom'];
            $_SESSION['prenom'] = $_POST['prenom'];
        }
        if(isset($_POST["email"]) || isset($_POST["password"])){
            //on test les chaines de caractère//
            if(!$_POST["email"] || !$_POST["password"])
                {
                    echo "<p class=\"warning\">Vous avez oubliez votre mail ou password?</p>";
                }
            else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
                { //attention à ma fonction
                    echo "<p class=\"warning\">Mail invalide</p>";
                }
            else if(is_numeric($_POST["email"]))
                {
                    echo "<p class=\"warning\">Vous devez saisir des caractères</p>";
                }
            else
                {
                    //password_hash($_POST['psw'],PASSWORD_DEFAULT);
                    $_state = "INSERT INTO Users (email, password) VALUES (?,?)";
                    $inscription->prepared($_state)->execute(array($_POST["email"], password_hash($_POST["password"],PASSWORD_DEFAULT)));
                    
                    echo "
                        <p class=\"success\">Merci votre contenu est ajouté : 
                            <a href=\"connect.php\" title=\"pub\">Connectez vous</a>      
                        </p>
                        ";
                }
        }
 

?>
    
