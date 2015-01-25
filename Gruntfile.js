module.exports = function(grunt) { 

	grunt.initConfig({
        less: {
            development: {
                options: {
                  compress: true,  //minifying the result
                },
                files: {               
                  //compiling backend css
                  "./public/css/main.css":"./public/css/less/main.less"
                }
            }
        },
        concat: {
          options: {
            separator: ';',
            stripBanners: {
              block: true,
              line: true
            }
          },
          app: {
            src: ['./public/js/app/app.js', './public/js/app/controllers.js', './public/js/app/directives.js', './public/js/app/services.js'],
            dest: './public/js/main.js',
          },
          lib: {
            src: [
              './public/js/lib/jquery/dist/jquery.js', 
              './public/js/lib/angular/angular.js', 
              './public/js/lib/angular-ui/build/angular-ui.js'
            ],
            dest: './public/js/lib.js',
          },
        },
        uglify: {
          options: {

          },
          lib: {
            files: {
              './public/js/lib.js': ['./public/js/lib.js']
            }
          }
        },
        watch: {
          less: {
            files: ['./public/css/less/*.less'],  //watched files
            tasks: ['less'],                          //tasks to run
            options: {
              livereload: true                        //reloads the browser
            }
          },
          concat: {
            files: ['./public/js/app/*.js'],  //watched files
            tasks: ['concat:app'],                          //tasks to run
            options: {
              livereload: true                        //reloads the browser
            }
          },          
        }
    });

	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
 
	grunt.registerTask('default', ['concat:lib', /*'uglify:lib', */ 'watch']);

};