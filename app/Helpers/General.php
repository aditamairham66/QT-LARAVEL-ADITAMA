<?php

namespace App\Helpers;

class General
{
  static function formatUang($angka)
  {
    if ($angka >= 1000000) {
      return rtrim(rtrim(number_format($angka / 1000000, 1, ',', '.'), '0'), ',') . ' juta';
    }
    return number_format($angka, 0, ',', '.');
  }
}
