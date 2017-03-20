$(document).ready(function()
{
    var companydataset = [];
    var companyid = '';
    var companyfields = {
        'companyname' : 'required',
        'vatpin' : 'notrequired',
        'systememail' : 'required',
        'contactperson' : 'notrequired',
        'telephone' : 'required',
        'location' : 'required',
        'postaladdress' : 'required',
        'mpesamerchantid' : 'notrequired',
        'imgnameplaceholder' : 'notrequired'
        
    };
    populateCompany();
function populateCompany()
{
    $.getJSON('aside/companyops.php', {'op': 'getdata'}, function(datareceiv)
    {
        companydataset = datareceiv;
        var companyid = datareceiv[0];
        if(datareceiv.length > 0 )
        {
            var i =0;
            $('#save').prop('disabled', true);
            $.each(companyfields, function(key ,val)
            {
                $('#'+key).val(datareceiv[i]);
                i++;
            });
            setFieldStatus(companyfields, true);
            $('#logoname').prop('disabled', true);
        }
    });
}
$('#save').click(function()
{

    if(companydataset.length > 0)
    {
        
       if(!genValidateFields(companyfields))
       { 
        var dataUpdated = new FormData();
        var i = 0;
        var updatesexist = false;
        $.each(companyfields, function(key, value){
            if($('#'+key).val() != companydataset[i])
            {
                if(key != 'imgnameplaceholder')
                {
                   dataUpdated.append(key, $('#'+key).val());
                   updatesexist = true; 
                }
                
                //dataUpdated[key] = $('#'+key).val();
            }
            i++;
            
        });
        if($('#logoname').val() != '')
        {
             dataUpdated.append('filename', $('#logoname')[0].files[0]);
             updatesexist = true;
        }
        
        if(updatesexist)
        {
            //ajaxSendReceive('aside/companyops.php', dataUpdated, 'Updating', '');
            companyAjax('aside/companyops.php', dataUpdated,'Update');
        }
       }
      
    }
    else
    {
       if(!genValidateFields(companyfields))
       { 
        var dataToSend = new FormData();
        $.each(companyfields, function(key, value){
            if($('#'+key).val() != '')
            {
                if(key == 'imgnameplaceholder')
                {
                    
                }
                else
                {
                   dataToSend.append(key, $('#'+key).val()); 
                }
                
                //dataToSend[key] = $('#'+key).val();
            }
            
            
        });
        if($('#logoname').val() != '')
        {
           dataToSend.append('filename', $('#logoname')[0].files[0]);
        }
        
        
        //ajaxSendReceive('aside/companyops.php', dataToSend, 'Insert', '');
        companyAjax('aside/companyops.php', dataToSend,'Insert');
       } 
        
    }
    
});
$('#edit').click(function(event)
{
    $('#save').prop('disabled', false);
    setFieldStatus(companyfields, false);
    $('#imgnameplaceholder').prop('disabled', true);
    $('#logoname').prop('disabled', false);
});
$('#companyname, #systememail, #telephone, #postaladdress, #location').click(
function(event){
   if($('#'+event.target.id).hasClass('alert alert-danger'))
            {
                $('#'+event.target.id).removeClass('alert alert-danger');
                $('#requiredError').html('');
            }
            
});
$('#logoname').bind('change', function(){
  $('#imgmessage').html('');
  var fmdata = new FormData();
  fmdata.append('filename', $('#logoname')[0].files[0]);
  companyAjax('validateimages.php', fmdata,'imgcheck');
});
function companyAjax(courl, dt,dtstatus)
{
    $.ajax(
    {
    processData : false,
    contentType : false,
    cache : false,
    type : 'POST',
    url : courl,
    data : dt,
    success : function(dtreceived)
    {

      console.log(dtreceived);
      if(dtreceived == '200' && dtstatus != 'imgcheck') 
      {
        defineErrorCodes(dtreceived, dtstatus, '')
        
      }
      else
      {
        if(dtstatus == 'imgcheck' && dtreceived != '200')
        {
            $('#imgmessage').html(dtreceived);
        }
        
      }
      
    },
    error : function(error)
    {
        $('#imgmessage').html(error);
    }
    
  });
}


});