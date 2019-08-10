<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Fee</title>
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
                    <a class="active" href="{{url('fees')}}">Fees</a>
                    <a href="{{url('loans')}}">Loan</a>
                    
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
        <h1>Add New Fee</h1>
        <form method="post" action="{{url('fees')}}">
            @csrf
            <p>
                <label for="ID">Fee ID:</label>
                <input type="text" name="ID">
            </p>
            <p>
                <label for="name">Fee Name:</label>
                <input type="text" name="name">
            </p>
            <p>
                <label for="description">Fee Description:</label>
                <input type="text" name="description">
            </p>
            <p>
                <label for="type">Fee Type(semester):</label>
                <select name="type">
                    <option value="Long">Long</option>
                    <option value="Short">Short</option>
                </select>
            </p>
            <p>
                <label for="amount">Fee Amount(per semester)(RM):</label>
                <input type="text" name="amount">
            </p>
            <p>
                <label for="programmeCode">Programme Code:</label>
                <select name="programmeCode">
                    @foreach($programmes as $programme)
                    <option value="{{$programme['id']}}">{{$programme['progCode']}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <button type='submit'>Add Fee</button>
            </p>
        </form>
        
        <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData);
                      foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); 
                      $loop = $__env->getLastLoop();?>
                
                <li><?php echo e($error); ?></li>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </ul>
        </div>
        <?php endif; ?>
    </body>
</html>
