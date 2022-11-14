@section('title', 'Dashboard')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="cat__content">
    <h1>1234567890</h1>
</div>
@include('components/footer')
