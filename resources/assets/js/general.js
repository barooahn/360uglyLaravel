if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	$('.nav a').on('click', function(){
	    $('.navbar-toggle').click() //bootstrap 3.x by Richard
	});
}

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-100567586-1', 'auto');
ga('send', 'pageview');

//fullpage scroll

$.scrollify({
    easing: "easeOutExpo",
    scrollSpeed: 1100,
    offset : -50,
    scrollbars: false,
    standardScrollElements: "",
    setHeights: true,
    overflowScroll: true,
    updateHash: true,
    touchScroll:false,
    before:function() {
        if($.scrollify.current().attr('id') !== 'home'){
            console.log('not home');
            $('.arrow').css('display', 'none');
        }
    }
});

$(function() {
  $.scrollify({
    section : "section",
  });
});