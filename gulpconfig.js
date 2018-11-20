// ==== CONFIGURATION ==== //

// Project paths
var project     = 'kevinkissi'                 // The directory name for your theme; change this at the very least!
  , src         = './src/'                // The raw material of your theme: custom scripts, SCSS source files, PHP files, images, etc.; do not delete this folder!
  , build       = './build/'              // A temporary directory containing a development version of your theme; delete it anytime
  , dist        = './dist/'+project+'/'   // The distribution package that you'll be uploading to your server; delete it anytime
  , assets      = './assets/'             // A staging area for assets that require processing before landing in the source folder (example: icons before being added to a sprite sheet)
  , bower       = './bower_components/'   // Bower packages
  , composer    = './vendor/'             // Composer packages
  , modules     = './node_modules/'       // npm packages
;

// Project settings
module.exports = {

  browsersync: {
    files: [build+'/**', '!'+build+'/**.map'] // Exclude map files
  , notify: false // In-line notifications (the blocks of text saying whether you are connected to the BrowserSync server or not)
  , open: true // Set to false if you don't like the browser window opening automatically
  , port: 80 // Port number for the live version of the site; default: 3000
  , proxy: 'localhost/wp/' // We need to use a proxy instead of the built-in server because WordPress has to do some server-side rendering for the theme to work. default: 8080
  , watchOptions: {
      debounceDelay: 2000 // This introduces a small delay when watching for file change events to avoid triggering too many reloads
    }
  },

  images: {
    build: { // Copies images from `src` to `build`; does not optimize
      src: src+'**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)'
    , dest: build
    }
  , dist: {
      src: [dist+'**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)', '!'+dist+'screenshot.png'] // The source is actually `dist` since we are minifying images in place
    , imagemin: {
        optimizationLevel: 7
      , progressive: true
      , interlaced: true
      }
    , dest: dist
    }
  },

  livereload: {
    port: 35729 // This is a standard port number that should be recognized by your LiveReload helper; there's probably no need to change it. default: 35729
  },

  scripts: {
    bundles: { // Bundles are defined by a name and an array of chunks (below) to concatenate; warning: this method offers no dependency management!
      core: ['core']
    }
  , chunks: { // Chunks are arrays of paths or globs matching a set of source files; this way you can organize a bunch of scripts that go together into pieces that can then be bundled (above)
      // The core chunk is loaded no matter what; put essential scripts that you want loaded by your theme in here
      core: [
//      -------------------------
//      Common
//      -------------------------
        src+'js/jPushMenu.js',
        src+'js/menu-toggle.js',
        src+'js/navbar.js',
//      -------------------------
//      Front
//      -------------------------  
        src+'js/bootstrap.min.js',  
        src+'js/typed.js',
        src+'js/writer.js', 
        src+'js/EasePack.min.js',
        src+'js/rAF.js',
        src+'js/TweenLite.js',
        src+'js/headerani.js',        
        src+'js/regexbot.js',        
        src+'js/jquery-ui.js',
        src+'js/chatconfig.js', 
//      -------------------------
//      Page-Template:Blog
//      ------------------------- 
//        src+'js/bootstrap.min.js', 
//      -------------------------
//      Page-Template:Portfolio
//      -------------------------
//        src+'js/bootstrap.min.js', 
//      -------------------------
//      Page-Template:Articles
//      ------------------------- 
//        src+'js/selection-sharer.js',
//        src+'js/selectinitial.js',    
//      -------------------------
//      Page-Template: Reading
//      ------------------------- 
//        src+'js/jquery.shuffle.min.js',
//        src+'js/script.js',
//      -------------------------
//      Page-Template: flow
//      -------------------------
//          src+'js/prism.js',
//      -------------------------
//      Single: Articles
//      -------------------------
//        src+'js/selection-sharer.js',
//        src+'js/selectinitial.js',          
//      -------------------------
//      Single: MathFlow or DevFlow
//      -------------------------
//        src+'js/selection-sharer.js',
//        src+'js/selectinitial.js',            
//      -------------------------
//      Single: HealthFlow
//      -------------------------
//        src+'js/selection-sharer.js',
//        src+'js/selectinitial.js',            

      ]
    
    }
  , dest: build+'js/' // Where the scripts end up in your theme
  , lint: {
      src: [src+'js/**/*.js'] // Linting checks the quality of the code; we only lint custom scripts, not those under the various modules, so we're relying on the original authors to ship quality code
    }
  , minify: {
      src: [build+'js/**/*.js', '!'+build+'js/**/*.min.js'] // Avoid recursive min.min.min.js
    , rename: { suffix: '.min' }
    , uglify: {} // Default options
    , dest: build+'js/'
    }
  , namespace: '' // Script filenames will be prefaced with this (optional; leave blank if you have no need for it but be sure to change the corresponding value in `src/inc/assets.php` if you use it)
  },

  styles: {
    build: {
      src: src+'scss/**/*.scss'
    , dest: build
    }
  , dist: {
      src: dist+'**/*.css'
    , dest: dist
    }
  , compiler: 'rubysass' // Choose a Sass compiler: 'libsass' or 'rubysass'
  , autoprefixer: { browsers: ['> 3%', 'last 2 versions', 'ie 9', 'ios 6', 'android 4'] } // This tool is magic and you should use it in all your projects :)
  , minify: { keepSpecialComments: 1, roundingPrecision: 4 } // Keep special comments preserves the bits we need for WordPress to recognize the theme's stylesheet
 
      , rubySass: { // Requires the Ruby implementation of Sass; run `gem install sass` if you use this; Compass is *not* included by default
      loadPath: ['./src/scss', bower, modules] // Adds Bower and npm directories to the load path so you can @import directly
    , precision: 6
    , sourcemap: true
  }
 
      , libsass: { // Requires the libsass implementation of Sass (included in this package)
      includePaths: ['./src/scss', bower, modules] // Adds Bower and npm directories to the load path so you can @import directly
    , precision: 6
    , onError: function(err) {
        return console.log(err);
      }
    }
  },

  theme: {
    lang: {
      src: src+'languages/**/*' // Glob pattern matching any language files you'd like to copy over; we've broken this out in case you want to automate language-related functions
    , dest: build+'languages/'
    }
  , php: {
      src: src+'**/*.php' // This simply copies PHP files over; both this and the previous task could be combined if you like
    , dest: build
    }
  },

  utils: {
    clean: [build+'**/.DS_Store'] // A glob pattern matching junk files to clean out of `build`; feel free to add to this array
  , wipe: [dist] // Clean this out before creating a new distribution copy
  , dist: {
      src: [build+'**/*', '!'+build+'**/*.map']
    , dest: dist
    }
  , normalize: { // Copies `normalize.css` from `node_modules` to `src/scss` and renames it to allow for it to imported as a Sass file
      src: modules+'normalize.css/normalize.css'
    , dest: src+'scss'
    , rename: '_normalize.scss'
    }
  },

  watch: { // What to watch before triggering each specified task; if files matching the patterns below change it will trigger BrowserSync or Livereload
    src: {
      styles:       src+'scss/**/*.scss'
    , scripts:      src+'js/**/*.js' // You might also want to watch certain dependency trees but that's up to you
    , images:       src+'**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)'
    , theme:        src+'**/*.php'
    , livereload:   build+'**/*'
    }
  , watcher: 'browsersync' // Modify this value to easily switch between BrowserSync ('browsersync') and Livereload ('livereload')
  }
}
