
<section class="top_sicial">
    <div class="top_bar">
        <ul>
            <li class="top_li"><a href="#">FAMILY</a></li>
            <li class="top_li"><a href="#">SHOP<i class="fa fa-shopping-cart top_icon" aria-hidden="true"></i></a></li>
            <li class="top_li"><a href="#">SEARCH<i class="fa fa-search top_icon" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</section>






<nav class="navbar navbar-expand-lg navbar-light  border-bottom" style="background: linear-gradient(#00a900,#008900);">
    <div class="container-fluid" id="navContainer">

        <img class="navlogoImage" src="{{ asset('images/iconLogo.png') }}" alt="learnedu" >


    <a class="navbar-brand navbarText text-light ms-2" href="{{ route('home') }}" style="font-weight: 700; font-family: 'Lato', sans-serif;"> LearnEdu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>



    <div class="collapse navbar-collapse justify-content-center " id="navbarNav">
        <ul class="navbar-nav ">
            <li class="nav-item" >

                <a style="font-family: 'Lato', sans-serif;" class="nav-link px-3 navItems" aria-current="page" href="#">
                    <i class="fas fa-dove " ></i>
                     <br />

                    BIRDS</a>
            </li>
            <li class="nav-item" >

                <a style="font-family: 'Lato', sans-serif;" class="nav-link px-3 navItems" aria-current="page" href="#">
                    <i class="fas fa-apple-alt " ></i>
                     <br />

                    FRUITs</a>
            </li>

            <li class="nav-item" >

                <a style="font-family: 'Lato', sans-serif;" class="nav-link px-3 navItems" aria-current="page" href="#">
                    <i class="fas fa-paw " ></i>
                     <br />

                    ANIMALS</a>
            </li>




            <li class="nav-item" >

                <a style="font-family: 'Lato', sans-serif;" class="nav-link px-3 navItems" aria-current="page" href="{{ route('about') }}">
                    <i class="fas fa-info" ></i>
                     <br />

                    About Us</a>
            </li>




            <li class="nav-item" >

                <a style="font-family: 'Lato', sans-serif;" class="nav-link px-3 navItems" aria-current="page" href="{{ route('contact') }}">
                    <i class="fas fa-phone-volume" ></i>
                     <br />

                    Contact Us</a>
            </li>





        </ul>
    </div>
    <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item px-3">

            </li>
            <li class="nav-item">
                <a class="nav-link px-3 text-light" href="#"><i class="far rounded-circle fa-2x fa-user-circle"></i></a>
            </li>

        </ul>
    </div>
    </div>
    </nav>
    <!-- Header area end -->
