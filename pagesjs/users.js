$(document).ready(
function()
{
    var usrfields = {'usernm':'','password1':'','confirmpassrd':''};
    var currentdataset;
    //clear fields

    //click events part
    function disableconfirmpassrd(status)
    {
        $('#confirmpassrd').prop("disabled", status);
   
    }
    //autocomplete for page dropdowns
    $('#usernm').autocomplete({
    source : 'autocomplete.php?page=users',
    autoFocus : true
     });
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
      $('#resetbtn').click(function(event){   disableconfirmpassrd(false);  });
     //save
     $('#save').click(function(event)
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
     $('#edit').click(function(event){
        
     });
     //delete
     $('#delete').click(function(event){
        
     });
     //new
     $('#new').click(function(event){
        
     });
     //functions  save, update, delete data
     
     function saveRecord()
     {
        
        ajaxSendReceive('insertStuff.php?page=users', returnFieldVals(), "Insert");
     }

     function returnFieldVals()
     {
        usrfields['usernm'] = ($('#usernm').val()).trim();
        usrfields['password1'] = $('#password1').val();
        usrfields['confirmpassrd'] = $('#confirmpassrd').val();
        return usrfields;
     }
     
    

    
});
