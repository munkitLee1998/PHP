<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
        <meta charset="UTF-8">
        <title>View Loan</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
           
        </header>
        <div class="container">

            <h1>View Loans</h1>
            <div >
               
                <form action="/searchLo" method="get">
                   
                        
                 <label for="type">Loan Type:</label>
                    <select name="type">
                        <option value="Full">Full</option>
                        <option value="Partial">Partial</option>
                    </select> <label for="type">Type:</label>
                        
             <label for="ownerType">Loan Owner Type:</label>
                    <select name="ownerType">
                        <option value="Individual">Individual</option>
                        <option value="Government">Government</option>
                        <option value="College">College</option>
                    </select>
             
                        <input type="search" name="search" class="form-control"/>
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>

                    
                </form>
                 
            </div>
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Loan ID</th>
                        <th>Loan Owner</th>
                        <th>Loan Type</th>
                        <th>Loan Owner Type</th>
                        <th>Loan Amount</th>
                        <th>Programme Code</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($loans as $loan)
                    
                    <tr>
                        <td>{{$loan['loanID']}}</td>
                        <td>{{$loan['loanOwner']}}</td>
                        <td>{{$loan['loanType']}}</td>
                        <td>{{$loan['loanOwnerType']}}</td>
                        <td>{{$loan['amount']}}</td>
                        <td>
                        @foreach($loan->programme as $programmes)
                        {{$programmes->progCode}}<br />
                        @endforeach
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
