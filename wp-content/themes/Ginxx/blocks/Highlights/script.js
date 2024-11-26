import $ from 'jquery';

let gk_highlights = {
    load() {
        $(function () {
            var winHeight = $(window).height(),
                eleOffsetTop = $(".HighLights-count").offset().top,
                eleTop = eleOffsetTop - winHeight,
                current = 0;

            $(window).on("scroll", function () {
                var scrollTop = $(window).scrollTop();

                if (current == 0 && scrollTop >= eleTop) {

                    $('.HighLights-count div').each(function () {
                        var $this = $(this),
                            countTo = $this.attr('data-count');

                        $({countNum: $this.text()}).animate({
                                countNum: countTo
                            },

                            {
                                duration: 2000,
                                easing: 'linear',
                                step: function () {
                                    $this.text(Math.floor(this.countNum));
                                },
                                complete: function () {
                                    $this.text(this.countNum);
                                }
                            });
                    });
                }
            });
        });
    }
}

export default gk_highlights;