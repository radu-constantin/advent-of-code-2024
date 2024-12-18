<?php
/*
Input: string that represents a map with clear paths obstacles and the position and direction of  a 'guard';
  - The input map is formed by a string divided in multiple lines;
  - Each line is by:
    - '.' which represent a clear path;
    - '#' which represent an obstacle;
  - In the input map there is also a symbol representing the guard and the direction he is facing:
    - '^';
    - '>';
    - 'v';
    - '<'.
Output: number that represents the number of distinct positions the guard will visit before leaving the mapped area;

Rules:
- There is one guard;
- At all times the guard is facing a direction (up, down, left, right);
- The guard will travel in a specific direction until it leaves the area or encounters an obstacle;
- If the guard encounters an obstacle he turns 'right' and continues again until he leaves the area or encounters another obstacle;
- The number of distinct positions the guard travels before leaving the area must include the starting position;

Mental model:
1. Identify the initial position of the guard;
2. Record the initial position
3. Identify the initial direction of the guard;
4. Check one step in the direction the guard is pointing;
  - if direction is blocked adjust guard direction to the right and repeat from 4.
  - else * advance one position;
         * check if position has already been recorded, if not record it;
         * if position is an exit point stop, else repeat;

Algorithm:
1. Split the string into an array of arrays;
0 [0, 1, 2, 3, 4]
1 [0, 1, 2, 3, 4]
2 [0, 1, 2, 3, 4]

2. Determine exit points; (function checkIfExit)
In this case the exit points would be line 0 (first) and 2 (last) entirely (if the particular point on the line doesn't have an obstacle);
  if (guardPosition ==== firstLine || lastLine || anyLine[0] || anyLine[lastPos] && guardPosition !== obstacle)

3. Determine initial position and direction of guard;
- find (<,>, ^, v);

  guardCurrentPosition = [lineNumber, positionNumber];

- < = left;
  > = right;
  ^ = up;
  v = down;

  if (left) {
    currentLine[currentPos - 1];
  } elseif (right) {
    currentLine[currentPos + 1]; 
  } elseif (up) {
    currentLine - 1[currentPos];
  } elseif (down) {
    currentLine + 1[currentPos];
  }

4. Function for change direction;

5. Record initial guardPosition in an array guardPath = [];

6. Take steps as in mental model;
*/

$inputMap = [];
$route = [];

function switchDirection(&$guardDirection) {
  if ($guardDirection === '^') {
    $guardDirection = '>';
  } elseif ($guardDirection === '>') {
    $guardDirection = 'v';
  } elseif ($guardDirection === 'v') {
    $guardDirection = '<';
  } elseif ($guardDirection === '<') {
    $guardDirection = '^';
  }
}

function checkPosition($position, $map) {
  return $map[$position[0]][$position[1]];
}

function isPotentialExit($position) {
  global $lastLineIndex, $lastPositionIndex;
  if ($position[0] === 0 || $position[0] === $lastLineIndex || $position[1] === 0 || $position[1] === $lastPositionIndex) {
    return true;
  } else {
    return false;
  }
}

function isExit($position) {
  global $inputMap;
  if (!isPotentialExit($position)) {
    return false;
  } else {
    if (checkPosition($position, $inputMap) !== '#') {
      return true;
    } else {
      return false;
    }
  }
}



$stream = fopen('./day_6_input.txt', 'r');
while ($line = fgets($stream)) {
  $inputMap[] = str_split($line);
}

$lastLineIndex = count($inputMap) - 1;
$lastPositionIndex = count($inputMap[1]) - 1;

$guardPosition = null;
$nextPosition = null;
$guardDirection = '^';

for ($i = 0; $i < count($inputMap); $i += 1) {
  $line = $inputMap[$i];
  $position = array_search('^', $line);

  if ($position) {
    $guardPosition = [$i, $position];
    $route[] = $guardPosition;
    break;
  }
};

while (!isExit($guardPosition)) {
  if ($guardDirection === '^') {
    $nextPosition = [$guardPosition[0] - 1, $guardPosition[1]];
  } elseif ($guardDirection === ">") {
    $nextPosition = [$guardPosition[0], $guardPosition[1] + 1];
  } elseif ($guardDirection=== 'v') {
    $nextPosition = [$guardPosition[0] + 1, $guardPosition[1]];
  } elseif ($guardDirection=== '<') {
    $nextPosition = [$guardPosition[0], $guardPosition[1] - 1];
  }

  if (checkPosition($nextPosition, $inputMap) !== '#') {
    $guardPosition = $nextPosition;
    if (!in_array($guardPosition, $route)) {
      $route[] = $guardPosition;
    } 
  } else {
    switchDirection($guardDirection);
  }
}

var_dump(count($route));

// var_dump($nextPosition);
// var_dump($inputMap[$guardPosition[0] - 1][$guardPosition[1]]);
// var_dump($guardPosition);
// var_dump($route);
// var_dump($inputMap[$guardPosition[0]][$guardPosition[1]]);
