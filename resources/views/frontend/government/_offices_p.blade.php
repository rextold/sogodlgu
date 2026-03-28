<div style="font-family: initial; margin-bottom: 24px;">
    
    <ul class="list-inline">
        <li>
            <h3 style="font-family: initial;text-orientation: inherit;">{{ $breadcrumb }}</h3>
            Updated
            @if($updated_at)
                <span class="font-lato"><time datetime="2018-09-28T07:45:46+00:00">{{ date('jS F Y g:ia',strtotime($updated_at->created_at)) }}</time></span>
            @endif
        </li>      
    </ul>
</div>
<table class="w3-table w3-striped table" style="overflow-x: auto;">
        <tr>
          <th>Name of Incumbent</th>
          <th>Position Title</th>
        </tr>
          @foreach ($offices_p as $office)
        <tr>
          <td><a href="{{ route('offices_p',['id'=> $office->id,'office'=> $office->office]) }}">{{ $office->name_of_incumbent }}</a></td>
          <td>{{ $office->position_title }}</td>
        </tr>
        @endforeach
</table>
<div class="w3-right">
    {{ $offices_p->links('vendor.pagination.bootstrap-4') }}
</div>
