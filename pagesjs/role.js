$(document).ready(function(){


    var rolesList = $('select[name="roleslistbox"]').bootstrapDualListbox(
    	{
    		nonSelectedListLabel: 'Non-Permitted screens',
            selectedListLabel: 'Permitted screens',
    		moveOnSelect : false,
    		selectorMinimalHeight : 250
    	});

    autocompleter('userp', 'autocomplete.php?page=users', setPages);
    function setPages(event, ui)
    {
    	//load permit and non permitted pages
    	console.log(ui.item.value);

    }

});