<!DOCTYPE html>
<html lang="en">

@include('food_home.layouts.head')
<link rel="stylesheet" href="{{('login/style.css')}}">
<body>
    @include('food_home.layouts.header')
    <div class ="row" style="padding-top: 20px;">
        <div class="col-md-6 mx-auto p-0">
            <div class="card">
                <div class="login-box">
                    <div class="login-snip">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                            class="tab">Login</label>
                        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2"
                            class="tab">Sign Up</label>
                        <div class="login-space">
                            <form action="{{route('user_login')}}" method="post">
                                @csrf
                                <div class="login">
                                    <div class="group">
                                        <label for="user" class="label">Email</label>
                                        <input id="email" type="email" class="input" name="email"
                                            placeholder="example@domain.com" required>
                                    </div>
                                    <div class="group">
                                        <label for="pass" class="label">Password</label>
                                        <input id="pass" type="password" class="input" data-type="password" name="password"
                                            placeholder="Enter your password" required>
                                    </div>
                                    <div class="group">
                                        <input id="check" type="checkbox" class="check" checked>
                                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                                    </div>
                                    <div class="group">
                                        <input type="submit" class="button" value="Sign In">
                                    </div>
                                    <div class="hr"></div>
                                    <div class="foot">
                                        <a href="#">Forgot Password?</a>
                                    </div>
                                </div>
                            </form>

                            <form action="{{route('user_registration')}}" method="post">
                                @csrf
                                <div class="sign-up-form">
                                    <div class="group">
                                        <label for="user" class="label">Username</label>
                                        <input id="user" type="text" class="input" name="name"
                                            placeholder="Create your Username">
                                    </div>
                                    <div class="group">
                                        <label for="pass" class="label">Password</label>
                                        <input id="pass" type="password" class="input" data-type="password" name="password"
                                            placeholder="Create your password">
                                    </div>
                                    <div class="group">
                                        <label for="pass" class="label">Repeat Password</label>
                                        <input id="pass" type="password" class="input" data-type="password" name="conf_password"
                                            placeholder="Repeat your password">
                                    </div>
                                    <div class="group">
                                        <label for="pass" class="label">Email Address</label>
                                        <input id="pass" type="text" class="input" name="email"
                                            placeholder="Enter your email address">
                                    </div>
                                    <div class="group">
                                        <input type="submit" class="button" value="Sign Up">
                                    </div>
                                    <div class="hr"></div>
                                    <div class="foot">
                                        <label for="tab-1">Already Member?</label>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('food_home.layouts.footer')


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    @include('food_home.layouts.scripts')

</body>

</html>
