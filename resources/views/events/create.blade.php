@extends('layouts.app')
 @section('content')
 <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add your Event</h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Event Name</label>
                <div class="col-sm-9">
                  <input type="text"  id="category" name="category" class="form-control" />
                </div>
              </div>
            </div>
            <div id="eventActionButtons">
            <button  class="btn btn-gradient-danger btn-fw" id="addEvent">Add Event</button>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" id="subCategoryNameLabel"></label>
                <div class="col-sm-9" id="subCategoryName">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row fluid">
                <label class="col-sm-3 col-form-label" id="subCategoryAmountLabel"></label>
                <div class="col-md-9" id="subCategoryAmount">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row fluid">
                <label class="col-sm-3 col-form-label" id="subCategoryDateLabel"></label>
                <div class="col-md-9" id="subCategoryDate">
                </div>
              </div>
            </div>
          </div>
          <div id="buttonSubCategory">

          </div>
      </div>
    </div>
  </div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Your Event Expenses</h4>
        <table class="table table-striped " id="eventsTable">
          <thead>
            <tr>
              <th> Type </th>
              <th> Amount </th>
              <th> Date </th>
            </tr>
          </thead>
          <tbody id="event_table_body">
            <tr>
            
               
            </tr>
          </tbody>
        </table>
        <a class="btn btn-lg btn-gradient-success mt-4" href="/expenses/create">+ Add new expense</a>
      </div>
    </div>
  </div>
  <script >
  
  document.getElementById('addEvent').addEventListener('click',function(){
      
let eventName = document.getElementById('category').value;
if(eventName && eventName != ""){
    let urlEvent = `{{route('events.store')}}`;
$.ajax({
    headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
  type: 'POST',
   url:urlEvent,
   data:{'eventName':eventName},
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
    let href = "{{route('events.edit',['id'=>':data.categoryId'])}}";
        href = href.replace(':data.categoryId',data.categoryId);

    let editEvent = document.createElement('a');
        editEvent.innerHTML = 'Edit Event';
        editEvent.setAttribute('href',href);
               //create anchor tag for create new event
    let addEvent = document.createElement('a');
        addEvent.setAttribute('href',"{{route('events.create')}}"); 
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
       
        //create input and set event date into that input 
    let eventSubCategoryDate = document.createElement('input');
        eventSubCategoryDate.setAttribute('type','date');

        document.getElementById('subCategoryDateLabel').innerHTML ='Date';
      //create add custom sub expents button
    let addSubCategoryButton = document.createElement('button');
        addSubCategoryButton.innerHTML ="Add Sub-Expense";
// append the rest of the elements
    let subCategoryNameParent = document.getElementById('subCategoryName');
        subCategoryNameParent.appendChild(eventName);
    let subCategoryAmountParent = document.getElementById('subCategoryAmount');
        subCategoryAmountParent.appendChild(eventSubCategoryAmount);
    let subCategoryDateParent = document.getElementById('subCategoryDate');
        subCategoryDateParent.appendChild(eventSubCategoryDate);

        //disabled the input and add button of event after the user enter one to stop him of enter more than one event at a time
        document.getElementById('addEvent').disabled =true;
        document.getElementById('category').disabled = true;
        document.getElementById('buttonSubCategory').appendChild(addSubCategoryButton);

        // this function will store custoSubCategory By Ajax and it will send data and elements needed to support this operation
        subCategoryAjax(addSubCategoryButton,eventName,eventSubCategoryAmount,eventSubCategoryDate,data.categoryId);
    }   
}
function subCategoryAjax(addButton,subName,amount,date,categoryId){
addButton.addEventListener('click',function(){
  //check if the three fields is full and not empty and if it is it will alert an error
    if(subName && amount && date){

        let urlSubCategory = `{{route('events.subStore')}}`;
        let subCategoryInfo={'subName':subName.value,'amount':amount.value,'date':date.value,'categoryId':categoryId};
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
      let table_data_date = document.createElement("td");
          table_data_date.innerHTML=eventData.date;
          table_row.appendChild(table_data_event_type);
          table_row.appendChild(table_data_amount);
          table_row.appendChild(table_data_date);
          table_body.appendChild(table_row);
          document.getElementById('subCategoryName').querySelector('input').value="";
          document.getElementById('subCategoryAmount').querySelector('input').value="";
          document.getElementById('subCategoryDate').querySelector('input').value="";
}
</script>
 @endsection