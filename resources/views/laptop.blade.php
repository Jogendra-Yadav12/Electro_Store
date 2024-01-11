@extends('layouts.app')

@section('content')

<x-productdetail :product="$laptop" title="Laptops" :brand="$brand" :wish="$wish" :count="$count" />
@include('bannerbottom')

@endsection