<?php
$text = fopen('./day_1_input.txt', "r");

$firstColumn = [];
$secondColumn = [];

while($line = fgets($text)) {
  $pair = preg_split('/\s+/', trim($line));
  $firstColumn[] = $pair[0];
  $secondColumn[] = $pair[1];
};
