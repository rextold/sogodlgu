<script type="text/javascript" src="{{ asset('js/news.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/home/events.css') }}">
  <ul class="ul-events">
    @foreach($events as $event)
     <li>
        <table style="border: none;" class="events-container">
            <tr style="">
                <td class="img">
                    <img src="{{ asset('images/events/'.$event->photo) }}">  
                </td>
                <td> 
                    <a href="{{ route('events.show',['id'=>$event->id, 'event' => $event->title]) }}" style="text-decoration: none;">
                        <h6>{{ $event->title }}</h6> 
                    </a>
                    <figcaption class="venue">
                        <div>{{ $event->venue }}</div>
                        <div>{{ $event->startingdate }} {{ ($event->startingdate)? 'and more':'' }}</div>
                    </figcaption>
                </td>
            </tr>
        </table>
    </li>
    <li>  
        <div class="w3-right">
            {{ $events->links('vendor.pagination.bootstrap-4') }}
        </div>
    </li>
    @endforeach
</ul>