$(document).ready(
function()
{
    var usrfields = {'usernm':'','password1':'','confirmpassrd':''};
    var currentdataset = {'name' : undefined, 'password' : undefined};

    //clear fields

    //click events part
    function disableconfirmpassrd(status)
    {
        $('#confirmpassrd').prop("disabled", status);
   
    }//edit
    $('#edit').click(function(event)
    {
        $('#password1, #confirmpassrd').val('');
        $('#password1, #confirmpassrd').prop('disabled', false);

    });
    //autocomplete for page dropdowns

    autocompleter('usernm', 'autocomplete.php?page=users', setValueFields);
    
    
    //set value on fields on search
    function setValueFields(event, ui)
    {
        $.getJSON(
            'sendBackStuff.php?page=users', {'id' : ui.item.value}, function(data){
                $('#password1').val(data[1].substring(0,10));
                $('#confirmpassrd').val(data[1].substring(0,10));
                currentdataset.name = ui.item.value;

            }
            );
        $('#password1').prop('disabled', true);
        loadButtonStatuses(false)
    }



    $('#confirmpassrd').on('blur',function(){ 
        
        if(!checkPasswordMatch() && $('#password1').val() != '')
        {
            setErrorMsg('password do not match', 'addClass');
           
        }
        else
        {
            setErrorMsg('', 'removeClass');
        }
    });
    function checkPasswordMatch()
    {
        return $('#password1').val() == $('#confirmpassrd').val();
        
    }
    function checkPasswordLength(){
        return ($('#password1').val()).length >= 4; 
     }
    //&& $('#usrnm').val() != '' && $('#usrnm').val() != ' '
     //show confirm password field when password is in focus
     $('#password1').focus(function(event){  
        if($.inArray($('#usernm').val(), ['',' ']) == -1 ) 
        { 
            disableconfirmpassrd(false); 
            
         }});
     //
      
     //save
     $('#save').click(function(event)
     {
      if(currentdataset.name != undefined)
       {
        //update
        if(checkPasswordLength() && checkPasswordMatch() && $('#usernm').val() != '' && $('#usernm').val() != ' ' && currentdataset.password != $('#password1').val()  && $('#password1').val()  != '')
        {
          ajaxSendReceive('updateStuff.php?page=users&id='+currentdataset.name, {'usernm' : ($('#usernm').val()).trim(), 'password1': $('#password1').val()}, 'Update', ''); 
          $('#password1, #confirmpassrd').val('');
          $('#password1, #confirmpassrd').prop('disabled', true); 
        }
        else
        {
            setErrorMsg('error while updating user, check credentails', 'addClass');
        }
        

        }
    else
    {
        if($('#usrnm').val() != '' && $('#usrnm').val() != ' ' && checkPasswordMatch())
        {
        
            if(checkPasswordLength() && $('#usrnm').val() != $('#password1').val())
            {
                saveRecord();
            }
            else
            {

                setErrorMsg('Passwd should be more than 4 characters or should not match username', 'addClass');
            }

            
        } 
        else
        {
            setErrorMsg('invalid settings', 'addClass');
        }
    }
     });

     function setErrorMsg(errormsg, classStatus){
        if(classStatus == 'addClass')
        {
            if($('#passwordMatchError').hasClass('alert alert-danger'))
            {
                $('#passwordMatchError').html(errormsg)
            }
            else
            {
                $('#passwordMatchError').addClass('alert alert-danger');
                $('#passwordMatchError').html(errormsg)
            }
            
        }
    else{
        $('#passwordMatchError').removeClass('alert alert-danger');
        $('#passwordMatchError').html('')
         }
     }
     //edit

     //delete
     $('#delete').click(function(event){
        if(($('#usernm').val()).trim() != '' && $('#usernm').val() != undefined)
        {
            deleteRecord('deleteStuff.php?page=users', ($('#usernm').val()).trim(), confirmUserDel)
        }
        
     });
     //new
     $('#new').click(function(event){
        $('#password1, #confirmpassrd').val('');
     });
     //functions  save, update, delete data
     function confirmUserDel()
     {
       $('#usernm').val(' ');
        $('#password1, #confirmpassrd').val('');
        $('#usernm, #password1').prop('disabled', false);
        $('#confirmpassrd').prop('disabled', true);
        currentdataset = []
     }
     function saveRecord()
     {
        
        ajaxSendReceive('insertStuff.php?page=users', returnFieldVals(), "Insert", '');
        $('#password1, #confirmpassrd').val('');
        $('#password1, #confirmpassrd').prop('disabled', true); 
     }

     function returnFieldVals()
     {
        usrfields['usernm'] = ($('#usernm').val()).trim();
        usrfields['password1'] = $('#password1').val();
        usrfields['confirmpassrd'] = $('#confirmpassrd').val();
        return usrfields;
     }
     
    

    
});
