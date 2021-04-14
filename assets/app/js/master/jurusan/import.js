$(document).ready(function () {
    ajaxcsrf();
    // Basic
    $('.dropify').dropify({
            tpl: {
                wrap: '<div class="dropify-wrapper"></div>',
                loader: '<div class="dropify-loader"></div>',
                message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
                preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                clearButton: '<button type="button" class="dropify-clear" onclick="onRemoved()">{{ remove }}</button>',
                errorLine: '<p class="dropify-error">{{ error }}</p>',
                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
            }
        },
        {
            error: {
                'fileSize': 'The file size is too big ({{ value }} max).',
                'minWidth': 'The image width is too small ({{ value }}}px min).',
                'maxWidth': 'The image width is too big ({{ value }}}px max).',
                'minHeight': 'The image height is too small ({{ value }}}px min).',
                'maxHeight': 'The image height is too big ({{ value }}px max).',
                'imageFormat': 'The image format is not allowed ({{ value }} only).'
            }
        });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify');

    $('#toggleDropify').on('click', function (e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    });

    // Used events
    var drEvente = $('#input-file-events-excel').dropify();
    var drEventw = $('#input-file-events-word').dropify();

    drEvente.on('dropify.beforeClear', function (event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvente.on('dropify.afterClear', function (event, element) {
        //todo
    });

    drEvente.on('dropify.errors', function (event, element) {
        console.log('Has Errors');
        $.toast({
            heading: "Error",
            text: "file rusak",
            icon: 'warning',
            showHideTransition: 'fade',
            allowToastClose: true,
            hideAfter: 5000,
            position: 'top-right'
        });
    });

    $('#formPreviewExcel').find('.dropify-filename-inner').on('DOMSubtreeModified',function(e){
        var form = new FormData($("#formPreviewExcel")[0]);
        var filename = $(this).text();
        preview(base_url + 'datajurusan/preview', form, filename);
    });

    $('#formPreviewWord').find('.dropify-filename-inner').on('DOMSubtreeModified',function(e){
        var form = new FormData($("#formPreviewWord")[0]);
        var filename = $(this).text();
        preview(base_url + 'datajurusan/previewWord', form, filename);
    });

    $('#formUpload').submit('click', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        console.log("data:", $(this).serialize());

        $.ajax({
            url: base_url + "datajurusan/do_import",
            type: "POST",
            dataType: "JSON",
            data: $(this).serialize(),
            success: function (data) {
                window.history.back();
            }, error: function (xhr, status, error) {
                console.log("error", e.responseText);
                $.toast({
                    heading: "ERROR!!",
                    text: "file tidak terbaca",
                    icon: 'error',
                    showHideTransition: 'fade',
                    allowToastClose: true,
                    hideAfter: 5000,
                    position: 'top-right'
                });
            }
        });
        return false;
    });

    $.fn.toJson = function(){
        if(!this.is('table')){
            return;
        }

        var results = [];

        this.find('table tr').each(function(indx, obj){
            var tds = $(obj).children('td');
            results.push(tds);
        });

        return results;
    }
});

function preview(action, data, filename) {
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: action,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
            var html = '';
            var i;
            var no = 1;

            if (filename == "") {
                html = '<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>';
            } else {
                console.log(data);
                var obj = JSON.parse(data);
                html = '<table class="table table-bordered">' +
                    '        <thead>' +
                    '        <tr>' +
                    '        <td>No</td>' +
                    '        <td>Nama Jurusan</td>' +
                    '        <td>Kode Jurusan</td>' +
                    '        </tr>' +
                    '        </thead>' +
                    '        <tbody>';
                for (i = 0; i < obj.length; i++) {
                    html +=
                        '<tr>' +
                        '<td>' + no++ + '</td>' +
                        '<td>' + obj[i].nama + '</td>' +
                        '<td>' + obj[i].kode + '</td>' +
                        '</tr>';
                }
                html +=  '</tbody></table>';
            }

            $('#file-preview').html(html);
            var attrId = document.getElementById("formInput");
            attrId.setAttribute("value", data);
        },
        error: function (e) {
            console.log("error", e.responseText);
            $.toast({
                heading: "ERROR!!",
                text: "file tidak terbaca",
                icon: 'error',
                showHideTransition: 'fade',
                allowToastClose: true,
                hideAfter: 5000,
                position: 'top-right'
            });
        }
    });
}

function parse(data) {

    $.htmlParser(data, {
        start: function () {
            // 'this' is a jQuery object representing the current node
            console.log('Start tag: <' + this.prop('tagName') + '>');
        },
        end: function () {
            console.log('End tag: </' + this.prop('tagName') + '>');
        },
        text: function () {
            console.log('Text: ' + this.text());
        },
        comment: function (text) {
            console.log('Comment: ' + this.text());
        }
    });
}

function tableToJson(table) {
    var data = []; // first row needs to be headers var headers = [];
    /*
    for (var i=0; i<table.rows[0].cells.length; i++) {
        headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi,'');
    }
    */
// go through cells
    for (var i=1; i<table.rows.length; i++) {
        var tableRow = table.rows[i]; var rowData = {};
        for (var j=0; j<tableRow.cells.length; j++) {
            rowData[ headers[j] ] = tableRow.cells[j].innerHTML;
        } data.push(rowData);
    }
    return data;
}
/*
function onFileChange(input){
    require("docx2html")(input.files[0]).then(function(converted){
        console.log(converted.toString())
    })
}*/

function onRemoved() {
    $(".dropify-filename-inner").text("");
}
