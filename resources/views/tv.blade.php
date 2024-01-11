@extends('layouts.app')
@section('content')

<x-productdetail :product="$tv" title="Television & Audio" :brand="$brand" :wish="$wish" :count="$count"/>
@include('bannerbottom')
@endsection
