$(document).ready(function()
{
    $.ajaxSetup({
        complete : function(data) {
            console.log(data);
        }
        
    });
   $('#periodstb').DataTable(
   {
    ajax : { url : 'sendBackStuff.php?page=paymentperiods&id=none', dataSrc:"" }
   }
   );
  ; 
});