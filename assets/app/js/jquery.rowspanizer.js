/*!
 * jQuery Rowspanizer Plugin v0.1
 * https://github.com/marcosesperon/jquery.rowspanizer.js
 *
 * Copyright 2011, 2015 Marcos Esperón
 * Released under the MIT license
 * 
 * https://github.com/jquery-boilerplate/boilerplate/
 */

;( function( $, window, document, undefined ) {

  "use strict";

    var rowspanizer = "rowspanizer",
      defaults = {
        vertical_align: "top",
        columns: []
      };

    function f ( element, options ) {

      this.element = element;

      this.settings = $.extend( {}, defaults, options );
      this._defaults = defaults;
      this._name = rowspanizer;
      this.init();

    }

    $.extend( f.prototype, {
        init: function() {

          var _this = this;

          var $table = $(this.element);
          var arr = [];
          let f = function(el){
            $table.find('tr').each(function (r, tr) {
              $(this).find(el).each(function (d, el) {
                if (_this.settings.columns.length === 0 || _this.settings.columns.indexOf(d) !== -1) {
                  var $el = $(el);
                  var v_dato = $el.html();
                  if(typeof arr[d] != 'undefined' && 'dato' in arr[d] && arr[d].dato == v_dato) {
                    var rs = arr[d].elem.data('rowspan');
                    if(rs == 'undefined' || isNaN(rs)) rs = 1;
                    arr[d].elem.data('rowspan', parseInt(rs) + 1).addClass('rowspan-combine');
                    $el.addClass('rowspan-remove');
                  } else {
                    arr[d] = {dato: v_dato, elem: $el};
                  };
                }
              });
            });

            $('.rowspan-combine').each(function (r, tr) {
              var $this = $(this);
              $this.attr('rowspan', $this.data('rowspan')).css({'vertical-align': _this.settings.vertical_align});
            });

            $('.rowspan-remove').remove();
          };

          f('td');
          f('th');
        }
    } );

    $.fn[ rowspanizer ] = function( options ) {
      return this.each( function() {
        if ( !$.data( this, "plugin_" + rowspanizer ) ) {
          $.data( this, "plugin_" +
            rowspanizer, new f( this, options ) );
        }
      } );
    };

} )( jQuery, window, document );