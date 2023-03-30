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
    $req = $this->getPDO()->query($_state);
    $datas = $req->fetch();
    return $datas;
    }
    public function closeCursor(){

    }
}
$connexion = new Database("Gmail");
try{
    $connexion;
    $connexion->query('SELECT email, password FROM Users');
    $valid = true;

    while($datas){
        $data['email'];
        $data['password'];
        
        if(isset($_POST['email']) && isset($_POST['password'])){
            $login = $_POST['email'];
            $mdp = $_POST['password'];

            if(!$login || !$mdp){
                echo "<p class=\"warning\">Vous avez oubliez votre mail ou password?</p>";
                exit;
            }
            else if($login != $data['email']){
              $valid = false;  
            }
            else if (!password_verify($mdp, $data['password'])){
                $valid = false;
            }
            else{
                //print "<a href=\"connection.php\">Go!!!</a>";
                $valid == true;
                $_SESSION['nom'] = $login;
                $_SESSION['mdp'] = md5($mdp);
                echo "<p class=\"success\">Votre login est ".$_SESSION['nom']."
                votre mot de passe est  ".md5($mdp);
                exit;
            }
        }              
    }
    if($valid === false){
        echo "<p class=\"warning\">Erreur login ou mot de passe?</p>";
    }
}
catch(Exception $e){
    die("Erreur de connexion : ".$e->getMessage());
}


?>