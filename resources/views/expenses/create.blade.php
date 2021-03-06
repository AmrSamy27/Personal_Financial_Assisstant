@extends('layouts.app')
@section('content')
<div class="main-panel">
<div class="content-wrapper">

<div class="page-header">
    <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
    <i class="mdi mdi-square-inc-cash menu-icon"></i>
    </span> Expenses manager</h3>
</div>


<div class="col-12">
    <div class="card">
      <div class="card-header">
      <div class="text-center p-1">
            <strong><span> Add new expense </span></strong>
          </div>
      </div>

      <div class="card-body">
      <h4 >Select your expenese type</h4>

         <div class="flat_icons row" id="selectCategory">                    
                              <div class="cat-box">
                  
                                <input type="radio" name="category" id="dish" 
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Food")
                                 {{"checked"}}
                                @endif 
                                @endisset 
                                value="1"  data-toggle="modal" data-target="#myModal">
                                <label for="dish"><div class="glyph-icon flaticon-dish"></div><span>Food</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="champagne" value="2" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Drinks")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="champagne"><div class="glyph-icon flaticon-champagne"></div><span>Drinks</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="bill" value="3" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Bills")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="bill"><div class="glyph-icon flaticon-bill"></div><span>Bills</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="bus" value="4" data-toggle="modal" data-target="#myModal" 
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Transportation")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="bus"><div class="glyph-icon flaticon-bus"></div><span>Transportation</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="house" value="5" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Home")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="house"><div class="glyph-icon flaticon-house"></div><span>Home</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="car" value="6" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Car")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="car"><div class="glyph-icon flaticon-car"></div><span>Car<span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="playstation" value="7" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Entertainment")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="playstation"><div class="glyph-icon flaticon-playstation"></div><span>Entertainment</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="fashion" value="8" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Clothing")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="fashion"><div class="glyph-icon flaticon-fashion"></div><span>Clothing</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="shield" value="9" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Insurance")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="shield"><div class="glyph-icon flaticon-shield"></div><span>Insurance</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="stethoscope" value="10" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Health")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="stethoscope"><div class="glyph-icon flaticon-stethoscope"></div><span>Health</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="dumbbell" value="11" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Sport")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="dumbbell"><div class="glyph-icon flaticon-dumbbell"></div><span>Sport</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="baby" value="12" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Baby")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="baby"><div class="glyph-icon flaticon-baby"></div><span>Baby</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="icon_13" value="13" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Pet")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="icon_13"><div class="glyph-icon flaticon-happy"></div><span>Pet</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="salon" value="14" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Beauty")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="salon"><div class="glyph-icon flaticon-salon"></div><span>Beauty</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="computer" value="15" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Electronics")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="computer"><div class="glyph-icon flaticon-computer"></div><span>Electronics</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="gift" value="16" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Gifts")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="gift"><div class="glyph-icon flaticon-gift"></div><span>Gifts</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="airplane" value="17" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Travel")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="airplane"><div class="glyph-icon flaticon-airplane"></div><span>Travel</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="book" value="18" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Education")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="book"><div class="glyph-icon flaticon-book"></div><span>Education</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="book-1" value="19" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Books")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="book-1"><div class="glyph-icon flaticon-book-1"></div><span>Books</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="work" value="20" data-toggle="modal" data-target="#myModal"
                                @isset($subExpenseUser) 
                                @if($subExpenseUser->subCategory->category->name == "Office")
                                 {{"checked"}}
                                @endif 
                                @endisset
                                >
                                <label for="work"><div class="glyph-icon flaticon-work"></div><span>Office</span></label>
                              </div>
                  
                              <div class="cat-box">
                                <input type="radio" name="category" id="add" value="21" data-toggle="modal" data-target="#myModal">
                                <label for="add"><div class="glyph-icon flaticon-add"></div><span>Others</span></label>
                              </div>
                     
          </div>
                            <!-- category icons -->

        @isset($subExpenseUser)
        <form class="form-sample" method="POST" action="{{route('expenses.edit',['id'=>$subExpenseUser->id])}}">
        @else
        <form class="form-sample" method="POST" action="{{route('expenses.store')}}">
        @endisset
            @csrf
            @isset($subExpenseUser)
            @method('put')
            @endisset
            <div class="row mt-5">
            <div class="col-md-5 mx-auto">
              
              <div class="form-group row fluid">
                <strong><label>Amount</label></strong>
                <input type="number" step="0.01" name="amount" class="form-control"   
                  @isset($subExpenseUser)
                  value="{{ $amount= $subExpenseUser?$subExpenseUser->amount:''}}" 
                  @endisset
                  />              </div>
            </div>  
              @isset($subExpenseUser)
           
            @else
            <div class="col-md-6 mx-auto">
              <div class="form-group row fluid">
              <strong><label>Date</label></strong>
              <input type="date" name="date" class="form-control" placeholder="dd/mm/yyyy"/>                
              </div>
            </div>
          @endisset
            <div class="col-md-3 pl-0 pr-0 mx-auto">
            <button type="submit" class="btn-block btn btn-gradient-success btn-lg">Submit</button>   
            </div>
            
          </div>
          
        

            <!--pop up-->
              <!-- The Modal -->
              <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Select Sub Category</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                      <!--sub category icons -->
                      <div class="flat_icons row" id="subCategoriesIcons">  
                        @isset($subExpenseUser)
                        @foreach($subExpenseUser->subCategory->category->subCategories as $subCategory)
                          
                        <div class="cat-box">
                          <input type="radio" name="subCategory" id="{{$subCategory->name}}" @if($subExpenseUser->sub_category_id == $subCategory->id){{"checked"}}@endif value="{{$subCategory->id}}">
                          <label for="{{$subCategory->name}}"><div class="glyph-icon {{$subCategory->sub_category_icon}}"></div><span>{{$subCategory->name}}</span></label>
                        </div>
                       @endforeach
                        @endisset
                        
                        </div>
                  
                      </div>
                      <!--sub category icons -->
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    
                  </div>
                </div>
              </div>

            <!--pop up-->      

         
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
  <script>
       let url = `{{route('subCategory.ajax',['categoryId'=>':categoryId'])}}`;

  </script>
  <script src="{{asset('js/expenses/create.js')}}"></script>
 @endsection