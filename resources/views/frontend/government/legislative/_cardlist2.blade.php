{{-- Resolution list rows — rendered inline by resolutions.blade.php --}}
@foreach($resolutions as $resolution)
<a class="res-item"
   href="{{ route('gov.legislative.show_resolution', ['id' => $resolution->id, 'title' => $resolution->title]) }}">
    <div class="ri-icon"><i class="fa fa-file-text-o"></i></div>
    <div class="ri-body">
        <div class="ri-title">{{ $resolution->title }}</div>
        <div class="ri-date">
            <i class="fa fa-calendar"></i>
            {{ $resolution->date ? date('F d, Y', strtotime($resolution->date)) : 'No date' }}
        </div>
    </div>
    <div class="ri-views">
        <i class="fa fa-eye"></i> {{ number_format($resolution->views ?? 0) }}
    </div>
</a>
@endforeach
