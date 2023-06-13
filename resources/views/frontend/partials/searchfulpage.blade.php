 <!-- Full Screen Search Start -->
 <div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content"  style="background: rgb(122, 101, 101,0.7);">
            <div class="modal-header border-0">
                <button type="button"  class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center" id="searchdata">
                <form class="input-group" style="max-width: 600px;" method="get" action="{{route('search')}}">


                    <input type="text" class="form-control bg-transparent border-light p-3" id="searchtext" name="search" placeholder="Type search keyword" required autofocus>
                    @csrf
                    <button type="submit" class="btn btn-light px-4"><i class="bi bi-search"></i></button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Search End -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function search() {



var search = document.getElementById('searchtext').value;




if(search)
{
document.getElementById('searchtext').value = "";


    $.get('{{ route('search' , 'search') }}',{
        _token: '{{ csrf_token() }}',

        search:search,

    }, function(data) {
        console.log(data);
        document.getElementById('searchdata').style.background="white";
        document.getElementById('searchdata').innerHTML = data;

    }

    );
}else{
    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Search field is empty!',

                    })
}

}
</script>
