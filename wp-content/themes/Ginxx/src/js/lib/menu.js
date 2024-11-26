let menu = {
    load() {
        document.addEventListener('DOMContentLoaded', function () {
            const menuItems = document.querySelectorAll('nav ul > li > a[aria-haspopup="true"]');

            menuItems.forEach(item => {
                item.addEventListener('click', function (event) {
                    event.preventDefault();
                    const isExpanded = item.getAttribute('aria-expanded') === 'true';
                    item.setAttribute('aria-expanded', !isExpanded);

                    const subMenu = item.nextElementSibling;
                    if (subMenu) {
                        if (isExpanded) {
                            subMenu.style.display = 'none';
                        } else {
                            subMenu.style.display = 'block';
                        }
                    }
                });
            });
        });

        const menuItems = document.querySelectorAll('nav ul > li > a[aria-haspopup="true"]');
        menuItems.forEach(item => {
            item.addEventListener('click', function (event) {
                event.preventDefault();
            });
        });

        const isExpanded = item.getAttribute('aria-expanded') === 'true';
        item.setAttribute('aria-expanded', !isExpanded);

        const subMenu = item.nextElementSibling;
        if (subMenu) {
            if (isExpanded) {
                subMenu.style.display = 'none';
            } else {
                subMenu.style.display = 'block';
            }
        }
    },
};

export default menu;

