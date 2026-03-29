<style type="text/css">
    .ul-events{list-style: none;position: relative;left: -19px;width: 100%;}
    .ul-events tr.venue{font-size: 0.8em;}
    .events-container img{width: 100%; height: auto;float: left;padding-right: 10px;}
    .events-container img:hover{width: 500px}
    .events-container{border: aliceblue 2px solid;padding: 13px;}
    .events-container h6{color: #a90423b8;line-height: 1.2;}
</style>
<div ng-controller="eventsrndm" style="max-width: 248px;min-width: 261px;">
    <h6 class="title-h6-d"><i class="fa fa-calendar-check-o"></i> More Events</h6>
    <ul class="ul-events">
        <li ng-repeat="event in rndmlist">
            <table style="border: none;" class="events-container">
                <tr>
                    <td style="width:100%;">
                       <img ng-src="@{{ url }}/images/events/@{{ event.photo }}">
                    </td>
                </tr>
                <tr class="venue">
                    <td>
                        <h6><a ng-href="@{{ url }}/events/@{{ event.id }}/@{{ event.title }}">
                            @{{ event.title }}
                        </a></h6>
                        @{{ event.venue }}
                        <p>
                            @{{ event.event_date }} 
                            <span ng-if="event.enddate"> and more</span>
                        </p>
                    </td>
                </tr>
            </table>
        </li>
    </ul> 
<table style="border: none;" class="events-container" ng-if="rndmlist.length > 5">
    <tr>
        <td>
            <a href="{{ route('events') }}">More Events</a>
        </td>
    </tr>
</table>
</div>