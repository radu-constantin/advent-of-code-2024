<?php
$stream = fopen("./day_5_input.txt", "r");

$rules = [];
$pages = [];

while ($line = fgets($stream)) {
  $line = trim($line);
  if (strpos($line, '|')) {
    $rules[]=preg_split('/\|/', trim($line));
  } elseif (strlen($line) > 0) {
    $pages[]=preg_split('/\'/', $line);
  }
}

var_dump($pages);



/*
Go through each page list;
  - for each page list check if update pages are included;
    - if included check if first update is before the second update;
  - if page list passes all rules store it in special list;
*/
