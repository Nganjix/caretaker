$(document).ready(function(){
    
    var paymentdataset = [];
    var paymentid = '';
    var docpath = './images/documents/';
    var docname = '';
    
    var paymentfields = { 'refid' : 'required', 'paymentprds' : 'notrequired', 'tenantselect' : 'required', 'statusselect' : 'notrequired',
    'pmethodselect' : 'required' , 'accselect' : 'required', 'phoneno' : 'required', 'amount' : 'required', 'transdate' : 'required',
     'elecbill' : 'notrequired', 'waterbill' : 'notrequired', 'addcbill' : 'notrequired'
        
    }; 
  $(function () { $('#dt').datetimepicker({format: 'dd/mm/yyyy', startView : 2, minView : 2}); }); 
   
   populatePeriods();
   populateTenant();
   populateAccounts();
   setReferenceID();
   autocompleter('searchpayment', 'autocomplete.php?page=payments', paymentsGetID);
   function paymentsGetID(event, ui)
   {
      $.ajax({
            url: 'sendBackStuff.php?qfield=none&page=payment&id='+ui.item.value,
            dataType : 'json',
            success: function(data){ 

                setPaymentValues(data, ui.item.value);             
             
            } 
            
    });
   }
   function setPaymentValues(dtarray, pgid)
   {
      $('#imgmessage').html('');
      $('#attachmessage').html('Attach scanned copy');
      $('#displayimg').attr('src', '');
      docname = '';
      paymentdataset = dtarray;
      paymentid = dtarray[0];
      
      if(paymentdataset.length > 0)
      {
        var docstatus = 0;
        var i =0;
        $.each(paymentfields, function(key, val){
            paymentdataset[i] != null && paymentdataset[i] != '' ?  $('#'+key).val(paymentdataset[i]) : '' ;
            key == 'statusselect' ? docstatus = paymentdataset[i] : null;
            i++;
            
        });
      $('#refid, #tenantselect, #pmethodselect, #accselect, #phoneno, #amount, #transdate').trigger('click');
       toggleBtns(false);
       var tmpdocname = paymentdataset[paymentdataset.length - 1];
       if(tmpdocname != '' && tmpdocname != null)
       {
          docname = tmpdocname;
          $('#imgmessage').html('');
          $('#attachmessage').html('Attached (1)');
          $('#displayimg').attr('src', docpath+docname);
          
       }
       //toggle field status with regards to document status
       if(docstatus == 0)
       {
          setFieldStatus(paymentfields, false);
         $('#viewbtn, #filecopy').prop('disabled', false);
         toggleBtns(false)
       }
       else
       {
          setFieldStatus(paymentfields, true);
         $('#viewbtn, #filecopy, #save').prop('disabled', true);
         toggleBtns(true)
       }
       

      }
    
   }
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
            options += '<option value="'+val[0]+'">'+val[1]+'</option>'
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
   //set values on the periods page
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
    if(!genValidateFields(paymentfields))
    {
        var paymentinsertobj = new FormData();
        var updatable = false;
        if($('#filecopy').val() != '')
        {
               paymentinsertobj.append('filename', $('#filecopy')[0].files[0]);
               updatable = true;
        }
        if(paymentdataset.length > 0 && paymentid != '')
         { 
           //update
           var i = 0;
           $.each(paymentfields, function(key, val){
            if($('#'+key).val() != paymentdataset[i])
            {
                paymentinsertobj.append(key, $('#'+key).val());
                updatable = true;
            }
            i++;
           });
           
           
           if(updatable)
           {
               paymentAjax(paymentinsertobj, 'updateStuff.php?page=payments&id='+paymentid, messageAfterUpdate);
           }       
         }
         else
         {
           //insert
           
           $.each(paymentfields, function(key, value){
              
              paymentinsertobj.append(key, $('#'+key).val());
            
           });
           paymentAjax(paymentinsertobj, 'insertStuff.php?page=payments', messageAfterInsert);
           
         }
    }
    
   }
   function messageAfterUpdate(dt)
   {
      defineErrorCodes(dt, 'Update', '');
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
   $('#cancel').click(function(event){
      var confirmmodal = $('[data-remodal-id=modal]').remodal();
      modaldetails('Cancellation Confirmation', 'Do you wish to cancel this payment? kindly note that once cancelled it will be set to read-only and cannot be reverted.', 'Confirm');
      confirmmodal.open();
      $(document).on('confirmation', '.remodal', function () {
           $('#statusselect').val('2');
           setFieldStatus(paymentfields, true);
           $('#viewbtn, #filecopy, #save').prop('disabled', true);
           toggleBtns(true);
           saveUpdate();
       });

     /* $(document).on('cancellation', '.remodal', function () {
           console.log('Cancel button is clicked');
       });*/
   });
   //approve
   $('#approve').click(function(event){
      var confirmmodal = $('[data-remodal-id=modal]').remodal();
      modaldetails('Approve Document', 'Kindly note that once approved the document will be set as Read Only and cannot be changed. ', 'Approve');
      confirmmodal.open();
      $(document).on('confirmation', '.remodal', function () {
           $('#statusselect').val('1');
           setFieldStatus(paymentfields, true);
           $('#viewbtn, #filecopy, #save').prop('disabled', true);
           toggleBtns(true);
           saveUpdate();
   });
   });
   function modaldetails(header, messagedet, buttonst)
   {
       $('h1#modalheader').html(header);
       $('p#modalinfo').html(messagedet);
       $('#modalconfirm').html(buttonst);
   }
   //new
   $('#new').click(function(event){
      $('#refid, #tenantselect, #pmethodselect, #accselect, #phoneno, #amount, #transdate').trigger('click'); //remove fields with red
      $.each(paymentfields, function(key, val){
        if($.inArray(key, ['paymentprds','tenantselect','statusselect','pmethodselect', 'accselect']) != -1)
        {
            $.inArray(key, ['paymentprds','statusselect']) == -1 ? $('#'+key).val('None') : null;
        }
        else
        {
            $('#'+key).val('');
        }
        
      });
      $('#imgmessage').html('');
      $('#attachmessage').html('Attach scanned copy');
      $('#displayimg').attr('src', '');
      toggleBtns(true);
      paymentdataset = [];
      paymentid = '';
      docname = '';
      setFieldStatus(paymentfields, false);
      $('#save').prop('disabled', false);
      setReferenceID();
   });

   $('#refid, #tenantselect, #pmethodselect, #accselect, #phoneno, #amount, #transdate').click(
   function(event){
        if($('#'+event.target.id).hasClass('alert alert-danger'))
       {
          $('#'+event.target.id).removeClass('alert alert-danger');
         $('#requiredError').html('');
        }
   });
   
   function toggleBtns(status)
   {
      $('#approve, #cancel').prop('disabled', status);
      //$('').prop('disabled', status);
      //$('').prop('disabled', status);
   }
   
   //validate uploaded img/doc
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
                     $('#attachmessage').html('Attach scanned copy');
                } 
                else
                {
                    $('#imgmessage').html('');
                    $('#attachmessage').html('Attached (1)');
                }
                
    }
    insertFromQuery('payment&qfield=none', setPaymentValues);
   
});