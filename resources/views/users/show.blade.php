@extends('layout.app')
@section('title',$user->name)  

@section('content')


<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        @include('Shared.success-message')
        <div class="mt-3">
            @include('users.shared.user-card')
        </div>
        @forelse ($ideas as $idea)
            <div class="mt-3">
                @include('ideas.shared.idea-card')
            </div>
        @empty
            <p class="text-center my-3">No Results Found.</p>
        @endforelse
        <div class="mt-3">
            {{$ideas->withquerystring()->links()}}
        </div>
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
</div>

@endsection