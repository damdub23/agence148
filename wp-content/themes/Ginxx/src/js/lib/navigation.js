let navigation = {

    load() {

        document.addEventListener('DOMContentLoaded', function () {
            const menuItems = document.querySelectorAll('.menu-item-has-children');

            menuItems.forEach(item => {
                item.addEventListener('click', function (e) {

                    // Fermer tous les sous-menus sauf celui qui a été cliqué
                    menuItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.querySelector('.submenu').classList.remove('active');
                        }
                    });

                    // Toggle la classe active pour le sous-menu du clic
                    item.querySelector('.submenu').classList.toggle('active');
                });
            });

            // Fonction pour ajouter ou supprimer une classe en fonction de la largeur du navigateur
            function updateClass() {
                const menu = document.querySelector('.MenuTop');
                const windowWidth = window.innerWidth;

                if (windowWidth < 1024) {
                    // Ajouter la classe "mobile" si la largeur est inférieure à 1024px
                    menu.classList.add('-mobileVersion');
                } else {
                    // Supprimer la classe "mobile" si la largeur est supérieure ou égale à 1024px
                    menu.classList.remove('-mobileVersion');
                }
            }

            // Appeler la fonction au chargement de la page
            updateClass();

            // Mettre à jour la classe lorsque la fenêtre est redimensionnée
            window.addEventListener('resize', function () {
                updateClass();
            });
        });

        //Gestion du header au scroll + animation du menu burger

        document.addEventListener('DOMContentLoaded', () => {
            const burger = document.querySelector('.SiteHeader-burger');
            const menuTop = document.querySelector('.MenuTop');
            const menuItems = document.querySelectorAll('.menu-item-has-children > a');
            const header = document.querySelector('.SiteHeader');

            let lastScrollTop = 0;

            // Gestion du clic sur le burger
            burger.addEventListener('click', () => {
                burger.classList.toggle('animate');
                menuTop.classList.toggle('animate');
            });

            // Empêche le comportement par défaut sur les liens ayant des sous-menus
            menuItems.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                });
            });

            // Gestion de l'événement de scroll
            window.addEventListener('scroll', () => {
                const isMenuOpen = burger.classList.contains('animate'); // Vérification si le menu est ouvert

                // Si le menu est ouvert, on ne fait pas défiler le header
                if (isMenuOpen) {
                    return;
                }

                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                // Logique pour masquer ou afficher le header
                if (scrollTop > lastScrollTop) {
                    // Scroll vers le bas : Masque le header
                    header.style.top = '-280px'; // Ajustez selon la hauteur du header
                } else {
                    // Scroll vers le haut : Affiche le header
                    header.style.top = '0';
                }

                lastScrollTop = scrollTop; // Mise à jour de la position précédente
            });
        });


    },
};

export default navigation;