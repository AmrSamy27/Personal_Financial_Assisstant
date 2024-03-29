 // hold the base value of the dropDownList of countries
 let previousValue ;

 document.getElementById('selectCategory').querySelectorAll('div input').forEach(function(element){

   element.addEventListener('change',function(){//     
     let categoryId =this.value;
     if(url.includes(':categoryId')){
      url = url.replace(':categoryId',categoryId);
     }else{
      url = url.replace('ajax/'+previousValue,'ajax/'+categoryId);
   }
     // check if the previous or base value is not equal the value changed because if it's the same value then no need to make ajax request as the value desn't changed
     if(previousValue != this.value){
       $.ajax({
        type:'GET',
        url:url,
       dataType:'json',
        success:function(data){
         //  function to render the data of the response 
         if(data){
            renderSubCategories(data);
         }else{
         }
        }
     });  
     previousValue=categoryId;
     if(this.value == "Others"){
       // i send it to render and don't stop it as i will check there if it's empty and if it is i will create option tag element with no country was selected
         renderSubCategories("others");
      } 
     }
 });
});
function renderSubCategories(subCategories){
let selectModal = document.getElementById('subCategoriesIcons');

if(subCategories){
   selectModal.innerHTML='';
   if(subCategories != "others"){
      for(let i = 0 ;i<subCategories.length;i++){
         let divBox=document.createElement('div');
         let spanName=document.createElement('span');
             spanName.innerHTML=subCategories[i].name;
             divBox.classList.add('cat-box')
         let divIcon=document.createElement('div');
             divIcon.classList.add('glyph-icon',subCategories[i].sub_category_icon);
         let label = document.createElement('label');
             label.setAttribute('for',subCategories[i].name);
         let radioItem = document.createElement('input');
             radioItem.setAttribute('type','radio');
             radioItem.setAttribute('name','subCategory');
             radioItem.setAttribute('id',subCategories[i].name);
             radioItem.value = subCategories[i].id;
             label.appendChild(divIcon);
             label.appendChild(spanName);
             divBox.appendChild(radioItem);
             divBox.appendChild(label);
             selectModal.appendChild(divBox);
     }
   }
   else {
         let divBox=document.createElement('div');
             divBox.classList.add('cat-box');
         let label = document.createElement('label');
             label.innerHTML = 'Others';
         let input = document.createElement('input');     
             input.setAttribute('type','text');
             input.setAttribute('name','subCategory');
             input.classList.add('form-control');
             selectModal.appendChild(divBox);
             divBox.appendChild(label);
             divBox.appendChild(input);

   }
 
}

}