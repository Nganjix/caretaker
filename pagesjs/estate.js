$(document).ready(
function()
{
    var estatefields =  {"estateName" : "required", "estateDesc" : "notrequired", "location" : "required"};
    

//events
$('#save').click(function(event){
    validateFields();
});

$('#edit').click(function(event){
    
});
$('#delete').click(function(event){
    
});
$('#new').click(function(event){
    
});
function validateFields(){
    var isRequiredEmpty = false;
    $(['estateName', 'location'], function(key, value)
    {
        if($('#'+key).val() == '')
        {
            isRequiredEmpty = true;
        }
        else
        {
            if($('#'+key).hasClass('alert alert-danger'))
            {
                $('#'+key).removeClass('alert alert-danger');
            }
        }
    });
    
    if(!isRequiredEmpty)
    {
       $('#estateName, #location').addClass('alert alert-danger'); 
    }
    else
    {
        
    }
    return isRequiredEmpty;
}
});