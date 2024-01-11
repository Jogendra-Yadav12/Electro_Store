@extends('layouts.app')

@section('content')

<x-productdetail :product="$ca" title="Computer Accessories" :brand="$brand"  :wish="$wish" :count="$count"/>
@include('bannerbottom')
@endsection