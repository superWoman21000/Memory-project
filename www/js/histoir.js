 // Sélection de la boîte modale et des boutons de zoom
const modal = document.querySelector('.modal');
const modalImg = document.getElementById('fullImage');
const zoomInButton = document.querySelector('.zoom-in');
const zoomOutButton = document.querySelector('.zoom-out');

// Gestion du niveau de zoom
let zoomLevel = 1;

// Fonction pour ouvrir la boîte modale avec l'image cliquée
const openModal = (imageSrc) => {
    modal.style.display = 'block';
    modalImg.src = imageSrc;
    modalImg.style.transform = `scale(${zoomLevel})`;
};

// Fonction pour fermer la boîte modale
const closeModal = () => {
    modal.style.display = 'none';
};

// Ajout d'un écouteur d'événements à chaque image pour ouvrir la boîte modale
document.querySelectorAll('.image-box img').forEach(image => {
    image.addEventListener('click', () => {
        openModal(image.src);
    });
});

// Ajout d'un écouteur d'événement pour fermer la boîte modale lorsqu'on clique en dehors de l'image
modal.addEventListener('click', (e) => {
    if (e.target === modal || e.target.classList.contains('close')) {
        closeModal();
    }
});

// Gestion de l'événement pour le bouton de zoom +
zoomInButton.addEventListener('click', () => {
    zoomLevel += 0.1;
    modalImg.style.transform = `scale(${zoomLevel})`;
});

// Gestion de l'événement pour le bouton de zoom -
zoomOutButton.addEventListener('click', () => {
    zoomLevel -= 0.1;
    if (zoomLevel < 0.1) {
        zoomLevel = 0.1;
    }
    modalImg.style.transform = `scale(${zoomLevel})`;
});
