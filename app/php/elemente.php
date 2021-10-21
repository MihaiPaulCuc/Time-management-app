<?php

function copieRand($icon, $placeholder,$name, $value){
	$ele="
	<div class=\"input-group mb-2\">
        <div class=\"input-group-prepend\">
          <div class=\"input-group-text bg-info\">$icon</div>
        </div>
        <input type=\"text\" autocomplete = \"off\" value = '$value' name= '$name' class=\"form-control\" id=\"inlineFormInputGroup\" placeholder='$placeholder'>
      </div>
	  ";
	
	
	echo $ele;

}

function copieButon($btnid,$styleclass,$text,$name,$attr){
	$btn = "
	<button name ='$name' '$attr' class='$styleclass' id='$btnid'>$text</button>
	";
	echo $btn;
}
?>