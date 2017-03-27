$(document).ready(function(){
    callPopulate(); //populates values to select

    var rolesList;
    var newarraydt; //all pages indexes
    var currentselectuser = '';
    var activepages = [];
    autocompleter('userp', 'autocomplete.php?page=users', setPages);
    function setPages(event, ui)
    {
    	//load permited and non permitted pages
    	currentselectuser = ui.item.value;
        
        var selectednouser = $('#roleslistbox').val();
        if(selectednouser)
        {
            for(var i = 0; i < selectednouser.length; i++ )
        {
            $("#roleslistbox option[value='" + selectednouser[i] + "']").prop("selected", false);
        }
        rolesList.bootstrapDualListbox('refresh', true);
        }
        
        rolesajax('sendBackStuff.php?page=roles&q=onlyusers&id='+currentselectuser,'', populateSelectList, 'select');

    }
    function callPopulate()
    {
        rolesajax('sendBackStuff.php?page=roles&q=allpages&id=none','',populateSelectList, 'all');
    }
    function populateSelectList(newarraydt, sts)
    {
         
        var selectstr = '';
        if(sts != 'all')
        {
            activepages = [];
        }
        for(var i = 0; i < newarraydt.length; i++)
        {
            if(sts == 'all')
            {
                selectstr += '<option value="'+newarraydt[i][0]+'">'+newarraydt[i][1]+'</option>';
            }
            else
            {
                
                $("#roleslistbox option[value='" + newarraydt[i][0] + "']").prop("selected", true);
                activepages.push(newarraydt[i][0]);
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
            $('#changingperm').html('User >> '+currentselectuser + ' << Selected');
            rolesList.bootstrapDualListbox('refresh', true);
            $('#save').prop('disabled', false);
        }
        
    }
    function rolesajax(calledurl,dt, callbackfunc, status)
    {
        $.ajax(
        {
            url : calledurl, 
            type : 'POST',
            data : dt,
            dataType : 'json',
            success : function(dt)
            {
                
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
        // $('#changingperm').html('');
         var selectedroles = $('#roleslistbox').val();
         var addeditems = selectedroles  ? compareArrays(selectedroles, activepages) : {};
         var removeditems = activepages  ? compareArrays(activepages, selectedroles):  {};
         console.log(removeditems);
         if(Object.keys(addeditems).length > 0 && currentselectuser != '')
         {
            
            rolesajax('insertStuff.php?page=roles&id='+currentselectuser, addeditems, notifyStatus ,'Permission Update');
            
         }
         if(Object.keys(removeditems).length  > 0 && currentselectuser != '')
         {
            rolesajax('deleteStuff.php?page=roles&id='+currentselectuser, removeditems,notifyStatus ,'Permission Delete');
            
         }
         
         
    });
    function notifyStatus(dt, status)
    {

        if(dt == 200)
        {
            
            rolesajax('sendBackStuff.php?page=roles&q=onlyusers&id='+currentselectuser,'', populateSelectList, 'select');
        }
        defineErrorCodes(dt, status);
    }
    //return items in first array not in second
    function compareArrays(arrr1, arrr2)
    {
        var addarr = {};
        for(var i= 0;i < arrr1.length;i++)
         {
            if($.inArray(arrr1[i], arrr2) == -1)
            {
                addarr[i] = arrr1[i];
                    
            }
            
            
         }
         return addarr;
    }
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
    insertRoleInRequest();
    function insertRoleInRequest()
    {
    var paramData = purl();
    var getData = paramData.attr('query');
    
    if(getData != '' && getData != undefined)
    {
        var matchpat = new RegExp('id=');
        if(matchpat.test(getData))
        {   var getId = getData.split('&');
            var paramValue = getId[0].split('=');
            if(paramValue[1] != '')
            {
                var currentpgid = paramValue[1];
                currentselectuser = currentpgid;
                rolesajax('sendBackStuff.php?page=roles&q=onlyusers&id='+currentpgid,'', populateSelectList, 'select');
                
            }
            
            /*
            */
        }
        
    }
    
}

});