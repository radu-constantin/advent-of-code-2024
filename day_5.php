<?php
$stream = fopen("./day_5_input.txt", "r");

$rules = [];
$pages = [];

while ($line = fgets($stream)) {
  $line = trim($line);
  if (strpos($line, '|')) {
    $rules[]=preg_split('/\|/', $line);
  } elseif (strlen($line) > 0) {
    $pages[]=preg_split('/,/', $line);
  }
}

$correctPages = [];

foreach($pages as $page) {
  $correctPage = true;
  forEach($rules as $rule) {
    if (in_array($rule[0], $page) && in_array($rule[1], $page)) {
      if (array_search($rule[0], $page) > array_search($rule[1], $page)) {
        $correctPage = false;
        break;
      }
    }
  }
  if ($correctPage) {
    $correctPages[] = $page;
  }
}

$middlePageSum = 0;

foreach($correctPages as $page) {
  $index = intdiv(count($page), 2);
  // var_dump($page);
  echo ("$index ");
  $middlePageSum += $page[$index];
  echo ("$page[$index] \n");
  // echo ("Sum: $middlePageSum \n");
}

echo $middlePageSum;
/*
Go through each page list;
  - for each page list check if update pages are included;
    - if included check if first update is before the second update;
  - if page list passes all rules store it in special list;
*/
