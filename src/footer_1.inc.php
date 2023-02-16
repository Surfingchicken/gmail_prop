<footer id="inscr">
        <section class="desc">
            <h3>Une boîte de réception entièrement repensée</h3>
                <p>Avec les nouveaux onglets personnalisables, repérez immédiatemment les nouveaux messages et choisissez ceux que vous souhaitez lire en priorité.
                </p>
        </section>
        <section class="form-primary">
            <h3>Créer un compte</h3> 
            <form action="index.php" method="post">
                <label for="nom">Nom *</label>
                <input type="text" placeholder="Votre nom" id="nom" name="nom" aria-required="true" autofocus>

                <label for="prenom">Prénom *</label>
                <input type="text" placeholder="Votre prénom" id="prenom" name="prenom" aria-required="true" autofocus>

                <label for="email">Mail *</label>
                <input type="email" placeholder="Adresse mail" for="email" id="email" name="email" aria-required="true" autofocus>

                <label for="password">Choisir votre mot de passe *</label>
                <input type="password" placeholder="Mot de Passe" for="password" id="password" name="password">

                <input type="submit" value="Valider votre compte">
            </form>
        </section>
</footer>