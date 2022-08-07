<?php

// https://github.com/laravel/ideas/issues/1293#issuecomment-416681697
function intWithStyle($n)
{
  if ($n < 1000) return $n;
  $suffix = ['','K','M','G','T','P','E','Z','Y'];
  $power = floor(log($n, 1000));
  return round($n/(1000**$power),1,PHP_ROUND_HALF_EVEN).$suffix[$power];
};