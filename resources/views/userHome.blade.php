@extends('layouts.app')
 @section('content')
 <div class="main-panel">
    <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-home"></i>
        </span> Welcome to your Dashboard</h3>
        <style>
              *{
                  margin: 0;
                  padding: 0;
              }
              .rate {
                  float: left;
                  height: 46px;
                  padding: 0 10px;*{
                  margin: 0;
                  padding: 0;
              }
              .rate {
                  float: left;
                  height: 46px;
                  padding: 0 10px;
              }
              .rate:not(:checked) > input {
                  position:absolute;
                  top:-9999px;
              }
              .rate:not(:checked) > label {
                  float:right;
                  width:1em;
                  overflow:hidden;
                  white-space:nowrap;
                  cursor:pointer;
                  font-size:30px;
                  color:#ccc;
              }
              .rate:not(:checked) > label:before {
                  content: '★ ';
              }
              .rate > input:checked ~ label {
                  color: #ffc700;    
              }
              .rate:not(:checked) > label:hover,
              .rate:not(:checked) > label:hover ~ label {
                  color: #deb217;  
              }
              .rate > input:checked + label:hover,
              .rate > input:checked + label:hover ~ label,
              .rate > input:checked ~ label:hover,
              .rate > input:checked ~ label:hover ~ label,
              .rate > label:hover ~ input:checked ~ label {
                  color: #c59b08;
              }
              }
              .rate:not(:checked) > input {
                  position:absolute;
                  top:-9999px;
              }
              .rate:not(:checked) > label {
                  float:right;
                  width:1em;
                  overflow:hidden;
                  white-space:nowrap;
                  cursor:pointer;
                  font-size:30px;
                  color:#ccc;
              }
              .rate:not(:checked) > label:before {
                  content: '★ ';
              }
              .rate > input:checked ~ label {
                  color: #ffc700;    
              }
              .rate:not(:checked) > label:hover,
              .rate:not(:checked) > label:hover ~ label {
                  color: #deb217;  
              }
              .rate > input:checked + label:hover,
              .rate > input:checked + label:hover ~ label,
              .rate > input:checked ~ label:hover,
              .rate > input:checked ~ label:hover ~ label,
              .rate > label:hover ~ input:checked ~ label {
                  color: #c59b08;
              }
        </style>
          <button  class="btn btn-gradient-danger" data-toggle="modal" data-target="#myModal"> Rate Us</button>
           <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ratings</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body">
          <div>
            <div class="rate" id="rate">
              <input type="radio" id="star5" name="rate" value="5" />
              <label for="star5" title="text">5 stars</label>
              <input type="radio" id="star4" name="rate" value="4" />
              <label for="star4" title="text">4 stars</label>
              <input type="radio" id="star3" name="rate" value="3" />
              <label for="star3" title="text">3 stars</label>
              <input type="radio" id="star2" name="rate" value="2" />
              <label for="star2" title="text">2 stars</label>
              <input type="radio" id="star1" name="rate" value="1" />
              <label for="star1" title="text">1 star</label> 
            </div>  
        </div>
        <div>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Feedback</span>
            </div>
            <textarea id="feedback" class="form-control" aria-label="Feedback"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="add_rate_btn" class="btn btn-gradient-danger" data-dismiss="modal">Rate Us</button>
        </div>
        
      </div>
    </div>
  </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <h4 class="font-weight-normal mb-3">Income <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$sumIncome}} EGP</h2>
            
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <h4 class="font-weight-normal mb-3">Balance<i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$sumIncome - $sumExpense}} EGP</h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <h4 class="font-weight-normal mb-3">Expenses <i class="mdi mdi-square-inc-cash mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$sumExpense}} EGP</h2>
            <h6 class="card-text">
              <a class="mdi mdi-plus-circle-outline mdi-24px float-right" href="/expenses/create" style="color:white"></a>
          </h6>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="row">
        <div class="col md-4 text-center">
        <a href="/incomes/create" class="btn btn-gradient-danger btn-lg mr-3">+ Add incomes</a>

        </div>
        <div class="col md-4 text-center">
          <a href="/savings/create" class="btn btn-gradient-info btn-lg mr-3">+ Add Savings</a>
        </div>
        <div class="col md-4 text-center">
          <a href="/expenses/create" class="btn btn-gradient-success btn-lg mg-auto">+ Add Expenses</a>
        </div>
    </div> -->

    <!--start add charts-->
    <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Expense Categories</h4>
                    <canvas id="pieChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Income categories</h4>
                    <canvas id="pieChart2" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
             
            </div>
           
           

            <!--start sub Category chart-->
            <div class="row">
              

             

            </div>
            <!--end sub Category chart-->
    <!--start add charts-->
    
    </div>
    <script>
      document.getElementById("add_rate_btn").addEventListener('click',function(){
       let rate_div= document.getElementById("rate").querySelectorAll("input");
       let feedback= document.getElementById("feedback").value;
       let rate ;
        rate_div.forEach(element => {
          if(element.checked){
            rate = element.value;
          }
          
        });
        $.ajax({
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
          type:"POST",
          data : {rate , feedback},
          dataType : "json",
          url :"{{route('dashboard.store')}}",
          success : function (response){
          }
        });
      }); 
    </script>
    <script>
          var doughnutPieDataForIncomes={};
         
              
    $(function () {
  /* ChartJS
   * -------
   * Data and config for chartjs
   */
  'use strict';
  var data = {
    labels: [ 
      @isset($chartsInfo['totalExpenses'])
         @foreach($chartsInfo['totalExpenses'] as $key=>$expense)  "{{$chartsInfo['totalExpenses'][$key]->Category_Name}}",@endforeach
         @endisset
         @isset($chartsInfo['totalCustomExpenses'])
         @if(count($chartsInfo['totalCustomExpenses'])>0)
         @foreach($chartsInfo['totalCustomExpenses'] as $key=>$customExpense) "{{$chartsInfo['totalCustomExpenses'][$key]->Custom_Category_Name}}",@endforeach
        @endif
         @endisset    
    ],
    datasets: [{
      label: 'Total amount',
      data: [ 
        @isset($chartsInfo['totalExpenses'])
         @foreach($chartsInfo['totalExpenses'] as $key=>$expense) {{$chartsInfo['totalExpenses'][$key]->total}}, @endforeach
         @endisset
         @isset($chartsInfo['totalCustomExpenses'])
         @if(count($chartsInfo['totalCustomExpenses'])>0)
         @foreach($chartsInfo['totalCustomExpenses'] as $key=>$customExpense) {{$chartsInfo['totalCustomExpenses'][$key]->custom_total}},@endforeach
         @endif
         @endisset      ],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };

  var incomesLineData = {
    labels: [ 
      @foreach ( $chartsInfo['totalIncome'] as $income ) '{{  $income->type }}' ,  @endforeach
    ],
    datasets: [{
      label: 'Total amount',
      data: [ 
        @foreach ($chartsInfo['totalIncome'] as $income) {{  $income->total }} ,  @endforeach
            ],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };

  
// start line chart for expenses

 //start expneses pie chart data
 var expensesLineData = {
    labels: [ 
      @isset($chartsInfo['totalExpenses'])
         @foreach($chartsInfo['totalExpenses'] as $key=>$expense)  "{{$chartsInfo['totalExpenses'][$key]->Category_Name}}",@endforeach
         @endisset
         @isset($chartsInfo['totalCustomExpenses'])
         @if(count($chartsInfo['totalCustomExpenses'])>0)
         @foreach($chartsInfo['totalCustomExpenses'] as $key=>$customExpense) "{{$chartsInfo['totalCustomExpenses'][$key]->Custom_Category_Name}}",@endforeach
         @endif
         @endisset    
    ],
    datasets: [{
      label: 'Total amount',
      data: [ 
        @isset($chartsInfo['totalExpenses'])
         @foreach($chartsInfo['totalExpenses'] as $key=>$expense) {{$chartsInfo['totalExpenses'][$key]->total}}, @endforeach
         @endisset
         @isset($chartsInfo['totalCustomExpenses'])
         @if(count($chartsInfo['totalCustomExpenses'])>0)
         @foreach($chartsInfo['totalCustomExpenses'] as $key=>$customExpense) {{$chartsInfo['totalCustomExpenses'][$key]->custom_total}},@endforeach
         @endif
         @endisset      ],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };
  //end expneses pie chart data
// end line chart for expenses
  

  //start data for incomes
  var dataForIcomes = {
    labels: [ @foreach ( $chartsInfo['totalIncome'] as $income ) '{{  $income->type }}' ,  @endforeach ],
    datasets: [{
      label: 'Total amount',
      data: [  @foreach ($chartsInfo['totalIncome'] as $income) {{  $income->total }} ,  @endforeach],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };
  //end data for incomes 
  
  var dataDark = {
    labels: ["2013", "2014", "2014", "2015", "2016", "2017"],
    datasets: [{
      label: 'Total amount',
      data: [10, 19, 3, 5, 2, 3],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };
  var multiLineData = {
    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    datasets: [{
      label: 'Dataset 1',
      data: [12, 19, 3, 5, 2, 3],
      borderColor: [
        '#587ce4'
      ],
      borderWidth: 2,
      fill: false
    },
    {
      label: 'Dataset 2',
      data: [5, 23, 7, 12, 42, 23],
      borderColor: [
        '#ede190'
      ],
      borderWidth: 2,
      fill: false
    },
    {
      label: 'Dataset 3',
      data: [15, 10, 21, 32, 12, 33],
      borderColor: [
        '#f44252'
      ],
      borderWidth: 2,
      fill: false
    }
    ]
  };
  var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    },
    legend: {
      display: false
    },
    elements: {
      point: {
        radius: 0
      }
    }

  };
  var optionsDark = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        },
        gridLines: {
          color: '#322f2f',
          zeroLineColor: '#322f2f'
        }
      }],
      xAxes: [{
        ticks: {
          beginAtZero: true
        },
        gridLines: {
          color: '#322f2f',
        }
      }],
    },
    legend: {
      display: false
    },
    elements: {
      point: {
        radius: 0
      }
    }

  };

  //start expneses pie chart data
  var doughnutPieData = {
    labels: [ 
      @isset($chartsInfo['totalExpenses'])
         @foreach($chartsInfo['totalExpenses'] as $key=>$expense)  "{{$chartsInfo['totalExpenses'][$key]->Category_Name}}",@endforeach
         @endisset
         @isset($chartsInfo['totalCustomExpenses'])
         @foreach($chartsInfo['totalCustomExpenses'] as $key=>$customExpense) "{{$chartsInfo['totalCustomExpenses'][$key]->Custom_Category_Name}}",@endforeach
         @endisset    
    ],
    datasets: [{
      label: 'Total amount',
      data: [ 
        @isset($chartsInfo['totalExpenses'])
         @foreach($chartsInfo['totalExpenses'] as $key=>$expense) {{$chartsInfo['totalExpenses'][$key]->total}}, @endforeach
         @endisset
         @if(count($chartsInfo['totalCustomExpenses'])>0)
         @isset($chartsInfo['totalCustomExpenses'])
         @foreach($chartsInfo['totalCustomExpenses'] as $key=>$customExpense) {{$chartsInfo['totalCustomExpenses'][$key]->custom_total}},@endforeach
         @endif
         @endisset      ],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };
  //end expneses pie chart data

    //start incomes pie chart data
    var doughnutPieDataForIncomes = {
    datasets: [{
      data: [


          @foreach ($chartsInfo['totalIncome'] as $income) {{  $income->total }} ,  @endforeach
 
      ],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [


      @foreach ( $chartsInfo['totalIncome'] as $income ) '{{  $income->type }}' ,  @endforeach
    ]
  };
  //end incomes pie chart data
  var doughnutPieOptions = doughnutPieOptionsInitializer();

   //start expenses pie chart data
  //  subExpensePieChart(doughnutPieOptions,dataAmount,labels);
  //end sub expenses pie chart data

  




  var areaData = {
    labels: ["2013", "2014", "2015", "2016", "2017"],
    datasets: [{
      label: 'Total amount',
      data: [12, 19, 3, 5, 2, 3],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: true, // 3: no fill
    }]
  };

  var areaDataDark = {
    labels: ["2013", "2014", "2015", "2016", "2017"],
    datasets: [{
      label: 'Total amount',
      data: [12, 19, 3, 5, 2, 3],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: true, // 3: no fill
    }]
  };

  var areaOptions = {
    plugins: {
      filler: {
        propagate: true
      }
    }
  }

  var areaOptionsDark = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        },
        gridLines: {
          color: '#322f2f',
          zeroLineColor: '#322f2f'
        }
      }],
      xAxes: [{
        ticks: {
          beginAtZero: true
        },
        gridLines: {
          color: '#322f2f',
        }
      }],
    },
    plugins: {
      filler: {
        propagate: true
      }
    }
  }

  var multiAreaData = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: 'Facebook',
      data: [8, 11, 13, 15, 12, 13, 16, 15, 13, 19, 11, 14],
      borderColor: ['rgba(255, 99, 132, 0.5)'],
      backgroundColor: ['rgba(255, 99, 132, 0.5)'],
      borderWidth: 1,
      fill: true
    },
    {
      label: 'Twitter',
      data: [7, 17, 12, 16, 14, 18, 16, 12, 15, 11, 13, 9],
      borderColor: ['rgba(54, 162, 235, 0.5)'],
      backgroundColor: ['rgba(54, 162, 235, 0.5)'],
      borderWidth: 1,
      fill: true
    },
    {
      label: 'Linkedin',
      data: [6, 14, 16, 20, 12, 18, 15, 12, 17, 19, 15, 11],
      borderColor: ['rgba(255, 206, 86, 0.5)'],
      backgroundColor: ['rgba(255, 206, 86, 0.5)'],
      borderWidth: 1,
      fill: true
    }
    ]
  };

  var multiAreaOptions = {
    plugins: {
      filler: {
        propagate: true
      }
    },
    elements: {
      point: {
        radius: 0
      }
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  var scatterChartData = {
    datasets: [{
      label: 'First Dataset',
      data: [{
        x: -10,
        y: 0
      },
      {
        x: 0,
        y: 3
      },
      {
        x: -25,
        y: 5
      },
      {
        x: 40,
        y: 5
      }
      ],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)'
      ],
      borderWidth: 1
    },
    {
      label: 'Second Dataset',
      data: [{
        x: 10,
        y: 5
      },
      {
        x: 20,
        y: -30
      },
      {
        x: -25,
        y: 15
      },
      {
        x: -10,
        y: 5
      }
      ],
      backgroundColor: [
        'rgba(54, 162, 235, 0.2)',
      ],
      borderColor: [
        'rgba(54, 162, 235, 1)',
      ],
      borderWidth: 1
    }
    ]
  }

  var scatterChartDataDark = {
    datasets: [{
      label: 'First Dataset',
      data: [{
        x: -10,
        y: 0
      },
      {
        x: 0,
        y: 3
      },
      {
        x: -25,
        y: 5
      },
      {
        x: 40,
        y: 5
      }
      ],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)'
      ],
      borderWidth: 1
    },
    {
      label: 'Second Dataset',
      data: [{
        x: 10,
        y: 5
      },
      {
        x: 20,
        y: -30
      },
      {
        x: -25,
        y: 15
      },
      {
        x: -10,
        y: 5
      }
      ],
      backgroundColor: [
        'rgba(54, 162, 235, 0.2)',
      ],
      borderColor: [
        'rgba(54, 162, 235, 1)',
      ],
      borderWidth: 1
    }
    ]
  }

  var scatterChartOptions = {
    scales: {
      xAxes: [{
        type: 'linear',
        position: 'bottom'
      }]
    }
  }

  var scatterChartOptionsDark = {
    scales: {
      xAxes: [{
        type: 'linear',
        position: 'bottom',
        gridLines: {
          color: '#322f2f',
          zeroLineColor: '#322f2f'
        }
      }],
      yAxes: [{
        gridLines: {
          color: '#322f2f',
          zeroLineColor: '#322f2f'
        }
      }]
    }
  }
  // Get context with jQuery - using jQuery's .get() method.
  //bar chart for expenses
  if ($("#barChart").length) {
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: data,
      options: options
    });
  }
 //end bar chart for expenses  

 //start bar chart for incomes 
  if ($("#barChart2").length) {
    var barChartCanvas = $("#barChart2").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: dataForIcomes,
      options: options
    });
  }
  //end bar chart for incomes

  if ($("#barChartDark").length) {
    var barChartCanvasDark = $("#barChartDark").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChartDark = new Chart(barChartCanvasDark, {
      type: 'bar',
      data: dataDark,
      options: optionsDark
    });
  }

  if ($("#lineChart").length) {
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: incomesLineData,
      options: options
    });
  }

  if ($("#lineChart2").length) {
    var lineChartCanvas = $("#lineChart2").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: expensesLineData,
      options: options
    });
  }

  if ($("#lineChartDark").length) {
    var lineChartCanvasDark = $("#lineChartDark").get(0).getContext("2d");
    var lineChartDark = new Chart(lineChartCanvasDark, {
      type: 'line',
      data: dataDark,
      options: optionsDark
    });
  }

  if ($("#linechart-multi").length) {
    var multiLineCanvas = $("#linechart-multi").get(0).getContext("2d");
    var lineChart = new Chart(multiLineCanvas, {
      type: 'line',
      data: multiLineData,
      options: options
    });
  }

  if ($("#areachart-multi").length) {
    var multiAreaCanvas = $("#areachart-multi").get(0).getContext("2d");
    var multiAreaChart = new Chart(multiAreaCanvas, {
      type: 'line',
      data: multiAreaData,
      options: multiAreaOptions
    });
  }

  if ($("#doughnutChart").length) {
    var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }

  //start expenses chart
  if ($("#pieChart").length) {
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }
  //end expenses chart

  //start income chart
  if ($("#pieChart2").length) {
    var pieChartCanvas = $("#pieChart2").get(0).getContext("2d");
    var pieChart2 = new Chart(pieChartCanvas, {
      type: 'pie',
      data: doughnutPieDataForIncomes,
      options: doughnutPieOptions
    });
  }
  //end income chart

    //start sub expenses chart

  //end expenses chart

  

  if ($("#areaChart").length) {
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    var areaChart = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaData,
      options: areaOptions
    });
  }

  if ($("#areaChartDark").length) {
    var areaChartCanvas = $("#areaChartDark").get(0).getContext("2d");
    var areaChart = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaDataDark,
      options: areaOptionsDark
    });
  }

  if ($("#scatterChart").length) {
    var scatterChartCanvas = $("#scatterChart").get(0).getContext("2d");
    var scatterChart = new Chart(scatterChartCanvas, {
      type: 'scatter',
      data: scatterChartData,
      options: scatterChartOptions
    });
  }

  if ($("#scatterChartDark").length) {
    var scatterChartCanvas = $("#scatterChartDark").get(0).getContext("2d");
    var scatterChart = new Chart(scatterChartCanvas, {
      type: 'scatter',
      data: scatterChartDataDark,
      options: scatterChartOptionsDark
    });
  }

  if ($("#browserTrafficChart").length) {
    var doughnutChartCanvas = $("#browserTrafficChart").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: browserTrafficData,
      options: doughnutPieOptions
    });
  }
});
function subExpensePieChart(doughnutPieOptions,data,labels){

     doughnutPieDataForIncomes = {
    datasets: [{
      data: data,
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)', 
        'rgba(255, 9, 12, 0.5)',
        'rgba(54, 12, 235, 0.5)',
        'rgba(255, 106, 86, 0.5)',
        'rgba(75, 121, 192, 0.5)',
        'rgba(153, 131, 255, 0.5)',
        
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(225,99,132,1)',
        'rgba(124, 162, 235, 1)',
        'rgba(215, 206, 86, 1)',
        'rgba(35, 192, 192, 1)',
        'rgba(143, 102, 255, 1)',
       

      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: labels
  };
   if ($("#pieChart3").length ) {
    
     pieChartCanvas3 = $("#pieChart3").get(0).getContext("2d");
    //  pieChartCanvas3.clearRect(0, 0, canvas.width, canvas.height);
        
     pieChart3 = new Chart(pieChartCanvas3, {
      type: 'pie',
      data: doughnutPieDataForIncomes,
      options: doughnutPieOptions
    });

  }else{


  }

}

function doughnutPieOptionsInitializer(){
  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };
  return doughnutPieOptions;
}
    </script>
  @endsection
