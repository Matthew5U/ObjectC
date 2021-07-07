window.addEventListener('load',function(){
	
	var bopen = document.getElementById('open');
	bopen.addEventListener('click',function(){

		var info = navigator.appCodeName;
		var info = navigator.platform;
		var info = navigator.cookieEnabled;
		var info = navigator.userAgent;
		

		alert(info);

	})

})
