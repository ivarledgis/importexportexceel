@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
               
                <div class="card-body">
                    
                    @if( \Session::has('error'))
                        <div class="alert alert-danger">
                         {{ \Session::get('error')}}
                        </div>
                    @endif
                   
                    Namaste {{ $user->name }} !!
                    
                    @if(auth()->user()->role == 'teacher' || auth()->user()->role == 'admin')
                    <div class="row ml-1">
                       <p><i>Click to see the list of students.</i>

                        <br><a href="{{ route('view-studentlist') }}">Student List</a> </p>   
                       
                    </div> 
                    @endif              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
