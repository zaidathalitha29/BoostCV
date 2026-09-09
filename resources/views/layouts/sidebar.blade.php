<div class="col-md-3 col-lg-2 bg-light p-3 min-vh-100">

    <h5>BoostCV</h5>
    <hr>

    @if(auth()->user()->role == 'admin')

        <a href="/admin/dashboard" class="d-block mb-3">
            Dashboard
        </a>

        <a href="#" class="d-block mb-3">
            Users
        </a>

        <a href="#" class="d-block mb-3">
            Creators
        </a>

        <a href="#" class="d-block mb-3">
            Categories
        </a>

        <a href="#" class="d-block mb-3">
            Services
        </a>

        <a href="#" class="d-block mb-3">
            Orders
        </a>

        <a href="#" class="d-block mb-3">
            Payments
        </a>

    @elseif(auth()->user()->role == 'creator')

        <a href="/creator/dashboard" class="d-block mb-3">
            Dashboard
        </a>

        <a href="#" class="d-block mb-3">
            Profil Saya
        </a>

        <a href="#" class="d-block mb-3">
            Layanan Saya
        </a>

        <a href="#" class="d-block mb-3">
            Portfolio
        </a>

        <a href="#" class="d-block mb-3">
            Pesanan Masuk
        </a>

    @else

        <a href="/customer/dashboard" class="d-block mb-3">
            Dashboard
        </a>

        <a href="#" class="d-block mb-3">
            Cari Layanan
        </a>

        <a href="#" class="d-block mb-3">
            Creator
        </a>

        <a href="#" class="d-block mb-3">
            Buat Pesanan
        </a>

        <a href="#" class="d-block mb-3">
            Pesanan Saya
        </a>

    @endif

</div>