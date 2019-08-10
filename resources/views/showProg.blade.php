<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Display Program details</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
          <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                   <a href="/">Home</a>
                   <a href="/displayCourse">Search Course</a> 
                   <a class="active" href="/search">Search Programme</a>
                   <a href="login">Login</a>
               </div>
            </nav>
        </header>
        
        <!--        <br />-->
        <!--        @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />    
                @endif-->

        <div class="container">
            <form action="{{action('ProgrammeController@showProgram', $id)}}" method="get"/>
            @csrf
            <h2>Display Programme of Study</h2><br />
            
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Programme Code: </td>
                        <td>{{$programmes['progCode']}}</td>
                    </tr>
                    <tr>
                        <td>Programme Name: </td>
                        <td>{{$programmes['progName']}}</td>
                    </tr>
                    <tr>
                        <td>Programme Description: </td>
                        <td>{{$programmes['desc']}}</td>
                    </tr>
                    <tr>
                        <td>Programme Duration: </td>
                        <td>{{$programmes['duration']}}</td>
                    </tr>
                    <tr>
                        <td>Level of Study: </td>
                        <td>{{$programmes['levelOfStudy']}}</td>
                    </tr>
                    
                </tbody>
            </table><br />
            <h2>Programme Structure of {{$programmes['progCode']}}</h2>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Programme Structure Code: </td>
                        <td>{{$progStructs['structCode']}}</td>
                    </tr>
                    <tr>
                        <td>Programme Certification: </td>
                        <td>{{$progStructs['ProCert']}}</td>
                    </tr>
                    <tr>
                        <td>Programme Certification Description: </td>
                        <td>{{$progStructs['certDesc']}}</td>
                    </tr>
                </tbody>
            </table><br />
            <h2>Meric of {{$programmes['progCode']}}</h2>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Exam Qualify: </td>
                        <td>{{$mers['examQualify']}}</td>
                    </tr>
                    <tr>
                        <td>Meric Description: </td>
                        <td>{{$mers['merDesc']}}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{url('/search')}}" class="btn btn-secondary">Back</a>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
