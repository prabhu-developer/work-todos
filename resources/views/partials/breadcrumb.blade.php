<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst(str_replace('.',' / ' , request()->route()->getName())) }}</li>
    </ol>
</nav>