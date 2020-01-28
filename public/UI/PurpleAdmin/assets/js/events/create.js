

  document.getElementById('addEvent').addEventListener('click',function(){
      
let eventName = document.getElementById('category').value;
let eventDate = document.getElementById('date').value;
if((eventName && eventName != "") &&(eventDate && eventDate!="") ){
$.ajax({
    headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
  type: 'POST',
   url:urlEvent,
   data:{'eventName':eventName,'eventDate':eventDate},
       success:function(data){
       renderResponse(data);
       }
    });  
}

//render the inputs needed for the event that user has entered
function renderResponse(data){
    if(data.isStored){
    let eventActionContainer= document.getElementById('eventActionButtons');
   
    //set the href for the edit anchor tag 
        editHref = editHref.replace(':data.categoryId',data.categoryId);

    let editEvent = document.createElement('a');
        editEvent.innerHTML = 'Edit Event';
        editEvent.setAttribute('href',editHref);
               //create anchor tag for create new event
    let addEvent = document.createElement('a');
        addEvent.setAttribute('href',addEventHref); 
        addEvent.innerHTML = "Add Event";
        //append the anchor tags into the eventActionContainer Div
        eventActionContainer.appendChild(editEvent);
        eventActionContainer.appendChild(addEvent);
        //create input and set event name into that input 
    let eventName = document.createElement('input');
        eventName.setAttribute('type','text');

        document.getElementById('subCategoryNameLabel').innerHTML = 'Event Expense';
        
        //create input and set event amount into that input 
    let eventSubCategoryAmount = document.createElement('input');
        eventSubCategoryAmount.setAttribute('type','number');
        eventSubCategoryAmount.setAttribute('step','0.01');

        document.getElementById('subCategoryAmountLabel').innerHTML ='Amount'; 
       
          //create add custom sub expents button
    let addSubCategoryButton = document.createElement('button');
        addSubCategoryButton.innerHTML ="Add Sub-Expense";
         // append the rest of the elements
    let subCategoryNameParent = document.getElementById('subCategoryName');
        subCategoryNameParent.appendChild(eventName);
    let subCategoryAmountParent = document.getElementById('subCategoryAmount');
        subCategoryAmountParent.appendChild(eventSubCategoryAmount);
    
        //disabled the input and add button of event after the user enter one to stop him of enter more than one event at a time
        document.getElementById('addEvent').disabled =true;
        document.getElementById('category').disabled = true;
        document.getElementById('date').disabled = true;

        document.getElementById('buttonSubCategory').appendChild(addSubCategoryButton);

        // this function will store custoSubCategory By Ajax and it will send data and elements needed to support this operation
        subCategoryAjax(addSubCategoryButton,eventName,eventSubCategoryAmount,data.categoryId);
    }   
}
function subCategoryAjax(addButton,subName,amount,categoryId){
addButton.addEventListener('click',function(){
  //check if the three fields is full and not empty and if it is it will alert an error
    if(subName && amount ){

        let subCategoryInfo={'subName':subName.value,'amount':amount.value,'categoryId':categoryId};
        $.ajax({
    headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
  url:urlSubCategory,
  type: 'POST',
   data:subCategoryInfo,
       success:function(data){
         //create information record about the event 
      createEventInfoRecord(data);
       }
    }); 
    }else{
        alert(' All The Data is Required');
    }
});
}
});
function createEventInfoRecord(eventData){
      let table_body = document.getElementById('event_table_body');
      let table_row = document.createElement("tr");
      let table_data_amount = document.createElement("td");
          table_data_amount.innerHTML=eventData.amount+" EGP";
      let table_data_event_type = document.createElement("td");
          table_data_event_type.innerHTML = eventData.name;
          table_row.appendChild(table_data_event_type);
          table_row.appendChild(table_data_amount);
          table_body.appendChild(table_row);
          document.getElementById('subCategoryName').querySelector('input').value="";
          document.getElementById('subCategoryAmount').querySelector('input').value="";
}