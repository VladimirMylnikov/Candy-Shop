;(function(){

    if(window.matchMedia('(max-width: 992px)').matches)
    {
        return;
    }

    var headerpage=document.querySelector('.header-page');

    window.addEventListener('scroll', function() {
        if(window.pageYOffset>0)
        {
            headerpage.classList.add('is-active');
        }
        else
        {
            headerpage.classList.remove('is-active');
        }
    });
})();