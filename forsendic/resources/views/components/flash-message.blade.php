@if(session()->has('message'))
    <div class="flash-wrapper">
        {{session('message')}}
    </div>
@endif