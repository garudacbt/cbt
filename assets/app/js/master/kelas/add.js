$(document).ready(function () {
	ajaxcsrf();

	var jsonObj = [];
	var noselected = [];
	var s="";
	function kalkulasiSiswa() {
		var sel = $('select[name=siswa_id] option').filter(':selected').val();
		jsonObj = [];
		noselected = [];
		s = "";
		$.each($('#jumlah_siswa option'), function (key, value) {
			if (!$(this).prop('selected')) {
				noselected[key] = $(this).val();
				s+="&unselect%5B%5D="+noselected[key];
			} else {
				item = {};
				item ["id"] = $(this).val();
				item ["val"] = $(this).text();
				jsonObj.push(item);
			}
		});
		let dropdown = $('#siswa_id');
		dropdown.empty();
		dropdown.append('<option selected="selected" value disabled>Pilih Ketua Siswa</option>');
		$.each(jsonObj, function (key, entry) {
			if (entry.id === sel) {
				dropdown.append($('<option></option>').attr('value', entry.id).attr('selected', 'selected').text(entry.val));
			} else {
				dropdown.append($('<option></option>').attr('value', entry.id).text(entry.val));
			}
		})
	}

	$('#jumlah_siswa').multiSelect({
        selectableHeader: "<div class='custom-header'>Semua Siswa</div><input type='text' class='search-input form-control mb-1' autocomplete='off' placeholder='Cari siswa'>",
        selectionHeader: "<div id='totalsiswa' class='custom-header'>Jumlah siswa di kelas ini: -</div><input type='text' class='search-input form-control mb-1' autocomplete='off' placeholder='Cari siswa'>",
		//selectableHeader: "",
		//selectionHeader: "",
        afterInit: function (container) {
            var that = this,
                $selectableSearch = that.$selectableUl.prev(),
                $selectionSearch = that.$selectionUl.prev(),
                selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString).on('keydown', function(e){
                if (e.which === 40){
                    that.$selectableUl.focus();
                    return false;
                }
            });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString).on('keydown', function(e){
                if (e.which == 40){
                    that.$selectionUl.focus();
                    return false;
                }
            });

            $('#totalsiswa').text("Jumlah siswa: " + countList());
            kalkulasiSiswa();
        },
		afterSelect: function (values) {
			$('#totalsiswa').text("Jumlah siswa: " + countList());
			kalkulasiSiswa();
            this.qs1.cache();
            this.qs2.cache();
            },
		afterDeselect: function(values){
        	$('#totalsiswa').text("Jumlah siswa: " + countList());
			kalkulasiSiswa();
            this.qs1.cache();
            this.qs2.cache();
            },
	});

	$('#create').submit(function (e) {
		e.preventDefault();

		console.log("data:", $(this).serialize() + s);

		$.ajax({
			url: base_url + "datakelas/save",
			type: "POST",
			dataType: "JSON",
			data: $(this).serialize() + s,
			success: function (data) {
				if (data.status) {
					window.location.href = base_url+'datakelas';
					//showSuccessToast('Data berhasil disimpan.')
				} else {
					showDangerToast('Data tidak tersimpan.');
				}
			}, error: function (xhr, status, error) {
				console.log(xhr.responseText);
				showDangerToast('Data tidak tersimpan.');
			}
		});
	});

	console.log('arrSiswa', arrAllSiswa);
    console.log('arrSel', arrSelSiswa);
    //NEW DUALIST
    var dsl = $('#dualSelectExample').DualSelectList({
        'candidateItems' : arrAllSiswa,//['Item 01', 'Item 02', 'Item 03', 'Item 04', 'Item 05', 'Item 06', 'Item 07'],
        'selectionItems' : ['Item 08', 'Item 09', 'Item 03'],
        'colors' : {
            'itemText' : 'white',
            'itemBackground' : 'rgb(0, 51, 204)',
            'itemHoverBackground' : '#0066ff'
        }
    });

    $('#getSel').click(function(){
        var res = dsl.getSelection();
        var str = '';
        for (var n=0; n<res.length; ++n) str += res[n] + '\n';
        $('#selResult').val(str);
    });

    $('#addSel').click(function(){
        var items = $('#addIterms').val().split('\n');
        var res = dsl.setCandidate(items);
        $('#addIterms').val('');
    });

    $('#setColor').click(function(){
        var clrName = $('#colorSelector').val();
        var clrValue = $('#colorValue').val();
        dsl.setColor(clrName, clrValue);
    });

    $('#resetColor').click(function(){
        var clrName = $('#colorSelector').val();
        dsl.resetColor(clrName);
    });


});

function countList() {
	var count = 0;
	var len = 0;
	$('ul').each(function(){
		if(count != 0){
			len = $(this).find('li:visible').length;
		}
		count++;
	});
	return len
}
