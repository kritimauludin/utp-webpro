<!DOCTYPE html>
<html lang="en">
    
<head>
    <!-- memasukan file header.php ke index -->
    @include('templates.header')
    <!-- end -->
</head>

<body>

    <!-- memasukan navbar ke index -->
    {{-- @dd(Route::currentRouteName()) --}}
    @if (Route::currentRouteName() == ('landing'))
        @include('templates.navbar')
    @endif
    
    @yield('content')



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    
    <script src="{{ asset('template') }}/js/script.js"></script>
    <script src="{{ asset('template') }}/js/onscroll.js"></script>
    <script type="text/javascript">
        $("img").click(function() {
            var t = $(this).attr("src");
            var index = $(this).attr('data-id');
            window.history.replaceState(null, null, "?id="+index+"");
            document.getElementById("btnCollaps").href = "#collapse"+index; 
            $('#index').append(index);
            $(".modal-detail-body").html("<img src='" + t + "' class='modal-img'>");
            $("#modal1").modal("show");
        });
    </script>


</body>

</html>