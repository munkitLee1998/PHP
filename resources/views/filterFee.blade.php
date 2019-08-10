<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
 <head>
        <meta charset="UTF-8">
        <title>View Fee</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div >
                <form action="/searchFee" method="get">
                    <div >
                       
                        <label for="type">Fee Type(semester):</label>
                        <select name="type">
                        <option value="Long">Long</option>
                        <option value="Short">Short</option>
                        </select>
                        
                        <label for="programmeCode">Programme Code:</label>
                        <select name="programmeCode">
                            @foreach($programmes as $programme)
                            <option value="{{$programme['id']}}">{{$programme['progCode']}}</option>
                            @endforeach
                        </select>
                        
                         <input type="search" name="search" class="form-control"/>
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>

                    </div>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fee ID</th>
                        <th>Fee Name</th>
                        <th>Fee Description</th>
                        <th>Fee Type(semester)</th>
                        <th>Amount(per semester)(RM)</th>
                        <th>Programme Code</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($fees as $fee)
                    <tr>
                        <td>{{$fee['feeID']}}</td>
                        <td>{{$fee['feeName']}}</td>
                        <td>{{$fee['desc']}}</td>
                        <td>{{$fee['feeType']}}</td>
                        <td>{{$fee['amount']}}</td>
                        <td>{{$fee->programme->progCode}}</td>
                        
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
