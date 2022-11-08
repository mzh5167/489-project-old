<?php

/** Converts duration from hh:mm format to number of seconds */
function durationToSeconds(string $duration): int | null
{
  if (preg_match('/^(\d{1,2}):(\d{2})$/', $duration, $matches)) {
    return ($matches[1] * 60) + $matches[2];
  } else {
    return null;
  }
}

/** Converts duration from number of minutes to hh:mm format */
function minutesToDuration(int $minutes): string
{
  // Becuase seconds and 60 are integers `$h` has to be an integer
  $h = $minutes / 60;
  $m = $minutes % 60;
  return sprintf("%02d:%02d", $h, $m);
}
