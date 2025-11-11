@extends('layouts.app')

@section('content')
    <h1 class="page-title">Codex</h1>

    {{-- Inclusion du fragment --}}
    @include('outline.codex.fragments.codex-entry-list')
@endsection
