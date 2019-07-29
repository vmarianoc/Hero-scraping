<?php
	$json = (array) json_decode(file_get_contents('result.json'));
	// Open the file for reading
	if (($file = fopen("dataset.csv", "r")) !== FALSE) 
	{
	  $heros = [];
	  // Convert each line into the local $data variable
	  while (($data = fgetcsv($file, 3000, ",")) !== FALSE) 
	  {		
	    // Read the data from a single line
	  	$heros[] = $data;
	  }

	  // Close the file
	  fclose($file);
	}
/*	echo '<pre>';
	var_dump($heros);
	echo '</pre>';*/
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="custom.css">
    <title>Hero Clairvoyance</title>
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
	  <a class="navbar-brand text-white" href="#">HeroClairvoyance</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link text-white" href="#">Headquarters <span class="sr-only">(current)</span></a>
	      </li>
	    </ul>
	      <a><button class="btn btn-outline-success my-2 my-sm-0" type="submit">About</button></a>
	  </div>
	</nav>
    <h1 class="ml-5 mt-5">Lets do it!</h1>
    <h4 class="ml-5">It's time to meet your new fellow.</h4>
    <section class="content">
    	<div class="row justify-content-center mt-5"> 
    		<div class="col-md-8" style="background-color: white;">
    			<table id="myTable" class="display">
				    <thead>
				        <tr>
				            <th>Name</th>
				            <th>Score</th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php foreach($json["Score"] as $key => $value): ?>
				        <tr>
				            <td><?php echo $heros[$key+1][0];?></td>
				            <td><?php echo $value;?></td>
				        </tr>
				    <?php endforeach;?>
				    </tbody>
				</table>
    		</div>
    	</div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    	$(document).ready( function () {
		    $('#myTable').DataTable();
		} );
    </script>
  </body>
</html>