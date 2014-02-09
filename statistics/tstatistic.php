<!DOCTYPE html>
<html>
<body>

<?php



#This program calculates the t statistic -- t=sqrt(n)*(sample_mean-test_mean)/(sample standard deviation) -- for a data set contained in a one dimensional array.

function calculate_random_data_uniform($n, $begin, $end){
	#This function constructs an array of random data of length $n using a uniform distribution between $begin and $end.
	
	#Generate random data:

	for($x=0;$x<$n;$x++)
 	{
		$data[$x]=rand($begin, $end);
		echo $data[$x], "<br>";
  	}

	return $data;

}

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

function calculate_standard_dev($data){
	#This function calculates the sample standard deviation of $data.

	$sum=0;
	$diff=0;

	$mean = calculate_average($data);
	$arrlength=count($data);

	for($x=0;$x<$arrlength;$x++)
  	{
		$diff=pow($data[$x]-$mean,2);
		$sum+=$diff;
  	}

	$standev=sqrt($sum/$arrlength);

	return $standev;

}

function calculate_t_value($data, $testmean){
	#This function accepts a one dimensional array and then computes the t-statistic.

	$arrlength=count($data);#calculates the number of data points
	$sqrtn=sqrt($arrlength);#calculates the square root of the number of data pts

	#calculate the mean

	$samplemean = calculate_average($data);

	#calculate the sample standard deviation

	$standev=calculate_standard_dev($data);

	#Calculate the t statistic

	$t=$sqrtn*($samplemean-$testmean)/($standev);

	echo "The square root of the number of data points is: ", $sqrtn, "<br>";
	echo "The test mean is: ", $testmean, "<br>";
	echo "The sample mean is: ", $samplemean, "<br>";
	echo "The standard deviation is: ", $standev, "<br>";
	echo "The t statistic is: ", $t, "<br>"; 

	return $t;

}

#Generate random data:

$data = calculate_random_data_uniform(10, 0, 10);

#Compute the t statistic for the randomly generated data:

$testmean=1; #This sets the value of the test mean that go into the calculation of t-statistic.

calculate_t_value($data, $testmean);

?>

</body>
</html>
