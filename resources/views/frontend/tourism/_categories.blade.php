<style>
.category-cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
    margin-bottom: 16px;
}
.tcat-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    transition: transform 0.25s, box-shadow 0.25s;
}
.tcat-card:hover { transform: translateY(-4px); box-shadow: 0 12px 28px rgba(0,0,0,0.13); }
.tcat-card .tcat-header {
    display: flex; align-items: center; gap: 8px;
    background: linear-gradient(135deg, #001f2d, #003d7a);
    color: #fff; padding: 11px 16px;
    border-bottom: 3px solid #ea5211;
    font-weight: 700; font-size: 0.88rem;
}
.tcat-card .tcat-header i { color: #f4c542; }
.tcat-card .tcat-body { padding: 8px; }
.category-carousel img { border-radius: 6px; transition: transform 0.3s ease; }
.category-carousel img:hover { transform: scale(1.05); }
.category-carousel .carousel-item { text-align: center; padding: 6px; }
.category-carousel .carousel-item a { color: #001f2d; font-weight: 600; text-decoration: none; font-size: 0.85rem; }
.category-carousel .carousel-item a:hover { color: #0052a5; }
@media (max-width: 767px) {
    .category-carousel .carousel-item.col-md-3 { flex: 0 0 50%; max-width: 50%; }
    .category-cards-grid { grid-template-columns: 1fr; }
}
@media (max-width: 576px) {
    .category-carousel .carousel-item.col-md-3 { flex: 0 0 100%; max-width: 100%; }
}
</style>

<div class="category-cards-grid">
@foreach($categories as $key => $category)
    <div class="tcat-card" data-aos="fade-up" data-aos-delay="{{ min($key * 60, 200) }}">
        <div class="tcat-header">
            <i class="fa fa-map-marker"></i> {{ $category->name }}
        </div>
        <div class="tcat-body category-carousel">
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
                                            <img src="{{ Voyager::image($img) }}" class="img-fluid img-thumbnail" style="width:100%; height:170px; object-fit:cover;" alt="{{ $feat->title }}">
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
@endforeach
</div>
