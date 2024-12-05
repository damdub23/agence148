/* Main stylesheets, do not remove */
import "../scss/app.scss";
import "../admin/scss/admin.scss";

/* Your own modules go here */
import options from './lib/options';
import main from './lib/main';
import navigation from './lib/navigation';
import cookies from './lib/cookies';
import contact from './lib/contact';
import accordions from './lib/accordions';
import forms from "./lib/forms";
import blocks from "./lib/blocks";
import show from "./lib/show-on-scroll";
import menu from "./lib/menu";

const initJs = () => {
    if (wp_data.options.ga_enabled || wp_data.options.cookies_banner_enabled) {
        cookies.load();
    }
    options.load();
    navigation.load();
    main.load();
    forms.load();
    contact.load();
    accordions.load();
    blocks.load();
    show.load();
    menu.load();
}

initJs();