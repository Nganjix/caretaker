$(document).ready(function(){
    
    var paymentdataset = [];
    var paymentid = '';
    
    var paymentfields = { 'refid' : 'required', 'paymentprds' : 'notrequired', 'tenantselect' : 'required', 'statusselect' : 'notrequired',
    'pmethodselect' : 'required' , 'accselect' : 'required', 'phoneno' : 'required', 'amount' : 'required', 'transdate' : 'required',
     'elecbill' : 'notrequired', 'waterbill' : 'notrequired', 'addcbill' : 'notrequired'
        
    };
    
    
    
   $(function () { $('#dt').datetimepicker({format: 'dd/mm/yyyy', startView : 2, minView : 2}); }); 
   
   populatePeriods();
   populateTenant();
   populateAccounts();
   setReferenceID();
   $('#accbtn').click(function(event){
      var url = $('#accselect').val() != 'none' ? 'accounts.php?id='+$('#accselect').val() :  'accounts.php';
      openWindow(url);
   });
   //populate payment periods
   function populateAccounts()
   {
       $.getJSON('dropdowns.php', { 'page' : 'payment' ,'dropdownid' : 'accounts' }, function(dt){
       
        var options = '';
         $.each(dt, function(key, val){
            options += '<option value="'+val[1]+'">'+val[1]+'</option>'
         });
         $('#accselect').append(options);
       });
   }
   function populateTenant()
   {
       $.getJSON('dropdowns.php', { 'page' : 'payment' ,'dropdownid' : 'tenant' }, function(dt){
        var options = '';
         $.each(dt, function(key, val){
            options += '<option value="'+val[0]+'">'+val[1]+' '+val[2]+'</option>'
         });
         $('#tenantselect').append(options);
       });
     
   }
   function populatePeriods()
   {
      $.getJSON('dropdowns.php', {'page' : 'payment', 'dropdownid' : 'periods'}, function(dt){
         var options = '';
         
         $.each(dt, function(key, val){
            var vstr =  val[1] < 10 ? '0' : '';
            var pname = (val[2]).replace( (val[2]).charAt(0), (val[2]).charAt(0).toUpperCase());
            var dt = new Date();
            var isselected = dt.getMonth() + 1 == val[1] ? 'selected' : ''; 
            options += '<option value="'+val[0]+'" '+isselected+'>'+vstr+val[1]+' '+pname+'</option>'
         });
         $('#paymentprds').append(options);
       });
   }
   function setReferenceID()
   {
     $.getJSON('sendBackStuff.php', {'page' : 'payment','id' : 'none', 'qfield' : 'referenceid'}, function(dta){
          if(dta[0] != 'false')
          {
          
            $('#refid').val(dta[0]);
            
          }
          else
          {
            $('#refid').val('');
          }
     });
   }
   //events
   //save
   $('#save').click(function(event)
   {
       saveUpdate();
   });
  
   function saveUpdate()
   {
    if(genValidateFields(paymentfields))
    {
        if(paymentdataset.length > 0 && paymentid != '')
         { 
           //update
         }
         else
         {
           //insert
           var paymentinsertobj = new FormData();
           $.each(paymentfields, function(key, value){
              
              paymentinsertobj[key] = $('#'+key).val();
            
           });
           if($('#filecopy').val() != '')
           {
               paymentinsertobj.append('filename', $('#filecopy')[0].files[0]);
            }
           
           if(paymentinsertobj) paymentAjax(paymentinsertobj, 'insertStuff.php?page=payments', messageAfterInsert);
           
         }
    }
    
   }
   function messageAfterInsert(dt)
   {
    defineErrorCodes(dt, 'Insert', '');
    
   }
   function paymentAjax(senddata, url, callbackfunc)
   {
         $.ajax(
           {
            url : url,
            type : 'POST',
            processData : false,
            contentType : false,
            cache : false,
            data : senddata,
            success : function(data){ 
                callbackfunc(data);
            },
                
            error : function(errr){ callbackfunc(errr);  }
           });       
   }
   //cancel
   //edit
   //approve
   $('#refid, #tenantselect, #pmethodselect, #accselect, #phoneno, #amount, #transdate').click(
   function(event){
        if($('#'+event.target.id).hasClass('alert alert-danger'))
       {
          $('#'+event.target.id).removeClass('alert alert-danger');
         $('#requiredError').html('');
        }
   });
   
   
   
   //validate uploaded img
    $('#filecopy').bind('change', function(event){
           var formData = new FormData();
           formData.append('filename', $('#filecopy')[0].files[0]);
           paymentAjax(formData, 'validateimages.php', imgnotifications);
	       
    });
    function imgnotifications(data)
    {
               if(data != '200')
                {
                    $('#imgmessage').html(data);
                     $('#filecopy').val('');
                     $('#attachmessage').html('Attach scanned copy')
                } 
                else
                {
                    validimg = true;
                    $('#imgmessage').html('');
                    $('#attachmessage').html('Attached (1)')
                }
                
    }
   
});