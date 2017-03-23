$(document).ready(
function()
{
    var accountsdataset = [];
    var currentAcc = '';
    autocompleter('searchaccounts', 'autocomplete.php?page=accounts', setAccounts);
    accountsfields = {'accname': 'required', 'accdesc': 'notrequired', 'accstatus' : 'notrequired'};
    function setAccounts(event, ui)
    {
        currentAcc = ui.item.value;
        $.getJSON('sendBackStuff.php', {'page' : 'accounts', 'id' : currentAcc}, 
        function (datareceiv)
        {
        if(datareceiv)
        {
            $('#accname').val(datareceiv[0]);
            $('#accdesc').val(datareceiv[1]);
            $('#accstatus').prop('checked', datareceiv[2] == '1' ? true : false);
            accountsdataset = datareceiv;
            setFieldStatus(accountsfields, true);
            loadButtonStatuses(false);

        }
        
        
    }      
        
        
        );
    }
    //events
    
    $('#save').click(function(event){
        if(!genValidateFields(accountsfields))
        {
            if(accountsdataset && currentAcc != '')
            {
                //update
                accountstoupdate = {};
                var usractiv = $('#accstatus').prop(':checked') ? 1 : 0;
                if($('#accname').val() != accountsdataset[0])
                {
                    accountstoupdate['accname'] = $('#accname').val();
                }
                if($('#accdesc').val() != accountsdataset[1])
                {
                    accountstoupdate['accdesc'] = $('#accdesc').val();
                }
                if(usractiv != accountsdataset[2])
                {
                    accountstoupdate['accstatus'] = usractiv;
                }
                if(Object.keys(accountstoupdate).length > 0)
                {
                    ajaxSendReceive('updateStuff.php?page=accounts', accountstoupdate, 'Update', '');
                }
                
            }
            else
            {
                //insert
                ajaxSendReceive(urlname, info, datastatus, deletecallback);
                var useractive = $('#accstatus').prop(':checked') ? 1 : 0;
                var sendData = { 'accname' : $('#accname').val(), 'accdesc' : $('#accdesc').val(), 'accstatus' : useractive};
                ajaxSendReceive('insertStuff.php?page=accounts', sendData, 'Insert', '');
                
            }
        }
    });
    $('#edit').click(function(event){
        setFieldStatus(accountsfields, false);
        
    });
    $('#new').click(function(event){
        $('#accname, #accdesc').val('');
        $('#accstatus').prop('checked', false);
        setFieldStatus(accountsfields, false);
        loadButtonStatuses(true);
    });
    $('#delete').click(function(event){
        if(currentAcc != '')
        {
           deleteRecord('deleteStuff.php?page=accounts', currentAcc, afterDelete);
        }
        
    });
    function afterDelete()
    {
        $('#accname, #accdesc').val('');
        $('#accstatus').prop('checked', false);
        setFieldStatus(accountsfields, false);
        loadButtonStatuses(true);
    }
    $('#accname').click(function(event)
    {
        $('#requiredError').html('');
        if($('#accname').hasClass('alert alert-danger'))
        {
          $('#accname').removeClass('alert alert-danger');  
        }
    })


});