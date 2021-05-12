@extends('includes.app')

@section('content')

    <section style="background-color: #009ECE">



        <div class="container-fluid" id="upperTopSection" style="background-image: url('{{ asset('images/home-bg.jpg')}}');">

         <div class="containerText">Quizzes</div>

        </div>

        <div class="centerdText text-center text-light ">


            <h1 class="m-4"> PLAY NOW!</h1>

            <div class="headingLine"> </div>


        </div>


          <div class="grid-container">

            <main class="grid-item main mainforSlider">
                <div class="sliderItems">
                  <div class="Slideritem item1"></div>
                  <div class="Slideritem item2"></div>
                  <div class="Slideritem item3"></div>
                  <div class="Slideritem item4"></div>
                  <div class="Slideritem item5"></div>
                  <div class="Slideritem item6"></div>
                  <div class="Slideritem item7"></div>
                  <div class="Slideritem item8"></div>
                  <div class="Slideritem item9"></div>
                  <div class="Slideritem item10"></div>
                </div>

            </main>



          </div>






    </section>




    <script>


        const slider = document.querySelector('.sliderItems');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
          isDown = true;
          slider.classList.add('active');
          startX = e.pageX - slider.offsetLeft;
          scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => {
          isDown = false;
          slider.classList.remove('active');
        });
        slider.addEventListener('mouseup', () => {
          isDown = false;
          slider.classList.remove('active');
        });
        slider.addEventListener('mousemove', (e) => {
          if (!isDown) return;
          e.preventDefault();
          const x = e.pageX - slider.offsetLeft;
          const walk = (x - startX) * 3; //scroll-fast
          slider.scrollLeft = scrollLeft - walk;
          console.log(walk);
        });



      </script>



@endsection
