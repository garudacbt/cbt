$(function(){
    $('.thumb > img').each(function(){
		p_width=$(this).parent().width();
		p_height=$(this).parent().height();
		n_width=$(this).get(0).naturalWidth;
		n_height=$(this).get(0).naturalHeight;
		p_aspect = p_width / p_height; 
		n_aspcet = n_width / n_height; 
		$(this).css({'position':'relative'});
		$(this).parent().css('overflow','hidden'); 
		if(n_aspcet < p_aspect){ 
        	$(this).width(p_width);
			$(this).height("auto");
			$(this).css({'bottom':(p_width / n_aspcet - p_height) / 2}); 
		}else{
        	$(this).width("auto");
			$(this).height(p_height);
			//$(this).css({'right':(p_height * n_aspcet-p_width)/2});
		}
    });
});
