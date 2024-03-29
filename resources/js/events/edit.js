let oldSubEventId;
window.editEvent = function (mainEventUrl){
    let customCategoryName = document.getElementById('customCategoryName').value;
      
    $.ajax({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
 url: mainEventUrl,
 data:{'customCategoryName':customCategoryName},
 type: 'PUT',
 success: function(response) {
   if($.isEmptyObject(response.error)){
    ensureResponse(response);

   }else{
    printErrorMsg(response.error);
   }
 }
});
  }
  function ensureResponse(isEdited){
    if(isEdited){
        document.getElementById('categorySuccess').style.display = 'block';
        setTimeout(function() {
          document.getElementById('categorySuccess').style.display = 'none';

          }, 2000);
    }
  }



let addSubEventBtn = document.getElementById('addSubEvent');
         addSubEventBtn.addEventListener('click',function(){
          let subCategoryName=document.getElementById('subCategoryName');
       let subCategoryAmount = document.getElementById('subEventAmount');
       let categoryId=document.getElementById('customEventCategory').value;
        sendSubCategory(subCategoryName,subCategoryAmount,categoryId);
         });
window.sendSubCategory = function (subName,amount,categoryId){
  let subCategoryInfo={'subName':subName.value,'amount':amount.value,'categoryId':categoryId};
  $.ajax({
headers: {
 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
url:urlSubCategory,
type: 'POST',
data:subCategoryInfo,
 success:function(response){
   //create information record about the event 
   if($.isEmptyObject(response.error)){
          createEventInfoRecordForUpdate(response.data,response.isUpdated);
      
  }else{
      printErrorMsg(response.error,'sub');
  }
 }
}); 

  }
  function createEventInfoRecordForUpdate(eventData,isUpdated){
    let table_body = document.getElementById('event_table_body');

    if(isUpdated){
        table_body.querySelectorAll('input').forEach(function(element){
            if(element.value == eventData.name){
                element.parentElement.parentElement.querySelector("td input[name='amount']").value = eventData.amount;
            }
        });
    }else{
        let table_row = document.createElement("tr");
        let table_data_amount = document.createElement("td");
        let table_data_edit_btn =  document.createElement("td");
        let table_data_amount_input = document.createElement('input');
            table_data_amount_input.setAttribute('type','number');
            table_data_amount_input.setAttribute('name','amount');
            table_data_amount_input.classList.add('form-control');
            table_data_amount_input.setAttribute('step','0.01');
            table_data_amount_input.value = eventData.amount;
        let table_data_event_type = document.createElement("td");
        let table_data_event_type_input = document.createElement('input');
            table_data_event_type_input.classList.add('form-control');
            table_data_event_type_input.setAttribute('type','text');
            table_data_event_type_input.setAttribute('name','customSubCategoryName');
            table_data_event_type_input.value = eventData.name;
        let editBtn = document.createElement('button');
            editBtn.classList.add('btn','btn-gradient-danger','btn-fw');
            editBtn.innerHTML ="Edit Sub-Event";
        let successTd = document.createElement('td');
        let successChiledDiv = document.createElement('div');
        let errorChiledDiv = document.createElement('div');
        let errorUl = document.createElement('ul');
            errorChiledDiv.classList.add('alert','alert-danger','print-error-msg-sub');
            errorChiledDiv.setAttribute('style','display:none');
            errorChiledDiv.appendChild(errorUl);
            successChiledDiv.classList.add('alert','alert-success');
            successChiledDiv.setAttribute('id','subCategorySuccess');
            successChiledDiv.setAttribute('role','alert');
            successChiledDiv.setAttribute('style','display:none');
            successChiledDiv.innerHTML = "The Sub-Event Successfully Updated";
            successTd.appendChild(successChiledDiv);
            successTd.appendChild(errorChiledDiv);
            table_data_amount.appendChild(table_data_amount_input);
            table_data_event_type.appendChild(table_data_event_type_input);
            table_row.appendChild(table_data_event_type);
            table_row.appendChild(table_data_amount);
            table_data_edit_btn.appendChild(editBtn);
            table_row.appendChild(table_data_edit_btn);
            table_row.appendChild(successTd);
            table_body.appendChild(table_row);
            editBtn.addEventListener('click',function(){
                // will be in the edit.js
                editSubEvent(editBtn,eventData.id);
            }); 
    }
      
          document.getElementById('subCategoryName').value="";
          document.getElementById('subEventAmount').value="";
}

window.editSubEvent =function (chiledElement,subEventId){
  let customSubCategoryName='';
  let customSubCategoryAmount=0;
  let subCategoryName = chiledElement.parentElement.parentElement.querySelector('td input[name="customSubCategoryName"]');
  let subCategoryAmount = chiledElement.parentElement.parentElement.querySelector('td input[name="amount"]');

      customSubCategoryName=subCategoryName.value;
      customSubCategoryAmount=subCategoryAmount.value;
      setUrl(subEventId);     
  $.ajax({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
 url: subEventUrl,
 type: 'PUT',
 data:{'customSubCategoryName':customSubCategoryName,'customSubCategoryAmount':customSubCategoryAmount},
 success: function(response) {
  if($.isEmptyObject(response.error)){
    renderSuccess(response,chiledElement);
    
}else{
    printErrorMsg(response.error,'sub',chiledElement);
}
 }
});
}

function renderSuccess(isStored,chiledElement){
  if(isStored){
    chiledElement.parentElement.parentElement.querySelector('#subCategorySuccess').style.display = 'block';
        setTimeout(function() {
          chiledElement.parentElement.parentElement.querySelector('#subCategorySuccess').style.display = 'none';

          }, 2000);
  }
}

function setUrl(id){
  if(subEventUrl.includes(':customSubCategoryId')){
    subEventUrl = subEventUrl.replace(':customSubCategoryId',id);
  }else{
    subEventUrl=subEventUrl.substring(0,subEventUrl.indexOf('/SubEvents/'))+'/SubEvents/'+id+'/update';
  }
  }
  function printErrorMsg (msg,type ='event',chiledElement =null) {
    
    if(chiledElement){
     let element = chiledElement.parentElement.parentElement.querySelector('td div.alert-danger');
     let ul =  element.querySelector('ul'); 
          ul.innerHTML = '';   
         msg.forEach(function(li){
              let listElement = document.createElement('li');
                  listElement.innerHTML = li;
                    
                    ul.appendChild(listElement);
          });
          element.style.display = 'block';
          setTimeout(function() {
            element.style.display = 'none';
            }, 2000);
          
    }else{
      $(".print-error-msg-"+type).find("ul").html('');
      $(".print-error-msg-"+type).css('display','block');
  
      $.each( msg, function( key, value ) {
          $(".print-error-msg-"+type).find("ul").append('<li>'+value+'</li>');
      });
      setTimeout(function() {
          $(".print-error-msg-"+type).css('display','none');
          }, 2000);
    }
   
}
