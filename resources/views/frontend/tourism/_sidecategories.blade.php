<style>
.side-nav-categories {
    position: relative;
    background-color: #fff;
    border-width: 1px;
    border-style: solid;
    border-color: #f5f5f5 #eee #d5d5d5 #eee;
    box-shadow: 0 5px 0 rgba(200,200,200,.2);
    margin-bottom: 30px;
}
.title {
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    padding: 12px 25px;
    display: inline-block;
    font-family: 'Montserrat', sans-serif;
    text-transform: uppercase;
    background: linear-gradient(90deg,#4fc3f7,#1e8f6e);
    margin-left: -10px;
}
ul#category-tabs { padding:0; margin:0; list-style:none;}
ul#category-tabs li { padding: 10px 18px; border-bottom:1px solid #ececec; position:relative;}
ul#category-tabs li a { color:#333; font-weight:700; font-size:13px; display:block;}
ul#category-tabs li a i { position:absolute; right:18px; top:12px; color:#1e8f6e;}
.sub-category-tabs { list-style:none; padding-left:10px; margin-top:8px; display:none;}
.sub-category-tabs li { padding:4px 0; border-bottom:none;}
.sub-category-tabs li a { font-weight:600; font-size:13px; color:#444; }
</style>

<div class="side-nav-categories">
    <div class="title"><strong>Category</strong></div>

    @foreach($categories as $category)
        @php $safeId = 'cat-'. $category->id; @endphp
        <ul id="category-tabs">
            <li>
                <a href="javascript:void(0)" class="main-category" data-target="#{{ $safeId }}">
                    {{ $category->name }}
                    <i class="fa fa-plus"></i>
                </a>

                <ul id="{{ $safeId }}" class="sub-category-tabs">
                    @php
                        $spots = App\TouristSpot::where('tourism_category_id', $category->id)->get();
                    @endphp
                    @foreach($spots as $spot)
                        <li><a href="{{ route('tourism.tourist_spot',['id'=>$spot->id,'name'=>$spot->title]) }}">{{ $spot->title }}</a></li>
                    @endforeach
                    @if($spots->isEmpty())
                        <li><small class="text-muted">No spots yet</small></li>
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
