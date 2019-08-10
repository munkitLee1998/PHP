<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Accommodation Details</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="../h2">Home</a>
                    <a class="active" href="{{url('accommodations')}}">Accommodation</a>
                    <a href="{{url('branches')}}">Branch</a>
                    <a href="{{url('faculties')}}">Faculties</a> 
                    <a href="{{url('fees')}}">Fees</a>
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
        <h2>Update Accommodation Details</h2>
        <form method="post" action="{{action('AccommodationController@update', $id)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <p>
                <label for="name">Accommodation Name:</label>
                <input type="text" name="name" value="{{$accommodation->accName}}">
            </p>
            <p>
                <label for="type">Accommodation Type:</label>
                <input type="text" name="type" value="{{$accommodation->type}}">
            </p>
            <p>
                <label for="roomType">Accommodation Room Type:</label>
                <input type="text" name="roomType" value="{{$accommodation->roomType}}">
            </p>
            <p>
                <label for="address">Accommodation Address:</label>
                <input type="text" name="address" value="{{$accommodation->address}}">
            </p>
            <p>
                <label for="fees">Accommodation Fees:</label>
                <input type="text" name="fees" value="{{$accommodation->accFees}}">
            </p>
            <p>
                <button type="submit" style="margin-left:38px">Update</button>
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