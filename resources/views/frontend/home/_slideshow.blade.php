<style>
/* === Fluid Carousel Container === */
#carousel-1 {
    width: 100%;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    margin-bottom: 40px;
}

/* Carousel Images */
#carousel-1 .carousel-item img {
    object-fit: cover;
    width: 100%;
    height: 500px; /* fixed height for consistent layout */
    transition: transform 0.5s ease;
    border-radius: 12px;
}

/* Zoom effect on hover */
#carousel-1 .carousel-item:hover img {
    transform: scale(1.05);
}

/* Carousel Captions with overlay */
#carousel-1 .carousel-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    transform: none;
    background: linear-gradient(to top, rgba(0,30,70,0.82) 0%, rgba(0,50,120,0.5) 60%, transparent 100%);
    padding: 30px 30px 18px;
    border-radius: 0 0 12px 12px;
    max-width: 100%;
    text-align: left;
    color: #fff;
}

#carousel-1 .carousel-caption .caption-title {
    font-size: 1.35rem;
    font-weight: 800;
    color: #fff;
    text-shadow: 0 2px 8px rgba(0,0,0,0.6);
    margin-bottom: 4px;
    display: block;
}

#carousel-1 .carousel-caption .caption-badge {
    display: inline-block;
    background: var(--sogod-orange, #ea5211);
    color: #fff;
    font-size: 0.72rem;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 20px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-bottom: 6px;
}

#carousel-1 .carousel-caption p {
    font-size: 0.9rem;
    margin: 0;
    color: rgba(255,255,255,0.88);
    max-width: 600px;
}

/* Carousel Indicators */
#carousel-1 .carousel-indicators li {
    background-color: #ea5211; /* Sogod orange */
    border: none;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin: 0 4px;
    transition: background 0.3s ease;
}

#carousel-1 .carousel-indicators .active {
    background-color: #f4c542; /* Sogod gold */
}

/* Carousel Controls */
#carousel-1 .carousel-control-prev-icon,
#carousel-1 .carousel-control-next-icon {
    background-color: rgba(0,0,0,0.6);
    border-radius: 50%;
    width: 45px;
    height: 45px;
    transition: background 0.3s ease;
}

#carousel-1 .carousel-control-prev-icon:hover,
#carousel-1 .carousel-control-next-icon:hover {
    background-color: rgba(0,0,0,0.8);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    #carousel-1 .carousel-caption {
        font-size: 0.85rem;
        padding: 10px 15px;
        max-width: 90%;
    }
    #carousel-1 .carousel-item img {
        height: 300px;
    }
}
</style>

<div id="carousel-1" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @if($count = App\FeaturedImage::where("status",2)->count())
            @for($i = 0; $i < $count; $i++)
                <li data-target="#carousel-1" data-slide-to="{{$i}}" class="{{ $i==0 ? 'active' : '' }}"></li>
            @endfor
        @endif
    </ol>

    <div class="carousel-inner">
        @if($feats = App\FeaturedImage::where("status",2)->get())
            @foreach($feats as $key => $feat)
                <div class="carousel-item {{ $key==0 ? 'active' : '' }}">
                    <a href="{{ $feat->url }}">
                        <img src="{{ Voyager::image($feat->image) }}" alt="{{ $feat->title }}" class="img-fluid">
                    </a>
                    <div class="carousel-caption">
                        <div class="caption-badge"><i class="fa fa-map-marker"></i> Sogod, Southern Leyte</div>
                        @if($feat->title)
                            <span class="caption-title">{{ $feat->title }}</span>
                        @endif
                        <p>{!! $feat->descriptions !!}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<script>
$('#carousel-1').carousel({
    interval: 4500,
    wrap: true,
    keyboard: true
});
</script>
