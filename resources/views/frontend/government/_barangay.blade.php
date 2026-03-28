<div class="w3-panel">
    <br>
    @foreach ($barangays as $barangay)
        <div class="barangay-name">
            Brgy. {{ $barangay->name }}
        </div>
        <div class="w3-panel">
            <img src="{{ asset('images/officials/profile.jpg') }}" alt="Avatar" class="w3-left w3-margin-right" style="max-width: 120px;">
            <div class="barangay-captain">
                <div class="info-title">Captain</div>  
                <h5>{{ $barangay->captain }}</h5>
            </div>
            <div class="barangay-number">
                <div class="info-title">Contact number</div>
                <h5>{{ $barangay->cellnumber }}</h5>
            </div>
        </div>
        <hr>
    @endforeach
    <div class="w3-right">
        {{ $barangays->links() }}
    </div>
</div>
