window.addEvent('domready', function(){
	function UpdateQueryString(a,b,c){c||(c=window.location.href);var d=RegExp("([?|&])"+a+"=.*?(&|#|$)(.*)","gi");if(d.test(c))return b!==void 0&&null!==b?c.replace(d,"$1"+a+"="+b+"$2$3"):c.replace(d,"$1$3").replace(/(&|\?)$/,"");if(b!==void 0&&null!==b){var e=-1!==c.indexOf("?")?"&":"?",f=c.split("#");return c=f[0]+e+a+"="+b,f[1]&&(c+="#"+f[1]),c}return c}

	$$('a').each(function(el){
		el.set('href', UpdateQueryString( 'rokgallery_rokbox', 1, el.get('href') ) );
	});
});