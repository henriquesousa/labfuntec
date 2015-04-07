
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>LabFuntec - Laboratório de Analise de Solos </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="description" content="Laboratorio de analise de solos">
        <meta name="keywords" CONTENT="analise, solo, laboratorio, caratinga, recomendação">
        <meta name="author" content="Copyright © 2015-2015 - www.labfuntec.com.br">
        <meta name="robots" CONTENT="index, follow, all">
        <!-- BEGIN CSS TEMPLATE -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="/bootstrap/img/favicon.ico" />
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png" />
    </head>

        <header>
            <nav>

            </nav>
        </header>
        <section>
            <article class="container-login center-block">
                <section>
                    <ul id="top-bar" class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#login-access">Accesso</a></li>
                        <li><a href="#">Voltar -> Site</a></li>
                    </ul>
                    <div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
                        <div id="login-access" class="tab-pane fade active in">

                            <!--login erros-->
                            @if (isset($errors))
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                             @endif
                             <!--login erros-->

                            <h2><i class="glyphicon glyphicon-log-in"></i> Accesso</h2>

                            {{ Form::open([
                                "route" => "logon",
                                "autocomplete" => "on",
                                "class" => "form-horizontal",
                                "role" => "form"
                              ]) }}
                                <div class="form-group ">
                                    <label for="login" class="sr-only">Usuário</label>
                                    <input type="text" class="form-control" name="username" id="login_value"
                                           placeholder="nome de usuario" tabindex="1" value="" />
                                </div>
                                <div class="form-group ">
                                    <label for="password" class="sr-only">Senha</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                           placeholder="Password" value="" tabindex="2" />
                                </div>
                                <div class="checkbox">
                                    <label class="control-label" for="remember_me">
                                        <input type="checkbox" name="remember_me" id="remember_me" value="1" class="" tabindex="3" /> Lembrar senha
                                    </label>
                                </div>
                                <br/>
                                <div class="form-group ">
                                    <button type="submit" name="log-me-in" id="submit" tabindex="5" class="btn btn-lg btn-primary">Entra</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </section>
            </article>
        </section>

        <footer class="footer">
            @include('includes.footer')
        </footer>




        <script src="{{ asset('js/gAnalitics.js') }}"></script>
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>   
    </body>
</html>