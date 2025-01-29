@extends('layouts.app')
@section('title', 'Profits')
@section('route', end($route))

@section('content')
    <x-breadcrumb :route="$route" title="{{ $title }}" />
    <livewire:tabel title='Profits [ Total Profits : SGD 0]' action="{{ true }}" searchbar="{{ true }}"
        :header="$header" :colum="$colum" :searchableHeaders="$filtered" />
@endsection
