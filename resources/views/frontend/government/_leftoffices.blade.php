<div style="font-family: initial; margin-bottom: 24px;">
   
    <ul class="list-inline">
        <li> 
            <h2 style="font-family: initial;">List of Offices</h2>
            Updated
            @if($updated_at)
                <span class="font-lato"><time datetime="2018-09-28T07:45:46+00:00">{{ date('jS F Y g:ia',strtotime($updated_at->created_at)) }}</time></span>
            @endif
        </li>      
    </ul>
</div>
<table class="w3-table w3-striped table" style="overflow-x: auto;">
        <tr>
          <th>Offices</th>
          <th>Office Head/Dept. Head</th>
          <th>Contact number</th>
        </tr>
          @foreach ($offices as $office)
        <tr>
          <td><a href="{{ route('offices_p',['id'=> $office->id,'office'=> $office->office]) }}">{{ $office->office }}</a></td>
          <td>{{ $office->office_head }}</td>
          <td>{{ $office->telephone }}</td>
        </tr>
        @endforeach
</table>
<div class="w3-right">
    {{ $offices->links('vendor.pagination.bootstrap-4') }}
</div>
