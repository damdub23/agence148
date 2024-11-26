import $ from 'jquery';
import 'jquery-ui';
import 'jquery-ui/ui/widgets/tabs';

let gk_accordions = {

    load() {
        $(".TabsBlock").tabs();

        $(document).ready(function(){
            // Initialiser un compteur pour générer des IDs uniques
            $(".AccordionBlock").each(function(index) {
                $(this).find(".AccordionBlock-title").each(function(i) {
                    // Générer un ID unique pour aria-controls
                    var contentId = 'accordion-content-' + index + '-' + i;

                    // Assigner cet ID au bouton et au contenu correspondant
                    $(this).attr('aria-controls', contentId);
                    $(this).next().attr('id', contentId);
                });
            });

            // Gestion des clics pour basculer aria-expanded et le contenu
            $(".AccordionBlock").on("click", ".AccordionBlock-title", function() {
                // Retirer la classe active et mettre aria-expanded à false pour les autres
                $(".AccordionBlock-title").not(this)
                    .removeClass("active")
                    .attr("aria-expanded", "false");

                // Fermer les autres contenus
                $(".AccordionBlock-content").not($(this).next()).slideUp(300).attr("hidden", true);

                // Basculer la classe active et aria-expanded sur l'élément cliqué
                $(this).toggleClass("active");

                var isExpanded = $(this).attr("aria-expanded") === "true";
                $(this).attr("aria-expanded", !isExpanded);

                // Afficher ou masquer le contenu associé
                $(this).next().slideToggle().attr("hidden", isExpanded);
            });
        });

    }
}
export default gk_accordions;