@extends('layouts.app')
 @section('content')

<div class="main-panel">
    <div class="content-wrapper">
      
 <div class="col-12">
 @if ($errors->any())
 <div class="alert alert-danger">
     <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
@endif 
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add your Incomes</h4>
        <form class="form-sample" method="POST" action="/incomes">
            @csrf
            <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Select Your Income Type</h4>
                  <div class="template-demo">
                    <div class="flat_icons row">  
              
                      <div class="cat-box">
                        <input type="radio" name="type" id="icon_27" value="1"  />
                        <label for="icon_27"><div class="glyph-icon flaticon-salary"></div>
                        <span>Salary</span></label>
                      </div>
                    
                      <div class="cat-box">
                        <input type="radio" name="type" id="icon_28" value="2"  />
                        <label for="icon_28"><div class="glyph-icon flaticon-quality"></div>
                          <span>Awards</span></label>
                      </div>

                      <div class="cat-box">
                        <input type="radio" name="type" id="icon_29" value="3"  />
                        <label for="icon_29"><div class="glyph-icon flaticon-scholarship"></div>
                          <span>Grants</span></label>
                      </div>

                      <div class="cat-box">
                        <input type="radio" name="type" id="icon_30" value="4"  />
                        <label for="icon_30"><div class="glyph-icon flaticon-rental"></div>
                          <span>Rental</span></label>
                      </div>

                      <div class="cat-box">
                        <input type="radio" name="type" id="icon_31" value="5"  />
                        <label for="icon_31"><div class="glyph-icon flaticon-refund"></div>
                          <span>Refunds</span></label>
                      </div>

                      <div class="cat-box">
                        <input type="radio" name="type" id="icon_32" value="6"  />
                        <label for="icon_32"><div class="glyph-icon flaticon-investment"></div>
                        <span>Investments</span></label>
                      </div>

                      <div class="cat-box">
                        <input type="radio" name="type" id="icon_33" value="7"  />
                        <label for="icon_33"><div class="glyph-icon flaticon-coupon"></div>
                          <span>Sale</span></label>
                      </div>

                      <div class="cat-box">
                        <input type="radio" name="type" id="icon_34" value="8"  />
                        <label for="icon_34"><div class="glyph-icon flaticon-add"></div>
                          <span>Others</span></label>
                      </div>
                     
                    </div>                         
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              
              <div class="form-group row fluid">
                <label>Amount : </label>
                
                  <input type="number" step="0.01" name="amount" class="form-control" />
               
              </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
              <div class="form-group row fluid">
                <label>Date : </label>
                
                  <input type="date" name="date" class="form-control" placeholder="dd/mm/yyyy" />
                
              </div>
            </div>

            <div class="col-md-5 pl-0 pr-0">
            <button type="submit" class="btn-block btn btn-gradient-danger btn-lg ">+ Add Income</button>
                
            </div>
            
          </div>
          
          
        </div> 
      </form>
    </div>
  </div>
  </div>
  </div>
 @endsection