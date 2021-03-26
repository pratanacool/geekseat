<?php
class WitchClass{

    private function getPattern($bornOfYear)
    {
      try {
        $pattern = -1;

        if ($bornOfYear == 1) {
          $pattern = 1;
        }
        elseif ($bornOfYear > 1) {
          $pattern = array();
          for ($i=0; $i < $bornOfYear; $i++) { 

            if ($i == 0) {
              array_push($pattern, 1);
            }elseif($i == 1){
              array_push($pattern, $i);
            }
            else {
              $tPattern = count($pattern);
              $n1 = $tPattern - 1;
              $n2 = $tPattern - 2;

              $rs = $pattern[$n1] + $pattern[$n2];
              array_push($pattern, $rs);
            }

          }
        }

        return $pattern;
      } catch (Exception $e) {
        return "Error get pattern : ".$e->getMessage();
      }
    }

    public function getPeopleOfKilled($data)
    {
      try {
        $cData = count($data);
        $total = 0;

        for ($i=0; $i < $cData; $i++) { 
          $item = $data[$i];
          $bornOfYear = $item['year_of_death'] - $item['age_of_death']; 
          if ($bornOfYear <1) {
            return "-1";
          }
          $pattern = $this->getPattern($bornOfYear);

          $total += array_sum($pattern);

        }

        $peopleOfKilled = $total / $cData;
        return $peopleOfKilled;
      } catch (Exception $e) {
        return "Error people of killed : ".$e->getMessage();
      }
    }

}