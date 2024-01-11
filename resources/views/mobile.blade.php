@extends('layouts.app')
@section('content')

<x-productdetail :product="$mobile" title="Mobiles" :brand="$brand" :wish="$wish" :count="$count"/>

@include('bannerbottom')
@endsection