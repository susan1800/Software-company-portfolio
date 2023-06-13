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


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                            <h6 class="position-relative d-inline text-primary ps-4">Contact Us</h6>
                            <h2 class="mt-2">Contact For Any Query</h2>
                        </div>
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
                                <button class="btn btn-primary w-100 py-3" onclick="sendmessage()">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <section id="google-maps">
            <div class="google-map">
                <div class="gmap3-area" data-lat="{{$about->lat}}" data-lng="{{$about->long}}" data-mrkr="{{asset('img/map-marker.png')}}"></div>
            </div>
        </section>
        <input type="hidden" value="{{$about->lat}}" id="latitude">
        <input type="hidden" value="{{$about->long}}" id="longitude">
        <div style="padding:10px">
			<div id="map"></div>
		</div>
        {{-- <img src="http://maps.googleapis.com/maps/api/staticmap?center=-{{$about->lat}},-{{$about->long}}&zoom=11&size=200x200&sensor=false"> --}}


    @include('frontend/partials.footer')

    @include('frontend.partials.script')

</body>



<script type="text/javascript">
    var map;

    function initMap() {

        var latitude = document.getElementById('latitude').value;
        var longitude = document.getElementById('longitude').value;


        var myLatLng = {lat: latitude, lng: longitude};


        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 14
        });
        // alert('dfg');


        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          //title: 'Hello World'

          // setting latitude & longitude as title of the marker
          // title is shown when you hover over the marker
          title: latitude + ', ' + longitude
        });
    }
    initMap();
    </script>
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
        }

        const validateEmail = (email) => {
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
        };
        document.getElementById('name').value = "";
        document.getElementById('email').value = "";
        document.getElementById('subject').value = "";
        document.getElementById('message').value = "";
        if (validateEmail(email)) {


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

</html>
