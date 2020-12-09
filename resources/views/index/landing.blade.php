@extends('layouts.layout')

@section('content')
<x-covid />
<x-header menu="true" />
<x-carousel id="home-carousel" />
<x-searcher />
<img src="/assets/images/arrow-down-navigation.gif" class="scroll-down">
<x-featured />
<x-venues />
<x-clients />
<x-contact />
<x-footer />
@endsection