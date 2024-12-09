import LazyLoad from 'vanilla-lazyload';
import polyfill from "./polyfill";
import 'star-rating-svg/src/jquery.star-rating-svg.js';
import 'flatpickr/dist/flatpickr';

let main = {

    load() {
        $(document).ready(function () {

            flatpickr(".dates", {
                enableTime: true, dateFormat: "d-m-Y",
            });

            $(".grid-references--metro div img").each(function (i, el) {
                this.height = Math.min(this.height, 1 + Math.floor(Math.random() * this.height * 2));
                this.width = Math.min(this.height, 1 + Math.floor(Math.random() * this.width * 2))
            });

            // Search widget
            $('.SiteHeader-popupSearch a').on('click', function () {
                $('.SearchContentModal').addClass('active');
                $('#s').focus();
            });
            $('.SearchContentModal-close').on('click', function () {
                $('.SearchContentModal').removeClass('active');
            });

            $('.js-btn-modal').on('click', function () {
                var id = $(this).data('id');
                $('body').addClass('modal-active');
                $('.js-modal[data-id="modal' + id + '"]').addClass('active').fadeIn();
            });

            $('.js-close-btn').on('click', function () {
                $('body').removeClass('modal-active');
                $('.js-modal').removeClass('active').fadeOut();
            });

            $(document).on('click', function (e) {
                if ($(e.target).closest('.modal-inner').length === 0 && $(e.target).closest('.js-btn-modal').length === 0) {
                    $('body').removeClass('modal-active');
                    $('.js-modal').removeClass('active').fadeOut();
                }
            });

            // Cursor changer on slider
            // Fonction de throttle
            const throttle = (func, limit) => {
                let inThrottle;
                return function () {
                    const args = arguments;
                    const context = this;
                    if (!inThrottle) {
                        func.apply(context, args);
                        inThrottle = true;
                        setTimeout(() => inThrottle = false, limit);
                    }
                }
            };

            const customCursor = document.querySelector('.custom-cursor');
            const sliderSections = document.querySelectorAll('.flickity-slider');

            let isDragging = false;

            sliderSections.forEach(sliderSection => {
                // Fonction pour mettre à jour la position du curseur
                const updateCursor = (e) => {
                    const clickableElement = e.target.closest('a'); // Vérifie s'il s'agit d'un lien
                    if (!isDragging && !clickableElement) {
                        const x = e.pageX;
                        const y = e.pageY;
                        customCursor.style.left = `${x}px`;
                        customCursor.style.top = `${y}px`;
                        customCursor.classList.add('show'); // Montre le curseur si pas de lien cliquable
                    } else {
                        customCursor.classList.remove('show'); // Cache le curseur sur les éléments cliquables
                    }
                };

                // Ajout de l'événement mousemove avec throttle
                sliderSection.addEventListener('mousemove', throttle(updateCursor, 50)); // Limite à 20 fois par seconde

                sliderSection.addEventListener('mouseleave', () => {
                    customCursor.classList.remove('show'); // Cache le curseur à la sortie
                });

                // Détecter le début du glissement
                sliderSection.addEventListener('mousedown', () => {
                    isDragging = true;
                    customCursor.classList.remove('show'); // Masque le curseur pendant le glissement
                });

                // Détecter la fin du glissement
                sliderSection.addEventListener('mouseup', () => {
                    isDragging = false;
                });

                // Détecter la fin du glissement si la souris quitte le slider
                sliderSection.addEventListener('mouseleave', () => {
                    isDragging = false;
                });
            });

            main.loaded();
        });
    },

    loaded() {
        // Load all necessary polyfill
        polyfill.load();

        // Page Popups
        let $popup = $('#popup');
        $(document).on('click', '.open-popup', function (e) {
            e.preventDefault();
            e.stopPropagation();

            $.ajax({
                method: "POST", url: wp_data.ajax_url, data: {
                    method: "POST", action: 'post_content', ID: $(this).data('post-id'), security: wp_data.security
                }
            })
                .done(function (response) {
                    $popup.addClass('open');
                    $('html').addClass('no-scroll');
                    $popup.find('.popup-content').html(response);
                    //close popup
                    $('.close-button').on('click', function () {
                        if ($('#popup').hasClass('open')) {
                            $('#popup').removeClass('open');
                            $('html').removeClass('no-scroll');
                        }
                    });
                })
                .fail(function () {
                    console.error("Error getting post content");
                });
        });

        // Lazy Loading des images
        if ($('.lazy').length) {
            new LazyLoad();
        }
    },
};

export default main;