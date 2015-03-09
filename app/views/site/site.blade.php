
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <!-- BASICS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>LAB-Funtec</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/isotope.css') }}" media="screen" />
    <link rel="stylesheet" href="{{ asset('site/css/jquery.fancybox.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- skin -->
    <link rel="stylesheet" href="{{ asset('site/css/default.css') }}">
</head>

<body>
<section id="header" class="appear"></section>
<div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(0,0,0,1);">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="fa fa-bars color-white"></span>
            </button>
            <h1><a class="navbar-brand" href="#section-home" data-0="line-height:90px;" data-300="line-height:50px;">
                    LAB-FUNTEC
                </a></h1>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
                <li class="active"><a href="#section-home">Home</a></li>
                <li><a href="#section-about">Sobre</a></li>
                <li><a href="#section-works">Serviços</a></li>
                <li><a href="#section-contact">Contato</a></li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</div>

<section class="featured" id="section-home">
    <div class="container">
        <div class="row mar-bot40">
            <div class="col-md-6 col-md-offset-3">

                <div class="align-center">
                    <i class="fa fa-flask fa-5x mar-bot20"></i>
                    <h2 class="slogan">LAB - FUNTEC</h2>
                    <p>
                        Deixe-nos cuidar de seu solo!
                    </p>
                    <p>
                        Especializados em analises Química e Física.
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- services -->
<section id="section-services" class="section pad-bot30 bg-white">
    <div class="container">

        <div class="row mar-bot40">
            <div class="col-lg-4" >
                <div class="align-center">
                    <i class="fa fa-code fa-5x mar-bot20"></i>
                    <h4 class="text-bold">Seriedade</h4>
                    <p>
                        Todos os nossos trabalhos são realizados de maneira séria e independem de cliente para cliente.
                    </p>
                </div>
            </div>

            <div class="col-lg-4" >
                <div class="align-center">
                    <i class="fa fa-terminal fa-5x mar-bot20"></i>
                    <h4 class="text-bold">Compromiço</h4>
                    <p>
                        Nossa idéia é atender de forma fácil e com comprometimento com os prazos.
                    </p>
                </div>
            </div>

            <div class="col-lg-4" >
                <div class="align-center">
                    <i class="fa fa-bolt fa-5x mar-bot20"></i>
                    <h4 class="text-bold">Confiabilidade</h4>
                    <p>
                        Nosos clientes tem maior confiança nos nossos serviços prestados.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- spacer section:testimonial -->
<section id="testimonials" class="section" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="align-center">
                    <div class="testimonial pad-top40 pad-bot40 clearfix">
                        <h5>
                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum. In vitae nulla lacus. Sed sagittis tortor vel arcu sollicitudin nec tincidunt metus suscipit.Nunc velit risus, dapibus non interdum.
                        </h5>
                        <br/>
                        <span class="author">&mdash; LAB-FUNTEC <a href="#">www.labfuntec.com.br</a></span>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
</section>

<!-- about -->
<section id="section-about" class="section appear clearfix">
    <div class="container">

        <div class="row mar-bot40">
            <div class="col-md-offset-3 col-md-6">
                <div class="section-header">
                    <h2 class="section-heading animated" data-animation="bounceInUp">NOSSO TIME</h2>
                    <p>
                        Funcionários capacitados para um melhor atendimento a você cliente.
                    </p>
                </div>
            </div>
        </div>

        <div class="row align-center mar-bot40">
            <div class="col-md-3">

            </div>
            <div class="col-md-3">
                <div class="team-member">
                    <figure class="member-photo"><img src="{{ asset('site/img/logo.jpg') }}" alt="" /></figure>
                    <div class="team-detail">
                        <h4>Leonardo Felipe</h4>
                        <span>
                            Gerente
                            <br/>
                            Técnico Agrícola
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="team-member">
                    <figure class="member-photo"><img src="{{ asset('site/img/logo.jpg') }}" alt="" /></figure>
                    <div class="team-detail">
                        <h4>Vicky Tan</h4>
                        <span>Web designer</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3">

            </div>
        </div>

    </div>
</section>
<!-- /about -->

<!-- spacer section:stats -->
<section id="parallax1" class="section pad-top40 pad-bot40" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="align-center pad-top40 pad-bot40">
            <blockquote class="bigquote color-white">Indoctum accusamus comprehensam</blockquote>
            <p class="color-white">Bootstraptaste</p>
        </div>
    </div>
</section>

<!-- section works -->
<section id="section-works" class="section appear clearfix">
    <div class="container">

        <div class="row mar-bot40">
            <div class="col-md-offset-3 col-md-6">
                <div class="section-header">
                    <h2 class="section-heading animated" data-animation="bounceInUp">Portfolio</h2>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur, adipisci velit, sed quia non numquam.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <nav id="filter" class="col-md-12 text-center">
                <ul>
                    <li><a href="#" class="current btn-theme btn-small" data-filter="*">All</a></li>
                    <li><a href="#"  class="btn-theme btn-small" data-filter=".webdesign" >Web Design</a></li>
                    <li><a href="#"  class="btn-theme btn-small" data-filter=".photography">Photography</a></li>
                    <li ><a href="#" class="btn-theme btn-small" data-filter=".print">Print</a></li>
                </ul>
            </nav>
            <div class="col-md-12">
                <div class="row">
                    <div class="portfolio-items isotopeWrapper clearfix" id="3">

                        <article class="col-md-4 isotopeItem webdesign">
                            <div class="portfolio-item">
                                <img src="img/portfolio/img1.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <h5><a href="#">Portfolio name</a></h5>
                                        <a href="img/portfolio/img1.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-md-4 isotopeItem photography">
                            <div class="portfolio-item">
                                <img src="img/portfolio/img2.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <h5><a href="#">Portfolio name</a></h5>
                                        <a href="img/portfolio/img2.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>


                        <article class="col-md-4 isotopeItem photography">
                            <div class="portfolio-item">
                                <img src="img/portfolio/img3.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <h5><a href="#">Portfolio name</a></h5>
                                        <a href="img/portfolio/img3.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-md-4 isotopeItem print">
                            <div class="portfolio-item">
                                <img src="img/portfolio/img4.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <h5><a href="#">Portfolio name</a></h5>
                                        <a href="img/portfolio/img4.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-md-4 isotopeItem photography">
                            <div class="portfolio-item">
                                <img src="img/portfolio/img5.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <h5><a href="#">Portfolio name</a></h5>
                                        <a href="img/portfolio/img5.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-md-4 isotopeItem webdesign">
                            <div class="portfolio-item">
                                <img src="img/portfolio/img6.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <h5><a href="#">Portfolio name</a></h5>
                                        <a href="img/portfolio/img6.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-md-4 isotopeItem print">
                            <div class="portfolio-item">
                                <img src="img/portfolio/img7.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <h5><a href="#">Portfolio name</a></h5>
                                        <a href="img/portfolio/img7.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-md-4 isotopeItem photography">
                            <div class="portfolio-item">
                                <img src="img/portfolio/img8.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <h5><a href="#">Portfolio name</a></h5>
                                        <a href="img/portfolio/img8.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-md-4 isotopeItem print">
                            <div class="portfolio-item">
                                <img src="img/portfolio/img9.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <h5><a href="#">Portfolio name</a></h5>
                                        <a href="img/portfolio/img9.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                </div>


            </div>
        </div>

    </div>
</section>
<section id="parallax2" class="section parallax" data-stellar-background-ratio="0.5">
    <div class="align-center pad-top40 pad-bot40">
        <blockquote class="bigquote color-white">Indoctum accusamus comprehensam</blockquote>
        <p class="color-white">Bootstraptaste</p>
    </div>
</section>

<!-- contact -->
<section id="section-contact" class="section appear clearfix">
    <div class="container">

        <div class="row mar-bot40">
            <div class="col-md-offset-3 col-md-6">
                <div class="section-header">
                    <h2 class="section-heading animated" data-animation="bounceInUp">Contate-nos</h2>
                    <p>Duvidas, sujestões, orçametos e parcerias.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="cform" id="contact-form">
                    <div id="sendmessage">
                        Sua mensagem foi enviada. Muito Obrigado!
                    </div>
                    <form action="contact/contact.php" method="post" role="form" class="contactForm">
                        <div class="form-group">
                            <label for="name">Seu nome:</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nome de apresentação" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Seu e-mail:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email@email.com" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Assunto:</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Duvidas - Sujestões - Orçamentos - Parcerias" data-rule="maxlen:4" data-msg="Por Favor informe o assunto!" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label for="message">Messagem:</label>
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
                            <div class="validation"></div>
                        </div>

                        <button type="submit" class="btn btn-theme pull-left">ENVIAR MESSAGEM</button>
                    </form>

                </div>
            </div>
            <!-- ./span12 -->
        </div>

    </div>
</section>
<!-- map -->
<section id="section-map" class="clearfix">
    <div id="map"></div>
</section>

<section id="footer" class="section footer">
    <div class="container">
        <div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">
            <div class="col-sm-12 align-center">
                <ul class="social-network social-circle">
                    <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="row align-center copyright">
            <div class="col-sm-12"><p>Copyright &copy; 2015 Lab-FUNTEC - por <a href="http://henriquebk.com.br">HenriqueBK</a></p></div>
        </div>
    </div>

</section>
<a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>

<script src="{{ asset('site/js/modernizr-2.6.2-respond-1.1.0.min.js') }}" ></script>
<script src="{{ asset('site/js/jquery.js') }}" ></script>
<script src="{{ asset('site/js/jquery.easing.1.3.js') }}" ></script>
<script src="{{ asset('site/js/bootstrap.min.js') }}" ></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
<script src="{{ asset('site/js/jquery.isotope.min.js') }}" ></script>
<script src="{{ asset('site/js/jquery.nicescroll.min.js"') }}" ></script>
<script src="{{ asset('site/js/jquery.fancybox.pack.js') }}" ></script>
<script src="{{ asset('site/js/skrollr.min.js') }}" ></script>
<script src="{{ asset('site/js/jquery.scrollTo-1.4.3.1-min.js') }}" ></script>
<script src="{{ asset('site/js/jquery.localscroll-1.2.7-min.js') }}" ></script>
<script src="{{ asset('site/js/stellar.js') }}" ></script>
<script src="{{ asset('site/js/jquery.appear.js') }}" ></script>
<script src="{{ asset('site/js/validate.js"') }}" ></script>
<script src="{{ asset('site/js/main.js') }}" ></script>
<script type="text/javascript">
    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 12,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(-19.7100, -42.1200), // Caratinga BR 116
            //center: new google.maps.LatLng(40.6700, -73.9400), // New York

            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [	{		featureType:"all",		elementType:"all",		stylers:[		{			invert_lightness:true		},		{			saturation:10		},		{			lightness:30		},		{			gamma:0.5		},		{			hue:"#1C705B"		}		]	}	]
        };

        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using out element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);
    }
</script>
</body>
</html>