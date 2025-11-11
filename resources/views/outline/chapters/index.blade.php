@extends('layouts.app')

@section('content')
    <h1 class="page-title">Chapters Timeline</h1>

    {{-- Inclusion du fragment --}}
    @include('outline.chapters.fragments.chapter-list')
@endsection
