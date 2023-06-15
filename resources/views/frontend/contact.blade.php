@include('frontend.partials.head')
<style>
    #map {
      height: 300px;
      width: 600px;
    }
  </style>
<body>
   @include('frontend/partials.header')
   <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-12 text-center">
                            <h1 class="text-white animated zoomIn">Contact</h1>
                            <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">Pages</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
        @include('frontend.partials.searchfulpage')


        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                            <h6 class="position-relative d-inline text-primary ps-4">Contact Us</h6>
                            <h2 class="mt-2">Contact For Any Query</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row g-5 justify-content-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <p class="" style="text-align: justify; font-size:18px;"> <i class="fa fa-phone" style="color:blue;"></i>&nbsp; &nbsp;&nbsp;<b>Call Us</b> {{$about->phone}}</p>
                        <p class="" style="text-align: justify; font-size:18px;"><i class="fa fa-map-marker" style="color:blue;" ></i> &nbsp; &nbsp;&nbsp; {{$about->location}}</p>
                        <p class="" style="text-align: justify; font-size:18px;"><i class="fa fa-envelope" style="color:blue;" ></i> &nbsp; &nbsp;&nbsp; <b>Email </b> {{$about->email}}</p>


                        <div class="d-flex align-items-center mt-4">

                            @if($about->facebook != null)
                            <a class="btn btn-outline-primary btn-square me-3" href="{{$about->facebook}}"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($about->twitter != null)
                            <a class="btn btn-outline-primary btn-square me-3" href="{{$about->twitter}}"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($about->github != null)
                            <a class="btn btn-outline-primary btn-square me-3" href="{{$about->github}}"><i class="fab fa-github"></i></a>
                            @endif
                            @if($about->linkedin != null)
                            <a class="btn btn-outline-primary btn-square" href="{{$about->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <div class="col-12">
                                <button id="sendbutton" class="btn btn-primary w-100 py-3" onclick="sendmessage()">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Contact Start -->

        <!-- Contact End -->

        <div class="col-lg-8" style="text-align: center; padding:auto; margin:auto;">
           {!! $about->map !!}
        </div>


    @include('frontend/partials.footer')

    @include('frontend.partials.script')

</body>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&amp;ver=2.1.6"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
     function sendmessage() {

        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var subject = document.getElementById('subject').value;
        var message = document.getElementById('message').value;

        if((!name)||(!email)||(!subject)||(!message)){
            // alert(name);
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill all the field !',

                    })
                    return false;
        }

        const validateEmail = (email) => {
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
        };

        if (validateEmail(email)) {
            document.getElementById('name').value = "";
        document.getElementById('email').value = "";
        document.getElementById('subject').value = "";
        document.getElementById('message').value = "";
        document.getElementById('sendbutton').style.background ="#0d87d4";

            $.post('{{ route('contactmail') }}',{
                _token: '{{ csrf_token() }}',
                name:name,
                email:email,
                subject:subject,
                message:message,
            }, function(data) {
                console.log(data);
                if (data == 1) {

                    Swal.fire({
                    title: 'Message sent successfully !',

                    confirmButtonText: 'Ok',
                    }).then((result) => {

                    if (result.isConfirmed) {

                      location.reload();
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

</html>
