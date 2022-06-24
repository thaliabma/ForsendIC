@if(session()->has('message'))
    <div class="flash-wrapper">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif