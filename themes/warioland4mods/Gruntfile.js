module.exports = function (grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				files: {
					'css/style.css': 'scss/style.scss'
				}
			}
		},
		cssmin: {
			target: {
				src: ["css/style.css"],
				dest: "style.css"
			}
		},
		concat: {
			options: {
				separator: ';'
			},
			dist: {
				src: ['js/**/*.js'],
				dest: 'dist/<%= pkg.name %>.js'
			}
		},
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
			},
			all: {
				files: [{
					expand: true,
					cwd: 'dist/',
					src: ['*.js', '!*.min.js'],
					dest: 'dist/',
					ext: '.min.js'
				}]
			}
		},
		watch: {
			stylesheets: {
				files: ['scss/**/*.scss'],
				tasks: ['sass', 'cssmin']
			},
			scripts: {
				files: ['js/**/*.js'],
				tasks: ['uglify', 'concat'],
				options: {
					atBegin: true
				}
			}
		},
	});

	// Load the plugin that provides the "uglify" task.

	grunt.loadNpmTasks('grunt-contrib-uglify-es');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-concat');

	// Default task(s).
	grunt.registerTask("default", ["cssmin", "watch", "uglify", "concat"]);
};