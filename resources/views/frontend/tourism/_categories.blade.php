<style>
.category-carousel img {
    border-radius: 6px;
    transition: transform 0.3s ease;
}
.category-carousel img:hover {
    transform: scale(1.05);
}
.category-carousel .carousel-item {
    text-align: center;
    padding: 10px;
}
.category-carousel .carousel-item a {
    color: #222;
    font-weight: 600;
    text-decoration: none;
}
@media (max-width: 767px) {
    .category-carousel .carousel-item.col-md-3 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}
@media (max-width: 576px) {
    .category-carousel .carousel-item.col-md-3 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}
</style>

@foreach($categories as $key => $category)
<div class="tspots mb-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h6 class="mb-0">{{ $category->name }}</h6>
        </div>
        <div class="card-body category-carousel">
            @php
                $feats = App\TouristSpot::inRandomOrder()->where('tourism_category_id',$category->id)->get();
                $carouselId = 'carousel-' . $key . '-' . \Illuminate\Support\Str::random(5);
            @endphp

            <div id="{{ $carouselId }}" class="carousel slide" data-ride="carousel" data-wrap="true" data-interval="0">
                <div class="carousel-inner row w-100 mx-auto" role="listbox">
                    @php $count = 0; @endphp
                    @foreach($feats as $feat)
                        @if(!empty($feat->image))
                            @foreach(json_decode($feat->image, true) as $idx => $img)
                                @if($idx === 0)
                                    <div class="carousel-item col-md-3 {{ $count === 0 ? 'active' : '' }}">
                                        <a href="{{ route('tourism.tourist_spot',['id'=>$feat->id,'name'=>$feat->title]) }}">
                                            <img src="{{ Voyager::image($img) }}" class="img-fluid img-thumbnail" style="width:100%; height:180px; object-fit:cover; max-height:180px;" alt="{{ $feat->title }}">
                                            <div class="mt-2 text-truncate">{{ $feat->title }}</div>
                                        </a>
                                    </div>
                                    @php $count++; @endphp
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>

                @if($count > 1)
                    <a class="carousel-control-prev" href="#{{ $carouselId }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#{{ $carouselId }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach
