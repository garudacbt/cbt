/**
 * RWD Table with freezing head and columns for jQuery
 * 
 * @author  Nick Tsai <myintaer@gmail.com>
 * @version 1.3.0
 * @see     https://github.com/yidas/jquery-freeze-table
 */
(function ($, window) {

  'use strict';

  /**
   * Main object
   * 
   * @param {element} element 
   * @param {object} options 
   */
  var FreezeTable = function(element, options) {

    // Target element initialization
    this.$tableWrapper = $(element).first();

    // Options
    this.options = options || {}; 
    this.namespace = this.options.namespace || 'freeze-table';
    this.callback;
    this.scrollBarHeight;
    this.shadow;
    this.fastMode;
    this.backgroundColor;
    this.scrollable;

    // Caches
    this.$table = this.$tableWrapper.children("table");
    this.$container = ((typeof this.options.container !== 'undefined') && this.options.container && $(this.options.container).length) ? $(this.options.container) : $(window);
    this.$headTableWrap;
    this.$columnTableWrap;
    this.$columnHeadTableWrap;
    this.$scrollBarWrap;
    this.fixedNavbarHeight;
    this.isWindowScrollX = false;
    
    // Static class names for clone wraps
    this.headWrapClass = 'clone-head-table-wrap';
    this.columnWrapClass = 'clone-column-table-wrap';
    this.columnHeadWrapClass = 'clone-column-head-table-wrap';
    this.scrollBarWrapClass = 'clone-scroll-bar-wrap';

    this.init();

    return this;
  }

  /**
   * Initialization
   */
  FreezeTable.prototype.init = function() {

    // Element check
    if (!this.$table.length) {
      throw "The element must contain a table dom";
    }

    /**
     * Update Mode
     */
    if (this.options==='update') {

      this.destroy();
      this.options = this.$tableWrapper.data('freeze-table-data');
    }
    else if (this.options==='resize') {

      this.options = this.$tableWrapper.data('freeze-table-data');
      // Get selected FreezeTable's namespace
      this.namespace = this.options.namespace || this.namespace;
      this.resize();
      // Skip init for better performance usage 
      return;
    }
    else {
      // Save to DOM data
      this.$tableWrapper.data('freeze-table-data', this.options);
    }

    /**
     * Options Setting
     */
    var options = this.options;
    var freezeHead = (typeof options.freezeHead !== 'undefined') ? options.freezeHead : true;
    var freezeColumn = (typeof options.freezeColumn !== 'undefined') ? options.freezeColumn : true;
    var freezeColumnHead = (typeof options.freezeColumnHead !== 'undefined') ? options.freezeColumnHead : true;
    var scrollBar = (typeof options.scrollBar !== 'undefined') ? options.scrollBar : false;
    var fixedNavbar = options.fixedNavbar || '.navbar-fixed-top';
    var callback = options.callback || null;
    this.namespace = this.options.namespace || this.namespace;
    // Default to get window scroll bar height
    this.scrollBarHeight = ($.isNumeric(options.scrollBarHeight)) ? options.scrollBarHeight : (window.innerWidth - document.documentElement.clientWidth);
    this.shadow = (typeof options.shadow !== 'undefined') ? options.shadow : false;
    this.fastMode = (typeof options.fastMode !== 'undefined') ? options.fastMode : false;
    this.backgroundColor = (typeof options.backgroundColor !== 'undefined') ? options.backgroundColor : 'white';
    this.scrollable = (typeof options.scrollable !== 'undefined') ? options.scrollable : false;

    // Get navbar height for keeping fixed navbar
    this.fixedNavbarHeight = (fixedNavbar) ? $(fixedNavbar).outerHeight() || 0 : 0;
    
    // Check existence
    if (this.isInit()) {
      this.destroy();
    }

    // Release height of the table wrapper 
    if (!this.scrollable) {
      this.$tableWrapper.css('height', '100%')
        .css('min-height', '100%')
        .css('max-height', '100%');
    }

    /**
     * Building
     */
    // Switch for freezeHead
    if (freezeHead) {
      this.buildHeadTable();
    }
    // Switch for freezeColumn
    if (freezeColumn) {
      this.buildColumnTable();
      // X scroll bar
      this.$tableWrapper.css('overflow-x', 'scroll');
    }
    // Switch for freezeColumnHead
    if (freezeColumnHead && freezeHead && freezeColumn) {
      this.buildColumnHeadTable();
    }
    // Switch for scrollBar
    if (scrollBar) {
      this.buildScrollBar();
    }

    // Body scroll-x prevention
    var detectWindowScroll = (function (){
      // If body scroll-x is opened, close library to prevent Invalid usage
      if (this.$container.scrollLeft() > 0) {
        // Mark
        this.isWindowScrollX = true;
        // Hide all components
        if (this.$headTableWrap) {
          this.$headTableWrap.css('visibility', 'hidden');
        }
        if (this.$columnTableWrap) {
          this.$columnTableWrap.css('visibility', 'hidden');
        }
        if (this.$columnHeadTableWrap) {
          this.$columnHeadTableWrap.css('visibility', 'hidden');
        }
        if (this.$scrollBarWrap) {
          this.$scrollBarWrap.css('visibility', 'hidden');
        }

      } else {
        // Unmark
        this.isWindowScrollX = false;
      }

    }).bind(this);
    // Listener of Body scroll-x prevention
    this.$container.on('scroll.'+this.namespace, function () {

      detectWindowScroll();
    });

    // Initialization
    this.resize();

    // Callback
    if (typeof callback === 'function') {
      callback();
    }
  }

  /**
   * Freeze thead table
   */
  FreezeTable.prototype.buildHeadTable = function() {

    var that = this;
    
    // Clone the table as Fixed thead
    var $headTable = this.clone(this.$table);

    // Fast Mode
    if (this.fastMode) {
      var $headTable = this.simplifyHead($headTable);
    }
    
    var headWrapStyles = this.options.headWrapStyles || null;
    // Wrap the Fixed Column table
    this.$headTableWrap = $('<div class="'+this.headWrapClass+'"></div>')
      .append($headTable)
      .css('position', 'fixed')
      .css('overflow', 'hidden')
      .css('visibility', 'hidden')
      .css('top', 0 + this.fixedNavbarHeight)
      .css('z-index', 2);
    // Shadow option
    if (this.shadow) {
      this.$headTableWrap.css('box-shadow', '0px 6px 10px -5px rgba(159, 159, 160, 0.8)');
    }
    // Styles option
    if (headWrapStyles && typeof headWrapStyles === "object") {
      $.each(headWrapStyles, function(key, value) {
        that.$headTableWrap.css(key, value);
      });
    }
    // Add into target table wrap
    this.$tableWrapper.append(this.$headTableWrap);

    /**
     * Listener - Table scroll for effecting Freeze Column
     */
    this.$tableWrapper.on('scroll.'+this.namespace, function() {

      // this.$headTableWrap.css('left', this.$table.offset().left);
      that.$headTableWrap.scrollLeft($(this).scrollLeft());
    });

    // Scrollable option
    if (this.scrollable) {

      var handler = function (window, that) {

        var top = that.$tableWrapper.offset().top;
        
        // Detect Current container's top is in the table scope
        if (that.$tableWrapper.scrollTop() > 0 && top > that.fixedNavbarHeight) {

          that.$headTableWrap.offset({top: top});
          that.$headTableWrap.css('visibility', 'visible');

        } else {

          that.$headTableWrap.css('visibility', 'hidden');
        }
      }

      /**
       * Listener - Window scroll for effecting freeze head table
       */
      this.$tableWrapper.on('scroll.'+this.namespace, function() {
        
        handler(window, that);
      });

      this.$container.on('scroll.'+this.namespace, function() {

        handler(window, that);
      });
      
    } 
    // Default with window container
    else if ($.isWindow(that.$container.get(0))) {

      /**
       * Listener - Window scroll for effecting freeze head table
       */
      this.$container.on('scroll.'+this.namespace, function() {

        // Current container's top position
        var topPosition = that.$container.scrollTop() + that.fixedNavbarHeight;
        var tableTop = that.$table.offset().top - 1;
        
        // Detect Current container's top is in the table scope
        if (tableTop - 1 <= topPosition && (tableTop + that.$table.outerHeight() - 1) >= topPosition) {

          that.$headTableWrap.css('visibility', 'visible');

        } else {

          that.$headTableWrap.css('visibility', 'hidden');
        }
      });
    }
    // Container setting
    else {

      /**
       * Listener - Window scroll for effecting freeze head table
       */
      this.$container.on('scroll.'+this.namespace, function() {

        var windowTop = $(window).scrollTop();
        var tableTop = that.$table.offset().top - 1;

        // Detect Current container's top is in the table scope
        if (tableTop <= windowTop && (tableTop + that.$table.outerHeight() - 1) >= windowTop) {

          that.$headTableWrap.offset({top: windowTop});
          that.$headTableWrap.css('visibility', 'visible');

        } else {

          that.$headTableWrap.css('visibility', 'hidden');
        }
      });
    }

    /**
     * Listener - Window resize for effecting freeze head table
     */
    this.$container.on('resize.'+this.namespace, function() {

      // Scrollable check and prevention
      var headTableWrapWidth = (that.scrollable) ? that.$tableWrapper.width() - that.scrollBarHeight : that.$tableWrapper.width();
      headTableWrapWidth = (headTableWrapWidth > 0) ? headTableWrapWidth : that.$tableWrapper.width();
      that.$headTableWrap.css('width', headTableWrapWidth);
      that.$headTableWrap.css('height', that.$table.find("thead").outerHeight());
    });
  }

  /**
   * Freeze column table
   */
  FreezeTable.prototype.buildColumnTable = function() {

    var that = this;

    /**
     * Setting
     */
    var columnWrapStyles = this.options.columnWrapStyles || null;
    var columnNum = this.options.columnNum || 1;
    var columnKeep = (typeof this.options.columnKeep !== 'undefined') ? this.options.columnKeep : false;
      // Shadow option
      var defaultColumnBorderWidth = (this.shadow) ? 0 : 1;
      var columnBorderWidth = (typeof this.options.columnBorderWidth !== 'undefined') ? this.options.columnBorderWidth : defaultColumnBorderWidth;
    
    // Clone the table as Fixed Column table
    var $columnTable = this.clone(this.$table);
    
    // Wrap the Fixed Column table
    this.$columnTableWrap = $('<div class="'+this.columnWrapClass+'"></div>')
      .append($columnTable)
      .css('position', 'fixed')
      .css('overflow', 'hidden')
      .css('visibility', 'hidden')
      .css('z-index', 1);
    // Shadow option
    if (this.shadow) {
      this.$columnTableWrap.css('box-shadow', '6px 0px 10px -5px rgba(159, 159, 160, 0.8)');
    }
    // Styles option
    if (columnWrapStyles && typeof columnWrapStyles === "object") {
      $.each(columnWrapStyles, function(key, value) {
        that.$columnTableWrap.css(key, value);
      });
    }
    // Scrollable
    if (this.scrollable) {
      // Scrollable check and prevention
      var columnTableWrapHeight = this.$tableWrapper.height() - this.scrollBarHeight;
      columnTableWrapHeight = (columnTableWrapHeight > 0) ? columnTableWrapHeight : this.$tableWrapper.height();
      this.$columnTableWrap.height(columnTableWrapHeight);
    }
    // Add into target table wrap
    this.$tableWrapper.append(this.$columnTableWrap);

    /**
     * localize the column wrap to current top
     */
    var localizeWrap = function () {

      that.$columnTableWrap.offset({top: that.$tableWrapper.offset().top});
    }

    // Column keep option
    if (columnKeep) {

      this.$columnTableWrap.css('visibility', 'visible');

    } else {

      // Scrollable option
      if (that.scrollable) {

        /**
         * Listener - Table scroll for effecting Freeze Column
         */
        this.$tableWrapper.on('scroll.'+this.namespace, function() {


          // Detect for horizontal scroll
          if ($(this).scrollLeft() > 0) {

            // Scrollable localization
            that.$columnTableWrap.scrollTop(that.$tableWrapper.scrollTop());
            that.$columnTableWrap.css('visibility', 'visible');

          } else {

            that.$columnTableWrap.css('visibility', 'hidden');
          }
        });

      } else {

        /**
         * Listener - Table scroll for effecting Freeze Column
         */
        this.$tableWrapper.on('scroll.'+this.namespace, function() {

          // Disable while isWindowScrollX
          if (that.isWindowScrollX)
            return;

          // Detect for horizontal scroll
          if ($(this).scrollLeft() > 0) {

            that.$columnTableWrap.css('visibility', 'visible');

          } else {

            that.$columnTableWrap.css('visibility', 'hidden');
          }
        });
      }
    }

    /**
     * Listener - Window resize for effecting tables
     */
    this.$container.on('resize.'+this.namespace, function() {

      // Follows origin table's width
      $columnTable.width(that.$table.width());

      /**
       * Dynamic column calculation
       */
      // Get width by fixed column with number setting
      var width = 0 + columnBorderWidth;
      for (var i = 1; i <= columnNum; i++) {
        // th/td detection
        var th = that.$table.find('th:nth-child('+i+')').outerWidth();
        var addWidth = (th > 0) ? th : that.$table.find('td:nth-child('+i+')').outerWidth();
        width += addWidth;
      }
      that.$columnTableWrap.width(width);

      localizeWrap();
    });

    /**
     * Listener - Window scroll for effecting freeze column table
     */
    this.$container.on('scroll.'+this.namespace, function() {

      localizeWrap();
    });
  }

  /**
   * Freeze column thead table
   */
  FreezeTable.prototype.buildColumnHeadTable = function() {

    var that = this;

    // Clone head table wrap
    this.$columnHeadTableWrap = this.clone(this.$headTableWrap);

    // Fast Mode
    if (this.fastMode) {
      this.$columnHeadTableWrap = this.simplifyHead(this.$columnHeadTableWrap);
    }

    var columnHeadWrapStyles = this.options.columnHeadWrapStyles || null;

    this.$columnHeadTableWrap.removeClass(this.namespace)
      .addClass(this.columnHeadWrapClass)
      .css('z-index', 3);
    // Shadow option
    if (this.shadow) {
      this.$columnHeadTableWrap.css('box-shadow', 'none');
    }
    // Styles option
    if (columnHeadWrapStyles && typeof columnHeadWrapStyles === "object") {
      $.each(columnHeadWrapStyles, function(key, value) {
        this.$columnHeadTableWrap.css(key, value);
      });
    }

    // Add into target table wrap
    this.$tableWrapper.append(this.$columnHeadTableWrap);

    // Scrollable option
    if (this.scrollable) {

      var detect = function () {

        var top = that.$tableWrapper.offset().top;
        
        // Detect Current container's top is in the table scope
        if (that.$tableWrapper.scrollTop() > 0 && top > that.fixedNavbarHeight) {

          that.$columnHeadTableWrap.offset({top: top});
          that.$columnHeadTableWrap.css('visibility', 'visible');

        } else {

          that.$columnHeadTableWrap.css('visibility', 'hidden');
        }
      }

      /**
       * Listener - Window scroll for effecting freeze head table
       */
      $(this.$tableWrapper).on('scroll.'+this.namespace, function() {
        
        detect();
      });
      
    } 
    // Default with window container
    else if ($.isWindow(this.$container.get(0))) {

      var detect = function () {

        // Current container's top position
        var topPosition = that.$container.scrollTop() + that.fixedNavbarHeight;
        var tableTop = that.$table.offset().top - 1;
        
        // Detect Current container's top is in the table scope
        if (tableTop - 1 <= topPosition && (tableTop + that.$table.outerHeight() - 1) >= topPosition && that.$tableWrapper.scrollLeft() > 0) {

          that.$columnHeadTableWrap.css('visibility', 'visible');

        } else {

          that.$columnHeadTableWrap.css('visibility', 'hidden');
        }
      }
    }
    // Container setting
    else {

      var detect = function () {

        var windowTop = $(window).scrollTop();
        var tableTop = that.$table.offset().top - 1;

        // Detect Current container's top is in the table scope
        if (tableTop <= windowTop && (tableTop + that.$table.outerHeight() - 1) >= windowTop && that.$tableWrapper.scrollLeft() > 0) {

          that.$columnHeadTableWrap.offset({top: windowTop});
          that.$columnHeadTableWrap.css('visibility', 'visible');

        } else {

          that.$columnHeadTableWrap.css('visibility', 'hidden');
        }
      }
    }

    /**
     * Listener - Window scroll for effecting Freeze column-head table
     */
    this.$container.on('scroll.'+this.namespace, function() {

      detect();
    });

    /**
     * Listener - Table scroll for effecting Freeze column-head table
     */
    this.$tableWrapper.on('scroll.'+this.namespace, function() {

      // Disable while isWindowScrollX
      if (that.isWindowScrollX)
        return;

      detect();
    });

    /**
     * Listener - Window resize for effecting freeze column-head table
     */
    this.$container.on('resize.'+this.namespace, function() {

      // Table synchronism
      that.$columnHeadTableWrap.find("> table").css('width', that.$table.width());
      that.$columnHeadTableWrap.css('width', that.$columnTableWrap.width());
      that.$columnHeadTableWrap.css('height', that.$table.find("thead").outerHeight());
    });
  }

  /**
   * Freeze scroll bar
   */
  FreezeTable.prototype.buildScrollBar = function() {

    var that = this;

    var theadHeight = this.$table.find("thead").outerHeight();

    // Scroll wrap container
    var $scrollBarContainer = $('<div class="'+this.scrollBarWrapClass+'"></div>')
      .css('width', this.$table.width())
      .css('height', 1);
    
    // Wrap the Fixed Column table
    this.$scrollBarWrap = $('<div class="'+this.scrollBarWrapClass+'"></div>')
      .css('position', 'fixed')
      .css('overflow-x', 'scroll')
      .css('visibility', 'hidden')
      .css('bottom', 0)
      .css('z-index', 2)
      .css('width', this.$tableWrapper.width())
      .css('height', this.scrollBarHeight);

    // Add into target table wrap
    this.$scrollBarWrap.append($scrollBarContainer);
    this.$tableWrapper.append(this.$scrollBarWrap);

    /**
     * Listener - Freeze scroll bar effected Table
     */
    this.$scrollBarWrap.on('scroll.'+this.namespace, function() {

      that.$tableWrapper.scrollLeft($(this).scrollLeft());
    });

    /**
     * Listener - Table scroll for effecting Freeze scroll bar
     */
    this.$tableWrapper.on('scroll.'+this.namespace, function() {

      // this.$headTableWrap.css('left', $table.offset().left);
      that.$scrollBarWrap.scrollLeft($(this).scrollLeft());
    });

    /**
     * Listener - Window scroll for effecting scroll bar
     */
    this.$container.on('scroll.'+this.namespace, function() {
      
      // Current container's top position
      var bottomPosition = that.$container.scrollTop() + that.$container.height() - theadHeight + that.fixedNavbarHeight;
      
      // Detect Current container's top is in the table scope
      if (that.$table.offset().top - 1 <= bottomPosition && (that.$table.offset().top + that.$table.outerHeight() - 1) >= bottomPosition) {

        that.$scrollBarWrap.css('visibility', 'visible');

      } else {

        that.$scrollBarWrap.css('visibility', 'hidden');
      }
    });

    /**
     * Listener - Window resize for effecting scroll bar
     */
    this.$container.on('resize.'+this.namespace, function() {
      
      // Update width
      $scrollBarContainer.css('width', that.$table.width())
      // Update Wrap
      that.$scrollBarWrap.css('width', that.$tableWrapper.width());
    });
  }

  /**
   * Clone element
   * 
   * @param {element} element 
   */
  FreezeTable.prototype.clone = function (element) {

    var $clone = $(element).clone()
      .removeAttr('id') // Remove ID

    // Bootstrap background-color transparent problem
    if (this.backgroundColor) {
      $clone.css('background-color', this.backgroundColor);
    }

    return $clone;
  }

  /**
   * simplify cloned head table
   * 
   * @param {element} table Table element
   */
  FreezeTable.prototype.simplifyHead = function (table) {

    var that = this;
    
    var $headTable = $(table);
    // Remove non-display DOM but keeping first row for accuracy
    $headTable.find("> tr, > tbody > tr, tfoot > tr").not(':first').remove();
    // Each th/td width synchronism
    $.each($headTable.find("> thead > tr:nth-child(1) >"), function (key, value) {
      
      var width = that.$table.find("> thead > tr:nth-child(1) > :nth-child("+parseInt(key+1)+")").outerWidth();
      $(this).css('width', width);
    });

    return $headTable;
  }

  /**
   * Detect is already initialized
   */
  FreezeTable.prototype.isInit = function() {
    
    // Check existence DOM
    if (this.$tableWrapper.find("."+this.headWrapClass).length)
      return true;
    if (this.$tableWrapper.find("."+this.columnWrapClass).length)
      return true;
    if (this.$tableWrapper.find("."+this.columnHeadWrapClass).length)
      return true;
    if (this.$tableWrapper.find("."+this.scrollBarWrapClass).length)
      return true;

    return false;

  }

  /**
   * Unbind all events by same namespace
   */
  FreezeTable.prototype.unbind = function() {

    this.$container.off('resize.'+this.namespace);
    this.$container.off('scroll.'+this.namespace);
    this.$tableWrapper.off('scroll.'+this.namespace);
  }

  /**
   * Destroy Freeze Table by same namespace
   */
  FreezeTable.prototype.destroy = function() {

    this.unbind();
    this.$tableWrapper.find("."+this.headWrapClass).remove();
    this.$tableWrapper.find("."+this.columnWrapClass).remove();
    this.$tableWrapper.find("."+this.columnHeadWrapClass).remove();
    this.$tableWrapper.find("."+this.scrollBarWrapClass).remove();
  }

  /**
   * Resize trigger for current same namespace
   */
  FreezeTable.prototype.resize = function() {

    this.$container.trigger('resize.'+this.namespace);
    this.$container.trigger('scroll.'+this.namespace);
    this.$tableWrapper.trigger('scroll.'+this.namespace);

    return true;
  }

  /**
   * Update for Dynamic Content
   */
  FreezeTable.prototype.update = function() {

    // Same as re-new object
    this.options = 'update';
    this.init();
    return this;
  }

  /**
   * Interface
   */
  // Class for single element
  window.FreezeTable = FreezeTable;
  // jQuery interface
  $.fn.freezeTable = function (options) {

    // Single/Multiple mode
    if (this.length === 1) {

      return new FreezeTable(this, options)
    } 
    else if (this.length > 1) {

      var result = [];
      // Multiple elements bundle
      this.each(function () {
        result.push(new FreezeTable(this, options));
      });

      return result;
    }
    
    return false;
  }

})(jQuery, window);
