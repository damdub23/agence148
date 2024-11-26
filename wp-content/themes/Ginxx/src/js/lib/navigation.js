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

        $(document).ready(function () {
            $(".SiteHeader-burger").click(function () {
                $(this).toggleClass("animate");
                $(".MenuTop").toggleClass("animate");
            });

            $('.menu-item-has-children').find('> a').click(function (e) {
                e.preventDefault();
            });

            // window.addEventListener("scroll", function () {
            //     let header = document.querySelector(".SiteHeader");
            //     header.classList.toggle('sticky', window.scrollY > 0);
            // });

            // Shrinking Title Bar
            // $(window).on('scroll resize load', function () {
            //     if ($(this).scrollTop() > $('.SiteHeader').outerHeight()) {
            //         $('.SiteHeader').addClass('shrink');
            //     } else {
            //         $('.SiteHeader').removeClass('shrink');
            //     }
            // });
        });
    },
};

export default navigation;