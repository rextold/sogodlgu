<style>
/* === Tourist Spots Grid Section === */
.tspots {
    padding: 3rem 1rem 3.5rem;
    background: linear-gradient(180deg, #f4f6f9 0%, #fff8f2 100%);
}

.tspots-title {
    text-align: center;
    font-size: 2rem;
    font-weight: 700;
    color: #ea5211; /* logo orange for title */
    margin-bottom: 2rem;
    position: relative;
    display: inline-block;
}

.tspots-title::after {
    content: '';
    display: block;
    width: 60px;
    height: 4px;
    background: #0052a5; /* logo blue underline */
    margin: 8px auto 0 auto;
    border-radius: 2px;
}

/* Grid Layout */
.tspots-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

/* Card Styles */
.tspots .tourist-card {
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
}

.tspots .tourist-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.15);
}

.tspots .tourist-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    transition: transform 0.3s ease;
}

.tspots .tourist-card img:hover {
    transform: scale(1.03);
}

.tspots .tourist-card .card-body {
    padding: 0.75rem 0.5rem;
}

.tspots .tourist-card .card-title {
    font-weight: 600;
    font-size: 1rem;
    margin: 0.5rem 0;
    color: #333;
}

.tspots .tourist-card .card-category {
    display: inline-block;
    font-size: 0.75rem;
    padding: 3px 10px;
    background-color: #f3f3f3; 
    color: #555;
    border-radius: 10px;
    margin-bottom: 0.5rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

/* See More Button */
.tspots-see-more {
    text-align: center;
    margin-top: 2rem;
}

.tspots-see-more a {
    display: inline-block;
    background: #0052a5; /* deep blue */
    color: #fff;
    font-weight: 600;
    padding: 10px 25px;
    border-radius: 25px;
    text-decoration: none;
    transition: background 0.3s ease, transform 0.2s ease;
}

.tspots-see-more a:hover {
    background: #003d7a;
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
    .tspots-title {
        font-size: 1.6rem;
    }
    .tspots .tourist-card img {
        height: 140px;
    }
}
</style>

<div class="container-fluid tspots">
    <div class="text-center mb-4">
        <h2 class="tspots-title">Discover Sogod</h2>
        <p style="color:#555; font-size:0.95rem; margin-top:-0.5rem;">Explore destinations, hotels, cafes, restaurants, and heritage sites around Sogod</p>
    </div>

    <div class="tspots-grid">
        @if($feats = App\TouristSpot::inRandomOrder()->paginate(8))
            @foreach($feats as $feat)
                @if(isset($feat->image))
                    @foreach(json_decode($feat->image, true) as $key => $image)
                        @if($key == 1)
                            <div class="tourist-card">
                                <a href="{{ route('tourism.tourist_spot',['id'=>$feat->id,'name'=>$feat->title]) }}">
                                    <img src="{{ Voyager::image($image) }}" alt="{{ $feat->title }}">
                                    <div class="card-body">
                                        <span class="card-category">{{ $feat->category->name ?? '' }}</span>
                                        <h5 class="card-title">{{ $feat->title }}</h5>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
    </div>

    <div class="tspots-see-more">
        <a href="{{ route('tourism') }}">See More &rarr;</a>
    </div>
</div>
