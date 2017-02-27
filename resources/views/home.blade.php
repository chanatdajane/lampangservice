@extends('app')
@section('title', 'Dashboard')
@section('topic', 'Home')

@section('content')
	<button class="col-sm-5 dashboard-txt" onclick="location.href = 'route';"><div>เส้นทางการเดินทาง</div></button>
    <button class="col-sm-5 dashboard-txt" onclick="location.href = 'event';"><div>กิจกรรม</div></button>
    <button class="col-sm-5 dashboard-txt" onclick="location.href = 'place';"><div>สถานที่</div></button>
    <button class="col-sm-5 dashboard-txt" onclick="location.href = 'category';"><div>หมวดหมู่</div></button>
<style>
	.dashboard-txt{
		height: 300px;
    	margin: 10px;
    	border-color:#6CF;
	    border-style:solid;
	    background: rgb(254,255,255);
	    background: -moz-linear-gradient(top,  rgba(254,255,255,1) 0%, rgba(210,235,249,1) 100%); /* FF3.6+ */
	    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(254,255,255,1)), color-stop(100%,rgba(210,235,249,1))); /* Chrome,Safari4+ */
	    background: -webkit-linear-gradient(top,  rgba(254,255,255,1) 0%,rgba(210,235,249,1) 100%); /* Chrome10+,Safari5.1+ */
	    background: -o-linear-gradient(top,  rgba(254,255,255,1) 0%,rgba(210,235,249,1) 100%); /* Opera 11.10+ */
	    background: -ms-linear-gradient(top,  rgba(254,255,255,1) 0%,rgba(210,235,249,1) 100%); /* IE10+ */
	    background: linear-gradient(to bottom,  rgba(254,255,255,1) 0%,rgba(210,235,249,1) 100%); /* W3C */
	    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#feffff', endColorstr='#d2ebf9',GradientType=0 ); /* IE6-9 */
	    /* จบ ส่วนของ gradient */
	    /* ส่วนการแสดง ผล radius*/
	    -webkit-border-radius: 5px;
	    border-radius: 5px; 
	}
	.dashboard-txt div{
		font-size:30px;
		text-align: center;
		line-height: 300px;
	}
</style>
@endsection
