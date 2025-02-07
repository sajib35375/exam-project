@php
$stores = \App\Models\Store::all();
 @endphp

<nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @foreach($stores as $store)
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('store.wise',$store->id) }}">{{ $store->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
