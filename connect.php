<?php session_start(); ?>
<?php include_once './src/header.inc.php'?>
<body>
    <?php include_once './src/menu.inc.php'?>
    <?php include_once './src/footer_2.inc.php'?>
    <?php include_once './src/button.inc.php'?>
    <?php include_once './src/connexion.php'?>
    <?php
        // remove all session variables
        session_unset(); 

        // destroy the session 
        session_destroy(); 
?>
</body>
</html>