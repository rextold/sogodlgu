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
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.45);
    padding: 15px 25px;
    border-radius: 10px;
    max-width: 75%;
    text-align: center;
    color: #fff;
}

#carousel-1 .carousel-caption p {
    font-size: 1rem;
    margin: 0;
    line-height: 1.4;
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
                    <div class="carousel-caption d-none d-md-block">
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
