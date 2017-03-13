$(document).ready(
function()
{
    var usrfields = ['usrnm','password1','confirmpassword'];

     $('#confirmpassword').hide();
    //clear fields

    //click events part
    function showConfirmPass()
    {
        $('#confirmpassword').show();
   
    }
    function hidePass()
    {
        $('#confirmpassword').hide();
    }

    //autocomplete for page dropdowns
    $('#usernm').autocomplete({
    source : 'autocomplete.php?page=users',
    autoFocus : true
     });
     //
      $('#resetbtn').click(function(event){   showConfirmPass();  });
     //save
     $('#save').click(function(){
        
     });
     //edit
     $('#edit').click(function(){
        
     });
     //delete
     $('#delete').click(function(){
        
     });
     //new
     $('#new').click(function(){
        
     });
     function returnFieldVals()
     {
        var username = $('#usrnm').val();
        var passwd = $('#password1').val();
        var confirmpasswd = $('#confirmpassword').val();
        return [username, passwd, confirmpasswd];
     }
     
     
    
});
