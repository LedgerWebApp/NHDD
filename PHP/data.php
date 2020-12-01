<?php
include('pdo1.php');
session_start();
$t=time();
$p=date("m",$t);
?>
<?php
for ($i = 1; $i <= 6; $i++)
{
   $startmonths[] = date("Y-m-d",strtotime( date( 'Y-m-01' )." -$i months"));
}
for ($i = 1; $i <= 6; $i++)
{
   $endmonths[] = date("Y-m-d", strtotime( date( 'Y-m-30' )." -$i months"));
}
$dataviewing=new Database_Connection();
$totalcost=array(0,0,0,0,0,0);
for($i=1;$i<=6;$i++)
{
  $sql = $dataviewing->dateviewing('Occasional',$startmonths[$i],$endmonths[$i], 'Nitanshu' );
$totalcost[$i]=0;
                while ($row=mysqli_fetch_array($sql)) {

                     echo($row['cost']);
			echo($row['name']);?>

<?php
  // occasional monthly data totalcost[1] sum of occasional cost of previous month
  $totalcost[$i]=$totalcost[$i]+$row['cost'];
}
 echo('total');


 echo($totalcost[$i]);
echo('<br>');
                    }
$totalcost1=array(0,0,0,0,0,0);
for($i=1;$i<=6;$i++)
{
  $sql = $dataviewing->dateviewing('monthly',$startmonths[$i],$endmonths[$i],'Nitanshu');
$totalcost1[$i]=0;
                while ($row=mysqli_fetch_array($sql)) {

                     echo($row['cost']);
			echo($row['name']);?>

<?php
                 // occasional monthly data totalcost[1] sum of daily cost of previous month
			              $totalcost1[$i]=$totalcost1[$i]+$row['cost'];
}
 echo('total');
 echo($totalcost1[$i]);
echo('<br>');
                    }
$dataviewing=new Database_Connection();
$totalcost2=array(0,0,0,0,0,0);
for($i=1;$i<=6;$i++)
{
  $sql = $dataviewing->dateviewing('daily',$startmonths[$i],$endmonths[$i],'Nitanshu');
$totalcost2[$i]=0;
                while ($row=mysqli_fetch_array($sql)) {

                     echo($row['cost']);
			echo($row['name']);?>

<?php

			              $totalcost2[$i]=$totalcost2[$i]+$row['cost'];
}
 echo('total');
 echo($totalcost2[$i]);
echo('<br>');
        }
?>
