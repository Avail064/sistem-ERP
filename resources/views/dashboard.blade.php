@extends('layouts.app')

@section('content')
<div class="container-fluid\">
    <div class="row">

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Selamat Datang di Dashboard</h1>
            </div>
            <p>Anda telah berhasil login. Silakan pilih modul dari sidebar.</p>
        </main>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Toggle sidebar
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');

        toggleButton.addEventListener('click', function() {
            sidebar.classList.toggle('collapse');
        });
    });

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</script>
@endsection
