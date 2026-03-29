<style>
/* ---- Explore by Category list layout ---- */
.tcat-section { margin-bottom: 32px; }

.tcat-section-head {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 16px;
    background: linear-gradient(135deg, #001f2d, #003d7a);
    border-radius: 10px 10px 0 0;
    border-left: 4px solid #ea5211;
    margin-bottom: 0;
}
.tcat-section-head i { color: #f4c542; font-size: 1rem; }
.tcat-section-head .cat-title { color: #fff; font-weight: 800; font-size: 0.95rem; margin: 0; }
.tcat-section-head .cat-badge {
    margin-left: auto; background: rgba(255,255,255,0.15);
    color: #fff; font-size: 0.7rem; padding: 2px 9px;
    border-radius: 20px; font-weight: 600;
}

.tcat-spots-list { background: #fff; border-radius: 0 0 10px 10px; overflow: hidden; box-shadow: 0 4px 16px rgba(0,0,0,0.07); }

.tspot-row {
    display: flex; align-items: center; gap: 14px;
    padding: 12px 16px;
    border-bottom: 1px solid #f0f4fa;
    text-decoration: none; color: inherit;
    transition: background 0.18s;
}
.tspot-row:last-child { border-bottom: none; }
.tspot-row:hover { background: #fdf5f1; text-decoration: none; }

.tspot-thumb {
    width: 80px; height: 64px; object-fit: cover;
    border-radius: 8px; flex-shrink: 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.12);
    transition: transform 0.2s;
}
.tspot-row:hover .tspot-thumb { transform: scale(1.04); }

.tspot-info { flex: 1; min-width: 0; }
.tspot-info .sp-title {
    font-size: 0.9rem; font-weight: 700; color: #001f2d;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    display: block;
}
.tspot-row:hover .tspot-info .sp-title { color: #ea5211; }
.tspot-info .sp-loc {
    font-size: 0.75rem; color: #888; margin-top: 2px; display: block;
}

.tspot-arrow {
    flex-shrink: 0; width: 30px; height: 30px; border-radius: 50%;
    background: #eaeff8; color: #0052a5;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.8rem; transition: background 0.2s, color 0.2s;
}
.tspot-row:hover .tspot-arrow { background: #ea5211; color: #fff; }

.tcat-empty-row {
    padding: 24px 18px; text-align: center; color: #bbb; font-size: 0.82rem;
}
.tcat-empty-row i { font-size: 1.5rem; display: block; margin-bottom: 6px; color: #ddd; }

@media (max-width: 575px) {
    .tspot-thumb { width: 60px; height: 50px; }
}
</style>

@foreach($categories as $key => $category)
    @php
        $spots = App\TouristSpot::where('tourism_category_id', $category->id)->get();
    @endphp
    <div class="tcat-section" data-aos="fade-up" data-aos-delay="{{ min($key * 60, 240) }}">

        {{-- Category heading bar --}}
        <div class="tcat-section-head">
            <i class="fa fa-map-marker"></i>
            <span class="cat-title">{{ $category->name }}</span>
            <span class="cat-badge">{{ $spots->count() }} {{ $spots->count() == 1 ? 'spot' : 'spots' }}</span>
        </div>

        {{-- Flat list of spots --}}
        <div class="tcat-spots-list">
            @forelse($spots as $spot)
                @php
                    $imgs  = !empty($spot->image) ? json_decode($spot->image, true) : [];
                    $thumb = !empty($imgs[0]) ? Voyager::image($imgs[0]) : asset('adminfiles/assets/images/placeholder.jpg');
                @endphp
                <a class="tspot-row"
                   href="{{ route('tourism.tourist_spot', ['name' => $spot->title]) }}">
                    <img src="{{ $thumb }}" class="tspot-thumb" alt="{{ $spot->title }}" loading="lazy">
                    <div class="tspot-info">
                        <span class="sp-title">{{ $spot->title }}</span>
                        <span class="sp-loc"><i class="fa fa-map-marker" style="color:#ea5211;margin-right:3px;"></i>Sogod, Southern Leyte</span>
                    </div>
                    <div class="tspot-arrow"><i class="fa fa-chevron-right"></i></div>
                </a>
            @empty
                <div class="tcat-empty-row">
                    <i class="fa fa-camera"></i>
                    No spots in this category yet.
                </div>
            @endforelse
        </div>

    </div>
@endforeach

    background: #fff; border-radius: 14px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    display: flex; flex-direction: column;
    transition: transform 0.22s, box-shadow 0.22s;
}
.tcat-card:hover { transform: translateY(-3px); box-shadow: 0 14px 32px rgba(0,0,0,0.12); }
.tcat-card .tcat-header {
    display: flex; align-items: center; gap: 8px;
    background: linear-gradient(135deg, #001f2d, #003d7a);
    color: #fff; padding: 12px 16px;
    border-bottom: 3px solid #ea5211;
    font-weight: 700; font-size: 0.9rem;
}
.tcat-card .tcat-header i { color: #f4c542; }
.tcat-card .tcat-count {
    margin-left: auto; background: rgba(255,255,255,0.18);
    font-size: 0.68rem; padding: 2px 9px; border-radius: 20px; font-weight: 600;
}
.tcat-spots-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 8px; padding: 10px;
    flex: 1;
}
.tcat-spot-item {
    border-radius: 9px; overflow: hidden; position: relative;
    text-decoration: none; display: block;
    background: #e5eaf2;
    transition: transform 0.2s;
}
.tcat-spot-item:hover { transform: scale(1.04); text-decoration: none; }
.tcat-spot-item img {
    width: 100%; height: 110px; object-fit: cover; display: block;
    transition: transform 0.3s;
}
.tcat-spot-item:hover img { transform: scale(1.08); }
.tcat-spot-item .tsi-label {
    position: absolute; bottom: 0; left: 0; right: 0;
    background: linear-gradient(to top, rgba(0,10,30,0.82) 0%, rgba(0,10,30,0.3) 70%, transparent 100%);
    color: #fff; font-size: 0.7rem; font-weight: 600;
    padding: 18px 7px 6px;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
/* when a category has only 1 spot — full width */
.tcat-spots-grid.single-spot { grid-template-columns: 1fr; }
.tcat-spots-grid.single-spot .tcat-spot-item img { height: 150px; }

.tcat-card .tcat-footer {
    padding: 0 10px 10px;
}
.tcat-viewall {
    display: flex; align-items: center; justify-content: center; gap: 5px;
    width: 100%;
    background: #f4f6f9; color: #0052a5; border: none;
    font-size: 0.75rem; font-weight: 700; padding: 8px;
    border-radius: 8px; text-decoration: none;
    transition: background 0.2s, color 0.2s;
}
.tcat-viewall:hover { background: #0052a5; color: #fff; text-decoration: none; }

/* empty category */
.tcat-empty {
    padding: 28px 16px; text-align: center;
    color: #bbb; font-size: 0.8rem;
}
.tcat-empty i { display: block; font-size: 1.8rem; margin-bottom: 6px; color: #ddd; }

@media (max-width: 767px) {
    .category-cards-grid { grid-template-columns: 1fr; }
    .tcat-spots-grid { grid-template-columns: 1fr 1fr; }
}
</style>

<div class="category-cards-grid">
@foreach($categories as $key => $category)
    @php
        $spots = App\TouristSpot::where('tourism_category_id', $category->id)->get();
        $displaySpots = $spots->take(4);
        $extraCount   = max(0, $spots->count() - 4);
    @endphp
    <div class="tcat-card" data-aos="fade-up" data-aos-delay="{{ min($key * 60, 240) }}">

        {{-- Header --}}
        <div class="tcat-header">
            <i class="fa fa-map-marker"></i>
            {{ $category->name }}
            <span class="tcat-count">{{ $spots->count() }} {{ $spots->count() == 1 ? 'spot' : 'spots' }}</span>
        </div>

        {{-- Spots grid --}}
        @if($displaySpots->isEmpty())
            <div class="tcat-empty">
                <i class="fa fa-camera"></i>
                No spots in this category yet.
            </div>
        @else
            <div class="tcat-spots-grid {{ $displaySpots->count() === 1 ? 'single-spot' : '' }}">
                @foreach($displaySpots as $spot)
                    @php
                        $imgs = !empty($spot->image) ? json_decode($spot->image, true) : [];
                        $thumb = !empty($imgs[0]) ? Voyager::image($imgs[0]) : asset('adminfiles/assets/images/placeholder.jpg');
                    @endphp
                    <a class="tcat-spot-item"
                       href="{{ route('tourism.tourist_spot', ['name' => $spot->title]) }}">
                        <img src="{{ $thumb }}" alt="{{ $spot->title }}" loading="lazy">
                        <div class="tsi-label">{{ $spot->title }}</div>
                    </a>
                @endforeach
            </div>
        @endif

        {{-- Footer: view all if extras exist --}}
        @if($extraCount > 0)
            <div class="tcat-footer">
                <a href="{{ route('tourism') }}" class="tcat-viewall">
                    <i class="fa fa-plus-circle"></i> {{ $extraCount }} more spot{{ $extraCount > 1 ? 's' : '' }} in this category
                </a>
            </div>
        @endif

    </div>
@endforeach
</div>

