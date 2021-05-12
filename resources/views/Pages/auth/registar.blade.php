@extends('includes.app')

@section('content')






<section id="fullSection">

    <section class="login-register-otp pt-5 pb-5">

        <div class="newloginform">



        <form action="" method="get" id="loginForm">
            <h1>Register Now</h1>


            <div class="by-two">
                <div class="item-by-two">
                    <input type="text" placeholder="First Name">
                </div>

                <div class="item-by-two">
                    <input type="text" placeholder="Last Name">
                </div>
            </div>


            <div class="by-two">
                <div class="item-by-two">
                    <input type="number" placeholder="Age" name="" id="">
                </div>

                <div class="item-by-two">
                    <input type="text" placeholder="Phone Number">
                </div>
            </div>

            <div class="country">
                <input type="text" placeholder="Your Country">
            </div>

            <div class="email">
                <input type="email" name="" id="" placeholder="Enter Your Email">
            </div>

            <div class="by-two">
                <div class="item-by-two">
                    <input type="password" placeholder="Password">
                </div>

                <div class="item-by-two">
                    <input type="password" placeholder="Confirm Password">
                </div>
            </div>

            <div class="send-btn text-center">
                <button class="btn-md" type="submit" > Registar </button>
            </div>
        </form>


        </div>





    </section>


</section>






@endsection