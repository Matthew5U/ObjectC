// NIE DZIALA DLA KLIKNIEC MYSZKI

window.onload = function(){ // podczas ladowania strony

	var canvas = document.getElementById('canvas'); // do zmiennej canvas pobieramy element canvas
	var ctx = canvas.getContext('2d'); // pobieramy kontekst w ktorym bedziemy rysowac


	var onWindowResize = function(){ //definiujemy funkcje
		ctx.canvas.width = window.innerWidth; // maksymalna szerokosc canvas
		ctx.canvas.height = window.innerHeight; // maksymalna wysokosc canvas
	};

	onWindowResize(); // Gdy przeskaluje ekran uruchomi metode
	window.addEventListener('resize', onWindowResize, false); // podczas zmiany rozmiaru


	// canvas.addEventListener('touchstart', function(e){ // przypisujemy zdarzenie touchstart i funkcje zwrotne

	// 	var ox = e.changedTouches[0].pageX; //pozycja dotkniecia naszego elementu. elemnt e od wsyzstkich obiektow dotkniecia na ekranie wybieramy ostatni element o indeksie 0 i bierzemy element pageX
	// 	var oy = e.changedTouches[0].pageY; // -/-

	// 	//alert(ox+" : "+oy); // wyswietlanie alertu

	// 	ctx.beginPath(); // rozpoczynamy rysowanie
	// 	ctx.arc(ox, oy, 4, 0, 2*Math.PI, false); // rysowanie okregu(srodek,promien, moment rysowania kolka, ..)
	// 	ctx.fill(); // uzupelniamy obiekt
	// }, false); 


	// canvas.addEventListener('touchmove', function(e){ // tak jak wyzej tyle ze reaguje na ruch
	// 	e.preventDefault(); // zablokowanie scrollowania strony

	// 	var ox = e.changedTouches[0].pageX;
	// 	var oy = e.changedTouches[0].pageY;

	// 	ctx.lineTo(ox, oy);
	// 	ctx.stroke(); // rysowanie lini

	// }, false);

	var lineColors = { // generuje kolory
        color: {}, // kolory
        getColor: function(id){ // genureujemy kolor dla odpowiedniej lini
            if(!this.color[id]){
				var letters = '0123456789ABCDEF'.split('');
				var color = '#';
				for (var i = 0; i < 6; i++ ) {
					color += letters[Math.round(Math.random() * 15)];
				}
			
                this.color[id] = color;
            }

            return this.color[id];
        }
    };

	var pt = {}; // zmienna z punktami. Historia wszystkich dotniec

	canvas.addEventListener('touchmove', function(e){ // tak jak wyzej zostalo opisane tyle ze reaguje na ruch
		e.preventDefault();

		for(var i=0; i<e.touches.length; i++){ // ilosc wszystkich dotkniec na ekranie

			var id = e.touches[i].identifier; // aktualny id po ktorym numerujemy

			if(pt[id]){ // jesli pt od id istnieje
				ctx.beginPath(); // zaczynamy rysowac
				ctx.moveTo(pt[id].x, pt[id].y); // ustawiamy wskaznik rysowania na punkt w ktorym znajdowal sie palce
				ctx.lineTo(e.touches[i].pageX, e.touches[i].pageY); // rysujemy linie dp punktu aktualnie znajudjacego sie palca
				ctx.lineWidth = 2; // grubosc lini
				ctx.strokeStyle = lineColors.getColor(id); // zmiana  koloru
				ctx.stroke(); // rysowanie lini
			}

			pt[id] = { // zapisuejmy do obiektu pt
				x: e.touches[i].pageX, // wsolrzeda x
				y: e.touches[i].pageY // wspolrzedna y
			};

		}


	}, false);

}
