// Sélectionner le bouton et le conteneur des services
const addServiceBtn = document.getElementById('add-service-btn');



// Fonction pour ajouter un nouveau service
function addNewService() {
    var servicesContainer = document.getElementById('services-container');
    // Créer un nouveau service
    const newService = document.createElement('div');
    newService.classList.add('service');  // Ajout d'une classe pour styliser l'élément


    // Ajouter un icône, titre et description au service
    newService.innerHTML = `
        <i class="fas fa-hospital"></i>
        <h3>Service supplémentaire</h3>
        <p>Ceci est un service ajouté dynamiquement via le DOM.</p>
        <a href="service-supplementaire.php" class="btn">En savoir plus</a>
    `;

    servicesContainer.append(newService);


    // Ajouter ce service au conteneur des services
    servicesContainer.appendChild(newService);
}

// Ajouter un écouteur d'événements au bouton pour ajouter un service
addServiceBtn.addEventListener('click', addNewService);

