<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Faculty Admin</title>
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
                    <a href="{{url('loans')}}">Loan</a>
                    <a href="{{url('maS')}}">Staff</a>
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
        <h1>Welcome, Faculty Admin</h1>
        <?php
        // put your code here
        ?>
    </body>
</html>
