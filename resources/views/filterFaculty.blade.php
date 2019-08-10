<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
        <meta charset="UTF-8">
        <title>View Faculty</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            <div class="col-md-4">
                <form action="/searchFA" method="get">
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
                        <th>Faculty Code</th>
                        <th>Faculty Name</th>
                        <th>Faculty Description</th>
                    
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($faculties as $faculty)
                    <tr>
                        <td>{{$faculty['facultyCode']}}</td>
                        <td>{{$faculty['facultyName']}}</td>
                        <td>{{$faculty['facultyDesc']}}</td>
             
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
