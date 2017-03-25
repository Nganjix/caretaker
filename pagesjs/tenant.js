$(document).ready(function() {
  
var tenantdataset = [];
var tenantID = "";
var everyField = {'fname' : 'required','sname' : 'required','idnum' : 'required', 'gender' : 'required', 'tenantStatus' : 'notrequired', 'ownerEmail' : 'required', 'boardingDate' : 'required', 'pnumber1' : 'required', 'pnumber2' : 'notrequired',
'kinfName' : 'required','kinSName' : 'required','kinIdNo' : 'required','kinPhoneNo' : 'required','tenantDepositAmt' : 'required', 'graceperiod' : 'notrequired'};
 //store all the required class fields which are empty 
 //store all class fields that have values
//code for search//in edit mode stores all the fields that have been updated
 //stores the current data from database


// event regions
autocompleter("searchTenant",'autocomplete.php?page=tenant', callSetValues);
function callSetValues(event, ui)
{
    $.ajax({
            url: 'sendBackStuff.php?page=tenant&id='+getID(ui.item.value),
            success: function(data){
                console.log(data);
                setValueInFields(data);
                
             
            } 
            
    });
}
$('#boardingDate').datepicker();
$("#save").click(function(event) {
	/* Act on the save event */
    if(!genValidateFields(everyField))
    
    { 
            if(tenantdataset && tenantID != '')
             {
              //update
              var toUpdateObj = {};
              var i = 1;
              var tenStatus = $('#tenantStatus').prop('checked') ? 1 : 0;
              var graceperiod  = $('#graceperiod').val();
              var boardingdt = dateToInt($("#boardingDate").val());
              console.log(tenStatus);
              console.log(graceperiod);
              console.log(boardingdt);
              $.each(everyField, function(key, val){
                    
                    if($.inArray(key, ['tenantStatus', 'boardingDate', 'graceperiod']) != -1)
                    {
                        
                    
                    if(key == 'tenantStatus' && tenantdataset[i] != tenStatus)
                    {
                       toUpdateObj[key] =  tenStatus;
                    }
                    if(key == 'boardingDate' && tenantdataset[i] !=  boardingdt)
                    {
                            
                        toUpdateObj[key] = boardingdt;
                    }
                    if(key == 'graceperiod' && graceperiod != tenantdataset[tenantdataset.length - 1])
                    {
                        toUpdateObj[key] = graceperiod;
                    }
                    }
                    else
                    {
                        if($('#'+key).val() != tenantdataset[i])
                        {
                            toUpdateObj[key] = $('#'+key).val();
                        }
                    }
                    
                 i++; 
              });
              if(Object.keys(toUpdateObj).length > 0)
              { 
                //console.log(tenantdataset);
                //console.log(tenantdataset[tenantdataset.length - 1]);
                //console.log(toUpdateObj);
                ajaxSendReceive('updateStuff.php?page=tenant&id='+tenantID, toUpdateObj, 'Update', '');
              }
                  
              
        
             }
            else
            {
                  //insert
                  var insertingObj = {}
                  $.each(everyField, function(key, val){
                    
                    if(key == 'tenantStatus')
                    {
                        insertingObj[key] = $('#tenantStatus').is(':checked') ? 1 : 0;
                    }
                    else if(key == 'boardingDate')
                    {
                        var dateIn = $("#boardingDate").val();     
                        insertingObj[key] =  dateToInt(dateIn);
                    }
                    else
                    {
                        insertingObj[key] = $('#'+key).val();
                    }
                    
                  });
                  ajaxSendReceive('insertStuff.php?page=tenant', insertingObj, 'Insert', '');
            }
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
    $.each(everyField, function(tenanttag, val){
       if(tenanttag == 'gender')
       {
        $('#gender').val('None');
        
       }
       else if(tenanttag == 'tenantStatus')
       {
          $('#tenantStatus').prop('checked', false);
       }
       else
       {
          $('#'+tenanttag).val('');
       }
       
       
        
    });
     
}

$('#new').click(function(event)
{
    
    clearFields();
    $("#searchTenant").val("");
    $("#requiredError").html("");
    tenantID = "";
    tenantdataset = [];
    
    setFieldStatus(everyField, false);
});
$("#edit").click(
function(event){
    $("#save").prop('disabled', false);
    setFieldStatus(everyField, false);
    loadButtonStatuses(true);
    $("#searchTenant").val("");
    
});
$('#delete').click(function(event){
    if(tenantID != '')
    {
       deleteRecord("deleteStuff.php?page=tenant", tenantID, tenantAfterDelete);    
    }
});
function tenantAfterDelete()
{
    clearFields();
    $("#searchTenant").val("");
    tenantID = "";
    tenantdataset = [];
    setFieldStatus(everyField, false);
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

function getID(idWithName)
{
    //returns the id from the name on the search bar
    return idWithName.split(".")[0];
}

//set values in fields
function setValueInFields(data){
    if(data)
    {
        var parsedArray = JSON.parse(data);
        tenantID = parsedArray[0];
        tenantdataset = parsedArray;
        var i = 1;
        $.each(everyField, function(key, val){
            if(key == 'tenantStatus')
            {
                $('#'+key).prop('checked', parsedArray[i] == 1 ? true : false);
            }
            else if(key == 'boardingDate')
            {
              var convertedDate = intToDate(parsedArray[i]);
               $('#boardingDate').datepicker('setDate', convertedDate);
            }
            else if(key == 'graceperiod')
            {
               $('#graceperiod').val(parsedArray[parsedArray.length - 1]); 
            }
            else
            {
                $('#'+key).val(parsedArray[i]);
            }
           i++; 
        });
        setFieldStatus(everyField, true);
        loadButtonStatuses(false);
    }
}

//get the next or previous button
function prevNextBtn(statusPrev)
{
    if(tenantID)
    {
       sendData(tenantID, statusPrev); 
    }
    else
    {
        var id = 'NoID';
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
$('#fname,#sname,#idnum, #gender, #ownerEmail,#boardingDate, #pnumber1, #kinfName,#kinSName,#kinIdNo,#kinPhoneNo,#tenantDepositAmt').click(function(event){
    if($('#'+event.target.id).hasClass('alert alert-danger'))
    {
        $('#'+event.target.id).removeClass('alert alert-danger');
        $('#requiredError').html('');
    }
});

});