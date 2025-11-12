@extends('layouts.app')

@section('content')
    <h1 class="page-title">Create a New Chapter</h1>

    {{-- Inclusion du fragment --}}
    @include('outline.chapters.fragments.create-chapter-form')
@endsection
