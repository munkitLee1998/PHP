<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Loan Details</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="../h2">Home</a>
                    <a href="{{url('accommodations')}}">Accommodation</a>
                    <a href="{{url('branches')}}">Branch</a>
                    <a href="{{url('faculties')}}">Faculties</a> 
                    <a href="{{url('fees')}}">Fees</a>
                    <a class="active" href="{{url('loans')}}">Loan</a>
                    
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </nav>
        </header>
        <h1>Update Loan Details</h1>
        <form method="post" action="{{action('LoanController@update', $id)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <p>
                <label for="ID">Loan ID:</label>
                <input type="text" name="ID" value="{{$loan->loanID}}">
            </p>
            <p>
                <label for="owner">Loan Owner:</label>
                <input type="text" name="owner" value="{{$loan->loanOwner}}">
            </p>
            <p>
                <label for="type">Loan Type:</label>
                <select name="type">
                    <option value="Full">Full</option>
                    <option value="Partial">Partial</option>
                </select>
            </p>
            <p>
                <label for="ownerType">Loan Owner Type:</label>
                <select name="ownerType">
                    <option value="Individual">Individual</option>
                    <option value="Government">Government</option>
                    <option value="College">College</option>
                </select>
            </p>
            <p>
                <label for="amount">Loan Amount (per programme):</label>
                <input type="text" name="amount" value="{{$loan->amount}}">
            </p>
            <p>
                <label for="programmeCode">Programme Code:</label>
                <select name="programmeCode[]" multiple="multiple">
                    @foreach($programmes as $programme)
                    <option value="{{$programme['id']}}">{{$programme['progCode']}}</option>
                    @endforeach
                </select>
            </p> 
            
            <p>
                <button type="submit" style="margin-left:38px">Update</button>
            </p>
    </body>
</html>
