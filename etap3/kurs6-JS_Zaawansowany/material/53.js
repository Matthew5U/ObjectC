window.addEventListener('load',function(){
	
	var bopen = document.getElementById('open');
	
	bopen.addEventListener('click',function(){
		var win = window.open('', 'nowe okno', 'height=300, width=300');
		win.resizeTo(400,250);
		win.outerHeight = 250;
		win.outeridth = 400;

		win.moveTo(200, 200);

		win.close();
		win.setTimeout(function()
		{
			this.close()
		},
		3000);
	});

})
