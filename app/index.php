<?php
require_once("../app/php/elemente.php");
require_once("../app/php/functions.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!--CSS personalizat-->
<link rel="stylesheet" href="../app/style.css">
<script src="https://kit.fontawesome.com/31ed53e2d8.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<main>

<div class = "container text-center shadow bg-transparent p-3 mb-5 rounded">
<h1 class = "py-2 bg-warning text-light rounded border border-danger "><i class="fas fa-hourglass-end"></i> Time Management</h1>
	
	<div class = "d-flex justify-content-center ">
		<form action = "" method = "POST" class = "w-50">
		
		<!-- Input-uri-->
		<div class = "pt-2">
		<?php copieRand("<i class='fas fa-arrow-alt-circle-right'></i>","ID", "ID", setID());?>
		
	  </div>
	  <div class = "pt-2">
		<?php copieRand("<i class = 'far fa-calendar-alt'></i>","Nume Activitate", "activitate", "");?>
	  <div class = "pt-2">
		<?php copieRand("<i class = 'far fa-clock'></i>","Durată Activitate", "durata", "");?>
	  </div>
	  </div>
	  </div>
	  <!-- Butoane-->
	  <div class = "d-flex justify-content-center">
	  	
	  <?php copieButon("btn-create","btn btn-success", "<i class='far fa-calendar-plus'></i>", "adaugare","dat-toggle='tooltip' data-placement = 'bottom' title = 'Adaugă'"); ?>
	  <?php copieButon("btn-read","btn btn-primary", "<i class='fas fa-eye'></i>", "afisare","dat-toggle='tooltip' data-placement = 'bottom' title = 'Afișează'"); ?>
	  <?php copieButon("btn-update","btn btn-secondary", "<i class='fas fa-sync'></i>", "edit","dat-toggle='tooltip' data-placement = 'bottom' title = 'Actualizează'"); ?>
	  <?php copieButon("btn-delete","btn btn-danger", "<i class='fas fa-trash'></i>", "sterge","dat-toggle='tooltip' data-placement = 'bottom' title = 'Șterge'"); ?>

	  </div> 
	  </form>
	
	<button style = "center"class = "btn btn-dark" onclick="location.href = 'sugestie.php'" dat-toggle = "tooltip" data-placement="bottom" title = "Află ce activități poți îndeplini"><i class="fas fa-filter"></i></button>
	 
	 <!--  Tabel bootstrap-->
	  <div class="d-flex table-data text-light">
            <table class="table table-stripped">
                <thead class="text-light font-weight-bold">
                    <tr>
                        <th>ID</th>
                        <th>Nume Activitate</th>
                        <th>Durată Activitate</th>
                        <th>Accesare</th>
                    </tr>
		</thead>
			<tbody id = "tbody" class = "text-light font-weight-bold">
				<?php
				if(isset($_POST['afisare'])){
					$result = getData();
					
					if($result){
						
						while($row = mysqli_fetch_assoc($result)){?>
							<tr>
								<td data-ID="<?php echo $row['ID'];?>"><?php echo $row['ID']; ?></td>
								<td data-ID="<?php echo $row['ID'];?>"><?php echo $row['activitate']; ?></td>
								<td data-ID="<?php echo $row['ID'];?>"><?php echo $row['durata']; ?></td>
								<td><i class="fas fa-highlighter editbtn" data-ID="<?php echo $row['ID'];?>"></i></td>
							</tr>
							
							
							
						<?php	
							
						}
						
					}
					
				}
				
				
				?>
			</tbody>
		
		</table>
	
	</div>
	
</div>

</main>
</div>
<!-- Scripturi -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src = "../app/php/access.js"></script>
</body>
</html>