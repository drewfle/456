@extends('layouts.pages')

@section('styles')
@parent
<style>
    #content-btm {
        height: 800px;
        min-height: 800px;
    }
</style>
@stop

@section('content-top')
@stop

@section('content-btm-left')
<h1 title>Admissions</h1>
<p> The diversity of the students, programs, curriculum, and locations only adds to the charm and uniqueness that speak of Columbia International College. With its East Coast Campus possessing a breathtaking view of the Statue of Liberty, and its Calabasas, California Campus within a minute's drive to the Leonis Adobe Museum in Los Angeles County.</p>
<p>CIC students can pursue their advanced business degrees at home or travel to China for their Bachelor's or Master's degrees; or even be a part of short-term specialized programs; including those in fashion taking place in Asia's "Fashion Capital" of Shanghai. </p>
<p>Whatever the ultimate objectives of our students are the entire Columbia International College team; locally, nationally and internationally, will be there for continued and permanent support, and to make sure each student triumphs. </p>
@stop


@section('pagenav')
@include('common.pagenav')
<?php
$menu = new PageNav();
$menu->generator('admissions', 0);
?>
@stop