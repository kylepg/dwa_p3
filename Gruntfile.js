module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    //
    //─── WATCH ──────────────────────────────────────────────────────
    // Defines tasks to be run when files are changed.

    watch: {
      css: {
        files: ['resources/assets/scss/*.scss', 'resources/assets/scss/mixins/*.scss'],
        tasks: ['sass', 'notify:done'],
      },
      js: {
        files: ['resources/assets/js/*.js'],
        tasks: ['newer:babel', 'notify:done'],
      },
    },

    //
    //─── SASS ───────────────────────────────────────────────────────
    // Compiles and minifies SCSS files. Also generates a sourcemap.

    sass: {
      min: {
        options: {
          gruntLogHeader: false,
          sourcemap: 'none',
          style: 'compressed',
        },
        files: {
          'public/css/p3.min.css': 'resources/assets/scss/main.scss',
        },
      },
    },

    //
    //─── BABEL ──────────────────────────────────────────────────
    // Compile ES6+ to ES5

    babel: {
      options: {
        sourceMap: 'inline',
        presets: ['env'],
        minified: true,
      },
      dist: {
        files: {
          'public/js/p3.min.js': 'resources/assets/js/main.js',
        },
      },
    },

    //
    //─── NOTIFY ───────────────────────────────────────────
    // Notifies you when all tasks have completed.

    notify: {
      done: {
        options: {
          gruntLogHeader: false,
          title: 'GRUNT - dwa_p2',
          message: 'Build complete ✅',
        },
      },
    },
  });

  //
  //─── LOAD TASKS ────────────────────────────────────────────────────────────────────
  // Load grunt tasks from node_modules.

  require('grunt-log-headers')(grunt); //OPTIONAL: Hides grunt task from logging in terminal.
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-notify');
  grunt.loadNpmTasks('grunt-newer');
  grunt.loadNpmTasks('grunt-babel');
  grunt.registerTask('default', ['watch']);
};
