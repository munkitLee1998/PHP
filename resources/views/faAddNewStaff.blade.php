<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Staff</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}"
    </head>
    <body>
       <header>
            <nav>
                <div class="topnav">
                    <a href="../h2">Home</a>
                    <a class="active" href="{{url('faS')}}">Staff</a>
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
        <h2>Add New Staff</h2><br/>
        <form method="post" action="{{url('faS')}}">
            @csrf
            <p>
                <label for="staffName">Staff Name : </label>
                <input type="text" name="staffName">
            </p> 
            <p>
                <label for="staffType">Staff Type : </label>
                <select name="staffType">
                    
                    <option value="department staff">Department Staff</option>
                    <option value="faculty staff">Faculty Staff</option>
                </select>
            </p>
            <p>
                <label for="email">Staff Email : </label>
                <input type="text" name="email">
                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
            </p>
            <p>
                <label for="password">Password : </label>
                <input type="password" name="password">
                 @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
            </p>
            <p>
                <label for="password_confirmation">Password Confirmation :</label>
                <input type="password" name="password_confirmation">
                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
            </p>
           
            <p>
                <button type="submit">Submit</button>
            </p>
        </form>
        <div>
       <?php if($errors->any()): ?>
           
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
