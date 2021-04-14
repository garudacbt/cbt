'use strict'
const gulp = require('gulp')
const plugins = require('gulp-load-plugins')()
const path = require('path')
const del = require('del')

const options = {
  build: {
    tasks : ['clean', 'copy:langs', 'copy:mathjax', 'minify:formula', 'minify:plugin', 'minify:styles']
  }
}

const paths = {
  src: {
    styles: ['src/css/*.css'],
    formula: ['src/parameters/*.js', 'src/components/*.js', 'src/lib/*.js'],
    langs: ['src/translations/*.js'],
    mathjax: {
      dir: 'node_modules/mathjax/unpacked',
      files: [
        'MathJax.js',
        'config/TeX-AMS-MML_SVG.js',
        'jax/input/MathML/config.js',
        'jax/input/TeX/config.js',
        'jax/output/SVG/config.js',
        'jax/output/PreviewHTML/*.js',
        'extensions/mml2jax.js',
        'extensions/tex2jax.js',
        'extensions/fast-preview.js',
        'extensions/MathEvents.js',
        'extensions/MathZoom.js',
        'extensions/MathMenu.js',
        'jax/element/mml/jax.js',
        'extensions/toMathML.js',
        'extensions/TeX/*.js',
        'jax/input/MathML/jax.js',
        'jax/input/TeX/jax.js',
        'jax/output/SVG/jax.js',
        'jax/output/SVG/fonts/TeX/*.js',
        'jax/output/SVG/autoload/*.js',
        'extensions/MathML/mml3.js',
        'extensions/AssistiveMML.js',
        'jax/input/MathML/entities/*.js',
        'jax/element/mml/optable/*.js',
        'extensions/MatchWebFonts.js',
        'extensions/HelpDialog.js',
        'jax/output/SVG/fonts/TeX/Main/Regular/*.js',
        'jax/output/SVG/fonts/TeX/AMS/Regular/*.js',
        'jax/output/SVG/fonts/TeX/Typewriter/Regular/*.js',
        'jax/output/SVG/fonts/TeX/Fraktur/Regular/*.js',
        'jax/output/SVG/fonts/TeX/Fraktur/Bold/*.js',
        'jax/output/SVG/fonts/TeX/Math/BoldItalic/Main.js',
        'jax/output/SVG/fonts/TeX/Caligraphic/Regular/Main.js',
        'jax/output/SVG/fonts/TeX/Caligraphic/Bold/Main.js',
        'jax/output/SVG/fonts/TeX/Main/Italic/*.js',
        'jax/output/SVG/fonts/TeX/Main/Bold/*.js',
        'jax/output/SVG/fonts/TeX/Size3/Regular/Main.js',
        'jax/output/SVG/fonts/TeX/Size2/Regular/Main.js',
        'jax/output/SVG/fonts/TeX/Script/Regular/Main.js',
        'jax/output/SVG/fonts/TeX/Script/Regular/BasicLatin.js',
        'jax/output/SVG/fonts/TeX/Size1/Regular/Main.js',
        'jax/output/SVG/fonts/TeX/SansSerif/Italic/*.js',
        'jax/output/SVG/fonts/TeX/SansSerif/Regular/*.js',
        'jax/output/SVG/fonts/TeX/SansSerif/Bold/*.js',
        'jax/output/SVG/fonts/TeX/Size4/Regular/Main.js'
      ]
    }
  },
  dest: {
    styles: 'css',
    formula: 'js',
    langs: 'js/translations',
    mathjax: 'js/mathjax'
  }
}

gulp.task( 'build', function() {
  options.build.tasks.forEach(task => {
    gulp.start(task);
  })
})

gulp.task('clean', function(){
  del.sync([paths.dest.styles, paths.dest.formula])
});

gulp.task('copy:langs', function() {
  return copyAndMinify(paths.src.langs, paths.dest.langs)
})

gulp.task('minify:formula', function() {
  return gulp.src(paths.src.formula)
    .pipe(plugins.concat('formula.js'))
    .pipe(gulp.dest(paths.dest.formula))
    .pipe(plugins.rename('formula.min.js'))
    .pipe(plugins.uglify())
    .pipe(gulp.dest(paths.dest.formula))
})

gulp.task('minify:plugin', function() {
  return gulp.src('plugin.js')
    .pipe(plugins.rename('plugin.min.js'))
    .pipe(plugins.uglify())
    .pipe(gulp.dest('./'))
})

gulp.task('minify:styles', function() {
  return gulp.src(paths.src.styles)
    .pipe(plugins.concat('formula.css'))
    .pipe(gulp.dest(paths.dest.styles))
    .pipe(plugins.rename('formula.min.css'))
    .pipe(plugins.cleanCss())
    .pipe(gulp.dest(paths.dest.styles))
})

gulp.task('copy:mathjax', function() {
  copyAndMinifyTree(paths.src.mathjax.files, paths.src.mathjax.dir, paths.dest.mathjax)
})

let copyAndMinify = function(src, dest) {
  return gulp.src(src)
    .pipe(plugins.uglify())
    .pipe(gulp.dest(dest))
}

let copyAndMinifyTree = function(files, srcFolder, destFolder) {
  for(let filePath of files) {
    copyAndMinify(path.resolve(srcFolder, filePath), path.resolve(destFolder, path.dirname(filePath)))
  }
}

