<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="{{$user->GetImageUrl()}}" alt="Mario Avatar">
                <div>
                    @if ($editing ?? false)
                        <input name="user" value="{{$user->name}}" type="text" class="form-control">
                        @error('name')
                        <span class="text-danger fs-6">{{$message}}</span>
                        @enderror
                    @else
                        <h3 class="card-title mb-0"><a href="#"> {{$user->name}}
                            </a></h3>
                        <span class="fs-6 text-muted">{{$user->email}}</span>
                    @endif
                </div>
            </div>
            <div>
                @auth
                    @if(Auth::id() === $user->id)
                        <a href="{{route('users.edit', $user->id)}}">Edit</a>
                    @endif
                @endauth
            </div>
        </div>
        @if ($editing ?? false)
        <div class="mt-4">
            <label for="">Profile picture</label>
            <input type="file" name="image" class="form-control">
        </div>
        @endif
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            @if ($editing ?? false)
                <div class="mb-3">
                    <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
                    @enderror
                </div>

                <button class=" btn btn-dark btn-sm mb-3">Save</button>

            @else
                <p class="fs-6 fw-light">
                    {{$user->bio}}
                </p>
            @endif
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 0 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{$user->ideas()->count()}} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{$user->comments()->count()}} </a>
            </div>
            @auth
                @if(Auth::id() !== $user->id)
                    <div class="mt-3">
                        @if (Auth::user()->follows($user))
                        <form method="post" action="{{route('users.unfollow',$user->id)}}">
                            @csrf
                        <button type="submit" class="btn btn-danger btn-sm"> UnFollow </button>
                        </form>
                        @else
                        <form method="post" action="{{route('users.follow',$user->id)}}">
                            @csrf
                        <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                        </form>
                        @endif
                        
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
<hr>