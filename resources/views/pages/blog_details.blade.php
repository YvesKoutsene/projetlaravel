<!doctype html>
<html class="no-js" lang="zxx">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Courses | Education</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

   <!-- CSS here -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
   <link rel="stylesheet" href="assets/css/slicknav.css">
   <link rel="stylesheet" href="assets/css/animate.min.css">
   <link rel="stylesheet" href="assets/css/hamburgers.min.css">
   <link rel="stylesheet" href="assets/css/magnific-popup.css">
   <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
   <link rel="stylesheet" href="assets/css/themify-icons.css">
   <link rel="stylesheet" href="assets/css/slick.css">
   <link rel="stylesheet" href="assets/css/nice-select.css">
   <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* Style des étoiles */
        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
        }
        .star-input {
            display: none;
        }
        .star-label {
            color: #ccc;

        }
        .star-label:hover,
        .star-label:hover ~ .star-label,
        .star-input:checked ~ .star-label {
            color: #ffcc00;
        }

        .rating label.star-label {
            font-size: 24px;
            cursor: pointer;
        }

    </style>
</head>

<body>
   <!--? Preloader Start -->
   <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="preloader-circle"></div>
          <div class="preloader-img pere-text">
            <img src="assets/img/logo/loder.png" alt="">
         </div>
      </div>
   </div>
</div>
<!-- Preloader Start -->
<!-- Header Start -->
   <div class="header-area header-transparent">
       <div class="main-header ">
           <div class="header-bottom  header-sticky">
               <div class="container-fluid">
                   <div class="row align-items-center">
                       <!-- Logo -->
                       <div class="col-xl-2 col-lg-2">
                           <div class="logo">
                               <!--<a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>-->
                           </div>
                       </div>
                       <div class="col-xl-10 col-lg-10">
                           <div class="menu-wrapper d-flex align-items-center justify-content-end">
                               <!-- Main-menu -->
                               <div class="main-menu d-none d-lg-block">
                                   <nav>
                                       <ul id="navigation">
                                           <li class="active" ><a href="{{ route ('index') }}">Home</a></li>
                                           <li><a href="{{ route('createCourse') }}">University</a>
                                               <ul class="submenu">
                                                   @php
                                                       $criteria = \App\Models\Criteria::all();
                                                   @endphp
                                                   @if($criteria->isEmpty())
                                                       <li>
                                                           <a href="">No criteria found</a>
                                                       </li>
                                                   @else
                                                       @foreach($criteria as $criterion)
                                                           <li>
                                                               <a href="{{ route('classement.critere', ['critere_id' => $criterion->id]) }}">{{ $criterion->criteria_name }}</a>
                                                           </li>
                                                       @endforeach
                                                   @endif
                                               </ul>
                                           </li>
                                           <li><a  href="" >Blog</a></li>
                                           <li><a href="{{ route('createContact') }}">Contact</a></li>

                                           <!-- Button -->
                                           @guest
                                               @if (Route::has('login'))
                                                   <li class="button-header"><a href="{{ route('login') }}" class="btn btn3">Login</a></li>
                                                   @if (Route::has('register'))
                                                       <li class="button-header margin-left"><a href="{{ route('register') }}" class="btn">Register</a></li>
                                                   @endif
                                               @endif
                                           @else
                                               <li class="button-header"><a href="#" class="btn btn3">Hi, {{ Auth::user()->name }}</a>
                                                   <ul class="submenu">
                                                       <li><a href="{{ route('profile.edit') }}">Your account</a></li>
                                                   </ul>
                                               </li>
                                           @endguest

                                       </ul>
                                   </nav>
                               </div>
                           </div>
                       </div>
                       <!-- Mobile Menu -->
                       <div class="col-12">
                           <div class="mobile_menu d-block d-lg-none"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
<!-- Header End -->
<main>
   <!--? slider Area Start-->
   <section class="slider-area slider-area2">
     <div class="slider-active">
       <!-- Single Slider -->
       <div class="single-slider slider-height2">
         <div class="container">
           <div class="row">
             <div class="col-xl-8 col-lg-11 col-md-12">
               <div class="hero__caption hero__caption2">
                 <h1 data-animation="bounceIn" data-delay="0.2s">University's Blog</h1>
                 <!-- breadcrumb Start-->
                 <nav aria-label="breadcrumb">
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="{{ route ('index') }}">Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Blog</a></li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</section>
<!--? Blog Area Start -->
    <section class="blog_area single-post-area section-padding">
        <form class="form-contact comment_form" id="ratingForm" action="{{ route('ratings.storeAndUpdateComment', $university) }}" method="POST">

        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset($university->photo) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2 style="color: #2d2d2d;">Name: {{ $university->name }}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fas fa-map-marker-alt"></i> Location: {{ $university->location }}</a></li>
                            </ul>
                            <p class="excert">
                                <label>Website: </label>
                                <a href="{{ $university->website }}" target="_blank" class="text-blue-500 hover:underline">{{ $university->website }}</a>
                            </p>
                            <div class="quote-wrapper">
                                <div class="quotes">
                                    <label class="couleur2">Description</label>
                                    <p class="couleur2"> {{ $university->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comments-area">
                        @if ($comments->isEmpty())
                            <p>No comment found</p>
                        @else
                            <h4>{{ $comments->count() }} Comment{{ $comments->count() !== 1 ? 's' : '' }}</h4>
                            <div class="comment-list">
                                @foreach ($comments as $comment)
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="desc">
                                                <p class="comment">
                                                    {{ $comment->comment }}
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5>
                                                        <a>{{ $comment->user->name }}</a>
                                                    </h5>
                                                    <p class="date">{{ $comment->updated_at }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                                @csrf
                                <div class="comment-form">
                                    <h4>Leave a Reply</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment" required>{{ $onecmt ? $onecmt->comment : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button id="submitForm" type="submit" class="button button-contactForm btn_1 boxed-btn">Post</button>
                                    </div>
                                </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <h2 class="text-xl font-semibold mt-6 couleur text-center">Rating Criteria</h2>
                            @csrf
                            @foreach ($criteria as $criterion)
                                <div class="mt-4">
                                    <label class="couleur">{{ $criterion->criteria_name }}</label>
                                    <div class="rating">
                                        @for ($i = 5; $i >= 1; $i--)
                                            <input type="radio" id="star-{{ $criterion->id }}-{{ $i }}" name="ratings[{{ $criterion->id }}]" value="{{ $i }}" class="star-input"
                                                   @if ($existingRating = $existingRatings->where('criteria_id', $criterion->id)->first())
                                                       @if ($existingRating->rating == $i) checked @endif
                                                   @endif required>
                                            <label for="star-{{ $criterion->id }}-{{ $i }}" class="star-label">&#9733;</label>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>

<!-- Blog Area End -->
</main>
<footer>
   <div class="footer-wrappper footer-bg">
    <!-- Footer Start-->
       <div class="footer-area footer-padding">
           <div class="container">
               <div class="row justify-content-between">
                   <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-50">
                           <div class="single-footer-caption mb-30">
                               <!-- logo -->
                               <div class="footer-logo mb-25">
                                   <!--<a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>-->
                               </div>
                               <div class="footer-tittle">
                                   <div class="footer-pera">
                                       <p>Universities, courses, programs can be consulted on the websites of each university</p>
                                   </div>
                               </div>
                               <!-- social -->
                               <div class="footer-social">
                                   <a href=""><i class="fab fa-twitter"></i></a>
                                   <a href=""><i class="fab fa-facebook-f"></i></a>
                                   <a href=""><i class="fab fa-youtube"></i></a>
                                   <a href=""><i class="fab fa-instagram"></i></a>
                                   <a href=""><i class="fas fa-phone"></i></a>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5">
                       <div class="single-footer-caption mb-50">
                           <div class="footer-tittle">
                               <h4>Our solutions</h4>
                               <ul>
                                   <li><a href="#">Design & creatives</a></li>
                                   <li><a href="#">Telecommunication</a></li>
                                   <li><a href="#">Maths</a></li>
                                   <li><a href="#">Programing</a></li>
                                   <li><a href="#">Architecture</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-50">
                           <div class="footer-tittle">
                               <h4>Our supports</h4>
                               <ul>
                                   <li><a href="#">Infrastrcuture</a></li>
                                   <li><a href="#">Internet</a></li>
                                   <li><a href="#">Publisher</a></li>
                                   <li><a href="#">E-learning</a></li>
                                   <li><a href="#">Culture</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-50">
                           <div class="footer-tittle">
                               <h4>Our companies</h4>
                               <ul>
                                   <li><a href="#">UTBM</a></li>
                                   <li><a href="#">HAVARD</a></li>
                                   <li><a href="#">IAI-TOGO</a></li>
                                   <li><a href="#">UL</a></li>
                                   <li><a href="#">UQAM</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- footer-bottom area -->
       <div class="footer-bottom-area">
           <div class="container">
               <div class="footer-border">
                   <div class="row d-flex align-items-center">
                       <div class="col-xl-12 ">
                           <div class="footer-copy-right text-center">
                               <p>
                                   Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.instagram.com/jeanyveslorenzi?igsh=MTB4eGpqZ3Z4dWY3Mg%3D%3D&utm_source=qr" target="_blank">Jean-Yves</a>
                               </p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- Foot
<-- Footer End-->

</div>
</footer>
<!-- Scroll Up -->

<div id="back-top" >
   <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->

<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="./assets/js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>
<script src="./assets/js/jquery.countdown.min.js"></script>
<script src="./assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>

</body>
</html>
