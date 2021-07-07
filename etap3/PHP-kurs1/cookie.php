<?php

    setcookie('test', 'kot');

    setcookie('rand', random_int(0, 10), time() + 10, null, null, null, true);

?>
