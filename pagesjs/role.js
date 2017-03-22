$(document).ready(function(){
    callPopulate();

    var rolesList;
    var currentselectuser = '';
    autocompleter('userp', 'autocomplete.php?page=users', setPages);
    function setPages(event, ui)
    {
    	//load permit and non permitted pages
    	currentselectuser = ui.item.value;
        $('#changingperm').html('User >> '+currentselectuser + ' << Selected');
        rolesajax('sendBackStuff.php?page=roles&q=onlyusers&id='+currentselectuser, populateSelectList, 'select');

    }
    function callPopulate()
    {
        rolesajax('sendBackStuff.php?page=roles&q=allpages&id=none', populateSelectList, 'all');
    }
    function populateSelectList(receiveddata, sts)
    {
        var newarraydt = JSON.parse(receiveddata);
        var selectstr = '';
        for(i = 0; i < newarraydt.length; i++)
        {
            if(sts == 'all')
            {
                selectstr += '<option value="'+newarraydt[i][0]+'">'+newarraydt[i][1]+'</option>';
            }
            else
            {
                $("#roleslistbox option[value='" + newarraydt[i][0] + "']").prop("selected", true);
                //$('#roleslistbox').val(newarraydt[i][0]);
                
            }
        }
        $('#roleslistbox').append(selectstr);
        if(sts == 'all')
        {
            setDualList();
        }
        else
        {
            rolesList.bootstrapDualListbox('refresh', true);
        }
        
    }
    function rolesajax(calledurl, callbackfunc, status)
    {
        $.ajax(
        {
            url : calledurl, 
            type : 'POST',
            success : function(dt)
            {
                console.log(dt);
                callbackfunc(dt, status);
            },
            error : function(error)
            {
                $.notify('error', 'unknown error occurred');
            }
        }
        );
        
    }
    $('#save').click(function(event){
         $('#changingperm').html('');
         currentselectuser = '';
    });
    function setDualList()
    {
       rolesList = $('select[name="roleslistbox"]').bootstrapDualListbox(
    	{
    		nonSelectedListLabel: 'Non-Permitted screens',
            selectedListLabel: 'Permitted screens',
    		moveOnSelect : false,
    		selectorMinimalHeight : 250
    	}); 
    }
    

});