$(document).ready(
function()
{
    var usrfields = {'usrnm':'','password1':'','confirmpassrd':''};
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
            $('#passwordMatchError').addClass('alert alert-danger');
            $('#passwordMatchError').html('password do not match')
        }
        else
        {
            $('#passwordMatchError').removeClass('alert alert-danger');
            $('#passwordMatchError').html('')
        }
    });
    function checkPasswordMatch()
    {
        return $('#password1').val() == $('#confirmpassrd').val();
        
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
     $('#save').click(function(event){
        if($('#usrnm').val() != '' && $('#usrnm').val() != ' ' && checkPasswordMatch())
        {
            console.log('in saving data');
            saveRecord();
        } 
        else
        {

        }
     });
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
        console.log('in ajax save data');
        ajaxSendReceive('insertStuff.php?page=users', returnFieldVals(), "Insert");
     }

     function returnFieldVals()
     {
        usrfields['usernm'] = $('#usrnm').val();
        usrfields['password1'] = $('#password1').val();
        usrfields['confirmpassrd'] = $('#confirmpassrd').val();
        return usrfields;
     }
     
    
});
