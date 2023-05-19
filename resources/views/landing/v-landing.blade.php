@extends('templates.userLayout')
@section('title', 'UMKN - Landing Page')
@section('content')
    <!-- jumbotron -->
    <div class="container">
        

        <br><br><br>

        <div class="row mt-5 mb-5">

            <div class="col-lg-12 gambar">
                <img src="{{ asset('template') }}/vector-konten.png" width="100%">
            </div>

            <div class="col-sm-12 position-relative p-4">

                <div class="position-absolute top-0 end-0">
                    <img src="{{ asset('template') }}/vector-konten.png" class="img">
                </div>

                <h1 class="display-1 text-truncate tebel-sedang">UMKM free</h1>
                <h1 class="display-1 text-truncate tebel-sedang">promotion</h1>

                <div class="desc mt-4">
                    <p>GO UMKM merupakan website yang mempromosikan UMKM secara gratis,
                        Hal ini dilakukan demi kemajuan dunia industri diindonesia.
                    </p>
                </div>

                <div class="mt-5">
                    <a href="/login" class="button rounded-pill shadow tebel-sedang">Post Banner</a>
                </div>

                <br>
            </div>
        </div>
        <br>
    </div>

<!-- untuk bagian semua banner promotion-->
    <div class="container-fluid">
        <div class="row mt-5 mb-2">
            <div class="col-lg-12">
                <hr>
                <h1 class="text-truncate tebel-sedang mt-3 text-center mb-3" id="umkm">All Promotion</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div id="gallery">
                <?php $i=0;?>
                <?php foreach ($umkms as $umkm) : ?>
                    <img src="{{ $umkm['img_url'] }}" data-id="{{$i++}}" class="img-responsive">
                <?php endforeach; ?>
            </div>
        </div>
    </div>



    <!--Modal: image zoom-->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Body-->
                <div class="modal-detail-body mb-0 p-0">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">

                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <span class="mr-4">Kunjungi UMKM Di</span>
                    <p>
                        <a class="btn btn-outline-primary btn-rounded btn-sm ml-4" data-bs-toggle="collapse" href="#" id="btnCollaps" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Klik Disini
                        </a>
                    </p>
                    <?php $i=0;?>
                    <?php foreach ($umkms as $umkm) : ?>                        
                        <div class="collapse" id="collapse{{$i++}}">
                            <div class="card card-body">
                                Instagram : {{$umkm['url_instagram']}}
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <button type="button" class="btn btn-outline-danger btn-rounded btn-sm ml-4 " data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>





    
@endsection