@extends('layouts.app')

@section('content')

<x-productdetail :product="$cc" title="Case & Cover" :brand="$brand" :wish="$wish" :count="$count" />
@include('bannerbottom')

@endsection