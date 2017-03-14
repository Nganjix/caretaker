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
function ajaxSendReceive(url, info, datastatus)
{
  console.log('saving data in ajax');
  $.ajax(
  {
    url : url,
    type : 'POST',
    data : info,
    Success : function(data){
      console.log(data);
    }
  });
  
}