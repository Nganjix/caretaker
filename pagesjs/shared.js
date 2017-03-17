//validate data


function validateData(fieldname) {
    $('#requiredError').text("Fields marked with red have to be filled");
    $('#'+fieldname).addClass("alert alert-danger");
}
var codes = {"200":"Success", "300":"Data not found", "400":"Error"}
function setDeleteStatus(delstatus)
{
   $('#delete').prop("disabled", delstatus); 
}
function setEditStatus(editstatus)
{
    $('#edit').prop("disabled", editstatus); 
}
function setSaveStatus(savestatus)
{
   $('#save').prop("disabled", savestatus); 
}
function setNewStatus(savestatus)
{
   $('#new').prop("disabled", savestatus); 
   
}
//enables in delete, edit and new
function loadButtonStatuses(statusbtn)
{
    setDeleteStatus(statusbtn);
    setEditStatus(statusbtn);
    setNewStatus(statusbtn);
}
function setFieldStatus(allfields, status)
{
    var i;
    $.each(allfields, function(key , val)
    {
       $('#'+key).prop('disabled', status); 
    });
}
//for autocomplete
function autocompleter(tagname, geturl, callbackfunction)
{
    $('#'+tagname).autocomplete(
    {
        source : geturl,
        autoFocus  : true,
        select : function(event, ui)
        {
            callbackfunction(event, ui);
            
        }
    }
    )
}
//general ajax works
function ajaxSendReceive(urlname, info, datastatus)
    {
        var sendtype = datastatus == 'Update' ? 'GET' : 'POST';
        $.ajax({
             url : urlname,
             type : sendtype,
             data : info,
             success : function(datar)
                 {
                      defineErrorCodes(datar, datastatus);
                 },
             error : function(thiserror){ 
              defineErrorCodes('500', "Network error data couldn't be sent");
            }
  });
    
  
  }
  function defineErrorCodes(datar, dtstatus)
  {
                      if(datar == '200')
                      {
                        msgNotifier('success', dtstatus+' operation successful');
                      }
                      else if (datar == '300')
                      {
                        msgNotifier('warning', dtstatus+' operation not successful');
                      }
                      else
                      {
                        if(datar == '400')
                        {
                          msgNotifier('error', 'Fatal error during '+dtstatus);
                        }
                        else
                        {
                          msgNotifier('error', 'unknown error:'+dtstatus);
                        }
                        
                      }

  }

  function msgNotifier(status, notiMsg)
  {
    $.notify(notiMsg, status);
  }
  function openWindow(page)
{
    window.open(page,'PopupWindow','width=1250, height=500, scrollbars=yes, resizable=no');
}