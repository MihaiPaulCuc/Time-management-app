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
<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/31ed53e2d8.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>

<main>
<div class = "container text-center shadow p-3 mb-5 bg-transparent rounded">
<h1 class = "py-2 bg-success text-light rounded border border-danger "><i class="fas fa-hourglass-end"></i> Time Management</h1>
	<div class = "d-flex justify-content-center">
		<!-- <form action = "" method = "POST" class = "w-50"> -->

		<!-- Input-uri-->
	  <div class = "pt-2">
    <label for="fname" class = "text-light font-weight-bold">Timp Disponibil HH:MM:SS</label>
    <input type="text" id="t_disponibil" name="t_disponibil" class = "form-control"><br><br>
	  
	  </div>

	  <!-- Butoane-->
	  <div class = "d-flex justify-content-center ">
		<button onclick="getTimp(t_disponibil.value)" class= "btn btn-success">Verifică</button>
		<button class = "btn btn-success" onclick="location.href = 'index.php'">Acasă</button>
	  </div>

	  <!-- </form> -->
	</div>
	<!--  Tabel bootstrap-->

	  <div class="d-flex table-data">
            <table class="table table-striped text-light font-weight-bold">
                <thead class="text-light font-weight-bold">
                    <tr>
                        <th>ID</th>
                        <th>Nume Activitate</th>
                        <th>Durată Activitate</th>
                    </tr>
		</thead>
			<tbody id = "customTable" >
			</tbody>
		</table>
	</div>

</div>
</main>

<!-- Scripturi -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
function getTimp(timpD) {
  if (timpD == "") {
    document.getElementById("customTable").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("customTable").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../app/php/getFreeTime.php?q="+timpD,true);
    xmlhttp.send();
  }
}
</script>
</body>
</html>
