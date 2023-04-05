<?php 
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
    public function query($_state){ //envoyer en paramètre la requête sql
    $req = $this->getPDO()->prepare($_state);
    $req->execute([$_POST['email']]);
    $datas = $req->fetch();
    $req->closeCursor();
    return $datas;
    }
}

$connexion = new Database("Gmail");

if( (isset($_POST['email'])) && (isset($_POST['password'])) ){
    $login = $_POST['email'];
    $mdp = $_POST['password'];
    try{
        $connexion;
        $datas = $connexion->query("SELECT * FROM users WHERE email = ?");
        $valid = false;
        while($datas){
            $datas['email'];
            $datas['password']; 
            if( ($login = $datas['email']) && (password_verify($mdp, $datas['password'])) ){
                $valid = true;
                //print "<a href=\"connection.php\">Go!!!</a>";
                $_SESSION['nom'] = $login;
                $_SESSION['mdp'] = md5($mdp);
                echo "<p class=\"success\">Votre login est ".$_SESSION['nom']."
                votre mot de passe est  ".md5($mdp);
                exit;
            }
            else{
                $valid = false;
            }
        }              
        if($valid == false){
            echo "<p class=\"warning\">Erreur login ou mot de passe?</p>";
            exit;
        }
    }
    catch(Exception $e){
        die("Erreur de connexion : ".$e->getMessage());
    }
    
}
else if ( (isset($_POST['email'])) xor (isset($_POST['password'])) ) {
        echo "<p class=\"warning\">Vous avez oubliez votre mail ou password?</p>";
        exit;
}
?>