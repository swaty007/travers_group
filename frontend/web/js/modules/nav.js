class Nav {
    constructor() {
        this.events()
    }

    events() {
        this.init()
    }

    init() {
        this.smoothscroll()
        $(document).on("scroll", this.onScroll)
    }

    onScroll(event) {
        let scrollPos = $(document).scrollTop();
        $('a.nav-link[href^="#"]').each(function () {
            let href = $(this).attr("href");
            let currLink = $(`a.nav-link[href="${href}"]`);
            let refElement = $(href);
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('a.nav-link[href^="#"]').removeClass("active");
                currLink.addClass("active");
            } else {
                currLink.removeClass("active");
            }
        });
    }

    smoothscroll() {
        $('a[href^="#"]').on('click', (e) => {
            e.preventDefault();
            $(document).off("scroll");
            let _this = $(e.currentTarget)

            $('a').each(function () {
                $(this).removeClass('active');
            })
            _this.addClass('active');

            let target = e.currentTarget.hash,
                menu = target,
                $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top + 2
            }, 500, 'swing', () => {
                window.location.hash = target;
                $(document).on("scroll", this.onScroll);
            });
        });
    }
}

export default Nav
