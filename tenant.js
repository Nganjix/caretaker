$(document).ready(function() {
  
var fname;
var sname;
var idnum; 
var gender;
var tenantStatus;
var ownerEmail;
var boardingDate;
var pnumber1;
var pnumber2;
var kinfName;
var kinSName;
var kinIdNo;
var kinPhoneNo;
var tenantDepositAmt;
var tenantCurrentAmt;
var currentID = "";
var everyField = ['id','fname','sname','idnum', 'gender', 'tenantStatus', 'ownerEmail', 'boardingDate', 'pnumber1', 'pnumber2','kinfName','kinSName',
'kinIdNo','kinPhoneNo','tenantDepositAmt'];
var emptyFields  = {

}; //store all the required class fields which are empty 

var fillFields = {
    
}; //store all class fields that have values
//code for search
var updateFields = {};//in edit mode stores all the fields that have been updated
var datafromdb; //stores the current data from database


// event regions
$("#searchTenant").autocomplete({
	    source : 'autocomplete.php?page=tenant',
	    //dataType : 'json',
	    //paramName : $('#searchTenant').val(),
	    //response: function( event, ui ) {
	    //	console.log(ui);
	    //},
        autoFocus:true,
        select : function(event, ui){
          $.ajax({
            url: 'sendBackStuff.php?page=tenant&id='+getID(ui.item.value),
            success: function(data){ 
                setValueInFields(data);
             
            } 
            
            });
        }
    });
$('#boardingDate').datepicker();
$("#save").click(function(event) {
	/* Act on the save event */
    
	getValues();
    if(currentID == "" || currentID == null)
    {
	if(validateData() == true)
    {
        warnUser(); //reconfirm and warn user for all required values
    }
    else
    {
        warnUser();  //check if existing empty required fields and issue warning
        sendFormData(); //send the data from page
    }
    }
    else
    {   
        startEditProcess();
        
    }

});
$('#getPrevious').click(
function(event)
{
    var getStatus = "Prev";
    prevNextBtn(getStatus);
    
});
$('#getNext').click( function(event)
{
    var getStatus = "Next";
    prevNextBtn(getStatus);
    
});
//function to clear
function clearFields()
{
    var i;
    for(i=0;i<everyField.length;i++)
    {
    fieldname = '#'+everyField[i];
       $(fieldname).val(""); 
       $(fieldname).removeClass("alert alert-danger"); 
    }
}
//function to enable/disble everything 
function setFieldStatus(status)
{
    var i;
    for(i=0;i<everyField.length;i++)
    {
       fieldname = '#'+everyField[i];
       $(fieldname).prop('disabled', status); 
    }
}

$('#new').click(function(event)
{
    var statusOfFields = false;
    clearFields();
    $("#searchTenant").val("");
    currentID = "";
    $("#requiredError").html("");
    setFieldStatus(statusOfFields);
});
$("#edit").click(
function(event){
    var statusOfFields = false;
    //checks if the current id is set b4 doing anything
    if (currentID != '' && currentID != null)
    {
        setFieldStatus(statusOfFields);
        setSaveStatus(statusOfFields);
    } 
    
});
$('#delete').click(
function(event){
    //copied code
    $( function() { $( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Delete": function() {
            $( this ).dialog( "close" );
          if(currentID != '' && currentID != null)
          {
       $.ajax(
         {
        type : "POST",
        url : "deleteStuff.php",
        data : {"id" : currentID, "page" : "tenant" },
        success : function(datar) {
            if(datar == '200')
            {
                $.notify("record deleted succesfully", 'success');
                clearFields();
                $("#searchTenant").val("");
                currentID = "";
            }
            else
            {
                $.notify("err record not deleted ", 'error');
            }
        }
        
    }
    );
    }
     else
    {
        $.notify('No records to delete', "info");
    }
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  } );
  //
   /* */
});

//sets button status


//save button should be disabled unles there is content
//delete, edit when content is available
function setDeleteStatus(delstatus)
{
   $('#delete').prop("disabled", delstatus); 
}
function setEditStatus(editstatus)
{
    $('#edit').prop("disabled", editstatus); 
}
function setSaveStatus(savestatus)
{
   $('#save').prop("disabled", savestatus); 
}
     
//end event regions
function validateData()
{
	var hasEmpty = false;
    emptyFields = {}; //clear object if having any items
    fillFields = {}; //clear all fields which have values
    
	if (fname == null || fname == "") 
	{
	   //console.log("in checking empty field 1");
	     emptyFields.fname = "fname";
     }
     else{
        fillFields.fname = "fname";
     }
     if (sname == null || sname == "") 
	{
	     emptyFields.sname = "sname";
     }
     else{
        fillFields.sname = "sname";
     }
     if (idnum == null || idnum == "") 
	{
	     emptyFields.idnum = "idnum";
     }
     else
     {
        fillFields.idnum = "idnum";
     }
     if (ownerEmail == null || ownerEmail == "") 
	{
	   emptyFields.ownerEmail = "ownerEmail";
	     
     }
     else
     {
        fillFields.ownerEmail = "ownerEmail";
     }
     if (boardingDate == null || boardingDate == "") 
	{
	     emptyFields.boardingDate = "boardingDate";
     }
     else
     {
        fillFields.boardingDate = "boardingDate";
     }
     if (pnumber1 == null || pnumber1 == "") 
	{
	   emptyFields.pnumber1 = "pnumber1";
	     
     }
     else
     {
        fillFields.pnumber1 = "pnumber1";
     }
     if (kinfName == null || kinfName == "") 
	{
	     emptyFields.kinfName = "kinfName";
     }
     else
     {
        fillFields.kinfName = "kinfName";
     }
     if (kinSName == null || kinSName == "") 
	{
	     emptyFields.kinSName = "kinSName";
     }
     else
     {
        fillFields.kinSName = "kinSName";
     }
     if (kinIdNo == null || kinIdNo == "") 
	{
	     emptyFields.kinIdNo = "kinIdNo";
     }
     else
     {
        fillFields.kinIdNo = "kinIdNo";
     }
     if (kinPhoneNo == null || kinPhoneNo == "") 
	{
	     emptyFields.kinPhoneNo = "kinPhoneNo";
     }
     else
     {
        fillFields.kinPhoneNo = "kinPhoneNo";
     } 
     if(Object.keys(emptyFields).length != 0)
     {
        hasEmpty = true;
     }
     return hasEmpty;   

}
function warnUser()
{   
    //function to issue warning on empty fields
    if(Object.keys(emptyFields).length != 0)
    {
        $("#requiredError").html("Field marked with * are required !");
        var i;
        for(i = 0; i < Object.keys(emptyFields).length; i++)
        {
        
            var fieldname = '#'+Object.keys(emptyFields)[i];
            $(fieldname).addClass("alert alert-danger");
        
         }
    }
    else
    {
        $("#requiredError").html("");//remove error message
    }
   if(Object.keys(fillFields).length != 0)
    {
        
        for(i = 0; i < Object.keys(fillFields).length; i++)
        {
        var fieldValue = '#'+Object.keys(fillFields)[i];
        if($(fieldValue).hasClass("alert alert-danger"))
          {
            $(fieldValue).removeClass("alert alert-danger");
          }
       }
        
    }
    
    
    
}


function getValues()
{
fname = $("#fname").val();
sname = $("#sname").val();
idnum = $("#idnum").val(); 
gender = $("#gender").val();
tenantStatus = ($("#tenantStatus").is(':checked')) ?  1 : 0;
ownerEmail = $("#ownerEmail").val();
boardingDate = dateToInt($("#boardingDate").val());
pnumber1 = $("#pnumber1").val();
pnumber2 = $("#pnumber2").val();
kinfName = $("#kinfName").val()
kinSName = $("#kinSName").val();
kinIdNo = $("#kinIdNo").val();
kinPhoneNo = $("#kinPhoneNo").val();
tenantDepositAmt = $("#tenantDepositAmt").val();
tenantCurrentAmt = $("#tenantCurrentAmt").val();
}
//date to js int
function dateToInt(dateName)
{
    var dt = new Date(dateName);
    return dt.valueOf();
}
//js int to date
function intToDate(intDate)
{
    var dtm = new Date(Number(intDate));
    return (dtm.getMonth()+1)+'/'+dtm.getDate()+'/'+dtm.getFullYear();
}
//send insert tenant information
function sendFormData() {
    // function to send data
    
    $.ajax({
        url : 'insertStuff.php?page="tenant"',
        data : {"fname" : fname, "sname" : sname, "idnum" : idnum, "gender" : gender,
              "tenantStatus" : tenantStatus, "ownerEmail" : ownerEmail, "boardingDate" : boardingDate, 
              "pnumber1" : pnumber1, "pnumber2" : pnumber2, "kinfName" : kinfName, "kinSName" : kinSName,
              "kinIdNo" : kinIdNo, "kinPhoneNo" : kinPhoneNo, "tenantDepositAmt" : tenantDepositAmt},
        type : "POST",
        //dataType: "json",
        success : function(data){ if (data == '200')
        {
            $.notify("Data inserted successfully","success");
            clearFields();
            $("#searchTenant").val("");
            }
        else
        {
            
        	$.notify("Error encountered while inserting data !!", "error"); }
        }
    });
}
function getID(idWithName)
{
    //returns the id from the name on the search bar
    return idWithName.split(".")[0];
}

//set values in fields
function setValueInFields(data){
    if(data == 300)
    {
        $.notify('tenant could not be found', 'info');
    }
    else if(data == 400)
    {
        $.notify('an error ocurred', 'error')
    }
    else
    {
        
        var i;
        var newArray = JSON.parse(data);
        datafromdb = newArray;
        currentID = newArray[0];
        var statusID = false;
        setEditStatus(statusID);
        setDeleteStatus(statusID);
        
        for (i=1; i < everyField.length; i++)
        {
            fieldname = '#'+everyField[i];
            if(everyField[i] == 'boardingDate')
            {
            var convertedDate = intToDate(newArray[i]);
            $('#boardingDate').datepicker('setDate', convertedDate);
            
            //$('#boardingDate').val(convertedDate); 
            //  $(fieldname).val(convertedDate);
            //  console.log(newArray[i]);
            //  console.log(convertedDate);
            
            }
            else if(everyField[i] == 'tenantStatus')
            {
                var statusvar = (newArray[i] == '1') ? true : false;
                $('#tenantStatus').prop('checked', statusvar);
            }
            else
            {
                $(fieldname).val(newArray[i]);
            }
        }
        var setDisabled = true;
        setFieldStatus(setDisabled);
        $("#searchTenant").val("");
        setSaveStatus(setDisabled);
    }
}
//this part handles the edit of the record

function startEditProcess()
    {
        if (Object.keys(datafromdb).length != 0)
        {
            //compare and check for updated values
            var i;
            for(i=0;i<everyField.length;i++)
            {
              fieldn = '#'+everyField[i+1];
              fieldvalueinstr = $(fieldn).val()
              if(everyField[i+1] == 'tenantStatus')
              {
                fieldvalueinstr = ($("#tenantStatus").is(':checked')) ? 1 : 0;
              }
              if(everyField[i+1] == 'boardingDate')
              {
                var dateIn = $("#boardingDate").val();
                fieldvalueinstr = dateToInt(dateIn);
                
              }
              
              if(fieldvalueinstr != datafromdb[i+1])
              {
                  if(everyField[i+1] == 'tenantStatus')
                    {
                        fieldvalueinstr = ( $("#tenantStatus").is(':checked')) ? 1 : 0;
                        updateFields[everyField[i+1]] = fieldvalueinstr;
                        
                     }
                  else if(everyField[i+1] == 'boardingDate')
                     {
                        var dateIn = $("#boardingDate").val();
                        fieldvalueinstr = dateToInt(dateIn);
                        updateFields[everyField[i+1]] = fieldvalueinstr;
                
                      }
                  else
                      {
                        updateFields[everyField[i+1]] = $(fieldn).val();
                      }
                
                
              }
              
            }
            if(Object.keys(updateFields).length != 0)
            {
                sendEditData();
            }
        }
        
    }


//send data to update and receive response
function sendEditData()
{
    $.ajax(
    {
        url: "updateStuff.php?page=tenant&id="+currentID,
        data : updateFields,
        success : function(data){
            if(data == '200')
            {
                $.notify("Updated successfully", "success");
            } 
            else{
                $.notify("Error occurred during update", "error");
            }
        }
        
    });
}
//get the next or previous button
function prevNextBtn(statusPrev)
{
    if(currentID)
    {
       sendData(currentID, statusPrev); 
    }
    else
    {
        id = 'NoID';
        sendData(id, statusPrev);
    }
    
    function sendData(id, statusPrev)
    {
        $.ajax(
        {
           url: 'sendBackStuff.php?page=tenant&id='+id+'&'+'statusPN='+statusPrev,
           success : function(data)
           {
            if(data == '300')
            {

                $.notify("data not found","info");
                
            }
            else if(data == '400')
            {
                $.notify("error occurred","error");

            }
            else
            {
                setValueInFields(data);
            }
           }
            
        });
    }
    
}









});