<?php
namespace App\Controllers;

class RepairJSON
{
  public function repairUnqotedJsonValues(string $json) : string {
      $json = str_replace(": ", ":", $json);
      $json = str_replace("{ ", "{", $json);
      $json = str_replace(" }", "}", $json);
      $quotes = 0;
      $fixMode = false;
      $repaired = [];

      foreach (mb_str_split($json) as $char) {
          $add = [$char];

          if ($fixMode) {
              if ($char === ":") {
                  array_push($add, "\"");
              }

              if ($char === "," || $char === "}") {
                  array_unshift($add, "\"");
              }

              if ($char === "\"") {
                  $fixMode = false;
              }
          }

          $repaired = array_merge($repaired, $add);

          if ($char === "\"") {
              $quotes++;
          }

          if ($quotes === 2) {
              $fixMode = true;
              $quotes = 0;
          }
      }

      return implode("", $repaired);
  }

}
