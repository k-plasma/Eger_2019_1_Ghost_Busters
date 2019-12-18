<!DOCTYPE html>
<html>

<head>
  <!-- BASICS -->
  <meta charset="utf-8">
  <title>EKE - Application Lab Group 2</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../../public/css/settings.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../../public/css/isotope.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../../public/css/animate.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../../public/css/font-awesome.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../../public/css/overwrite.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../../public/css/flexslider.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../../public/js/fancybox/jquery.fancybox.css" media="screen">
  <link rel="stylesheet" href="../../public/css/bootstrap.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700">

  <link rel="stylesheet" href="../../public/css/style.css">
  <!-- skin -->
  <link rel="stylesheet" href="../../skin/default.css">
  

</head>

<body>
  <section id="header" class="appear"></section>
  <div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(5, 42, 62, 1); display: inline">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      	  <span class="fa fa-bars color-white"></span>
        </button>
        <div class="navbar-logo">
          <a href="index.html"><img data-0="width:155px;" data-300=" width:120px;" src="../..//public/img/logo.png" alt=""></a>
        </div>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
          <li class="active"><a href="userhomepage.php">Home</a></li>
          <li><a href="#section-about">About</a></li>
          <li><a href="#section-works">Portfolio</a></li>
          <li><a href="#section-contact">Contact</a></li>
          <li><a href="index.php">Logout</a></li>
        </ul>
      </div>
      <!--/.navbar-collapse -->
    </div>
  </div>

  <section id="intro">
    <div class="intro-content">
      <h2>Welcome to E.K.E Task Manager!</h2>
    </div>
  </section>

  <!-- services -->
  <section id="section-services" class="section pad-bot30 bg-white">
    <div class="container">

      <div class="row mar-bot40">
        <div class="col-lg-4">
          <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a mar-top20">
            <div class="float-left mar-right20">
              <a href="#" class="hi-icon hi-icon-screen">screen</a>
            </div>
          </div>
          <a href = "add_task.php"><h3 class="text-bold">Add Task</h3></a>
          

          <div class="clear"></div>
        </div>

        <div class="col-lg-4">
          <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a mar-top20">
            <div class="float-left mar-right20">
              <a href="#" class="hi-icon hi-icon-location">location</a>
            </div>
          </div>
          <a href = "task_list.php"><h3 class="text-bold">List Of Tasks</h3></a>
          

          <div class="clear"></div>
        </div>

        <div class="col-lg-4">
          <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a mar-top20">
            <div class="float-left mar-right20">
              <a href="#" class="hi-icon hi-icon-images">images</a>
            </div>
          </div>
          <h3 class="text-bold">Completed Tasks</h3>
          

          <div class="clear"></div>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a mar-top20">
            <div class="float-left mar-right20">
              <a href="#" class="hi-icon hi-icon-archive">archive</a>
            </div>
          </div>
          <h3 class="text-bold">Pending Tasks</h3>
         

          <div class="clear"></div>
        </div>

        <div class="col-lg-4">
          <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a mar-top20">
            <div class="float-left mar-right20">
              <a href="#" class="hi-icon hi-icon-contract">Mobile</a>
            </div>
          </div>
          <h3 class="text-bold">Task History</h3>
          

          <div class="clear"></div>
        </div>

        <div class="col-lg-4">
          <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a mar-top20">
            <div class="float-left mar-right20">
              <a href="#" class="hi-icon hi-icon-clock">Faster</a>
            </div>
          </div>
          <h3 class="text-bold">Edit task</h3>
          

          <div class="clear"></div>
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
            <div class="flexslider testimonials-slider">
              <ul class="slides">
                <li>
                  <div class="testimonial clearfix">
                    <div class="mar-bot20">
                      <img alt="" src="../../public/img/testimonial/testimonial1.png" class="img-circle">
                    </div>
                    
                    <h5>
                    Get your priorities straight.
											</h5>
                    <br/>
                    
                  </div>
                </li>

                <li>
                  <div class="testimonial clearfix">
                    <div class="mar-bot20">
                      <img alt="" src="../../public/img/testimonial/testimonial2.jpeg" class="img-circle">
                    </div>
                   
                    <h5>
                    Diarise everything. 
												</h5>
                    <br/>
                    
                  </div>
                </li>
                <li>
                  <div class="testimonial clearfix">
                    <div class="mar-bot20">
                      <img alt="" src="../../public/img/testimonial/testimonial3.jpeg" class="img-circle">
                    </div>
                    
                    <h5>
                    Be prepared. 
											</h5>
                    <br/>
                    
                  </div>
                </li>
              </ul>
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
            <h2 class="section-heading animated" data-animation="bounceInUp">Meet the E.K.E Team</h2>
            
          </div>
        </div>
      </div>

      <div class="row align-center mar-bot40">
        <div class="col-md-3">
          <div class="team-member">
            <figure class="member-photo"><img src="../../public/img/team/member1.jpg" alt=""></figure>
            <div class="team-detail">
              <h4>Deji Adeyemo</h4>
              <span>FrontEnd Designer</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <figure class="member-photo"><img src="../../public/img/team/member3.jpg" alt=""></figure>
            <div class="team-detail">
              <h4>Tetiana Hrunyk</h4>
              <span>Web designer</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <figure class="member-photo"><img src="../../public/img/team/member4.jpg" alt=""></figure>
            <div class="team-detail">
              <h4>Aziz Gasimov</h4>
              <span>BackEnd Designer</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <figure class="member-photo"><img src="../../public/img/team/member2.jpg" alt=""></figure>
            <div class="team-detail">
              <h4>Kovacs Miklos</h4>
              <span>SCRUM Master</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <figure class="member-photo"><img src="../../public/img/team/member3.jpg" alt=""></figure>
            <div class="team-detail">
              <h4>Rayne Blair</h4>
              <span>Web designer</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <figure class="member-photo"><img src="../../public/img/team/member4.jpg" alt=""></figure>
            <div class="team-detail">
              <h4>Emad Z</h4>
              <span>UI designer</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <figure class="member-photo"><img src="../../public/img/team/member1.jpg" alt=""></figure>
            <div class="team-detail">
              <h4>Yamen Python</h4>
              <span>FrontEnd Designer</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- /about -->

  
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
      <div class="row align-center mar-bot20">
        <ul class="footer-menu">
          <li><a href="#">Home</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Privacy policy</a></li>
          <li><a href="#">Get in touch</a></li>
        </ul>
      </div>
      <div class="row align-center copyright">
        <div class="col-sm-12">
          <p>Copyright &copy; All rights reserved</p>
        </div>
      </div>
      <div class="credits">
        
        Designed by <a href="https://uni-eszterhazy.hu/">ApplicationLab-EKE.com</a>
      </div>
    </div>

  </section>
  <a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>

  <!-- Javascript Library Files -->
  <script src="../../../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  <script src="../../../js/jquery.js"></script>
  <script src="../../../js/jquery.easing.1.3.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/jquery.isotope.min.js"></script>
  <script src="../../../js/jquery.nicescroll.min.js"></script>
  <script src="../../../js/fancybox/jquery.fancybox.pack.js"></script>
  <script src="../../../js/skrollr.min.js"></script>
  <script src="../../../js/jquery.scrollTo.min.js"></script>
  <script src="../../../js/jquery.localScroll.min.js"></script>
  <script src="../../../js/stellar.js"></script>
  <script src="../../../js/jquery.appear.js"></script>
  <script src="../../../js/jquery.flexslider-min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="../../../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../../../js/main.js"></script>

</body>

</html>
