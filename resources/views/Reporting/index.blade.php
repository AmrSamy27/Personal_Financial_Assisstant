@extends('layouts.app')
@section('content')
<div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-square-inc-cash menu-icon"></i>
        </span> Reportings</h3>
</div>

<form action="{{route('reports.filter')}}" method="post">
@csrf
<div class="my-5">
<label>Filter by date : </label>   
<input type="date" name="reportDate" id="reportDate" value="{{$currentDate}}" >
<button type = "submit" class="btn btn-dark">Filter</button>
</div>
</form>

<div class="row">
<div class="col-lg-5 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Your incomes</h4>
          
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Income Category</th>
                        <th>Income amount</th>
                        <th>Date added</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($incomes)
                @foreach ($incomes as $income) 
                    <tr>
                        <td>{{$income->type}}</td>
                        <td>{{$income->pivot->amount}}</td>
                        <td>{{$income->pivot->Date}}</td>
                        @if ($income->pivot->Date < $currentDate)
                        <td>
                            <label class="badge badge-success">current</label>
                        </td>
                        @else
                        <td>
                            <label class="badge badge-danger">Pending</label>
                        </td>
                        @endif
                    </tr>
                @endforeach
                @endisset

                @isset($filterIncomes)
                @foreach ($filterIncomes as $income) 
                    <tr>
                        <td>{{$income->income->type}}</td>
                        <td>{{$income->amount}}</td>
                        <td>{{$income->Date}}</td>
                        @if ($income->Date < $currentDate)
                        <td>
                            <label class="badge badge-success">current</label>
                        </td>
                        @else
                        <td>
                            <label class="badge badge-danger">Pending</label>
                        </td>
                        @endif
                    </tr>
                @endforeach
                @endisset
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-lg-7 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Your Expenses</h4>
          
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Expense Category</th>
                        <th>Expense sub Category</th>
                        <th>Expense amount</th>
                        <th>Date added</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @isset($expenses)
                @foreach ($expenses as $expense) 
                    <tr>
                    <td>{{$expense->amount}}</td>
                <td>{{$expense->amount}}</td>
                <td>{{$expense->amount}}</td>
                <td>{{$expense->date}}</td>
                @if ($expense->date < $currentDate)
                        <td>
                            <label class="badge badge-success">current</label>
                        </td>
                        @else
                        <td>
                            <label class="badge badge-danger">Pending</label>
                        </td>
                        @endif
                    </tr>
                @endforeach
                @endisset

                @isset($filterexpenses)
                @foreach ($filterexpenses as $expense) 
                    <tr>
                    <td>{{$expense->amount}}</td>
                <td>{{$expense->amount}}</td>
                <td>{{$expense->amount}}</td>
                <td>{{$expense->date}}</td>
                
                @if ($expense->date < $currentDate)
                        <td>
                            <label class="badge badge-success">current</label>
                        </td>
                        @else
                        <td>
                            <label class="badge badge-danger">Pending</label>
                        </td>
                        @endif
                    </tr>
                @endforeach
                @endisset
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<div class="row">
<div class="col-lg-5 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Current budget goals</h4>
          
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Target name</th>
                        <th>Target amount</th>
                        <th>Current savings</th>
                        <th>Current Progress</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($targets as $target) 
                    <tr>
                        <td>{{$target->target_name}}</td>
                        <td>{{$target->target_amount}}</td>
                        <td>{{$target->savings}}</td>
                        <td>
            @if($target->progress > 100||$target->progress ==100)
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" >100%</div>
                
              </div>
              
            @else 
            <div class="progress">
              <div class="progress-bar bg-warning" role="progressbar" style="width: {{$target->progress}}%" >{{$target->progress}}%</div>
              
            </div>
            @endif
            </td>
                    </tr>
                @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-lg-7 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Your Created events</h4>
          
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Event name</th>
                        <th>total amount</th>
                        <th>date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($events as $event) 
                    <tr>
                    <td>{{$event->name}}</td>
                <td>{{$event->customSubCategories->sum('amount')}}</td>
                <td>{{$event->date}}</td>
                @if ($event->date <= $currentDate)
                        <td>
                            <label class="badge badge-success">current</label>
                        </td>
                        @else
                        <td>
                            <label class="badge badge-danger">Pending</label>
                        </td>
                        @endif
                    </tr>
                @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

@endsection