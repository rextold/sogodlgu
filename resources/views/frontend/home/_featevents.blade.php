<style>
/* Vertical Event Cards */
.event-card {
    display: flex;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 12px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.event-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.event-date {
    background-color: #186152;
    color: #ffffff;
    text-align: center;
    padding: 10px 5px;
    width: 80px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.event-date .month {
    font-size: 0.8rem;
    font-weight: 600;
}

.event-date .day {
    font-size: 1.4rem;
    font-weight: bold;
    margin: 2px 0;
}

.event-date .year {
    font-size: 0.75rem;
    color: #f4f4f4;
}

.event-content {
    padding: 10px 12px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.event-content .time {
    font-size: 0.8rem;
    color: #555;
    margin-bottom: 4px;
}

.event-content .title {
    font-size: 1rem;
    font-weight: 600;
    color: #003a2e;
}

.event-no-upcoming {
    font-size: 0.9rem;
    color: #555;
    text-align: center;
    padding: 10px;
}
</style>

<ul class="list-group list-group-flush p-0">
    @if($events = App\Event::orderBy('event_date','asc')->get())
        @php $hasUpcoming = false; @endphp
        @foreach($events as $event)
            @if(\Carbon\Carbon::parse($event->event_date)->gte(\Carbon\Carbon::now()))
                @php $hasUpcoming = true; @endphp
                <li class="list-group-item bg-transparent p-0">
                    <div class="event-card">
                        <div class="event-date">
                            <div class="month">{{ date('M', strtotime($event->event_date)) }}</div>
                            <div class="day">{{ date('d', strtotime($event->event_date)) }}</div>
                            <div class="year">{{ date('Y', strtotime($event->event_date)) }}</div>
                        </div>
                        <div class="event-content">
                            <div class="time"><i class="fa fa-clock-o"></i> {{ date('h:i A', strtotime($event->event_date)) }}</div>
                            <div class="title">{{ $event->title }}</div>
                        </div>
                    </div>
                </li>
            @endif
        @endforeach

        @if(!$hasUpcoming)
            <li class="list-group-item bg-transparent p-0">
                <div class="event-no-upcoming">
                    <i class="fa fa-calendar-o" style="font-size:1.6rem; color:#ccc; display:block; margin-bottom:6px;"></i>
                    No upcoming events at this time.
                </div>
            </li>
        @endif
    @else
        <li class="list-group-item bg-transparent p-0">
            <div class="event-no-upcoming">No events found.</div>
        </li>
    @endif
</ul>
<div style="text-align:center; padding: 10px 0 4px;">
    <a href="{{ route('events') }}" style="display:inline-flex; align-items:center; gap:6px; background:linear-gradient(135deg,#186152,#0e3d32); color:#fff; font-size:0.8rem; font-weight:700; padding:7px 20px; border-radius:25px; text-decoration:none; transition:background 0.25s, transform 0.2s; box-shadow:0 3px 8px rgba(24,97,82,0.3);"
       onmouseover="this.style.background='linear-gradient(135deg,#0052a5,#003d7a)'; this.style.transform='translateY(-2px)'"
       onmouseout="this.style.background='linear-gradient(135deg,#186152,#0e3d32)'; this.style.transform='none'">
        <i class="fa fa-calendar-check-o"></i> View All Events
    </a>
</div>
