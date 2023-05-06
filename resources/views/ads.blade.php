<div id="lesannonces" class="row g-4 mb-5">
   
   
    @foreach ($annonces as $key=> $annonce)
 
            <div class="col-12 col-sm-6 col-md-4">
                <!-- Card Product-->
                <div class="card position-relative h-100 card-listing hover-trigger">
                    <div class="card-header">
                        <picture class="position-relative overflow-hidden d-block bg-light">
                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="storage/images/annonce/{{ $annonce->image }}" alt="">
                        </picture>
                            
                     
                    </div>
                    <div class="card-body px-0 text-center">
                        <div class="d-flex justify-content-center align-items-center mx-auto mb-1">
                            <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                    <div class="position-absolute stars" style="width: {{$annonce->note}}%">
                        <i class="ri-star-fill text-dark mr-1"></i>
                        <i class="ri-star-fill text-dark mr-1"></i>
                        <i class="ri-star-fill text-dark mr-1"></i>
                        <i class="ri-star-fill text-dark mr-1"></i>
                        <i class="ri-star-fill text-dark mr-1"></i>
                    </div>
                    <div class="stars">
                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    </div>
                </div> <span class="small fw-bolder ms-2 text-muted"> {{$annonce->note_avg}}</span>
                        </div>
                        <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                            href="{{ route('louerObjet', ['id' => $annonce->id]) }}">{{$annonce->titre}}</a>
                            <p class="fw-bolder m-0 mt-2">{{$annonce->prix}}</p>
                    </div>
                </div>
                <!--/ Card Product-->
            </div>
    @endforeach

    {{-- @endif --}}
</div>
