$(document).ready(function(){
var validimg = false; 
var curdataid = '';//set unique id
var profcurrentdataset = [];
var currentprofimg  = '';
var dropdowns = {'userid' : ''};
var profilefields = { 'fname' : 'required', 'sname' : 'notrequired', 'lname' : 'required', 'email' : 'required', 'phoneno' : 'required',
'postaladdr' : 'notrequired', 'idno' : 'notrequired', 'userid' : 'required', 'useractive' : 'notrequired'}
populateDropdowns();
//code for checking inserted img
$('#uploadprofileimg').bind('change', function(event){
    var formData = new FormData();
           formData.append('filename', $('#uploadprofileimg')[0].files[0]);
	       $.ajax(
           {
            url : 'validateimages.php',
            type : 'POST',
            processData : false,
            contentType : false,
            cache : false,
            data : formData,
            success : function(data){ 
                if(data != '200')
                {
                    $('#imgmessage').html(data);
                     $('#uploadprofileimg').val('');
                } 
                else
                {
                    validimg = true;
                    $('#imgmessage').html('');
                }
                },
            error : function(error){ $('#imgmessage').html(error);}
           });       
});
function populateDropdowns()
{
    
    $.each(dropdowns, function(key, value){
          
          $.getJSON('dropdowns.php', {'page' : 'profile', 'dropdownid' : key}, function(data){
            if(data && data.length > 0)
            {
              var i = 0;
              var options = '';
              $.each(data, function(index, val)
              {
                if(i == 0)
                {
                   
                        options += '<option value="None" selected>None</option>'+'<option value="'+val[0]+'">'+val[1]+'</option>';
                                     
                }
                else
                {
                  options +=  '<option value="'+val[0]+'">'+val[1]+'</option>';
                }
                i++;
                
              });
              $('#'+key).append(options);  
            }
            else
            {
                
                    $('#'+key).append('<option value="None" selected>None</option>');
            }
            
          });
    })
  
}
function validateFields()
{
 var hasIssues = false;
 $.each(profilefields, function(index, val)
 {
    if(index != 'useractive')
    {
       if(($('#'+index).val() == '' || $('#'+index).val() == undefined || $('#'+index).val() == 'None') && val == 'required')
       {
        $('#'+index).addClass('alert alert-danger');
        $('#requiredError').html('marked fields should not be empty');
        hasIssues = true;
       }
       else
       {

          if($('#'+index).hasClass('alert alert-danger'))
          {
            $('#'+index).removeClass('alert alert-danger');
          }
       }
       
    }
    
    
 });
 return hasIssues;   
}
function getData()
{
    var formData = new FormData();
    var formdatafilled = false;
    if(!(validateFields()))
    {
       $.each(profilefields, function(index, val)
       {
        if(index != 'useractive' && $('#'+index).val() != '')
        {
            formData.append( index , $('#'+index).val());
            formdatafilled = true;
            
        }
        else
        {
            if(index == 'useractive')
            {
               formData.append(index,  $("#useractive").is(':checked') ? 1 : 0);
            }
            
        }
        });
        if($('#uploadprofileimg').val() != '')
        {
            formData.append('filename', $('#uploadprofileimg')[0].files[0]);
        }
    }
    
       if(formdatafilled)
       {
        return formData;
       }
       else
       {
        return 'empty';
       }
        
   
    
}
//autocomplete
autocompleter('searchProfile','autocomplete.php?page=profile', receiveId)
//receive autocomplete id and start populating the fields
function receiveId(event, ui)
{
    

     $.getJSON('sendBackStuff.php?page=profile', {'id' : curdataid}, function(receiveddata)
     {
        setValueInFields(receiveddata, ((ui.item.value).trim()).split(' ')[0]);
     }
    );
     
    
}
function setValueInFields(datareceived,  id)
{
    curdataid =id;
    $('#searchProfile').val('');
    var i = 0;
    $.each(profilefields, function(key, value)
    {
         if(i != datareceived.length - 1 && key != 'useractive')
         {
            $('#'+key).val(datareceived[i]);
         }
         if(key == 'useractive')
         {
            $('#'+key).prop('checked', datareceived[i] == '1' ? true : false);
         }
          var datalength = datareceived.length - 1;
           if(datareceived[datalength].length != 0 )
           {
            $('#imgplace').attr('src', './images/profile/'+datareceived[datalength]);
            currentprofimg = './images/profile/'+datareceived[datalength]; //set current image
           
           }
           else
           {
            $('#imgplace').attr('src', './images/profileplaceholder.png');
            currentprofimg = './images/profileplaceholder.png'; //if no image exists set placeholder
           }
         
        
        i++;
    });
    profcurrentdataset = datareceived;
    setFieldStatus(profilefields, true)
    $('#uploadprofileimg,#save, #clearimg').prop('disabled', true);
    loadButtonStatuses(false);
}

//events
//save
$('#save').click(function(event)
{
    
    if(profcurrentdataset.length != 0 && curdataid != '')
    {
          var newformdata = new FormData();
          var i = 0;
          var requiresUpdate = false;
         $.each(profilefields, function(key, value){
            if($('#'+key).val() != profcurrentdataset[i] && key != 'useractive')
            {
                newformdata.append(key , $('#'+key).val());
                requiresUpdate = true;
            }
            if(key == 'useractive')
            {
                var checkusera = $('#useractive').is(':checked') ? 1 : 0;
                if(profcurrentdataset[i] != checkusera)
                {
                    newformdata.append(key , checkusera);
                    requiresUpdate = true;
                }
            }
            var imgchange = profcurrentdataset.length - 1;
            if($('#uploadprofileimg').val() != '')
            {
                newformdata.append('filename', $('#uploadprofileimg')[0].files[0]);
                requiresUpdate = true;
                $('#uploadprofileimg').val('')
            }
            else
            {
                if($('#imgplace').attr('src') != currentprofimg)
                {
                 newformdata.append('profPhoto', '');
                 requiresUpdate = true;   
                }
            }
            
            i++;
         });
         if(requiresUpdate)
         {
            
            profCustomeAjax('updateStuff.php?page=userdetails&id='+curdataid, newformdata, 'Update');
            
         }
    }
    else
    {
    var dt = getData();
    if(Object.prototype.toString.call(dt) == "[object FormData]")
    {
        profCustomeAjax('insertStuff.php?page=profile', dt, 'Insert');
    } 
    }
    
    
});
$('#new').click(function(event){
    setFieldStatus(profilefields, false);
    clearProfile();
    validimg = false; 
    curdataid = '';//set unique id
    profcurrentdataset = [];
    currentprofimg  = '';
    
});
function clearProfile()
{
    $.each(profilefields, function(key, value){
        if(key != 'useractive' && $.inArray(key, dropdowns) == -1)
        {
            $('#'+key).val('');
        }
        if(key == 'useractive')
        {
            $('#'+key).prop('checked', false);
        }
        if(key == 'userid')
        {
           $('#'+key).val('None'); 
        }
        
    });
    $('#imgplace').attr('src', 'images/profileplaceholder.png');
}
//custom ajax code for form data - cant use shared.js
function profCustomeAjax(profurl, formdatat, status)
{
    $.ajax(
        {
            url : profurl,
            contentType : false,
            processData : false,
            cache : false,
            data : formdatat,
            type : 'POST',
            success : function (datat)
            {
                defineErrorCodes(datat, status);
            },
            error : function(errr)
            {
                defineErrorCodes(errr, status);
                
            }
            
            
        
        });
}
//edit /update
$('#edit').click(
function(event){
    
    setFieldStatus(profilefields, false)
    $('#uploadprofileimg,#save, #clearimg').prop('disabled', false);
    
});
$('#delete').click(
function(event)
{
    deleteRecord('deleteStuff.php?page=profile', curdataid, deletionConfirmed);
});
function deletionConfirmed()
{
    clearProfile();
    $("#searchProfile").val("");
     curdataid = '';//set unique id
     profcurrentdataset = [];
     currentprofimg = ''
     loadButtonStatuses(true);
     setFieldStatus(profilefields, false);
}
$('#clearimg').click(function(event)
{
    $('#imgplace').attr('src', 'images/profileplaceholder.png');
});
insertFromQuery('profile', setValueInFields);
$('#addUser').click(function(event){  openWindow('users.php'); });
$('#userid, #fname, #lname, #email, #phoneno').click(
function(event)
{
    if($('#'+event.target.id).hasClass('alert alert-danger'))
    {
        $('#'+event.target.id).removeClass('alert alert-danger');
       $('#requiredError').html('');
    }
});


});