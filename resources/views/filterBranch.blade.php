<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title></title>
    </head>
    <body>
       <h1>View Branches</h1>
       <div class="col-md-4">
                <form action="/searchBr" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control"/>
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                        
                    </div>
                </form>
            </div>
            <br />
            <table class="table table-striped">
                
                <thead>
                    <tr>
                        <th>Branch Name</th>
                        <th>Branch Email</th>
                        <th>Branch Contact</th>
                        <th>Existing Faculty</th>
 
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($branches as $branch)
                    <tr>
                        <td>{{$branch['branchName']}}</td>
                        <td>{{$branch['branchEmail']}}</td>
                        <td>{{$branch['branchContact']}}</td>
                        <td>
                            @foreach($branch->faculty as $faculties)
                            {{$faculties->facultyCode}}<br />
                            @endforeach
                        </td>
                        

                    </tr>
                    @endforeach
                </tbody>
            </table>
    </body>
</html>
