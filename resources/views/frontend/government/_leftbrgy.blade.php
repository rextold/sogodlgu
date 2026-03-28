<link rel="stylesheet" type="text/css" href="{{ asset('css/home/barangay.css') }}">
<!-- <div class="callout secondary">
 -->     
<div style="font-family: initial; margin-bottom: 24px;">
    
    <ul class="list-inline">
        <li>
            <h2 style="font-family: initial;">List of Barangay</h2>
            Updated on
            <span class="font-lato"><time datetime="2018-09-28T07:45:46+00:00">{{ date('jS F Y',strtotime($updated_at->created_at)) }}</time></span>
        </li>      
    </ul>
</div>
<table class="w3-table w3-striped table" style="overflow-x: auto;">
        <tr>
          <th>Name of Barangay</th>
          <th>Barangay Captain</th>
          <th>Contact number</th>
        </tr>
        @foreach ($barangays as $barangay)
        <tr style="text-transform: capitalize;">
          <td><a href="{{ route('showbarangay',['id'=>$barangay->id, 'barangay' => $barangay->name]) }}">{{ $barangay->name }}</a></td>
          <td>{{ $barangay->captain }}</td>
          <td>{{ $barangay->cellnumber }}</td>
        </tr>
        @endforeach
</table>
<div class="w3-right">
    {{ $barangays->links('vendor.pagination.bootstrap-4') }}
</div>