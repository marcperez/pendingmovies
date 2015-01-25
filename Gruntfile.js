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
        watch: {
            less: {
              files: ['./public/css/less/*.less'],  //watched files
              tasks: ['less'],                          //tasks to run
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
 
	grunt.registerTask('default', ['watch']);

};