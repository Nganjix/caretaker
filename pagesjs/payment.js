$(document).ready(function(){
   $(function () { $('#dt').datetimepicker({format: 'dd/mm/yyyy', startView : 2, minView : 2}); }); 
   
   $('#accbtn').click(function(event){
      var url = $('#accselect').val() != 'none' ? 'accounts.php?id='+$('#accselect').val() :  'accounts.php';
      openWindow(url);
   });
   $('#tenantbtn').click(function(event){
      var url = $('#tenantselect').val() != 'none' ? 'tenant.php?id='+$('#tenantselect').val() :  'tenant.php';
      openWindow(url);
   });
});