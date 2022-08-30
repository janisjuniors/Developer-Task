@component('mail::message')
Confirmation

Item price is {{ $itemPrice / 100 }} EUR

@if($itemPrice / 100 >= 50)
Purchase failed!
@else
Purchase was successful!
@endif

@endcomponent
