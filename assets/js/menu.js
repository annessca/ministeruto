(function($){

    $(function() {
        loopNavigation();
    });

    function loopNavigation() {
        var pagePath = window.location.pathname;
        var arr = [];
        $('#navigation a').each(function(){
            arr.push(pagePath);
        });
       
        $.each( arr, function( key, value ) {
            $('#navigation a').each(function(){
                if(pagePath === value && this.href === window.location.origin + value){
                    $(this).addClass('active');
                }
                else if(pagePath === value && this.href === window.location.origin + value.slice(0, -1)){
                    $(this).addClass('active');
                }
            });
        });
    }
    
})(jQuery);