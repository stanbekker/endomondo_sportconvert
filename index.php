<?php
include("vendor/autoload.php");
include("libraries/Endomondo/Endomondo.php");
include("libraries/Endomondo/EndomondoOld.php");
include("libraries/Endomondo/Workouts.php");
include("libraries/Endomondo/Workout.php");
?>

<html>
<head>
<title>Endo Convert</title>
</head>
<body>

<?php
// Sport 6 is Nordic Skiing
// Sport 89 is skateboarding

// Create an Endomondo instance and login
$endomondo = new \Fabulator\Endomondo\Endomondo();
$endomondo->login('your_email@example.com', 'your_password');

// Get all workouts with Nordic Skiing (Sport #6)
$workouts = $endomondo->workouts->filter(array("sport"=>6));



// Loop through the workouts
$count=0;
foreach($workouts as $workout)
{
	// Change the ID
	$workoutID = $workout->getId();
	$workout->setSport(89);

	// Change the sport # on the server (Nordic Skiing -> Skateboarding)
	$endomondo->workouts->edit($workoutID,array("sport"=>89));

	// Show something to the user when the script has done something
	if($count>0) echo '<br>';
	echo 'Workout with id: '.$workoutID.' has been updated!';

	$count++;
}

echo '<hr>Script is done!';
?>

</body>
</html>