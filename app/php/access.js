
let ID = $("input[name*='ID']");
ID.attr("readonly","readonly");


$(".editbtn").click( e =>{
	let textvalues = displayData(e);

	let activitate = $("input[name*='activitate']");
	let durata = $("input[name*='durata']");

	ID.val(textvalues[0]);
	activitate.val(textvalues[1]);
	durata.val(textvalues[2]);

});

function displayData(e){
	let ID = 0;
	const td = $("#tbody tr td");
	let textvalues = [];

	for(const value of td){
		if(value.dataset.id==e.target.dataset.id){
			textvalues[ID++]= value.textContent;
		}
	}
	return textvalues;
}
