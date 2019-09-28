
Webflow.push(function() {
  $('.menu-boton').click(function(e) {
e.preventDefault();
	$('body').css('overflow', 'hidden');
  });

  $('.menu-boton').click(function(e) {
e.preventDefault();
	$('body').css('overflow', 'auto');
  });
});
