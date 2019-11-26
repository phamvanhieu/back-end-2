@if(Session::has('error'))
    <p class="alert alert-danger">{{Session::get('error')}}</p>
@endif
@if(Session::has('message'))
    <script> alert("{{Session::get('message')}}")</script>
@endif