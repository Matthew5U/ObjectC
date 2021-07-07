window.onload = function(){

	var touchSlider = document.querySelector('#touch-slider'); // pobieram elemnt id touchslider
 	var slidesContainer = touchSlider.querySelector('.slides-container'); // pobieram element slideconteiner
	var slides = slidesContainer.querySelectorAll('img'); // pobieramy wszystkie elementy img
	var slidesCount = slides.length; // iloc slajdow
	var slideWidth = slides[0].width; // szerokosc slajda
	var currentSlide = 0; // ktory slajd widoczny


	var animate = function(moveBy){// przesun o ile
		$(slidesContainer).css('transform', 'translate('+moveBy+'%,0)'); // zmienamy css dla elementu
	}

	var showSlide = function(index){ // pokaz slajd
		index = Math.max(0, Math.min(index, slidesCount-1)); // na poczatku wybieramy min wartosc i wybieramy max z dwoch wybranych
		currentSlide = index;// zmieniamy aktulay slajd na ten indeks ktory sie pojawi

		var offset = -((100/slidesCount)*currentSlide); // obliczamy wartosc (musi byc ona minusowa)
		animate(offset);// przekazujemy do animacji 
	}


	var hammer = Hammer(slidesContainer, { //przypisujemy element na stronie z ktorym bedziemy pracowac
		prevent_default: true // zablokowanie scrollowania strony scrolujac slider
	});

	hammer.on('dragleft dragright swipeleft swiperight', function(e){ // obslugiwanie zdarzen dla urzadzen mobilnych

		var slideOffset = -(100/slidesCount)*currentSlide; // przesuniecie slajda
		var dragOffset = ((100/slideWidth)*e.gesture.deltaX) / slidesCount; //przesuniecie slajdcontenera, wartosc przesuniecia palca na osi x

		var m = slideOffset + dragOffset; // definicja przesuniecia
		animate(m); // metoda wyzej 
	});

	hammer.on('release', function(e){ // moment opuszczenia przez palec ekranu
		if(Math.abs(e.gesture.deltaX) > 300){ // spawdzamy ile palcem zostalo przesuniete jesli wiecej od 300
			if(e.gesture.direction == 'right'){ // jesli w prawo gest  to
				showSlide(currentSlide-1); // pokaz slajd poprzedni
			}else{
				showSlide(currentSlide+1); // pokaz nastpeny
			}
		}else{
			showSlide(currentSlide); // jesli nie bylo dostateczne to niech slajder wroci
		}
	});

	hammer.on('doubletap', function(){ // po kliknieciu podwojnym wraca do pierwszego slajdu
		showSlide(0); 
	});
}
