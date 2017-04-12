
$(document).ready( function(){
    
//autocomplete for page dropdowns
var url = "dropdowns.php";
var currentDataSet = [];//stores current array dataset
var dropdowns = { "#tenantname":"tenant", "#blockname":"blocks"};
var dropdownnames = ['tenantname','blockname']; 

var implementautocomplete = function(event, ui)
{
    $.ajax({
            url: 'sendBackStuff.php?page=apartments&id='+getID(ui.item.value),
            dataType : 'json',
            success: function(data){ 
                setValueInFields(data, '');
             
            } 
            
            });
}
autocompleter('searchApartment','autocomplete.php?page=apartments', implementautocomplete);// call autocompletion code

//insert default values to dropdown
$.each(dropdowns, function(key, val)
{
    callEachDropdown(key, val);
});



$('#apartmentbill, #apartmentname').click(function(event){ if($('#apartmentbill, #apartmentname').hasClass('alert alert-danger'))
{
    $('#apartmentbill, #apartmentname').removeClass('alert alert-danger');
}
});
function callEachDropdown(key, val){
    var getdata = {"page":"apartments", "dropdownid":val};
    var i = 0;
    
    $.getJSON(url, getdata, function(varreturneddata){
    options = '';    
    $.each(varreturneddata, function(index, value){ 
    if(i == 0)
    {
        options += '<option value="None" selected>None</option>';
        if(val == 'tenant')
        {
            options += '<option value="'+$.trim(value[0])+'">'+value[1]+' '+value[2]+'</option>';
        }
        else
        {
            options += '<option value="'+$.trim(value[0])+'">'+value[1]+'</option>';
        }
        
    }
    else
    {
        if(val == 'tenant')
        {
            this.tenantid = value[0];
            options += '<option value="'+$.trim(value[0])+'">'+value[1]+' '+value[2]+'</option>';
        }
        else
        {
            options += '<option value="'+$.trim(value[0])+'">'+value[1]+'</option>'; 
        } 
    }
   
    i += 1;
    });
    
    $(key).append(options); 
    
});

}
 //fields part 

var apartmentfields = {
	apartmentname : "required",
	apartmentbill : "required",
	apartmentdesc : "notrequired",
	tenantname :  "notrequired",
	blockname :  "notrequired"

}
//get the data from the fields
function getFormData(Objdata)
{
	   var newApartment = Objdata;
	   var dataObj = {}; 
       var fieldname; 
       var emptyExists = false;
        $.each(newApartment, function(index, val)
        { 
            //(newApartment[String(key)])[String(index)] = $("#"+fieldname).val();
             fieldname = String(index);
             if(String(val) == "required")
             {
                if($('#'+fieldname).val() != undefined && $('#'+fieldname).val() != '' && $('#'+fieldname).val() != 'None')
                {
                    dataObj[fieldname] =  $('#'+fieldname).val();
                }
                else
                {
                    emptyExists = true; //set for flag if empty required field found
                    validateData(fieldname);
                }
                              
             }
             else
             {
                dataObj[fieldname] = $('#'+fieldname).val();
             }
             //console.log((newApartment[String(index)])[0]);
            //newApartment.value = $("#"+fieldname).val();
        });
        if(emptyExists == false && dataObj != undefined)
        {
            return dataObj;
        }
        
	
}



//events part
$('#edittenant').click(function(event){

    var tenurl = $('#tenantname').val() != 'None' ? 'tenant.php?id='+$('#tenantname').val() :  'tenant.php';
    openWindow(tenurl);
    
});
$('#editblock').click(function(event){
    var blockurl = $('#blockname').val() != 'None' ? 'blocks.php?id='+$('#blockname').val() :  'blocks.php';
    openWindow(blockurl);
    
});
//toggle delete, edit and save buttons 

//insert
$("#save").click(function(event) {
	//var fieldnamel = "#" + String(Object.keys(apartmentfields)[0])
	//console.log($(fieldnamel).val());
    $('#requiredError').text('');
	var AllData = getFormData(apartmentfields);
    if(currentDataSet.length == 0 )
    {
        if(AllData != undefined)
        {
            sendGetData('insertStuff.php?page=apartment', AllData, 'Insert');       
        }
    }
    else
    { 
        //call update statemt
        updateApartment(AllData);
        
        
    }
    
    
});
//next
$('#getNext').click(function(event){
    
    PrevNextBtns('Next');
});
//prev
$('#getPrevious').click(function(event){
    PrevNextBtns('Prev');
});
//edit
$('#new').click(function(event){ 
        clearFields(); 
        setDeleteStatus(true);
        setEditStatus(true);
        setFieldStatus(apartmentfields,false);
        }
        );
//edit
$('#edit').click(function(event){
    setFieldStatus(apartmentfields, false);
    

});
//delete
$('#delete').click(function(event)
{
    deleteRecord('deleteStuff.php?page=apartment', currentDataSet[0], aprtDelConfirmed);
    
});
function aprtDelConfirmed()
{
    clearFields();
    $("#searchApartment").val("");
    currentDataSet = [];
    loadButtonStatuses(true);
    setFieldStatus(apartmentfields, false);
}
function PrevNextBtns(Statuses)
{
    var currID = currentDataSet[0] ? currentDataSet[0] : 'NoID';
    $.ajax({
            url: 'sendBackStuff.php?page=apartments&statusPN='+Statuses+'&id='+currID,
            dataType : 'json',
            success: function(data){
                setValueInFields(data, '');
                if(data == '300')
                {
                    $.notify('couldnt get more data', 'Warning');
                    clearFields();
                    
                }
                if(data == '400')
                {
                    $.notify('error while getting data', 'Error');
                    clearFields();
                }
             
            } 
            
            });
}
function clearFields()
{
    $.each(apartmentfields, function(key, value){
        if($.inArray(key, dropdownnames) != -1)
        {
            $(function(){ $('#'+key).val('None'); });
             
            //$('#'+key+" option:contains('None')").attr('selected', 'selected');
        }
        else
        {
            $('#'+key).val('');
            $('#'+key).removeClass("alert alert-danger");
        }}
        );
    
}    
        
function getID(idWithName)
{
    //returns the id from the name on the search bar
    return idWithName.split(" ")[0];
}



//display
function setValueInFields(newArray, id)
{
    i = 0;
    if(newArray)
    {
    $.each(apartmentfields, function(key, value){                                     
        
        if($.inArray(key, dropdownnames) != -1)
        {
            if(newArray[i] != null)
            {
                $(function(){ $('#'+key).val(newArray[i]); });
              //$("#"+key+" option:contains("+$.trim(newArray[i])+")").attr('selected','selected');  
            }
            
            //$('#'+key).append('<option selected>'+newArray[i]+'</option>');
            i++;
        }
        else
        {
          $('#'+key).val(newArray[i]);
          i++;  
        }
        if(newArray)
        {
            currentDataSet = newArray; //set current data set
            $("#searchApartment").val("");
        }
        
        
    });
    loadButtonStatuses(false);
    setFieldStatus(apartmentfields, true);
    }
    else
    {
        clearFields();
    }
    
}


//$('#apartmentacc').click(function(){  
        
//});

//update
function updateApartment(AllData)
{
    var fieldsdata = AllData;
    var updatedfields = {};
    var i =0;
    $.each(apartmentfields,function(key, value)
    {
        if(currentDataSet[i] != fieldsdata[key])
        {
            updatedfields[key] = fieldsdata[key]; 
        }
        i++;
    });
    if(Object.keys(updatedfields).length > 0)
    {
        
       sendGetData('updateStuff.php?page=apartment&id='+currentDataSet[0], updatedfields, 'Update'); 
    }
    
    
    
    
}
 




//conversion functions




//networking part
function sendGetData(url, info, datastatus)
{
    var posttype = datastatus == 'Update' ? 'GET' : 'POST';

    $.ajax({
   	url: url,
   	type: posttype,
   	data: info,
    success : function(data) {
        if(data == '200')
        {
            $.notify('Data '+datastatus+' operation was successful', 'success');
            if(datastatus == 'Delete')
            {
                clearFields();
                $("#searchApartment").val("");
                currentDataSet = [];
                loadButtonStatuses(true);
                setFieldStatus(apartmentfields, false);
            }
        }
        else
        {
            $.notify(datastatus+' error occurred','Error');
        }
    }
   });
   

}
insertFromQuery('apartments', setValueInFields);


//.done(function(data) { console.log("success"); }).fail(function() { console.log("error"); })



//end quotes
});