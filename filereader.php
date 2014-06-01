<?php


function calculate_average($data){
	#This function calculates the average of the data contained in $data.

	$arrlength=count($data);#calculates the number of data points

	#calculate the mean

	$sum=0;

	for($x=0;$x<$arrlength;$x++)
 	{
		$sum+=$data[$x];
  	}

	$mean = $sum/$arrlength;

	return $mean;

}


$file_handle = fopen("newdata.dat", "r");

$i = 0;

while(!feof($file_handle)) {
	$line = fgets($file_handle);
	echo "the next line is ", $line, "<br>";
	$data[$i]=$line;
	$i=$i+1;
}

$imax = $i-1;

fclose($file_handle);

echo "Now printing stored data: <br>";

for($i=0;$i<$imax;$i++){
	echo $i, " ", $data[$i], "<br>";
}

$avg = calculate_average($data);

echo "The average is: ", $avg, "<br>";

?>
