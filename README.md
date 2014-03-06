# Carrington Blueprint

This is a WordPress theme boilerplate intended to be your starting point for creating a responsive theme using Carrington Core.

Carrington Blueprint uses several technologies to help you create new themes quickly. It leverages [Crowd Favorite](http://crowdfavorite.com)'s Sassified and responsive 12-column [CSSGrid](https://github.com/crowdfavorite/css-grid) and the powerful [Carrington Core](https://github.com/crowdfavorite/wp-carrington-core) template engine. You can find relevant documentation for Carrington Core in a README located in each directory.

---

### Installation

Simply navigate to the `wp-content/themes` directory and clone this project into that directory. Remember to update the submodules before activating the theme.

---

### Editing

This theme uses [node.js](http://http://nodejs.org/) for asset pipelining, including [Sass](http://sass-lang.com) for CSS pre-processing. Once node.js is installed, run `npm install` to install the node modules, then `npm run-script watch` from this directory to process the Sass/CSS and JavaScript files. This includes the following:

- Any saved changes to a Sass file will be compiled into CSS, which is then checked for unprefixed or unecessarily-prefixed CSS3 selectors
- JavaScript files are checked for errors whenever saved
- Any changes styles or scripts will trigger a style reload without a page refresh
	- Note: LiveReload requires a [browser-specific extension](http://feedback.livereload.com/knowledgebase/articles/86242-how-do-i-install-and-use-the-browser-extensions-)

---

### Deployment

When the theme is ready to be deployed, run `npm run-script build` to prepare the assets for deployment to a production environment. This will perform the following:

- Image compression via ImageOptim
- Removal of `console` statements within JavaScript
- JavaScript minifying and concatenation
- CSS minifying and concatenation

The `CFCT_DEV_MODE` constant found in `functions.php` will need to be set to `false` in order to enqueue production-ready assets, which are compiled to `assets/build/`.

---

**Target browser compatibility:**
- Chrome
- Safari
- Firefox
- IE9+

License: [GPL](http://www.opensource.org/licenses/gpl-license.php)

Developers, contribute on [GitHub](https://github.com/crowdfavorite/wp-carrington-blueprint)
