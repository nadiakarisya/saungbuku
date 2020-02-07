@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Tooltip</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Tooltip    </div>

    <div class="panel-body">
                

        <form action="{{ url('/tooltips') }}" method="POST" class="form-horizontal">


        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('administrator/tooltips') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection