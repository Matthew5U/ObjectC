$(document).ready(function() {
	
	//element informacji

	//zmienna inforcontent przypisuejmy obiek  jqery
	var $infoContent = $('#details .info .content');
	
	//zazanczamy ta sciezke i podmieniamy css
	$('#details .info .content')
		.css({
			//pobieramy wysokosc
			height: $('#details .info .content').height(),
			//odsuwamy od gornej krawedzi
			top: ($('#details .info .content').height()/2)*-1			
			});
			
	// animacja odliczania		
	var i = 3;
	//interwal
	var interval = setInterval(function(){
		// zaznaczamy obiekt > atrybut > zmieniamy obrazek
		$('#details .timer .right img').attr('src', 'img/counter_'+i+'.png');
		i--;
	
		//jesli mniejsze od zera
		if(i < 0) {
			//czyscimy interwal
			clearInterval(interval);
			
			//podmieniamy obrazek na obrazek piesci
			$('#details .timer img').attr('src', 'img/counter_fist.png');
			
			//odapalamy animacje
			runAnimation();
		}
		//interwal 1000ms
	}, 1000);
	



	// ukrywamy elementy ze sceny
	$('#details header').hide();
	
	// trzymamy naglowek ktory bedzie wjedzal
	var $header = $('#details header h2');

	//odpalamy funckje
	$header.each(function() {
        var $this = $(this);
		// odnajdziemy element span
		var $span = $this.find('span');
		//span width
		var spanWidth = $span.width();
		//przesuwamy o jego szrokosc *-1 jesli to jest span lewy 
		if($span.hasClass('left')) {
			$span.css('left', spanWidth*-1);
		} 
		// jesli span prawy to przesuwamy do prawej strony
		else {
			$span.css('right', spanWidth*-1);
		}

		//ukrywa nam element
		$span.css('opacity', 0);
    });
	

	//chowamy dwa obrazki ze zdjeciami
	//zaznacamy klase opponent dla kazdego odalamy funkcje
	$('.opponent').each(function() {
        var $this = $(this);
		
		//zmiena hide
		var hideCss = {};
		//jesli ma klase dobry
		if ($this.hasClass('good')) {
			//ustalamy style css ktore pozniej przypiszym
			//headerowi i details
			hideCss = {
				header: {
					top: '30px',
					left: '30px'
				},
				details: {
					right: '0px'
				}
			}

		//jesli klasa bad to dokladnie to samo
		} else {
			hideCss = {
				header: {
					top: '30px',
					left: '30px'
				},
				details: {
					right: '0px'
				}
			}
		}	
		
		//odnajdujemy header i details i dokaldamy nasz css
		$this.find('.header').css(hideCss.header);
		$this.find('.details').css(hideCss.details);
		
		//ukrywamy img p ul
		$this.find('img').hide();
        $this.find('p').hide();
        $this.find('ul').hide();
    });
	
	// ukrywamy
	$('#details .info, #details .tags').hide();
	

	//nasza funkcja
	function runAnimation() {
		//pokazujemy naglowek
		$('#details header').fadeIn('medium');
		
		var headerCount = 0;

		//funkcja dla header
		$header.each(function() {
			//zmienna this
			var $this = $(this);
			//odnajdujemy span
			var $span = $this.find('span');
			//szerkosc span
			var spanWidth = $span.width();
			

			//opcja animacji
			var animOpts = {};
			
			//jesli ma klase left to prrzypisujemy animopts right 0
			if($this.hasClass('left')) {
				animOpts = {right: '0px'};
			} else {
				animOpts = {left: '0px'};
			}
			//przezroczstoc brak
			animOpts.opacity = 1;
			
			//animujemy span, zmiana css, szybkoc, funkcja
			$span.animate(animOpts, 'slow', function() {
				//musimy dwa razy wykonac polecenia gdy
				// najpierw wyskoczy nam klasa lewa a pozniej klasa prawa
				headerCount++;
				
				//jesli rowny 2 czyli nagloki sie zanimowaly
				if(headerCount == 2) {
					//zaznaczamy opponent
					$('.opponent').each(function() {
                        var $this = $(this);
						 
						//animujemy wartosci dla good i bad(elsa)
						var animOpts = {};
                        if($this.hasClass('good')){
                            animOpts = {
                                header: {
                                    top: '-30px',
                                    left: '-30px'
                                },
                                details: {
                                    right: '-70px'
                                }
                            }
                        }else{
                           animOpts = {
                                header: {
                                    top: '-30px',
                                    left: '210px'
                                },
                                details: {
                                    left: '-70px'
                                }
                            } 
                        }
						
						//odnajdujemy header i deatail i stosujemy animacje
						$this.find('.header').animate(animOpts.header, 'medium');
						$this.find('.details').animate(animOpts.details, 'medium');
						
						//ukrywamy znak zapytania
						$this.find('.image div').fadeOut('medium');
						
						//funkcja sekwencyjna
						//znajdujemy obrazek img 
						//jka zobie fade in i wtedy pojawia sie akapit
						//i nastepna funckja czyli liste
						//a lista zjezdza na dol
						$this.find('.image img').fadeIn('medium', function(){
                            $this.find('p').fadeIn('medium', function(){
                                $this.find('ul').slideDown('medium', function(){
                                    $('#details .info, #details .tags').delay(200).fadeIn('slow');
                                });
                            });
                        });
                    });
					}
				});
        });
	}
	
	
});
