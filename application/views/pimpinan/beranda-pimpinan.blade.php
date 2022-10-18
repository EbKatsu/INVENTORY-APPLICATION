@extends('template.layout-pimpinan')
@section('judul','Beranda')
@section('header','sb-admin/img/Logo.png')
@section('content')
<style>


* {
	margin: 0;
	padding: 0;
}
.container {
	width: 1024px;
	margin: 2em auto;
	
}

.slider-wrapper {
	width: 100%;
	height: 400px;
	position: relative;
}

.slide {
	float: left;
	position: absolute;
	width: 100%;
	height: 100%;
	opacity: 0;
	transition: opacity 3s linear;
}

.slider-wrapper > .slide:first-child {
	opacity: 1;
}

* {
	margin: 0;
	padding: 0;
}
.container {
	width: 1200px;
	margin: 2em auto;
	
}
 
.slider-wrapper {
	width: 100%;
	height: 400px;
	position: relative;
}
 
.slide {
	float: left;
	position: absolute;
	width: 100%;
	height: 100%;
	opacity: 0;
	transition: opacity 3s linear;
}
 
.slider-wrapper > .slide:first-child {
	opacity: 1;

}
</style>

<div class="container" id="slider-utama">
	<div class="slider-wrapper">
		<img src="../sb-admin/img/slide1.png" class="slide" />
		<img src="../sb-admin/img/slide2.png" class="slide" />
		<img src="../sb-admin/img/slide3.png" class="slide" />
		<img src="../sb-admin/img/slide4.png" class="slide" />
		<img src="../sb-admin/img/slide5.png" class="slide" />
		<img src="../sb-admin/img/slide6.png" class="slide" />
		<img src="../sb-admin/img/slide7.png" class="slide" />
		<img src="../sb-admin/img/slide8.png" class="slide" />
		<img src="" class="slide" />
	</div>
</div>


<script type="text/javascript">
		(function() {
	
	function Slideshow( element ) {
		this.el = document.querySelector( element );
		this.init();
	}
	
	Slideshow.prototype = {
		init: function() {
			this.wrapper = this.el.querySelector( ".slider-wrapper" );
			this.slides = this.el.querySelectorAll( ".slide" );
			this.index = 0;
			this.total = this.slides.length;
			this.timer = null;
			
			this.action();
			this.stopStart();	
		},
		_slideTo: function( slide ) {
			var currentSlide = this.slides[slide];
			currentSlide.style.opacity = 1;
			
			for( var i = 0; i < this.slides.length; i++ ) {
				var slide = this.slides[i];
				if( slide !== currentSlide ) {
					slide.style.opacity = 0;
				}
			}
		},
		action: function() {
			var self = this;
			self.timer = setInterval(function() {
				self.index++;
				if( self.index == self.slides.length ) {
					self.index = 0;
				}
				self._slideTo( self.index );
				
			}, 3000);
		},
		stopStart: function() {
			var self = this;
			self.el.addEventListener( "mouseover", function() {
				clearInterval( self.timer );
				self.timer = null;
				
			}, false);
			self.el.addEventListener( "mouseout", function() {
				self.action();
				
			}, false);
		}
		
		
	};
	
	document.addEventListener( "DOMContentLoaded", function() {
		
		var slider = new Slideshow( "#slider-utama" );
		
	});
	
	
})();
 
	</script> 
@endsection
	