import $ from "jquery";

let accordions = {
    load() {

        document.addEventListener('DOMContentLoaded', function () {
            const accordionBlocks = document.querySelectorAll('.AccordionBlock-accordion');

            accordionBlocks.forEach((accordion, index) => {
                const header = accordion.querySelector('.AccordionBlock-title button');
                const content = accordion.querySelector('.AccordionBlock-content');

                // Générer un ID unique pour le contenu
                const contentId = `accordion-content-${index}`;
                content.id = contentId;

                // Configurer ARIA sur les boutons
                header.setAttribute('aria-controls', contentId);
                header.setAttribute('aria-expanded', 'false'); // Fermé par défaut

                // Configurer ARIA sur les contenus
                content.setAttribute('role', 'region');
                content.setAttribute('aria-hidden', 'true'); // Caché par défaut
                content.hidden = true; // Masquer visuellement le contenu

                // Ajouter les événements
                header.addEventListener('click', function () {
                    toggleAccordion(header, content);
                });

                // Les boutons gèrent déjà la navigation clavier, aucun besoin d'ajouter un événement `keydown`
            });

            function toggleAccordion(header, content) {
                const isExpanded = header.getAttribute('aria-expanded') === 'true';

                // Fermer tous les autres accordéons si nécessaire
                document.querySelectorAll('.AccordionBlock-accordion .AccordionBlock-title button').forEach((otherHeader) => {
                    const otherContent = document.getElementById(otherHeader.getAttribute('aria-controls'));
                    if (otherHeader !== header) {
                        otherHeader.setAttribute('aria-expanded', 'false');
                        otherContent.setAttribute('aria-hidden', 'true');
                        otherContent.hidden = true; // Masquer le contenu
                    }
                });

                // Basculer l'état de cet accordéon
                if (!isExpanded) {
                    header.setAttribute('aria-expanded', 'true');
                    content.setAttribute('aria-hidden', 'false');
                    content.hidden = false; // Afficher le contenu
                } else {
                    header.setAttribute('aria-expanded', 'false');
                    content.setAttribute('aria-hidden', 'true');
                    content.hidden = true; // Masquer le contenu
                }
            }
        });


    },

};

export default accordions;