import 'star-rating-svg/src/jquery.star-rating-svg.js';

let gk_testimonies = {

    load() {
        $(".rated-notation").starRating({
            totalStars: 5,
            starShape: 'rounded',
            starSize: 15,
            emptyColor: 'lightgrey',
            hoverColor: '#ffc107',
            activeColor: '#ffc107',
            useGradient: false,
            readOnly: true
        });
    }
}
export default gk_testimonies;