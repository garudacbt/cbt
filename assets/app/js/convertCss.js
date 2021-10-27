(function($) {
    $.extend($.fn, {
        makeCssInline: function() {
            var arrCss = ['animation','appearance','clear','clip',
                'columns','contain','content','cursor','cx','cy',
                'd','direction','display','fill','filter','flex',
                'float','gap','hyphens','inset','isolation','margin',
                'marker','mask','offset','opacity','order','orphans',
                'overflow','page','perspective','position','quotes',
                'r','resize','rx','ry','speak','stroke','transform',
                'transition','visibility','widows','x','y','width','height'];

            //var found = $.inArray(val, array);
            //         return found >= 0;
            this.each(function(idx, el) {
                var style = el.style;
                var properties = [];
                for(var property in style) {
                    if($(this).css(property)) {
                        if ($.inArray(property, arrCss) < 0) {
                            properties.push(property + ':' + $(this).css(property));
                        }
                    }
                }
                this.style.cssText = properties.join(';');
                $(this).children().makeCssInline();
            });
        }
    });
}(jQuery));

