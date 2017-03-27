$(document).ready(
function()
{
    var estateDataSet = [];
    var estateId = '';
    var estatefields =  {"estateName" : "required", "estateDesc" : "notrequired", "location" : "required"};
    

//events
$('#save').click(function(event){
    if(estateId != '' && estateDataSet.length != 0)
    {
        if(!genValidateFields(estatefields))
        {
           var updatingVals = {};
           if($('#estateName').val() != estateDataSet[0])
            {
               updatingVals['estateName'] = $('#estateName').val();
               
               
            } 
            if($('#estateDesc').val() != estateDataSet[1])
            {
               updatingVals['estateDesc'] = $('#estateDesc').val();
            }
            if($('#location').val() != estateDataSet[2])
            {
                updatingVals['location'] = $('#location').val();

            }
            if(Object.keys(updatingVals).length > 0)
            {
               ajaxSendReceive('updateStuff.php?page=estates&id='+estateId, updatingVals, 'Update', '');
            }
        
        
        }
        
        
    }
    else
    {
    if(!genValidateFields(estatefields))
    {
        ajaxSendReceive('insertStuff.php?page=estates', {'estateName' : $('#estateName').val(), 'estateDesc' : $('#estateDesc').val(), 'location' : $('#location').val()}, 'Insert', '');
        
    }
    }
    
});

$('#edit').click(function(event){
    setFieldStatus(estatefields, false);
});
$('#delete').click(function(event){
    if(estateId != '')
    {
        deleteRecord('deleteStuff.php?page=estates', estateId, deleteEstate);
    }
});
function deleteEstate()
{
    estateDataSet = [];
    estateId = '';
    clearFields();
    loadButtonStatuses(true);
    setFieldStatus(estatefields, false);
    
    
}
$('#new').click(function(event){
    clearFields();
    loadButtonStatuses(true);
    setFieldStatus(estatefields, false);
});
autocompleter('searchEstate', 'autocomplete.php?page=estates', setFieldValues);

function setFieldValues(event, ui)
{
    var idget = (ui.item.value).split(' ')[0];
    
    $.getJSON('sendBackStuff.php?page=estates', {'id' : idget}, function(datareceiv){
        
        setValuesInFields(datareceiv, idget);
        
    });
}
function setValuesInFields(datareceived, id)
{
        estateDataSet = datareceived;
        estateId = id;
        $('#estateName').val(estateDataSet[0]);
        $('#estateDesc').val(estateDataSet[1]);
        $('#location').val(estateDataSet[2]);
        setFieldStatus(estatefields, true);
        loadButtonStatuses(false);
        $('#requiredError').html('');
        $('#searchEstate').val('');
    
}
function clearFields()
{
    $('#estateName,#estateDesc, #location').val('');
}
insertFromQuery('estates', setValuesInFields);
$('#estateName, #location').click(function(event){
   if($('#'+event.target.id).hasClass('alert alert-danger'))
            {
                $('#'+event.target.id).removeClass('alert alert-danger');
                $('#requiredError').html('');
            }
            
});
});