@extends('layouts.app')

@section('content')
    <h1 class="page-title">Create New Codex Entry</h1>

    {{-- Inclusion du fragment --}}
    @include('outline.codex.fragments.create-codex-form')
@endsection
