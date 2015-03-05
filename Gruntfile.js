module.exports = function (grunt) {
    'use strict';

    // Project configuration.
    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        /**
         * Project Paths Configuration
         * ===============================*/
         
        paths: {
            //enter here yout production domain
            distDomain: 'http://midlandsmarqueehire.com',
            //live folder location
            livefolder: 'midlandsmarqueehire.com',
            //images folder name
            images: 'img',
            //where to store built files
            dist: 'dist',
            //sources
            src: 'app',
            //main email file
            email: 'index.html',
            //this is the default development domain
            devDomain: 'http://<%= connect.options.hostname %>:<%= connect.options.port %>/',
        },

        /**
         * SCSS Compilation Tasks
         * ===============================
         */
        compass: {
            options: {
                sassDir: '<%= paths.src %>/assets/scss',
                outputStyle: 'compressed',
                httpImagesPath: 'assets/img'
            },
            serve: {
                options: {
                    cssDir: '<%= paths.src %>/assets/css',
                    imagesDir: '<%= paths.src %>/assets/<%= paths.images %>',
                    noLineComments: false
                }
            },
            dist: {
                options: {
                    cssDir: '<%= paths.src %>/assets/css',
                    imagesDir: '<%= paths.src %>/assets/<%= paths.images %>',
                    noLineComments: false
                }
            } 
        },
        connect: {
            options: {
                open: '<%= paths.devDomain %>',
                hostname: 'localhost',
                port: 8000,
                livereload: 35729
            },
            serve: {
                options: {
                    base: '<%= paths.src %>'
                }
            },
            dist: {
                options: {
                    base: '<%= paths.dist %>',
                    keepalive: true,
                    livereload: false
                }
            }
        },
        /**
         * Watch Task
         * ===============================
         */
        watch: {
            compass: {
                files: ['<%= paths.src %>/assets/scss/**/*.scss'],
                tasks: ['compass:serve']
            },
            livereload: {
                options: {
                    livereload:12345,
                },
                files: [
                    '<%= paths.src %>/*.php',
                    '<%= paths.src %>/template/*.php',
                    '<%= paths.src %>/admin-3/*.php',
                    '<%= paths.src %>/assets/css/*.css',
                    '<%= paths.src %>/assets/img/{,*/}*.{png,jpg,jpeg,gif}'
                ]
            }
        },

      
        /**
         * Cleanup Tasks
         * ===============================
         */
        clean: {
            options: {force: true },
            dist: ['dist'],
        },
        copy: {
           release: {
                files: [
                    {
                        expand: true,
                        cwd: '<%= paths.src %>',
                        src: ['*.php','blog/**', 'admin/**', 'assets/css/**','assets/downloads/**','assets/fonts/**','assets/img/**','assets/modal/**','template/**','subs/**','admin-3/**','auth/**','script/**','*.xml','*.txt','.htaccess','admin-3/.htpasswd','admin-3/.htaccess'  ],
                        dest: '<%= paths.dist %>',
                        
                    }
                ]
            }
        },

        /**
         * Images Optimization Tasks
         * ===============================
         */
        imagemin: {
            dist: {
                files: [{
                    expand: true,
                    cwd: '<%= paths.dist %>/assets/<%= paths.images %>',
                    src: '{,*/}*.{png,jpg,jpeg,gif}',
                    dest: '<%= paths.dist %>/assets/<%= paths.images %>'
                }]
            }
        },



      useminPrepare: {
          html: '<%= paths.dist %>/template/scripts.php',
          options: {
            dest: '<%= paths.dist %>',
            flow: {
              html: {
                steps: {
                  js: ['concat']
                },
                post: {}
              }
            }
          }
      },
      concat: {
          options: {
            separator: ';',
          },
          dist: {
             files:  [{              
                    dest: '.sass-cache/final.js',  
                    src: [
                    'app/assets/js/main/jquery.js', 
                    'app/assets/js/main/bootstrap.min.js',
                    'app/assets/js/main/contact_me.js', 
                    'app/assets/js/main/bootstrapValidator.js',
                    'app/assets/js/main/jqBootstrapValidation.js', 
                    'app/assets/js/main/jquery-price-calculator-pro.min.js',
                    'app/assets/js/main/pricetable-new.js', 
                    'app/assets/js/main/bootstrap-datepicker.js',
                    'app/assets/js/main/theme.js', 
                    'app/assets/js/main/*.js',
                    ],    
                }]
          },
          admin: {
             files:  [{              
                    dest: 'dist/assets/js/final-admin.js',  
                    src: [
                    'app/assets/js/admin/jquery.1.7.1.min.js',
                    'app/assets/js/admin/jquery-ui.1.8.16.min.js',
                    'app/assets/js/admin/bootstrap.min.js',
                    'app/assets/js/admin/*.js',
                    ],    
                }]
          },
      },
      jshint: {
          all: ['Gruntfile.js', 'app/assets/js/main/parallax.min.js']
      },
      uglify: {
          generated: {
            files:  [{       
                  src: ['.sass-cache/final.js'],
                  dest: 'dist/assets/js/final.js'
            }]
          }
         },
        
      filerev: {
           options: {
               algorithm: 'sha1',
               length: 3
           },
           images: {
               src:  ['<%= paths.dist %>/assets/**/*.*','!<%= paths.dist %>/assets/modal/*.*', '!<%= paths.dist %>/assets/img/emailimages/**' ],
           }
       },
       usemin: {
           html: ['<%= paths.dist %>/*.*','<%= paths.dist %>/assets/js/final.js','<%= paths.dist %>/assets/modal/*.*','<%= paths.dist %>/template/*.*','<%= paths.dist %>/subs/**/*.*', '<%= paths.dist %>/blog/wp-content/themes/wordpress-bootstrap-master/*.php','<%= paths.dist %>/admin/email/*.php','<%= paths.dist %>/admin/pdf/*.php' ],
           css: ['<%= paths.dist %>/assets/css/*.css'],
               options: {
                   assetsDirs: ['./<%= paths.dist %>/','./<%= paths.dist %>/assets/**/*.*'],
           }
       },


        'ftp-deploy': {
            build: {
                auth: {
                  host: '23.229.192.72',
                  port: 21,
                  authKey: 'key1'          
                },
            src: '<%= paths.dist %>',
            dest: '<%= paths.livefolder %>',
            exclusions: ['<%= paths.dist %>/**/.DS_Store', '<%= paths.dist %>/**/Thumbs.db', '<%= paths.dist %>/tmp', '<%= paths.dist %>/admin/customer-estimates/*.*', '<%= paths.dist %>/admin/customer-invoices/*.*']
            }
        },
        uncss: {
            options: {
                ignore: ['navbar-collapse', 'collapse', 'in']
            },
            dist: {
               src: ['http://mmh.localhost.dist','http://mmh.localhost.dist/weddings','http://mmh.localhost.dist/business','http://mmh.localhost.dist/estimate','http://mmh.localhost.dist/party','http://mmh.localhost.dist/thank-you','http://mmh.localhost.dist/404','http://mmh.localhost.dist/priceguarantee','http://mmh.localhost.dist/FAQ','http://mmh.localhost.dist/contact','http://mmh.localhost.dist/gallery'],
               dest: 'dist/assets/css/theme.css',
            }
        },

        htmlmin: {                                    
            dist: {                                   
              options: {                              
                removeComments: true,
                collapseWhitespace: true
              },
              files:  [{
                    expand: true,               
                    src: ['dist/*.php','dist/template/*.php','dist/subs/**/*.php'],    
                }]
            }
        }
       
          


        });

    [
        'grunt-contrib-connect',
        'grunt-contrib-watch',
        'grunt-contrib-copy',
        'grunt-contrib-compass',
        'grunt-contrib-imagemin',
        'grunt-contrib-clean',
        'grunt-contrib-htmlmin',
        'grunt-contrib-jshint',
        'grunt-contrib-uglify',
        'grunt-contrib-concat',
        'grunt-usemin',
        'grunt-filerev',
        'grunt-ftp-deploy',
        'grunt-uncss'
    ].forEach(grunt.loadNpmTasks);

    grunt.registerTask('default', 'serve');

    grunt.registerTask('serve', [
        'compass:serve',
        'connect:serve',
        'watch'
    ]);

    grunt.registerTask('build', [
        'clean',
        'compass:dist',
        'copy',
        'imagemin',
        //'uncss',
        'useminPrepare',
        //'jshint',
        'concat',
        'uglify',
        'filerev',
        'usemin',
        'htmlmin'
    
    ]);

    grunt.registerTask('upload', [
       'ftp-deploy'
   ]);
    


};




// Added a comment to test branching

// hell why not crazy with these comments
//and again