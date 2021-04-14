import SummernoteGallery from './SummernoteGallery'

export default class GalleryPlugin {
    constructor(options) {
        this.options = options;
    }

    getPlugin() {
        var plugin = {};
        var _this = this;

        plugin[this.options.name] = function(context) {
            var summernote_gallery = new SummernoteGallery(_this.options);

            // add gallery button
            context.memo('button.' + summernote_gallery.options.name, summernote_gallery.createButton());

            this.events = {
                'summernote.keyup': function(we, e)
                {
                    summernote_gallery.saveLastFocusedElement();
                }
            };

            this.initialize = function() {
                summernote_gallery.initGallery(context);
            };
        }

        return plugin;
    }
}