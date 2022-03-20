(function ($) {

    const contentTypesByFileExtension = {
        '.htm': 'text/html',
        '.html': 'text/html',
        '.txt': 'text/plain; charset=utf-8',
        '.pdf': 'application/pdf',
        '.rtf': 'application/rtf',
        '.doc': 'application/msword',
        '.dot': 'application/msword',
        '.docx': 'application/vnd.openxmlformats-officeDocument.wordprocessingml.document',
        '.dotx': 'application/vnd.openxmlformats-officeDocument.wordprocessingml.template',
        '.xls': 'application/vnd.ms-excel',
        '.xla': 'application/vnd.ms-excel',
        '.xlc': 'application/vnd.ms-excel',
        '.xlm': 'application/vnd.ms-excel',
        '.xlt': 'application/vnd.ms-excel',
        '.xlw': 'application/vnd.ms-excel',
        '.xlsx': 'application/vnd.openxmlformats-officeDocument.spreadsheetml.sheet',
        '.xltx': 'application/vnd.openxmlformats-officeDocument.spreadsheetml.template',
        '.ppt': 'application/vnd.ms-powerpoint',
        '.pps': 'application/vnd.ms-powerpoint',
        '.pot': 'application/vnd.ms-powerpoint',
        '.pptx': 'application/vnd.openxmlformats-officeDocument.presentationml.presentation',
        '.ppsx': 'application/vnd.openxmlformats-officeDocument.presentationml.slideshow',
        '.potx': 'application/vnd.openxmlformats-officeDocument.presentationml.template',
        '.vsd': 'application/vnd.visio',
        '.vss': 'application/vnd.visio',
        '.vst': 'application/vnd.visio',
        '.vsw': 'application/vnd.visio',
        '.vdx': 'application/vnd.ms-visio.viewer',
        '.vsx': 'application/vnd.ms-visio.viewer',
        '.vtx': 'application/vnd.ms-visio.viewer',
        '.vsdx': 'application/vnd.ms-visio.drawing',
        '.vsdm': 'application/vnd.ms-visio.drawing.macroenabled',
        '.vssx': 'application/vnd.ms-visio.stencil',
        '.vssm': 'application/vnd.ms-visio.stencil.macroenabled',
        '.vstx': 'application/vnd.ms-visio.template',
        '.vstm': 'application/vnd.ms-visio.template.macroenabled',
        '.jpe': 'image/jpg',
        '.jpeg': 'image/jpg',
        '.jpg': 'image/jpg',
        '.bmp': 'image/bmp',
        '.dib': 'image/bmp',
        '.cod': 'image/cis-cod',
        '.gif': 'image/gif',
        '.ief': 'image/ief',
        '.jfif': 'image/pjpeg',
        '.png': 'image/png',
        '.pnz': 'image/png',
        '.svg': 'image/svg+xml',
        '.svgz': 'image/svg+xml',
        '.tif': 'image/tiff',
        '.tiff': 'image/tiff',
        '.mp4': 'video/mp4',
        '.mov': 'video/mp4',
        '.ogg': 'video/ogg',
        '.webm': 'video/webm',
        '.mp3': 'audio/mpeg',
        '.wav': 'audio/wav'
    };

    const getFileExtension = function (filePath) {
        return '.' + filePath.split('.').pop();
    };

    const getContentTypeByFileExtension = function (fileExtension) {
        const contentTypeFounded = contentTypesByFileExtension[fileExtension];
        return contentTypeFounded || 'application/octet-stream';
    };

    $.fn.fileViewer = function (options) {

        const _defaults = $.fn.fileViewer.defaults;
        const _options = $.extend({}, _defaults, options);

        const defineViewerName = function (contentType, fileExtension) {
            return _defaults.map.contentType[contentType]
                || _defaults.map.extension[fileExtension]
                || 'default'
        };

        const defineViewer = function (contentType, fileExtension) {

            const viewerName = defineViewerName(contentType, fileExtension);

            let viewer = _options.viewers[viewerName] || _defaults.viewers[viewerName];

            if (options.viewers && options.viewers[viewerName]) {

                let defaultViewer = _defaults.viewers[viewerName];
                var customViewer = options.viewers[viewerName];

                customViewer.id = customViewer.id || defaultViewer.id;
                customViewer.class = customViewer.class || defaultViewer.class;
                customViewer.render = customViewer.render || defaultViewer.render;

                viewer = customViewer;
            }

            if (!_options.generateId)
                viewer.id = '';

            viewer.name = viewerName;
            return viewer;
        };

        const buildFile = function ($el) {

            const filePath = _options.filePath || $el.data('file-path');
            if (!filePath) throw new TypeError('filePath required!');

            const fileName = _options.fileName || $el.data('file-name');
            if (!fileName) throw new TypeError('fileName required!');

            const fileExtension = _options.fileExtension || $el.data('file-extension') || getFileExtension(fileName);
            const contentType = _options.contentType || $el.data('file-contenttype') || getContentTypeByFileExtension(fileExtension);

            return {
                path: filePath,
                name: fileName,
                extension: fileExtension,
                contentType: contentType
            };
        };

        this.each(function () {
            var $this = $(this);

            const file = buildFile($this);

            const viewer = defineViewer(file.contentType, file.extension);

            const template = viewer.render(file);

            if (!template) throw new TypeError('Template string not returned!');

            $this.addClass(viewer.name + '-viewer-container');
            $this.html(template);

        });

        return this;
    };

    $.fn.fileViewer.defaults = {
        filePath: '',
        fileName: '',
        fileExtension: '',
        contentType: '',
        generateId: true
    };

    $.fn.fileViewer.defaults.viewers = {
        text: {
            id: 'text-viewer',
            class: 'text-viewer',
            render: function (file) {
                return '<iframe loading="lazy" title="viewing document ' + file.name + '" id="' + this.id + '" class="' + this.class + '" src="' + file.path + '" frameborder="0" type="' + file.contentType + '" allowfullscreen></iframe>';
            }
        },
        html: {
            id: 'html-viewer',
            class: 'html-viewer',
            render: function (file) {
                return '<iframe loading="lazy" title="viewing document ' + file.name + '" id="' + this.id + '" class="' + this.class + '" src="' + file.path + '" frameborder="0" type="' + file.contentType + '" allowfullscreen></iframe> ';
            }
        },
        pdf: {
            id: 'pdf-viewer',
            class: 'pdf-viewer',
            render: function (file) {
                return '<iframe loading="lazy" title="viewing document ' + file.name + '" id="' + this.id + '" class="' + this.class + '" src="' + file.path + '" frameborder="0"></iframe> ';
            }
        },
        image: {
            id: 'image-viewer',
            class: 'image-viewer',
            render: function (file) {
                return '<img loading="lazy" alt="viewing image ' + file.name + '" id="' + this.id + '" class="' + this.class + '" src="' + file.path + '" />';
            }
        },
        audio: {
            id: 'audio-viewer',
            class: 'audio-viewer',
            attributes: '',
            render: function (file) {
                return '<audio id="' + this.id + '" class="' + this.class + '"' + this.attributes + '><source src="' + file.path + '" type="' + file.contentType + '"></audio>';
            }
        },
        video: {
            id: 'video-viewer',
            class: 'video-viewer',
            render: function (file) {
                return '<video id="' + this.id + '" class="' + this.class + '"' + this.attributes + '><source src="' + file.path + '" type="' + file.contentType + '"></video>';
            }
        },
        default: {
            id: 'default-viewer',
            class: 'default-viewer',
            render: function (file) {
                return '<span id="' + this.id + '" class="' + this.class + '">File not Supported!!</span>';
            }
        }
    };

    $.fn.fileViewer.defaults.map = {
        extension: {
            '.pdf': 'pdf',
            '.txt': 'text',
            '.htm': 'html',
            '.html': 'html',
            '.ogg': 'video',
            '.webm': 'video',
            '.mp4': 'video',
            '.mov': 'video',
            '.vgg': 'video',
            '.jpg': 'image',
            '.jpeg': 'image',
            '.apng': 'image',
            '.png': 'image',
            '.bmp': 'image',
            '.svg': 'image',
            '.tif': 'image',
            '.mp3': 'audio',
            '.wav': 'audio'
        },
        contentType: {
            'text/html': 'html'
        }
    }

})(jQuery);
