<?php

const BOARD_H = 7;
const BOARD_W = 16;

$board = array_fill(0, BOARD_H, array_fill(0, BOARD_W, false));

for ($row = 1; $row < BOARD_H - 1; ++$row) {
    for ($col = 1; $col < BOARD_W - 1; ++$col) {
        $board[$row][$col] = boolval(rand(0, 1));
    }
}

echo "0\n";
echo toStr($board);

for ($i = 0; $i < (isset($argv[1]) ? $argv[1] : 100); ++$i) {
    usleep(250000);
    system("clear");
    echo "\n" . ($i + 1) . "\n";
    $board = update($board);
    echo toStr($board);
}


// Print out the board
function toStr($board): string
{
    $out = "";

    foreach ($board as $row) {
        foreach ($row as $cell) {
            $out .= $cell ? "●" : "○";
        }
        $out .= "\n";
    }

    return $out;
}

// Update the board
function update($board)
{
    $newBoard = array_fill(0, BOARD_H, array_fill(0, BOARD_W, false));

    for ($row = 1; $row < BOARD_H - 1; ++$row) {
        for ($col = 1; $col < BOARD_W - 1; ++$col) {
            $newBoard[$row][$col] = intval(countFriends($board, $row, $col));
        }
    }

    for ($row = 1; $row < BOARD_H - 1; ++$row) {
        for ($col = 1; $col < BOARD_W - 1; ++$col) {
            if ($board[$row][$col]) {
                if ($newBoard[$row][$col] === 2 || $newBoard[$row][$col] === 3) $newBoard[$row][$col] = true;
                else $newBoard[$row][$col] = false;
            } else {
                if ($newBoard[$row][$col] === 3) $newBoard[$row][$col] = true;
                else $newBoard[$row][$col] = false;
            }
        }
    }

    return $newBoard;
}

// Count number of neighbors
function countFriends($board, $r, $c): int
{
    $count = 0;

    if (isset($board[$r + 1][$c]) && $board[$r + 1][$c]) ++$count;
    if (isset($board[$r + 1][$c + 1]) && $board[$r + 1][$c + 1]) ++$count;
    if (isset($board[$r][$c + 1]) && $board[$r][$c + 1]) ++$count;
    if (isset($board[$r - 1][$c + 1]) && $board[$r - 1][$c + 1]) ++$count;
    if (isset($board[$r - 1][$c]) && $board[$r - 1][$c]) ++$count;
    if (isset($board[$r - 1][$c - 1]) && $board[$r - 1][$c - 1]) ++$count;
    if (isset($board[$r][$c - 1]) && $board[$r][$c - 1]) ++$count;
    if (isset($board[$r + 1][$c - 1]) && $board[$r + 1][$c - 1]) ++$count;

    return $count;
}

?>