<style>
/* --- Redesigned Links Card with Icon Inside Link Name --- */
.links-card {
    border: none;
    border-radius: var(--card-radius, 12px);
    box-shadow: var(--card-shadow, 0 4px 12px rgba(0,0,0,0.08));
    overflow: hidden;
    margin-bottom: 1.5rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.links-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.12);
}

.links-card .section-header {
    background: linear-gradient(135deg, var(--sogod-orange, #D15924), var(--sogod-gold, #F4C542));
    color: var(--sogod-white, #fff);
    font-weight: 700;
    padding: 12px 16px;
    border-radius: var(--card-radius, 12px) var(--card-radius, 12px) 0 0;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 1rem;
}

.links-card .card-body {
    padding: 12px 16px;
    background-color: var(--sogod-white, #fff);
}

.links-card .list-group-item {
    padding: 8px 12px;
    border-radius: 8px;
    margin-bottom: 6px;
    background: #f8f8f8;
    transition: background 0.3s, transform 0.2s;
}

.links-card .list-group-item:hover {
    background: #f4f4f4;
    transform: translateX(4px);
}

.links-card .list-group-item a {
    color: var(--sogod-blue, #003A70);
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: color 0.3s;
}

.links-card .list-group-item a:hover {
    color: var(--sogod-orange, #D15924);
}

.links-card .list-group-item a i {
    color: var(--sogod-orange, #D15924);
    font-size: 0.9rem;
}
</style>

<div class="card links-card" data-aos="fade-up">
    <div class="section-header">
        <i class="fa fa-link"></i> Useful Links
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @if($links = App\Link::orderBy('created_at','desc')->paginate(5))
                @foreach($links as $link)
                    <li class="list-group-item">
                        <a target="_blank" href="{{ $link->url }}">
                            <!-- Icon inside link name -->
                            <i class="fa fa-external-link-alt"></i> {{ $link->name }}
                        </a>
                    </li>
                @endforeach
            @else
                <li class="list-group-item">
                    <i class="fa fa-exclamation-circle"></i> No links available.
                </li>
            @endif
        </ul>
    </div>
</div>
