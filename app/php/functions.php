<?php
require_once("bdd.php");
require_once("elemente.php");

$con = createDb();
// atunci cand dam click pe buton

if(isset($_POST['adaugare'])){
	createData();

}

if(isset($_POST['edit'])){
	UpdateData();

}
if (isset($_POST['sterge'])){
	deleteRecord();

}

// if (isset($_POST['verifica'])){
// 	checkActivitati();
//
// }



//functia adauga 
function createData(){
	$activitate = textboxValue("activitate");
	$durata = textboxValue("durata");

if($activitate && $durata){

	$sql = " INSERT INTO licenta (activitate, durata)
			VALUES ('$activitate','$durata') ";

	if(mysqli_query($GLOBALS['con'], $sql)){
		TextNode("success", "Activitate inserată cu succes! ");

	}else {
		echo "Eroare!";
	}

}else {
	TextNode("error", "Introduceți datele în câmpuri! ");
}
}


function textboxValue($value){
	$textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
	if(empty($textbox)){
		return false;

	}else {
		return $textbox;

	}

}


//functie pentru mesaje
function TextNode($classname, $msg){
	$element = "<h6 class = '$classname'>$msg</h6>";
	echo $element;

}

// get data din baza de date

function getData(){
	$sql = " SELECT * FROM licenta
	";
	$result = mysqli_query($GLOBALS['con'], $sql);
	if (mysqli_num_rows($result)>0){
		return $result;

	}

}
//Update
function UpdateData(){
	$activitateID = textboxValue("ID");
	$activitate = textboxValue("activitate");
	$durata = textboxValue("durata");

	if ($activitate&&$durata){
		$sql = "
			UPDATE licenta SET activitate = '$activitate', durata = '$durata' WHERE ID = '$activitateID';
		";

		if(mysqli_query($GLOBALS['con'],$sql)){

			TextNode("success", "Datele activității au fost actualizate cu succes!");

		}else {
			TextNode("error", "Nu s-a putut realiza actualizarea!");
		}

	}else {
		TextNode("error", "Selectați activitatea folosind butonul!");

	}
}

//delete inregistrare
function deleteRecord(){
	$activitateID =(int)textboxValue("ID");

	$sql = "DELETE FROM licenta WHERE ID='$activitateID'";
	if(mysqli_query($GLOBALS['con'],$sql)){

		TextNode("success","Activitate eliminată cu succes! ");

	}else {
		TextNode("error","Eliminarea nu s-a putut realiza! ");

	}


}

//setare id prestabilit
function setID(){
	$getid = getData();
	$ID = 0;

	if($getid){
		while ($row = mysqli_fetch_assoc($getid)){
			$ID = $row['ID'];

		}

	}
	return ($ID+1);
}



?>
