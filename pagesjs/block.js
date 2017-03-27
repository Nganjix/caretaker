$(document).ready(
function()
{
    blockdataset = [];
    blockid = ''; 
    blockfields = {'blockname' : 'required', 'blockdesc' : 'notrequired', 'estateid' : 'required'};
    populateEstate();
    function populateEstate()
    {
        $.getJSON('dropdowns.php', {'page' : 'blocks', 'dropdownid' : 'estateId'}, function(autodata){
            i = 0;
            estateoptions = ''
            $.each(autodata, function(key, value)
            {
                if(i == 0)
                {
                   estateoptions += '<option value="None" selected>None</option>' + '<option value="'+value[0]+'">'+value[1]+'</option>';
                   
                }
                else
                {
                    estateoptions += '<option value="'+value[0]+'">'+value[1]+'</option>';
                }
                i++;
            });
            $('#estateid').append(estateoptions);

            
        });
    }
    
    
    //events
    $('#save').click(function(event){
        //check if update or insert 
        if(blockid != '' && blockdataset.length > 0)
        {
            //update
            if(!genValidateFields(blockfields))
            {
                var blockUpdated = {};
            if($('#blockname').val() != blockdataset[0])
            {
               blockUpdated['blockname'] = $('#blockname').val();
               
               
            } 
            if($('#blockdesc').val() != blockdataset[1])
            {
               blockUpdated['blockdesc'] = $('#blockdesc').val();
            }
            if($('#estateid').val() != blockdataset[2])
            {
                blockUpdated['estateid'] = $('#estateid').val();

            }
            if(Object.keys(blockUpdated).length > 0)
            {
               ajaxSendReceive('updateStuff.php?page=blocks&id='+blockid, blockUpdated, 'Update', '');
            }
            }
        }
        else
        {
            if(!genValidateFields(blockfields))
            {
                var alldata = {
                    'blockname' : $('#blockname').val() , 
                    'blockdesc' : $('#blockdesc').val(), 
                    'estateid' : $('#estateid').val()
                };
                ajaxSendReceive('insertStuff.php?page=blocks', alldata,'Insert', '');
            }
        }
        
    });
    function clearBlockFields(){
        $('#blockname, #blockdesc').val('');
        $('#estateid').val('None');
    }
    //autocomplete
    autocompleter('searchblocks', 'autocomplete.php?page=blocks', setBlockValues);
    function setBlockValues(event, ui)
    {
        var idget = (ui.item.value).split(' ')[0];
    
    $.getJSON('sendBackStuff.php?page=blocks', {'id' : idget}, function(blockdatareceived){ 
        setValueBlocks(blockdatareceived, idget);
    });   
    }
    function setValueBlocks(blockdatareceiv, id)
    {
        blockid = id;
        blockdataset = blockdatareceiv;
        $('#blockname').val(blockdatareceiv[0]);
        $('#blockdesc').val(blockdatareceiv[1]);
        $('#estateid').val(blockdatareceiv[2]);
        setFieldStatus(blockfields, true);
        loadButtonStatuses(false);
        $('#requiredError').html('');
        $('#searchblocks').val('');
    }
    
    $('#edit').click(function(event){
        setFieldStatus(blockfields, false);
    });
    $('#new').click(function(event){
        clearBlockFields();
        loadButtonStatuses(true);
        setFieldStatus(blockfields, false);
    });
    $('#delete').click(function(event){
        if(blockid != '')
        {
           deleteRecord('deleteStuff.php?page=blocks', blockid, deleteBlock);
        }
    });
    $('#estatebtn').click(function()
    {
       openWindow('estates.php'); 
    });
function deleteBlock()
{
    blockdataset= [];
    blockid = '';
    clearBlockFields();
    loadButtonStatuses(true);
    setFieldStatus(blockfields, false);
    
}
insertFromQuery('blocks', setValueBlocks);
$('#blockname, #estateid').click(function(event){
   if($('#'+event.target.id).hasClass('alert alert-danger'))
            {
                $('#'+event.target.id).removeClass('alert alert-danger');
                $('#requiredError').html('');
            }
            
});
    
});