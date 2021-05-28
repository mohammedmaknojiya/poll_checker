<?php

include './db.php';

?>
<!---count votes-->
<?php

$query="SELECT `option_select` FROM `poll_table`";
$query_run = mysqli_query($connect,$query);
$final = [];
while($row = mysqli_fetch_assoc($query_run)){
$final[] = $row['option_select'];
}
//$array=array(json_encode($final));
$s=implode($final);
$total_len=strlen($s);
$count_1=0;
$count_2=0;
$count_3=0;
$count_4=0;

 for($x=0;$x<strlen($s);$x++){
     if($s[$x]=="1"){
        $count_1++;
     }
     elseif($s[$x]=="2"){
        $count_2++;
     }
     elseif($s[$x]=="3"){
        $count_3++;
     }
     elseif($s[$x]=="4"){
        $count_4++;
     }
 }
$per_1_count=($count_1/$total_len)*100;
$per_2_count=($count_2/$total_len)*100;
$per_3_count=($count_3/$total_len)*100;
$per_4_count=($count_4/$total_len)*100;
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Poll Results</title>
  </head>
  <body>
    <h1 class="text-center py-2  bg-info">Poll Results</h1><br>
    <div class="container border border-1 px-5 py-5">
    
    <h3>Total No of Votes:<?php echo $total_len;?></h3>
    <h4>Votes for Miguel de Cervantes:<?php echo $count_1;?></h4>
    <h4>Votes for Charles Dickens:<?php echo $count_2;?></h4>
    <h4>Votes for J.R.R. Tolkien:<?php echo $count_3;?></h4>
    <h4>Votes for Antoine de Saint-Exuper:<?php echo $count_4;?></h4>
    <hr><br>
    <h4>Poll Chart:</h4>
    <h4>Votes for Miguel de Cervantes:</h4>
        <div class="progress mb-2">
        <div class="progress-bar " role="progressbar" aria-valuenow="0" style="width: <?php echo $per_1_count.'%';?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4>Votes for Charles Dickens:</h4>
        <div class="progress mb-2">
        <div class="progress-bar" role="progressbar" style="width: <?php echo $per_2_count.'%';?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4>Votes for J.R.R. Tolkien:</h4>
        <div class="progress mb-2">
        <div class="progress-bar" role="progressbar" style="width: <?php echo $per_3_count.'%';?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4>Votes for Antoine de Saint-Exuper:</h4>
        <div class="progress mb-2">
        <div class="progress-bar" role="progressbar" style="width: <?php echo $per_4_count.'%';?>" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <br>
        <a  href="index.php"> <button  class="btn btn-primary"  >Voting Page !</button></a>
    </div>
    <br><br>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>

