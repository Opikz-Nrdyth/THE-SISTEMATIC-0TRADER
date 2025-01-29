@extends('layouts.app')
@section('title', 'Referals')
@section('route', end($route))

@section('content')
    <x-breadcrumb :route="$route" title="{{ $title }}" />
    <livewire:tabel title='Virtual Balance [{{auth()->user()->userData->type_currency ? Auth::user()->userData->type_currency : "IDR"}} {{ $totalBalance }}]' action="{{ true }}"
        searchbar="{{ true }}" :header="$header" :colum="$colum" :searchableHeaders="$filtered" />
@endsection
