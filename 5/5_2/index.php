<?php
$i = 0;

while ( $i < 10) {
	$i++;
	
	if ($i % 2)
	{
		continue; // Pokazuje tylko parzyste liczby
	}
	// continue blokuje dzialanie petli i idze dalje po itracji
	echo $i . '<br/>';


	/*
	if ( $i == 5)
	{
	break; // Przerwanie petli
	}
	*/	

}







