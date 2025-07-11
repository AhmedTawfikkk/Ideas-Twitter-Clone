<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{Route::is('dashboard')?'text-white bg-primary rounded' : ''}} nav-link" href="{{route('dashboard')}}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="{{Route::is('Feed')?'text-white bg-primary rounded' : ''}} nav-link" href="{{route('Feed')}}">
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
            <a class="{{Route::is('terms')?'text-white bg-primary rounded' : ''}} nav-link" href="{{route('terms')}}">
                    <span>Terms</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href="{{ route('lang','en') }}">en </a>
        <a class="btn btn-link btn-sm" href="{{ route('lang','es') }}">es </a>
    </div>
</div>