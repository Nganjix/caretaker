$(document).ready(function(){
var validimg = false; 
var dropdowns = {'roleid' : '', 'userid' : ''};
var profilefields = { 'fname' : 'required', 'sname' : 'notrequired', 'lname' : 'required', 'email' : 'required', 'phoneno' : 'required',
'postaladdr' : 'notrequired', 'idno' : 'notrequired', 'roleid' : 'notrequired', 'userid' : 'required', 'useractive' : 'notrequired'}
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
                    if(key == 'roleid')
                    {
                        options += '<option value="guest" selected>Guest</option>'+'<option value="'+val[0]+'">'+val[1]+'</option>';
                    }
                    else
                    {
                        options += '<option value="None" selected>None</option>'+'<option value="'+val[0]+'">'+val[1]+'</option>';
                    }                  
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
                if(key == 'roleid')
                
                {
                   $('#'+key).append('<option value="guest" selected>Guest</option>');
                }
                else
                {
                    $('#'+key).append('<option value="None" selected>None</option>');
                }
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
//events
//save
$('#save').click(function(event)
{
    
    var dt = getData();
    if(Object.prototype.toString.call(dt) == "[object FormData]")
    {
        console.log('expected to work');
        $.ajax(
        {
            url : 'insertStuff.php?page=profile',
            contentType : false,
            processData : false,
            cache : false,
            data : dt,
            type : 'POST',
            success : function (datat)
            {
                console.log(datat);
            },
            error : function(error)
            {
               console.log(datat);
                
            }
            
            
        
        });
    }
    
});
$('#addRole').click(function(event){  openWindow('roles.php'); });
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