@extends('templates.userLayout')
@section('title', 'UMKM - Edit Banner Promosi')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 mt-5">
            <!-- post banner -->
            {{-- @dd($banner['id']) --}}
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="postBannerModalLabel">Post Banner</h5>
                     </div>
                     <div class="modal-body m-3">
                         <form action="/banner/{{$banner['id']}}" method="POST">
                            @method('PUT')
                            @csrf
                             <div class="row mb-3">
                                 <div class="col-lg-6 mb-2">
                                     <input type="text" class="form-control @error('business_name') is-invalid @enderror" value="{{old('business_name', $banner->business_name)}}" id="business_name" name="business_name" placeholder="Business Name*" value="{{ $banner->business_name }}" required>
                                     @error('business_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <div class="col-lg-6 mb-2">
                                     <input type="text" class="form-control @error('business_owner') is-invalid @enderror" value="{{old('business_owner', $banner->business_owner)}}" id="business_owner" name="business_owner" placeholder="Owner Name*" required>
                                     @error('business_owner')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                 </div>
                             </div>
                             <hr>
                             <div class="row mb-3">
                                 <div class="col-lg-3 mb-2">
                                     <button type="button" class="btn btn-sm btn-outline-dark" disabled>Store | Link</button>
                                 </div>
                                 <div class="col-lg-9 mb-2">
                                    <input type="text" class="form-control @error('url_instagram') is-invalid @enderror" value="{{old('url_instagram', $banner->url_instagram)}}" id="url_instagram" name="url_instagram" placeholder="Url Instagram*" required>
                                    @error('url_instagram')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-lg-3 mb-2">
                                    <button type="button" class="btn btn-sm btn-outline-dark" disabled>Banner Url*</button>
                                </div>
                                <div class="col-lg-9 mb-2">
                                    <input class="form-control form-control-sm @error('img_url') is-invalid @enderror" value="{{ old('img_url', $banner->img_url) }}" id="img_url" name="img_url" type="text" required placeholder="Url Banner Image">
                                    @error('img_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                 </div>
                             </div>
                         </div>
                         <div class="modal-footer">
                             <a href="/banner" class="btn bg-danger rounded-pill tebel-sedang shadow">Cancle</a>
                             <button type="submit" class="btn bg-custom rounded-pill tebel-sedang shadow">Update Now</button>
                         </div>
                     </form>
                 </div>
        </div>
    </div>
</div>
@endsection