(function($){
	$(document).ready(function(){ // kiedy gotowy dokument

		(function(){
			var $slider = $('#header .slider'); // pobiermay nasz slider
			var $slides = $slider.find('.slide'); // pobieramy wszystie slajdy
			var $currSlide = $slides.first(); // widoczny slajd

			$slides.hide(); // ukrywamy wszystkie slajdy
			$currSlide.show(); // pokazujemy aktualny slajd

			$slider.find('.nav').click(function(){ // znajdujowanie przyciskow i po kliknieciu
				var $this = $(this); // i przypisujemy jej aktualnie klikniety element
				var $nextSlide; // przypisanie nastepnego slajdu

				if($this.hasClass('prev')){ // sprawdzamy czy przycisk posiada klase prev
					$nextSlide = $currSlide.prev('.slide'); // esli tak to pokazujemy poprzedni element z klasa slajd
					if($nextSlide.size() < 1){ // jesli elementow nie znalesziono 
						$nextSlide = $slides.last(); // to przypisujemy ostatni slajd
					}
				}else{ 
					$nextSlide = $currSlide.next('.slide'); // w przeciwnym przypadku to przypisujem do current next
					if($nextSlide.size() < 1){ // jesli nie ma to
						$nextSlide = $slides.first(); // pobieramy pierwszy
					}
				}

				$currSlide.fadeOut('medium'); // ukrywamy obecny 
				$nextSlide.fadeIn('medium'); // pokazujemy nastepny

				$currSlide = $nextSlide; // i zapisujym nastpeny do obecnego
			});
		})();
		

		
		(function(){
			
			var $slider = $('#section2 .slider'); // wybieramy element nadrzedny
			var $slidesContainer = $slider.find('.slides-container'); // caly kontener pobieram
			var $slides = $slidesContainer.children(); // pobieramy wszystkie slajdy
			var $pagination = $slider.find('.pagination'); // paginacja
			
			var slidesCount = $slides.size(); // ilosc slajdow

			$pagination.empty(); // wyczsci wszystkie elementy i utowrzy odpowenia ilosc li i spac
			for(var i=0; i<slidesCount; i++){
				$pagination.append($('<li><span>'));
			}
			var $paginationItems = $pagination.find('li');

			$slidesContainer.css({ 
				'width': (slidesCount*100+'%'), // nadajemy szerkosc rowna ilosc slajdow * 100%
				'margin-left': '0%'
			});

			$slides.css('width', ((100/slidesCount)+'%')); // odpowiendia szerokosc

			$paginationItems.click(function(e){ // po kliknieciu pobieramy index
				e.preventDefault();

				var $this = $(this);
				$pagination.find('li').removeClass('active');
				$this.addClass('active');

				var index = $this.index(); // pobieramy index

				var newPost = (index*-100); // monozymy to razy -100
	
				$slidesContainer.animate({'margin-left': (newPost+'%')}, 'slow');
			}).first().click(); // i animujemy margin left do nowej wartosci
			// przesuwa obraz w zaleznosci od marginesu czyli co 100
		
		})();


	});
})(jQuery); 
