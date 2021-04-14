# summernote-audio
[Summernote](https://summernote.org/) plugin to insert audio by URL or file upload. Based on the ImageDialog and VideoDialog already provided by Summernote.

## Installation

Include the plugin script after including Summernote:

```html
<!-- include jquery, bootstrap, summernote here -->

<link rel="stylesheet" href="summernote-audio.css">
<script type="text/javascript" src="summernote-audio.js"></script>
```

## Configuration

Add the audio button to the Summernote toolbar:

````javascript
$('.summernote').summernote({
    toolbar:[
        ['insert', ['link', 'picture', 'video', 'audio']],
    ],
});
````

## Translations

Currently supports the following languages:
* English
* Dutch
