<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Register Your Self In Our Recruitment Portal For Your Dream Job | AU Telecom">
        <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Register Your Self In Our Recruitment Portal For Your Dream Job | AU Telecom">
        <meta name="robots" content="noindex, nofollow"> 
        <title>HRMS</title>
    <!-- <link rel="stylesheet" href="style.scss"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('public/assets/img/favicon.png') !!}" />
    <link rel="stylesheet" href="{!! asset('public/assets/css/logincss/style.css') !!}" />
</head>
<style>
    video {
        object-fit: cover;
        width: 100vw;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
    }
</style>

<body>
    <section>
        <!-- <video width="100%" autoplay muted loop>
            <source src="" type="video/mp4" />
            <source src="public/kw_assets/1.ogg" type="video/ogg" />
            Your browser does not support the video tag.
        </video> -->


        <div class="form-structor">
            <div>
                <img src="{!! asset('public/images/BizzWorldLogo-05.png') !!}" alt="">
            </div>
                @if(session('message'))
                    <div class="account-title">{{session('message')}}</div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <div>   <p><li>{{ $error }}</li></p> </div>
                        @endforeach
                    </ul>
                </div>
                @endif
            <form action="{{ URL::to('/saveJobee')}}" id="frmimage" method="post">
            {{ csrf_field() }}
            <div class="signup">
                <h2 class="form-title" id="signup"><span>or</span>Register</h2>
                <div class="form-holder">
                    <input type="email" class="input" name="email" placeholder="Email" />
                    <input type="password" class="input" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                    <input type="password" class="input" placeholder="Confirm Password" name="password_confirmation" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                </div>
                <button class="submit-btn sign-btn">Register</button>
            </div>
            </form>
            <form method="Post" action="{{url('/candidatelogin')}}">
            {{ csrf_field() }}
            <div class="login slide-up">
                <div class="center">
                    <h2 class="form-title" id="login"><span>or</span>Login</h2>
                    <div class="form-holder">
                        <input type="email" class="input" name="username" placeholder="Email" required />
                        <input type="password" class="input1" name="pass" placeholder="Password" required />
                    </div>
                    <button type="submit" class="submit-btn">Login</button>
                </div>
            </div>
            </form>
        </div>
    </section>
</body>
<script>
    console.clear();

    const loginBtn = document.getElementById('login');
    const signupBtn = document.getElementById('signup');

    loginBtn.addEventListener('click', (e) => {
        let parent = e.target.parentNode.parentNode;
        Array.from(e.target.parentNode.parentNode.classList).find((element) => {
            if (element !== "slide-up") {
                parent.classList.add('slide-up')
            } else {
                signupBtn.parentNode.classList.add('slide-up')
                parent.classList.remove('slide-up')
            }
        });
    });

    signupBtn.addEventListener('click', (e) => {
        let parent = e.target.parentNode;
        Array.from(e.target.parentNode.classList).find((element) => {
            if (element !== "slide-up") {
                parent.classList.add('slide-up')
            } else {
                loginBtn.parentNode.parentNode.classList.add('slide-up')
                parent.classList.remove('slide-up')
            }
        });
    });
</script>

</html>