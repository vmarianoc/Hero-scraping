<?php 
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
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <link rel="stylesheet" type="text/css" href="custom.css">
    <script type="text/javascript">
    	function myFunction() {
		  document.getElementById("myForm").submit();
		}
    </script>
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
    <h1 class="ml-5 mt-5">Hello, super-hero!</h1>
    <h4 class="ml-5">It's time to find the substitute of your last partner.</h4>
    <section class="content">
	    <form id="myForm" method="post" action="action.php">
	    	<div class="row justify-content-center mt-5">   		
	    		<div class="col-md-3">
	    			<label class="text-white mb-3 lead">Who was your last partner?</label>
	    			<!-- Multiselect dropdown -->
		            <select name="hero" data-style="bg-white rounded-pill px-4 py-3 shadow-sm" data-width="auto" class="selectpicker w-100" data-live-search="true">
		            	<?php foreach($heros as $i_index => $hero_index):?>
		            		<?php if ($i_index > 0):?>
			            		<?php foreach ($hero_index as $j_index => $hero_feature):?>
			            			<?php if ($j_index == 0):?>
			            				<option value="<?php echo $hero_feature;?>"><?php echo $hero_feature;?></option>
			            			<?php endif; ?>
			            		<?php endforeach; ?>
			            	<?php endif;?>
		            	<?php endforeach;?>
		            </select><!-- End -->
	    		</div>
	    		<div class="col-md-3">
	    			<label class="text-white mb-3 lead">Choose the best way to find him or her.</label>
	    			<select name="method" data-style="bg-white rounded-pill px-4 py-3 shadow-sm " class="selectpicker w-100">
		                <option value="0">Jaccard</option>
		                <option value="1">Dice</option>
		                <option value="2">Sokal&Michener</option>
		            </select><!-- End -->
	    		</div>
	    		<div class="col-md-3">
	    			<label class="text-white mb-3 lead">Here you can control the powers you are looking for.</label>
		            <!-- Multiselect dropdown -->
		            <select name="features[]" multiple data-actions-box="true" data-style="bg-white rounded-pill px-4 py-3 shadow-sm" data-width="auto" data-selected-text-format="count > 3" class="selectpicker w-100" data-live-search="true">
	   	            	<?php foreach($heros[0] as $index => $hero_index):?>
		            		<?php if ($index >= 11): ?>
		            			<option value="<?php echo $hero_index;?>"><?php echo $hero_index;?></option>
		            		<?php endif; ?>
		            	<?php endforeach;?>
		            </select><!-- End -->
	    		</div>
	    		<div class="col-md-2">
	    			<input type="button" onclick="myFunction()" value="Submit form">
	    		</div>
	    	</div>
	    </form>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
    	$(function () {
		    $('.selectpicker').selectpicker();
		});
    </script>
  </body>
</html>