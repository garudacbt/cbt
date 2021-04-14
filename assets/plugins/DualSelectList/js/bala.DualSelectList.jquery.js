(function($) {

	$.fn.DualSelectList = function(parameter)
	{
		// Only allow DIV to be the DualSelectList container
		if (this.length != 1) return;
		if (this.prop('tagName') != 'DIV') return;

		// Apply default value
		var params = $.extend({}, $.fn.DualSelectList.defaults, parameter);

		var thisMain = null;
		var thisLftPanel = null;
		var thisRgtPanel = null;
		var thisItemNull = null;

		var thisSelect = null;
		var srcEvent = null;
		var isPickup = false;
		var isMoving = false;
		var xOffset = null;
		var yOffset = null;

		this.init = function () {
			// Initialize DualSelectList content
			this.append(
				'<div class="dsl-filter left-panel" ><input class="dsl-filter-input" tyle="text" value="Input Filter"></div>' +
				'<div class="dsl-filter right-panel"><input class="dsl-filter-input" tyle="text" value="Input Filter"></div>' +
				'<div class="dsl-panel left-panel" /><div class="dsl-panel right-panel"></div>' +
				'<div class="dsl-panel-item-null">&nbsp;</div>'
			);

			thisMain = this;
			thisLftPanel = this.find('div.dsl-panel.left-panel');
			thisRgtPanel = this.find('div.dsl-panel.right-panel');
			thisItemNull = this.find('div.dsl-panel-item-null');

			// append color css
			appendColorStyle();

			// Allow default Candidate and default Selection
			if(typeof(params.candidateItems) === 'string') params.candidateItems = [params.candidateItems];
			if(typeof(params.selectionItems) === 'string') params.selectionItems = [params.selectionItems];
			if (params.candidateItems.length > 0) this.setCandidate(params.candidateItems);
			if (params.selectionItems.length > 0) this.setSelection(params.selectionItems);

			// When mouse click down in one item, record this item for following actions.
			$(document).on('mousedown', 'div.dsl-panel-item', function(event) {
				thisSelect = $(this);
				isPickup = true;
				srcEvent = event;
				event.preventDefault();
			});

			// When mouse move in [Body] ...
			// --> If already click down in one item, drag this item.
			// --> If no item is clicked, do nothing
			$(document).on('mousemove', 'body', function(event) {
				// move this item...
				if (isPickup) {
					if (isMoving) {
						thisSelect.css({
							'left' : event.screenX + xOffset,
							'top'  : event.screenY + yOffset
						});

						var target = findItemLocation(thisSelect);
						if (target.targetItem == null) {
							thisItemNull.appendTo(target.targetPanel).show();
						}else{
							thisItemNull.insertAfter(target.targetItem).show();
						}
					}else{
						if ((Math.abs(event.screenX - srcEvent.screenX) >= 2) ||
							(Math.abs(event.screenY - srcEvent.screenY) >= 2))
						{
							isMoving = true;

							var srcPanel = thisSelect.parent('div.dsl-panel');
							var xSrc = thisSelect.position().left;
							var ySrc = thisSelect.position().top;
							xOffset = xSrc - event.screenX;
							yOffset = ySrc - event.screenY;
							thisSelect.css({
								'position' : 'absolute',
								'z-index' : 10,
								'left' : xSrc,
								'top' : ySrc,
								'width' : srcPanel.width()
							}).appendTo(thisMain);
						}
					}
				}

				event.preventDefault();
			});

			// When mouse up ...
			// --> If there is an item clicked down ...
			// -----> If this item is draged with mouse, drop this item in correct location.
			// -----> If this item is not draged, calculate it's new location and fly to.
			// --> If there is no item clicked down, do nothing.
			$(document).on('mouseup', 'div.dsl-panel-item', function(event) {
				// Click on an item
				if (isPickup && !isMoving) {
					// fly to another panel
					var srcPanel = $(this).parent('div.dsl-panel');
					var tarPanel = srcPanel.siblings('div.dsl-panel');
					var tarItem = tarPanel.find('div.dsl-panel-item:last');

					var xSrc = $(this).position().left;
					var ySrc = $(this).position().top;
					var xTar = 0;
					var yTar = 0; 
					if (tarItem.length > 0) {
						xTar = tarItem.position().left;
						yTar = tarItem.position().top + tarItem.height();
						yTar = Math.min(yTar, tarPanel.position().top + tarPanel.width());
					}else{
						xTar = tarPanel.position().left;
						yTar = tarPanel.position().top; 
					}

					$(this).css({
						'position' : 'absolute',
						'z-index' : 10,
						'left' : xSrc,
						'top' : ySrc,
						'width' : srcPanel.width()
					}).animate({
						left: xTar,
						top: yTar
					},200, function(){
						$(this).css({
							'position' : 'initial',
							'z-index' : 'initial',
							'width' : 'calc(100% - 16px)'
						}).appendTo(tarPanel);
					});
				}

				// Drag-n-Drop an item
				if (isPickup && isMoving) {
					// drag-n-drop item
					var target = findItemLocation($(this));
					if (target.targetItem == null) {
						$(this).css({
							'position' : 'initial',
							'z-index' : 'initial',
							'width' : 'calc(100% - 16px)'
						}).appendTo(target.targetPanel);
					}else{
						$(this).css({
							'position' : 'initial',
							'z-index' : 'initial',
							'width' : 'calc(100% - 16px)'
						}).insertAfter(target.targetItem);
					}
				}

				// reset the status
				isPickup = false;
				isMoving = false;
				thisItemNull.appendTo(thisMain).hide();
			});

			// Hotfix bug where sometimes the item won't drop and will stick to the mouse
			// When isPickup && isMoving && escape is pressed, drop the item in the nearest panel
			$(document).on('keyup', function(event) {
				if(isPickup && isMoving && event.keyCode === 27) {
					// console.log(thisSelect);
					var target = findItemLocation(thisSelect);
				    if (target.targetItem == null) {
                        thisSelect.css({
                            'position': 'initial',
                            'z-index': 'initial',
                            'width': 'calc(100% - 16px)'
                        }).appendTo(target.targetPanel);
				    } else {
                        thisSelect.css({
                            'position': 'initial',
                            'z-index': 'initial',
                            'width': 'calc(100% - 16px)'
                        }).insertAfter(target.targetItem);
				    }

				    isPickup = false;
				    isMoving = false;
				    thisItemNull.appendTo(thisMain).hide();
				}
			});
			
			// When Clicking on the filter, remove the hint text
			$(document).on('focus', 'input.dsl-filter-input', function() {
				var fltText = $(this).val();
				if (fltText == 'Input Filter') {
					$(this).val('');
					$(this).css({
						'font-weight' : 'normal',
						'font-style' : 'normal',
						'color' : 'black'
					});
				}else{
					//
				}
			});

			// When leving the filter, add the hint text if there is no filter text
			$(document).on('focusout', 'input.dsl-filter-input', function() {
				var fltText = $(this).val();
				if (fltText == '') {
					$(this).val('Input Filter');
					$(this).css({
						'font-weight' : 'bolder',
						'font-style' : 'Italic',
						'color' : 'lightgray'
					});
				}else{
					//
				}
			});

			// When some text input to the filter, do filter.
			$(document).on('keyup', 'input.dsl-filter-input', function() {
				var fltText = $(this).val();
				var tarPanel = null;
				if ($(this).parent('div.dsl-filter').hasClass('left-panel')) {
					tarPanel = thisLftPanel;
				}else{
					tarPanel = thisRgtPanel;
				}

				tarPanel.find('div.dsl-panel-item').show();
				if (fltText != '') {
					tarPanel.find('div.dsl-panel-item:not(:contains(' + fltText + '))').hide();
				}
			});
		};

		// Allow user to create the DualSelectList object first, and add candidate list later.
		this.setCandidate = function (candidate) {
			for (var n=0; n<candidate.length; ++n) {
				var itemString = $.trim(candidate[n].toString());
				if (itemString == '') continue;
				thisLftPanel.append('<div class="dsl-panel-item">' + itemString + '</div>');
			}
		};

		// Allow user to create the DualSelectList object first, and add selection list later.
		this.setSelection = function (selection) {
			for (var n=0; n<selection.length; ++n) {
				var itemString = $.trim(selection[n].toString());
				if (itemString == '') continue;
				thisRgtPanel.append('<div class="dsl-panel-item">' + itemString + '</div>');
			}
		};

		// Allow user to get current selection result
		this.getSelection = function () {
			var result = new Array();
			var selection = thisRgtPanel.find('div.dsl-panel-item');
			for (var n=0; n<selection.length; ++n) result.push(selection.eq(n).text());
			return result;
		};

		// Allow user to change object color
		this.setColor = function (clsName, clrString) {
			clsName = $.trim(clsName);
			clrString = $.trim(clrString);
			if (!clrString) return;

			switch(clsName) {
				case 'panelBackground' :
					params.colors.panelBackground = clrString;
					break;
				case 'filterText' :
					params.colors.filterText = clrString;
					break;
				case 'itemText' :
					params.colors.itemText = clrString;
					break;
				case 'itemBackground' :
					params.colors.itemBackground = clrString;
					break;
				case 'itemHoverBackground' :
					params.colors.itemHoverBackground = clrString;
					break;
				case 'itemPlaceholderBackground' :
					params.colors.itemPlaceholderBackground = clrString;
					break;
				case 'itemPlaceholderBorder' :
					params.colors.itemPlaceholderBorder = clrString;
					break;
			}

			appendColorStyle();
		};

		// Allow user to reset object color
		this.resetColor = function (clsName) {
			clsName = $.trim(clsName);
			switch(clsName) {
				case 'panelBackground' :
					params.colors.panelBackground = '';
					break;
				case 'filterText' :
					params.colors.filterText = '';
					break;
				case 'itemText' :
					params.colors.itemText = '';
					break;
				case 'itemBackground' :
					params.colors.itemBackground = '';
					break;
				case 'itemHoverBackground' :
					params.colors.itemHoverBackground = '';
					break;
				case 'itemPlaceholderBackground' :
					params.colors.itemPlaceholderBackground = '';
					break;
				case 'itemPlaceholderBorder' :
					params.colors.itemPlaceholderBorder = '';
					break;
				case '' :
					params.colors = {
						panelBackground: '',
						filterText: '',
						itemText: '',
						itemBackground: '',
						itemHoverBackground: '',
						itemPlaceholderBackground: '',
						itemPlaceholderBorder: ''
					};
					break;
			}

			appendColorStyle();
		};

		// Function for item location calculation, not public to user.
		function findItemLocation(objItem) {
			var target = {
				targetPanel: null,
				targetItem: null
			};
			//var targetPanel = null;
			if (objItem.position().left <= (thisLftPanel.position().left + (0.5 * thisLftPanel.width()))) {
				target.targetPanel = thisLftPanel;
			}else{
				target.targetPanel = thisRgtPanel;
			}

			//var targetItem = null;
			var candidateItems = target.targetPanel.find('div.dsl-panel-item');
			for (var n=0; n<candidateItems.length; ++n) {
				if (objItem.position().top > candidateItems.eq(n).position().top) target.targetItem = candidateItems[n];
			}

			//return targetItem;
			return target;
		};

		// Function for item location calculation, not public to user.
		function appendColorStyle() {
			var cssContent = 
				( !params.colors.panelBackground           ? '' : '.dsl-panel {background-color: ' + params.colors.panelBackground + ' !important;} ') +
				( !params.colors.filterText                ? '' : '.dsl-filter-input {color: ' + params.colors.filterText + ' !important;} ') +
				( !params.colors.itemText                  ? '' : '.dsl-panel-item {color: ' + params.colors.itemText + ' !important;} ') +
				( !params.colors.itemBackground            ? '' : '.dsl-panel-item {background-color: ' + params.colors.itemBackground + ' !important;} ') +
				( !params.colors.itemHoverBackground       ? '' : '.dsl-panel-item:hover {background-color: ' + params.colors.itemHoverBackground + ' !important;} ') +
				( !params.colors.itemPlaceholderBackground ? '' : '.dsl-panel-item-null {background-color: ' + params.colors.itemPlaceholderBackground + ' !important;} ') +
				( !params.colors.itemPlaceholderBorder     ? '' : '.dsl-panel-item-null {border-color: ' + params.colors.itemPlaceholderBorder + ' !important;} ') ;
			$('#dual-select-list-style').remove();
			if (cssContent) $('html>head').append($('<style id="dual-select-list-style">' + cssContent + '</style>'));
		};

		this.init();
		return this;
	}

	$.fn.DualSelectList.defaults = {
		candidateItems: [],
		selectionItems: [],
		colors: {
			panelBackground: '',
			filterText: '',
			itemText: '',
			itemBackground: '',
			itemHoverBackground: '',
			itemPlaceholderBackground: '',
			itemPlaceholderBorder: ''
		}
	};

})(jQuery);

