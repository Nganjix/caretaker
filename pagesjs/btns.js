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