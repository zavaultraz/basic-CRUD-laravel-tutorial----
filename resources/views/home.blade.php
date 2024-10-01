@extends('admin.include.parent')
@section('content')

<div class="card">
    <div class="container p-4">
        <h1 class="text-center">Welcome, {{ Auth::user()->name }} <i class="bi bi-person-check-fill"></i></h1>
        <hr>

        <div class="card p-2 text-center">
            <h2 class="fw-bold fs-2" style="color: #012970;">Semangat 🫡</h2>
            <h1><strong><span id="clock"></span></strong></h1>
        </div>

        <div class="p-2 mt-4">
            <h3 class="text-center text-uppercase"><strong>{{ Auth::user()->name }} INFO <i class="bi bi-person-circle"></i></strong></h3>
            <ul class="list-group">
                <li class="list-group-item" aria-current="true">Username: <strong>{{ Auth::user()->name }}</strong></li>
                <li class="list-group-item">Email: <strong>{{ Auth::user()->email }}</strong></li>
                <li class="list-group-item">Title: <strong>{{ Auth::user()->role }}</strong></li>
            </ul>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk mengambil waktu saat ini dan memperbarui elemen HTML dengan ID 'clock'
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        document.getElementById('clock').innerText = hours + ':' + minutes + ':' + seconds;

        setTimeout(updateClock, 1000); // Memperbarui setiap 1 detik
    }

    // Memanggil fungsi updateClock saat halaman dimuat
    window.onload = updateClock;
</script>

@endsection