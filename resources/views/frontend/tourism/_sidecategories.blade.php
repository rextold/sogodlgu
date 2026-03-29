<style>
.side-nav-categories {
    position: relative;
    background-color: #fff;
    border-radius: 0 0 8px 8px;
    overflow: hidden;
}
ul#category-tabs { padding: 0; margin: 0; list-style: none; }
ul#category-tabs li { padding: 0; border-bottom: 1px solid #f0f0f0; position: relative; }
ul#category-tabs li a { color: #333; font-weight: 600; font-size: 0.85rem; display: block; padding: 10px 40px 10px 18px; }
ul#category-tabs li a:hover { background: #edf3fb; color: #0052a5; text-decoration: none; }
ul#category-tabs li i.toggle-icon { position: absolute; right: 18px; top: 12px; color: #ea5211; pointer-events: none; }
.sub-category-tabs { list-style: none; padding-left: 0; margin-top: 0; display: none; background: #f8f9fc; border-top: 1px solid #eaeff8; }
.sub-category-tabs li { padding: 0; border-bottom: none; }
.sub-category-tabs li a { font-weight: 500; font-size: 0.82rem; color: #555; padding: 7px 16px 7px 28px; display: block; }
.sub-category-tabs li a:hover { color: #0052a5; background: #edf3fb; text-decoration: none; }
</style>

<div class="side-nav-categories">
    @foreach($categories as $category)
        @php $safeId = 'cat-'. $category->id; @endphp
        <ul id="category-tabs">
            <li>
                <a href="javascript:void(0)" class="main-category" data-target="#{{ $safeId }}">
                    {{ $category->name }}
                    <i class="fa fa-plus toggle-icon"></i>
                </a>

                <ul id="{{ $safeId }}" class="sub-category-tabs">
                    @php
                        $spots = App\TouristSpot::where('tourism_category_id', $category->id)->get();
                    @endphp
                    @foreach($spots as $spot)
                        <li><a href="{{ route('tourism.tourist_spot',['id'=>$spot->id,'name'=>$spot->title]) }}">{{ $spot->title }}</a></li>
                    @endforeach
                    @if($spots->isEmpty())
                        <li><small class="text-muted" style="padding: 7px 28px; display:block;">No spots yet</small></li>
                    @endif
                </ul>
            </li>
        </ul>
    @endforeach
</div>

<script>
    document.querySelectorAll('.main-category').forEach(function(el){
        el.addEventListener('click', function(e){
            e.preventDefault();
            var target = document.querySelector(this.getAttribute('data-target'));
            if(!target) return;
            if(target.style.display === 'block') {
                target.style.display = 'none';
                this.querySelector('i').classList.remove('fa-minus');
                this.querySelector('i').classList.add('fa-plus');
            } else {
                target.style.display = 'block';
                this.querySelector('i').classList.remove('fa-plus');
                this.querySelector('i').classList.add('fa-minus');
            }
        });
    });
</script>
