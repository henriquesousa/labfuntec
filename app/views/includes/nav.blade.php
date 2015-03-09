    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
      <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-bootsnipp-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <div class="animbrand">

            @if(Auth::check())
              {{ HTML::link('index', 'LabFUNTEC', array('class' => 'navbar-brand')) }}
            @else
              {{ HTML::link('index', 'LabFUNTEC', array('class' => 'navbar-brand')) }}
            @endif

        </div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="navbar-collapse navbar-bootsnipp-collapse collapse" style="height: 1px;">
        <ul class="nav navbar-nav">
          <li class="">
            @if(Auth::check())
              {{ HTML::link('index', 'Home') }}
            @else 
              {{ HTML::link('index', 'Home') }} 
            @endif
          </li>

        </ul>

        <ul class="nav navbar-nav navbar-right">
          
          @if(Auth::check())
            <li id="nav-login-btn" class="">{{ HTML::link('logout', 'Sair') }}</li>
          @else
            <li id="nav-register-btn" class="">{{ HTML::linkRoute('funcionario_add', 'Registre-se') }}</li>
            <li id="nav-login-btn" class="">{{ HTML::link('login', 'Login') }}</li>
          @endif
        </ul>
      </div><!-- /.navbar-collapse -->
      </div>
    </div>