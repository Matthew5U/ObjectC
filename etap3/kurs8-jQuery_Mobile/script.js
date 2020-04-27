// Funkcja odpowaadajaca za wyswietlanie danych
function showPosts(data){
	//console.log(data.posts[0].title) // pierwszy wpis i wyjmujemy z niego tytul
	
	// Zmienna reprezentujaca kod html
	var html = '<ul data-role="listview">';
	
	// parametr pobierania date i wyciagniecie wpisow czyli post i dla kazdego elementu wykonujmy funckje
	// zbior wszystkich postow (data.posts)
	$.each(data.posts,function(k,v){
		//console.log(v.title);
		html += '<li>';
		// v.id - idnetyfikaotr wpisu wyswietli sie po kliknieciu 
		html += '<a href="#post" onclick="loadPost(' + v.id + ')">'
		
		// tytul wpisu
		html += '<h3>' + v.title + '</h3>';
		
		// poczatkowy fragment wpisu
		html += '<p>' + v.excerpt + '</p>';
		html += '</a>'
		html += '</li>';
	});
	html += '</ul>';

	// wstawimy jako kod html dzieki biblitoece jquery
	$('#blog-wrapper').html(html);
}

// jeden wpis
// ladowanie wpsiow
function loadPost(id){
	
	//adres danych 
	// identyfiakot wpisu 
	// callback - funkcja wywolana automatycnza po wczytaniu danych
	// dane zwracajace z naszego serwera
	$.getJSON('http://blog.strefakursow.pl/?json=get_post&post_id=' + id + '&callback=?', function(data){
		var html = '';

		// pojedynczy wpis tytul
		html += '<h3>' + data.post.title + '</h3>';
		
		// tresc wpisu
		html += data.post.content;
		$('#post-wrapper').html(html);
	});
}


// VIDEO
function showVideos(data){
	//var html ='';

	//elementy
	console.log(data.feed);
	var html = '<ul data-role="listview">';
	
	// sprawdzamy dlugosc elemenow

	// dla tej dlugosci numerujemy do ilosci wszystkich filmow
	for (var i=0; i<data.feed.entry.length; i++){
		
		// wyciagamy tytul
		var title = data.feed.entry[i].title.$t;
		
		// przechowuje miniaturke
		var thumb = data.feed.entry[i].media$group.media$thumbnail[1].url;
		
		// pobieramy id filmy
		var id = data.feed.entry[i].id.$t.substring(38);
		
		// opis
		//var desc = data.feed.entry[i].media$group.media$description.$t;
		
		//data publickacji
		//var published = data.feed.entry[i].published.$t;
		
		// liczba odslon		
		var views = data.feed.entry[i].yt$statistics.viewCount;
		
		html += '<li>';
		//html += '<a href=' + ytlink + '>';
		//html += '<a href="#player" onclick="loadPlayer(\'' + id + '\',\' + title + '\')" >';
		
		// storna pojedynczego filmu - id
		html += '<a href="#player" onclick="loadPlayer(\'' + id + '\',\'' + title + '\')" >';
		
		//miniaturka
		html += '<img src="' + thumb +' " alt="' + title + '">';
		
		html += '<h3>' + title + '</h3>';
		html += '<p>Odsłony: ' + views + '</p>';
		html += '</a>';
		html += '</li>';
	}
	
	html += '</ul>';
	$('#videos-wrapper').html(html);
}

// pojedynczy film
//ladowanie filmu
function loadPlayer(id, title){
	var html = '';
	html += '<iframe width="640" height="360" src="http://youtube.com/embed/' + id + '?wmode=transparent&amp;rel=0&amp;showinfo=0&amp;" autoplay="1" frameborder="0" allowfullscreen seamless></iframe>'; 
	html += '<h3>' + title + '</h3>';
	$('#video').html(html);
}

/*

// informacje o filmach
// autor itp (wszystko)
console.log(data.feed);

//kolekcja filmow
data.feed.entry.length

//informacje o filmie
data.feed.entry[0]

//dlugosc filmu
data.feed.entry[0].title.$t

// dlugoc filmu w sekundach
data.feed.entry[0].media$group.yt$duration.seconds

// zaczynamy od elementu 38 i pobieramy id filmu
data.feed.entry[0].id.$t.substring(38)

*/
