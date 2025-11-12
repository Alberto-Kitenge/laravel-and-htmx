@extends('layouts.app')

@section('content')
    <h1 class="page-title">Chapter Details</h1>

    {{-- Inclusion du fragment --}}
    @include('outline.chapters.fragments.chapter-details')
@endsection
