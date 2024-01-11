@extends('layouts.app')
@section('content')

<x-productdetail :product="$tab" title="Tablets" :brand="$brand" :wish="$wish" :count="$count" />
@include('bannerbottom')
@endsection