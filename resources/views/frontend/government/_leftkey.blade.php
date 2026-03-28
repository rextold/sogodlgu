<link rel="stylesheet" type="text/css" href="{{ asset('css/home/events.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/home/ribbon.css') }}">
<div class="callout secondary">	
    <div class="ribbon2 both_ribbon2">
        <h2>Mayor</h2>
    </div>
     <table style="border: none;">
        @if(!empty($mayor))
            <tr>
                <td>
                    @if($mayor->photo)
                        <img src="{{ asset('images/officials/'.$mayor->photo) }}" class="keyofficials-img" alt="{{ $mayor->name }}">
                    @else
                        <img src="{{ asset('images/officials/nophoto.jpg') }}" class="keyofficials-img" alt="{{ $mayor->name }}">
                    @endif
                    <div class="keyofficials-card">
                        <h6 style="color: goldenrod;">{{ $mayor->name }}</h6>
                        <p>{{ $mayor->position }}</p>
                        <div><i class="fa fa-mobile"></i> {{ $mayor->mobile }}</div>
                        <div><i class="fa fa-phone"></i>  {{ $mayor->telephone }}</div>
                        <div><i class="fa fa-envelope"></i> {{ $mayor->email }}</div>
                    </div>
                </td>
            </tr>
        @endif
    </table>
    <div class="ribbon2 both_ribbon2">
        <h2>Vice Mayor</h2>
    </div>
    <table style="border: none;">
        @if(!empty($vicemayor))
            <tr>
                <td>
                    @if($vicemayor->photo)
                        <img src="{{ asset('images/officials/'.$vicemayor->photo) }}" class="keyofficials-img" alt="{{ $vicemayor->name }}">
                    @else
                        <img src="{{ asset('images/officials/nophoto.jpg') }}" class="keyofficials-img" alt="{{ $vicemayor->name }}">
                    @endif
                    <div class="keyofficials-card">
                        <h6 style="color: goldenrod;">{{ $vicemayor->name }}</h6>
                        <p>{{ $vicemayor->position }}</p>
                        <div><i class="fa fa-mobile"></i> {{ $vicemayor->mobile }}</div>
                        <div><i class="fa fa-phone"></i>  {{ $vicemayor->telephone }}</div>
                        <div><i class="fa fa-envelope"></i> {{ $vicemayor->email }}</div>
                    </div>
                </td>
            </tr>
        @endif
    </table>
    <div class="ribbon2 both_ribbon2">
        <h2>Sangguniang Bayan</h2>
    </div>
        <table style="border: none;">
        @foreach($keyofficials as $keyofficial)
                <tr>
                <td>
                    @if($keyofficial->photo)
                        <img src="{{ asset('images/officials/'.$keyofficial->photo) }}" class="keyofficials-img" alt="{{ $keyofficial->name }}">
                    @else
                        <img src="{{ asset('images/officials/nophoto.jpg') }}" class="keyofficials-img" alt="{{ $keyofficial->name }}">
                    @endif
                    <div class="keyofficials-card">
                        <h6 style="color: goldenrod;">{{ $keyofficial->name }}</h6>
                        <p>{{ $keyofficial->position }}</p>
                        <div><i class="fa fa-mobile"></i> {{ $keyofficial->mobile }}</div>
                        <div><i class="fa fa-phone"></i>  {{ $keyofficial->telephone }}</div>
                        <div><i class="fa fa-envelope"></i> {{ $keyofficial->email }}</div>
                    </div>
                </td>
            </tr>
        @endforeach
        </table>
    </div>