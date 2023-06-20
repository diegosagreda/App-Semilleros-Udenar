@extends('layouts/layoutMaster')

@section('title', 'Sticky Actions - Forms')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/jquery-sticky/jquery-sticky.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
@endsection



@section('content')
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inspiration for Pricing Tables | Codrops</title>
    <meta name="description" content="Various styles and inspiration for responsive, flexbox-based HTML pricing tables" />
    <meta name="keywords" content="pricing table, inspiration, ui, modern, responsive, flexbox, html, component" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Homemade+Apple' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sahitya:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
    
    <!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
    <div class="container">
        <header class="codrops-header">
            <h1>Proyectos</h1>
            
            <span>--------------------------------------</span>
            <span>


            </span>
            <a class="btn btn-outline-light" href="/proyectos/create">Agregar Proyecto</a>
           
        </header>
        <section class="pricing-section bg-1">
          <div class="pricing pricing--sonam">
            @foreach($proyectos as $proyecto)
            <div class="pricing__item">
              <h3 class="pricing__title">{{$proyecto->nomProyecto}}</h3>
              <div class="pricing__details">
                <div class="pricing__price">
                  <span class="pricing__highlight">{{$proyecto->tipoProyecto}}</span>
                </div>
                <p class="pricing__description">{{$proyecto->estProyecto}}</p>
                <div class="pricing__dates">
                  <p class="pricing__date"><span class="pricing__label">Inicio:</span> <span class="pricing__date-value">{{$proyecto->fecha_inicioPro}}</span></p>
                  <p class="pricing__date"><span class="pricing__label">Fin:</span> <span class="pricing__date-value">{{$proyecto->fecha_finPro}}</span></p>
                </div>
              </div>
              <div class="pricing__actions">
                <button class="pricing__action">Seleccionar</button>
                <button class="pricing__action" onclick="eliminarProyecto({{$proyecto->id}})">Eliminar</button>
              </div>
            </div>
            @endforeach
          </div>
        </section>
        
        
        
        
        
        <!-- Related demos -->
        <section class="content content--related">
            <p>Universidad de Nariño</p>
            <h3 class="media-item__title">San juan de Pasto</h3>
            <h3 class="media-item__title">&copy;2023</h3>
           
        </section>
    </div>
    <!-- /container -->
</body>

</html>

<style>
  /* Common styles */

.pricing {
	display: -webkit-flex;
	display: flex;
	-webkit-flex-wrap: wrap;
	flex-wrap: wrap;
	-webkit-justify-content: center;
	justify-content: center;
	width: 100%;
	margin: 0 auto 3em;
}

.pricing__item {
	position: relative;
	display: -webkit-flex;
	display: flex;
	-webkit-flex-direction: column;
	flex-direction: column;
	-webkit-align-items: stretch;
	align-items: stretch;
	text-align: center;
	-webkit-flex: 0 1 330px;
	flex: 0 1 330px;
}

.pricing__feature-list {
	text-align: left;
}

.pricing__action {
	color: inherit;
	border: none;
	background: none;
}

.pricing__action:focus {
	outline: none;
}

/* Individual styles */

/* Sonam */
.pricing--sonam .pricing__item {
	margin: 1em;
	padding: 2em;
	cursor: default;
	border-radius: 10px;
	background: #1F1F1F;
	box-shadow: 0 5px 20px rgba(0,0,0,0.05), 0 15px 30px -10px rgba(0,0,0,0.3);
	-webkit-transition: background 0.3s;
	transition: background 0.3s;
}

.pricing--sonam .pricing__item:hover {
	background: #141315;
}

.pricing--sonam .pricing__title {
	font-size: 2em;
	width: 100%;
	margin: 0 0 0.25em;
	padding: 0 0 0.5em;
	border-bottom: 3px solid rgb(27, 26, 28);
}

.pricing--sonam .pricing__price {
	color: #E06060;
	font-size: 1.75em;
	padding: 1em 0 0.75em;
}

.pricing--sonam .pricing__sentence {
	font-weight: bold;
}

.pricing--sonam .pricing__feature-list {
	margin: 0;
	padding: 1em 1.25em 2em;
}

.pricing--sonam .pricing__action {
	font-weight: bold;
	margin-top: auto;
	padding: 0.75em 2em;
	border-radius: 5px;
	background: #E06060;
	-webkit-transition: background 0.3s;
	transition: background 0.3s;
}

.pricing--sonam .pricing__action:hover,
.pricing--sonam .pricing__action:focus {
	background: #BD3C3C;
}

/* Jinpa */
.pricing--jinpa .pricing__item {
	font-family: 'Sahitya', serif;
	margin: 1.5em 0;
	padding: 2em;
	cursor: default;
	color: #fff;
	border: 1px solid #CBFFC8;
	-webkit-transition: background-color 0.6s, color 0.3s;
	transition: background-color 0.6s, color 0.3s;
}

.pricing--jinpa .pricing__item:nth-child(2) {
	border-right: none;
	border-left: none;
}

.pricing--jinpa .pricing__item:hover {
	color: #e6a9a9;
	background: #CBFFC8;
}

.pricing--jinpa .pricing__title {
	font-size: 2em;
	width: 100%;
	margin: 0;
	padding: 0;
}

.pricing--jinpa .pricing__price {
	font-size: 1.45em;
	font-weight: bold;
	line-height: 95px;
	width: 100px;
	height: 100px;
	margin: 1.15em auto 1em;
	border-radius: 50%;
	background: #ea716e;
	-webkit-transition: color 0.3s, background 0.3s;
	transition: color 0.3s, background 0.3s;
}

.pricing--jinpa .pricing__item:first-child .pricing__price {
	background: #eac36e;
}

.pricing--jinpa .pricing__item:nth-child(2) .pricing__price {
	background: #eaa36e;
}

.pricing--jinpa .pricing__item:hover .pricing__price {
	color: #fff;
	background: #82C57E;
}

.pricing--jinpa .pricing__sentence {
	font-weight: bold;
}

.pricing--jinpa .pricing__feature-list {
	margin: 0;
	padding: 1em 1em 2em 1em;
	list-style: none;
	text-align: center;
}

.pricing--jinpa .pricing__action {
	font-weight: bold;
	margin-top: auto;
	padding: 0.75em 2em;
	opacity: 0;
	color: #fff;
	background: #82C57E;
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
	-webkit-transform: translate3d(0, -15px, 0);
	transform: translate3d(0, -15px, 0);
}

.pricing--jinpa .pricing__item:hover .pricing__action {
	opacity: 1;
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}

.pricing--jinpa .pricing__action:hover,
.pricing--jinpa .pricing__action:focus {
	background: #6EA76B;
}

@media screen and (max-width: 60em) {
	.pricing--jinpa .pricing__item {
		max-width: none;
		width: 90%;
		flex: none;
	}
	.pricing--jinpa .pricing__item:nth-child(2) {
		border: 1px solid #fff;
	}
}

/* Tenzin */
.pricing--tenzin .pricing__item {
	margin: 1em;
	padding: 2em 2.5em;
	text-align: left;
	color: #262b38;
	background: #EEF0F3;
	border-top: 3px solid #EEF0F3;
	-webkit-transition: border-color 0.3s;
	transition: border-color 0.3s;
}

.pricing--tenzin .pricing__item:hover {
	border-color: #3e62e0;
}

.pricing--tenzin .pricing__title {
	font-size: 1em;
	margin: 0 0 1em;
}

.pricing--tenzin .pricing__price {
	font-size: 2em;
	font-weight: bold;
	padding: 0.5em 0 0.75em;
	border-top: 3px solid rgba(139, 144, 157, 0.18);
}

.pricing--tenzin .pricing__currency {
	font-size: 0.5em;
	vertical-align: super;
}

.pricing--tenzin .pricing__sentence {
	font-weight: bold;
	padding: 0 0 0.5em;
	color: #9CA0A9;
	border-bottom: 3px solid rgba(139, 144, 157, 0.18);
}

.pricing--tenzin .pricing__feature-list {
	font-size: 0.85em;
	font-style: italic;
	margin: 0;
	padding: 0.25em 0 2.5em;
	list-style: none;
	text-align: right;
	color: #8b909d;
}


@font-face {
	font-weight: normal;
	font-style: normal;
	font-family: 'codropsicons';
	src:url('../fonts/codropsicons/codropsicons.eot');
	src:url('../fonts/codropsicons/codropsicons.eot?#iefix') format('embedded-opentype'),
		url('../fonts/codropsicons/codropsicons.woff') format('woff'),
		url('../fonts/codropsicons/codropsicons.ttf') format('truetype'),
		url('../fonts/codropsicons/codropsicons.svg#codropsicons') format('svg');
}

*, *:after, *:before { -webkit-box-sizing: border-box; box-sizing: border-box; }
.clearfix:before, .clearfix:after {display: table;  content: ''; }
.clearfix:after { clear: both; }

body {
	font-family: "Avenir Next", Avenir, 'Helvetica Neue', 'Lato', 'Segoe UI', Helvetica, Arial, sans-serif;
	color: #444;
	background: #fff;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

a {
	outline: none;
	color: #63f8d3;
	text-decoration: none;
}

a:hover, a:focus {
	color: #57d8b8;
}

.hidden {
	position: absolute;
	overflow: hidden;
	width: 0;
	height: 0;
	pointer-events: none;
}

/* Content */
.content {
	padding: 3em 0;
}

.intro {
	padding: 1em;
	max-width: 1000px;
	text-align: center;
	font-size: 2em;
}

.codrops-header,
.pricing-section {
	min-height: 100vh;
	display: -webkit-flex;
	display: flex;
	-webkit-flex-direction: column;
	flex-direction: column;
	-webkit-justify-content: center;
	justify-content: center;
	-webkit-align-items: center;
	align-items: center;
}

.pricing-section {
	padding: 2em 0 8em;
	min-height: 100vh;
	position: relative;
}

.pricing-section__title {
	font-size: 1.4em;
	font-weight: 700;
	margin: 3em 0 5em;
	flex: none;
}

.pricing-section a {
	color: #333;
}

.pricing-section a:hover, 
.pricing-section a:focus {
	color: #000;
}

/* Header */
.codrops-header {
    padding: 2em 1em 4em;
    color: #fff;
    height: 20vh;
    min-height: 300px;
    text-align: center;
    background: #292727 url(../img/mouse.svg) no-repeat left 50% bottom 40px;
    transition: background 0.5s ease; /* Agrega la transición con duración de 0.5 segundos y una función de aceleración */
}


.codrops-header h1 {
	margin: 0.5em 0 0;
	letter-spacing: -1px;
	font-size: 4em;
	line-height: 1;
}

.codrops-header h1 span {
	font-weight: normal;
	display: block;
	margin: 0.5em 0;
	font-size: 50%;
	letter-spacing: 0;
	color: #d2d5d4;
}

/* Top Navigation Style */
.codrops-links {
	position: relative;
	display: inline-block;
	text-align: center;
	white-space: nowrap;
}

.codrops-links::after {
	position: absolute;
	top: 0;
	left: 50%;
	width: 1px;
	height: 100%;
	background: rgba(255,255,255,0.2);
	content: '';
	-webkit-transform: rotate3d(0,0,1,22.5deg);
	transform: rotate3d(0,0,1,22.5deg);
}

.codrops-icon {
	display: inline-block;
	margin: 0.5em;
	padding: 0em 0;
	width: 1.5em;
	text-decoration: none;
}

.codrops-icon span {
	display: none;
}

.codrops-icon:before {
	margin: 0 5px;
	text-transform: none;
	font-weight: normal;
	font-style: normal;
	font-variant: normal;
	font-family: 'codropsicons';
	line-height: 1;
	speak: none;
	-webkit-font-smoothing: antialiased;
}

.codrops-icon--drop:before {
	content: "\e001";
}

.codrops-icon--prev:before {
	content: "\e004";
}

/* Demo links */
.codrops-demos {
	margin: 2em 0 0;
}

.codrops-demos a {
	display: inline-block;
	margin: 0 0.5em;
}

.codrops-demos a.current-demo {
	color: #333;
}

.bg-1 {
  background: linear-gradient(45deg, #ece9ee, #a8a4a9);
    background-size: cover;
    color: #fff;
    transition: background 0.5s ease;
}

.bg-2 {
	background: #333 url(../img/blackboard.jpg) no-repeat center center;
	background-size: cover;
	color: #b1b1b1;
  
}


/* Related demos */
.content--related {
	text-align: center;
	font-weight: bold;
	padding: 3em 1em;
	background: #080808;
  border-top: solid thin #5f6d7e;
  margin-bottom: -4px!important; /* Fix for IE bug with negative margins and fixed positioning (see http://stackoverflow.com/questions/1170364)*/
}

.media-item {
	display: inline-block;
	padding: 1em;
	vertical-align: top;
	-webkit-transition: color 0.3s;
	transition: color 0.3s;
}

.media-item__img {
	max-width: 100%;
	opacity: 0.6;
	-webkit-transition: opacity 0.3s;
	transition: opacity 0.3s;
}

.media-item:hover .media-item__img,
.media-item:focus .media-item__img {
	opacity: 1;
}

.media-item__title {
	margin: 0;
	padding: 0.5em;
	font-size: 1em;
}

@media screen and (max-width: 50em) {
	.codrops-header {
		padding: 3em 10% 4em;
	}
}

@media screen and (max-width: 40em) {
	.codrops-header h1 {
		font-size: 2.8em;
	}
}
</style>

@endsection