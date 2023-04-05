<footer id="connex">
        <section class="desc">
            <h3>Bienvenue dans votre espace <!---<?= $_SESSION['nom']." ".$_SESSION['prenom']?> --></h3>
        </section>

        <section class="form-primary">
            <h3>Connectez-vous à votre compte</h3>       
            <form action="connect.php" method="post">
                <label for="email">Mail ou Login *</label>
                <input type="email" placeholder="Adresse mail" for="email" id="email" name="email" aria-required="true" autofocus>

                <label for="password">Mot de passe *</label>
                <input type="password" placeholder="Mot de Passe" for="password" id="password" name="password">

                <input type="submit" value="Connexion à votre compte">

            </form>
        </section>
    </footer>