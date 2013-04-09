(function($) {
   
    var methods = {
        init : function(options) { 
            settings = $.extend( {
                'width'         : 100,
                'height'        : 100,
                'speed'         : 500
            }, options);
            
            var self = this;
            var widthSlider = 0;
            var navigation = false;
            var navSlider = self.find('.slider-nav');
            
            //если есть навигация
            if(navSlider.length > 0){navigation = true;}
            
            self.width(settings.width).height(settings.height);
            self.find('.s-item').each(function(index){
                if(navigation){
                    navSlider.append('<span></span>');
                    if(index == 0){navSlider.find('span').first().addClass('current-nav');}
                }
                if(index == 0){
                    $(this).addClass('current-slide');
                }
                $(this).width(settings.width).height(settings.height);
                widthSlider += settings.width;
            });
            
            self.children('.slider').width(widthSlider);
            
            //Обработчики для кнопочек вправо/влево
            var current;
            
            self.find('.move-right').click(function(){
                if(self.children('.slider').is(':animated')){
                    return false;
                }
                if(!current){
                    current = self.find('.current-slide');
                }
                var next = current.next();
                if(next.length > 0){
                    if(navigation){
                        var index = self.find('.s-item').index(next);
                        navSlider.find('span').removeClass('current-nav').eq(index).addClass('current-nav');
                    }
                    current.removeClass('current-slide');
                    next.addClass('current-slide');
                    current = next;
                    var left = self.children('.slider').css('left');
                    left = parseInt(left.replace('px', ''));
                    self.children('.slider').animate({left: (left - settings.width) + 'px'}, settings.speed);
                }else{
                    current.removeClass('current-slide');
                    current = self.find('.s-item').first();
                    current.addClass('current-slide');
                    if(navigation){
                        navSlider.find('span').removeClass('current-nav').eq(0).addClass('current-nav');
                    }
                    self.children('.slider').animate({left: '0px'}, settings.speed);
                }
            });
            
            self.find('.move-left').click(function(){
                if(self.children('.slider').is(':animated')){
                    return false;
                }
                if(!current){
                    current = self.find('.current-slide');
                }
                var prev = current.prev();
                if(prev.length > 0){
                    if(navigation){
                        var index = self.find('.s-item').index(prev);
                        navSlider.find('span').removeClass('current-nav').eq(index).addClass('current-nav');
                    }
                    current.removeClass('current-slide');
                    prev.addClass('current-slide');
                    current = prev;
                    var left = self.children('.slider').css('left');
                    left = parseInt(left.replace('px', ''));
                    self.children('.slider').animate({left: (left + settings.width) + 'px'}, settings.speed);
                }else{
                    current.removeClass('current-slide');
                    current = self.find('.s-item').last();
                    current.addClass('current-slide');
                    if(navigation){
                        var count = self.find('.slider-nav span').length - 1;
                        navSlider.find('span').removeClass('current-nav').eq(count).addClass('current-nav');
                    }
                    self.children('.slider').animate({left: (-widthSlider + settings.width) + 'px'}, settings.speed);
                }
            });
            //Обрабатываем клик на навигацию
            if(navigation){
                navSlider.find('span').click(function(){
                    
                    if(self.children('.slider').is(':animated') || $(this).hasClass('current-nav')){
                        return false;
                    }
                    if(!current){
                        current = self.find('.current-slide');
                    }
                    
                    var index = navSlider.find('span').index(this);
                    navSlider.find('span').removeClass('current-nav');
                    navSlider.find('span').eq(index).addClass('current-nav');
                    
                    current.removeClass('current-slide');
                    current = self.find('.s-item').eq(index);
                    current.addClass('current-slide');
                    
                    self.children('.slider').animate({left: (-index * settings.width) + 'px'}, settings.speed);
                });
            }
        }
    };
    
    $.fn.slider = function(method) {
        // Method calling logic
        if ( methods[method] ) {
          return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
          return methods.init.apply( this, arguments );
        } else {
          $.error( 'Method ' +  method + ' does not exist on jQuery.slider' );
        }    
    };
    
})(jQuery)