<?php
/* Converts duration from hh:mm format to number of seconds */
function durationToSeconds(string $duration) : int | null
{
  if (preg_match('/^(\d{1,2}):(\d{2})$/', $duration, $matches)) {
    return ($matches[1] * 60) + $matches[2];
  } else {
    return null;
  }
}
