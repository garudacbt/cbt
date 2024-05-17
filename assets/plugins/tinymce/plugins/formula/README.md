#tinyMCE formula plugin

Formula plugin for tinyMCE WYSIWYG editor. Allows user to add equations and formulas inside tinymce.

##Browser compatibility

* IE8+
* Chrome
* Firefox
* Safari
* Opera

##Dependencies

* [tinyMCE](http://www.tinymce.com/)

##Usage

Install using bower.

```
bower install tinymce-formula
```

Install using npm.

```
npm install tinymce-formula
```

Or copy the source of the plugin to the plugins directory of your tinyMCE installation.
Add the formula plugin to your tinyMCE configuration

```javascript
plugins: "... formula",
```

Add configuration options for the formula plugin. `path` is the only setting and is optional.

```javascript
formula: {
    path: 'path/to/public/plugin/folder'
},
```

##Configuration

###path (optional if plugin installed inside `tinymce/plugins` folder, required otherwise)

If you have installed the plugin in a different folder than the ```tinymce/plugins``` folder then you need to specify 
the path (public) where the plugin is installed.

##License

MIT licensed

Copyright (C) 2016 iCAP Lyon1, Panagiotis Tsavdaris