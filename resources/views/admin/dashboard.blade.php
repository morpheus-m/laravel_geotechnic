@extends('layout.admin')

@section('page-title','داشبورد')

@section('scripts')

    <script>
        @if(session('geotechnic-created-success'))
        Swal.fire({
            icon: 'success',
            title: 'عملیات موفق',
            text: "{{session('geotechnic-created-success')}}",
        })
        @endif

    </script>
@endsection
