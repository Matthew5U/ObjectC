// JavaScript Document

$(document).ready(function()
{
	$('nav .menu .sub-menu a').each(function(index, element)
	{
		var $this = $(this);
		$this.parent().addClass($this.attr('title'));

		if($this.attr('title') == 'all')
		{
			$this.append($('<span/>'));
		}

	});

	$('nav .menu .sub-menu a').last().css('border-bottom', '0');


	// header slider

    $('#header.home-slider .slides').carouFredSel({
        scroll: { 
            items: 1,
            fx: 'fade'
        },
        pagination: {
            container: $('#header.home-slider .pagination ul'),
            anchorBuilder: function(nr){
                return '<li><a href="#">'+nr+'</a></li>';
            }
        }
	});
	

	$('#home .boxes .box').mouseover(function()
	{
		var $this = $(this);

		if($this.find('.step2').size() >0)
		{
			$this.find('.step1').hide();
			$this.find('.step2').show();
		}
	});

	$('#home .boxes .box').mouseout(function()
	{
		var $this = $(this);

		if($this.find('.step2').size() >0)
		{
			$this.find('.step2').hide();
			$this.find('.step1').show();
		}
	});


});
