document.addEventListener("DOMContentLoaded", function () {
    const appointmentLink = document.querySelector('a[href="/html/medecin"]');
    const formContainer = document.getElementById("form-container");
    const closeFormButton = document.getElementById("close-form");

    // Afficher le formulaire lorsqu'on clique sur "Prendre rendez-vous"
    appointmentLink.addEventListener("click", function (event) {
        event.preventDefault(); // Empêche la redirection
        formContainer.classList.remove("hidden");
    });

    // Cacher le formulaire lorsqu'on clique sur "Annuler"
    closeFormButton.addEventListener("click", function () {
        formContainer.classList.add("hidden");
    });
});


//dom pour mon formulaire d'authentification

document.getElementById('boutonConnexion').addEventListener('click', () => {
    const conteneur = document.getElementById('conteneur-formulaire-auth');

    // Si le formulaire existe déjà, on le supprime (toggle)
    if (document.getElementById('formulaire-authentification')) {
        conteneur.innerHTML = '';
        return;
    }

    conteneur.innerHTML = `
        <div id="formulaire-authentification" class="popup-authentification">
            <h2>Connexion</h2>
            <form>
                <label for="courriel">Adresse courriel :</label>
                <input type="email" id="courriel" name="courriel" required>

                <label for="mot-de-passe">Mot de passe :</label>
                <input type="password" id="mot-de-passe" name="mot-de-passe" required>

                <button type="submit">Se connecter</button>
            </form>
        </div>
    `;
});

