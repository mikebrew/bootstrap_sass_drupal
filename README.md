<!-- @file Instructions for subtheming using the Bootstrap Sass Starterkit. -->
<!-- @defgroup subtheme_sass -->
<!-- @ingroup subtheme -->

# Bootstrap SASS

Below are instructions on how to create a Bootstrap sub-theme using a SASS
preprocessor.

- [Requirements](#requirements)
- [Install](#install)
- [Setup](#setup)
- [Theming/Editing](#theming)
- [Compiling - Using NPM, Grunt or Gulp](#compiling)

## Requirements {#requirements}

This starter theme assumes that you have:

- Drupal Bootstrap Theme
- NodeJS (Version v4.2.x or newer recommended with NPM 3.x)
- Grunt or Gulp installed globally with the -g option
- For Drupal 7 - jQuery 1.9.1 or higher (Use jQuery_Update module for Drupal)

## Install {#install}

Download this project into your sites/all/themes folder of your Drupal
installation.


## Setup {#setup}
1. Enable the Starterkit and Set it to the default theme in Drupal.

2. In your new subtheme directory run the following to install the needed nodejs modules:

`npm install`

4. In your new subtheme directory run the following to copy over the default Bootstrap variables.

`cat node_modules/bootstrap-sass/assets/stylesheets/bootstrap/_variables.scss >> sass/base/_variable-overrides.scss`

*If your on a Windows OS just use your favorite editor to copy the _variables.scss to the bottom of the _variable-overrides.scss file.

## Theming/Editing {#theming}

- Start by reviewing the variables file in sass/_variables-overrides.scss file. You can customize most variables here to match your website design.

- SASS code for other theme customization you need to make can go in files in the sass/ folder

## Compiling The SASS Code {#compiling}

Option 1 - With Grunt

- Run the following commands in the root of your subtheme to compile the Bootstrap SASS code to CSS:

`grunt init` (Creates the initial css file)
`grunt watch` (Watches the sass folder for changes)

Adding Browsersync to workflow
- Install the Drupal browsersync module from https://www.drupal.org/project/browsersync
- In "Themes" -> "Appearance" -> "Settings" scroll down and enable browsersync for the Bootstrap Sass Starterkit Theme.
- Edit the proxy address in the gruntfile.js file to match the IP or hostname of your Drupal website.
- Run `grunt browsersync` (Watches the sass folder, and sets up a browsersync session.)


Option 2 - With Gulp

- Run the following commands in the root of your subtheme to compile the Bootstrap SASS code to CSS:

`gulp init` (Creates the initial css file)
`gulp watch` (Watches the sass folder for changes)

Adding Browsersync to workflow

- Install the Drupal browsersync module from https://www.drupal.org/project/browsersync
- In "Themes" -> "Appearance" -> "Settings" scroll down and enable browsersync for the Bootstrap Sass Starterkit Theme.
- Edit the proxy address in the gulpfile.js file to match the IP or hostname of your Drupal website.
- Run `gulp browsersync` (Watches the sass folder, and sets up a browsersync session.)


[Bootstrap Framework]: http://getbootstrap.com
[Bootstrap Framework Source Files]: https://github.com/twbs/bootstrap/releases
[SASS]: http://sass-lang.com/
