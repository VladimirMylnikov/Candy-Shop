;(function(){

    var scroll = function(target){
        var targetTop = target.getBoundingClientRect().top;   
        var scrollTop = window.pageYOffset;
        var targetOffsetTop = targetTop + scrollTop;
        var headerOffset =document.querySelector('header').clientHeight;

        window.scrollTo(0,targetOffsetTop - headerOffset + 25);
    };

    window.myLib.body.addEventListener('click',function(e){
        var target = e.target;
        var scrollToItemClass = window.myLib.closestAttr(target,'data-scroll-to');

        if(scrollToItemClass ===null){
            return;
        }

        e.preventDefault();
        var scrollToItem = document.querySelector('.' + scrollToItemClass);

        if(scrollToItem)
        {
            scroll(scrollToItem);
        }
    });
})();