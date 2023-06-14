
        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>{{$about->location}}</p>
                        <p><i class="fa fa-phone-alt me-3"></i>{{$about->phone}}</p>
                        <p><i class="fa fa-envelope me-3"></i>{{$about->email}}</p>
                        <div class="d-flex pt-2">

                            @if($about->facebook != null)
                            <a class="btn btn-outline-light btn-social" href="{{$about->facebook}}"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($about->twitter != null)
                            <a class="btn btn-outline-light btn-social" href="{{$about->twitter}}"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($about->github != null)
                            <a class="btn btn-outline-light btn-social" href="{{$about->github}}"><i class="fab fa-github"></i></a>
                            @endif
                            @if($about->linkedin != null)
                            <a class="btn btn-outline-light btn-social" href="{{$about->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Popular Link</h5>
                        <a class="btn btn-link" href="{{route('about')}}">About Us</a>
                        <a class="btn btn-link" href="{{route('contact')}}">Contact Us</a>
                        <a class="btn btn-link" href="{{route('service')}}">Service</a>
                        <a class="btn btn-link" href="{{route('team')}}">Teams</a>
                        <a class="btn btn-link" href="{{route('project')}}">Project</a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Project Gallery</h5>
                        <div class="row g-2">
                            @foreach ($footerprojects as $footerproject)
                            <div class="col-4">
                                <img class="img-fluid" src="{{asset('storage/'.$footerproject->image)}}" style="height:80px !important; width:80px !important; object-fit:cover;" alt="Image">
                            </div>
                            @endforeach

                            {{-- <div class="col-4">
                                <img class="img-fluid" src="{{asset('frontend/img/portfolio-2.jpg')}}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{asset('frontend/img/portfolio-3.jpg')}}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{asset('frontend/img/portfolio-4.jpg')}}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{asset('frontend/img/portfolio-5.jpg')}}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{asset('frontend/img/portfolio-6.jpg')}}" alt="Image">
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu</p>

                    </div>
                </div>
            </div>
            {{-- <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.


                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="{{route('index')}}">Home</a>

                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>


var input = document.getElementById("subscriptionemail");
   input.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {

        document.getElementById('subscriptionbutton').click();
    }
  });
     function subscription() {



        var email = document.getElementById('subscriptionemail').value;




        const validateEmail = (email) => {
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
        };


        document.getElementById('subscriptionemail').value = "";


        if (validateEmail(email)) {


            $.post('{{ route('subscription') }}',{
                _token: '{{ csrf_token() }}',

                email:email,

            }, function(data) {
                console.log(data);
                if (data == 1) {

                    Swal.fire({
                    title: 'Subscribed successfully !',

                    confirmButtonText: 'Ok',
                    }).then((result) => {

                    if (result.isConfirmed) {

                    //   location.reload();
                    }

                    });
                } else {
                    // alert('something wrong please try again');
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'something wrong please try again !',

                    })
                }
            }
            // ,beforeSend:function(data){
            //     $(".main_content").html(data);
            // }
            );
        }
        else{
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter valid email !',

                    })
        }
    }


</script>


