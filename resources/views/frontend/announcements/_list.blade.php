<link rel="stylesheet" type="text/css" href="{{ asset('css/home/announcements.css') }}">
<div class="lgu-title-top"></div>
<h6 class="lgu2-title"><i class="fa fa-bullhorn"></i>Announcements</h6>
<div class="wrapper1" style="border: #e2ac46 1px solid; padding: 8px;" ng-controller="announcementsCtrl" >
    <div ng-if="announcements">
        <article>
            <ul style="list-style-type: circle;">
                <li ng-if="announcements.length < 1">
                    <h6>No announcements</h6>
                </li>
                <li class="announcementstr" ng-repeat="announcement in announcements">
                    <span style="font-size: 13px;color: #ab9b9b;">@{{ announcement.created_at | myDateFormat }}</span>
                    <a ng-href="@{{ url }}/advisories/announcement/@{{ announcement.id }}/@{{ announcement.title }}">
                        @{{ announcement.title }}
                    </a>
                </li>
            </ul>
        </article>
    </div>
</div>
<br>