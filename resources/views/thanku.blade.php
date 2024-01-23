@extends('layouts.app')
@section('content')

@if (Session::has('status'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success !!',
                text: '{{ Session::get('status') }}',
                showConfirmButton: false,
                timer: 2000  // Auto-close after 3 seconds
            });
        });
    </script>
@endif

<article class="bg-secondary mb-3 p-5">  
<div class="card-body text-center">
<h4 class="text-white">Thank you for Purchase !!<br></h4>
<br>
<p><a class="btn btn-warning" href="/"> Continue Shopping 
 <i class="fa fa-window-restore "></i></a></p>
</div>

</article>

@include('bannerbottom')
@endsection