
$(document).ready(
	function(){
	
 //fields part 

var apartmentfields = {
	apartmentname : '',
	apartmentbill : '',
	apartmentdesc : '',
	apartmentacc : '',
	tenantname : '',
	additonalcost : '',
	blockname : ''

}
console.log(Object.keys(apartmentfields)[0]);
//get the data feom the fields
function getData()
{
	for(i = 0; i < Object.keys(apartmentfields).length; i++ )
	{
		apartmentfields[i] = $("#"+Object.keys(apartmentfields)[i]).val();
	}
	return apartmentfields;
}



//validate data


//events part

//insert
$("#save").click(function(event) {
	console.log("testing yoyoyo");
	console.log(getData());
});
//update
 
//delete

//display


//conversion functions





//networking part
function sendGetData(url, info)
{

   $.ajax({
   	url: url,
   	type: 'POST',
   	data: info,
   }).done(function(data) { console.log("success"); }).fail(function() { console.log("error"); }).always(function() { console.log("complete"); });
   

}





//end quotes
});