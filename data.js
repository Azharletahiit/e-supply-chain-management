$(document).ready(function () {
    // sidemenu
    var url = window.location.href;
    $('ul.sidebar-nav li a').each(function(){
        if (this.href == url) 
        {
            $(this).parent().addClass("active").parent("ul").slideDown().parent().addClass('active');
            //$(this).parent().addClass("active").parent().parent("li").slideDown().addClass("open");
            //$(this).parent().addClass("active").parent("ul").slideDown().parent().addClass('open');
        }
    });
});