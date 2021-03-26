<?php
require_once("class/WitchClass.php");

$yod = $_POST['year_of_death']??'';
$aod = $_POST['age_of_death']??'';
$avg = 0;

if ($yod != '' && $aod != '') {  
  $witch = new WitchClass;
  $data = array();

  for ($i=0; $i < count($yod); $i++) { 
    $item = array("year_of_death"=>$yod[$i], "age_of_death"=>$aod[$i]);
    array_push($data, $item);
  }

  $avg = $witch->getPeopleOfKilled($data);
}

?>

<style>

  .container{
    margin: 30 35 5 35;
    padding: 20px;
  }

  div{
    margin: 10px;
    padding: 5px;
  }

  th{
    color:#44444a;
  }

  td{
    color:#5d5b5b;
  }
  .td-left{
    background-color: #fdcece;
  }
  .td-right{
    background-color: #a3a3f9;
  }
  .td-head-left{
    background-color: #fb6868;
  }
  .td-head-right{
    background-color: #6565fb;
  }

  .td-button{
    padding:20px;
    text-align: right;
  }

  .td-avg{
    background-color: #ceced4;
    color: #615d5d;
    padding: 20px;
    font-size: larger;
    font-weight: bold;
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Witch Game</title>
</head>
<body>

<div class="container">
  <center>
    <h1> Witch Game Present by: GeekSeat </h1>
  </center>
  
  <p>Somewhere far far away, there is a village which is controlled by a dark and cunning witch.<br>
  Coincidentally, this witch is also a die-hard programmer.</p>

  <p>The witch has power to control death and life of the villager.
  The witch will kill a number of villagers each year.</p>

  <p>Since the witch is a die hard programmer, she follow a specific rule to decide the number of villagers
  she should kill each year.</p>

  <p>The villagers are furious with the witch and want to get rid of her and there is one way to get rid of
  her.</p>

  <p>The witch will only leave if there is a brave programmer in the villager who can create a program to
  solve this problem:</p>

  </p>
    <p>
      <code>
        Rule Of the game :
        <ol>
          <li>If given two people whose age of death and year of death are known, find the average number of people the witch killed on year of birth of those people.</li>
          <li>If you give invalid data (i.e. negative age, person who born before the witch took control) the program should return -1.</li>
          <li>The witch loves OOP and math very much. And also note that year is started since the witch take control of the village.</li>
        </ol>
      </code>
    </p>

    <form id="form" method="POST" action="#">

      <table>
      <tr>
        <th class="td-head-left">
          <h3>People 1</h3>
        </th>

        <th class="td-head-right">        
          <h3>People 2</h3>
        </th>
      </tr>
      <tr>
        <td class="td-left">
          <p>
            <div>
              <span> Year Of Death </span> 
              <input type="number" name="year_of_death[]" placeholder="Year Of Death" value="<?php echo $yod[0];?>">
            </div>
            
            <div>
              <span> Age of Death </span> 
              <input type="number" name="age_of_death[]" placeholder="Age of Death" value="<?php echo $aod[0];?>">
            </div>
          </p>
        </td>
        
        <td class="td-right">
          <p>
            <div>
              <span> Year Of Death </span> 
              <input type="number" name="year_of_death[]" placeholder="Year Of Death" value="<?php echo $yod[1];?>">
            </div>
            
            <div>
              <span> Age of Death </span> 
              <input type="number" name="age_of_death[]" placeholder="Age of Death" value="<?php echo $aod[1];?>">
            </div>
          </p>
        </td>
      </tr>
      <tr>
        <td colspan="2" class="td-avg">
          <span> Average </span> :  
          <strong> <?php echo $avg;?> </strong>
        </td>
      </tr>

      <tr>
        <td colspan="2" class="td-button">
          <button type="submit">SUBMIT</button>
        </td>
      </tr>
    </table>

    </form>

</div>
</body>
</html>

<script src="main.js"></script>
