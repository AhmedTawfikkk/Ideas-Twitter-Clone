@extends('layout.app')

@section('title','Dashboard')  

@section('content')


<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        @include('Shared.success-message')
        @include('ideas.Shared.idea-submit')
        <hr>
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
</div>

@endsection