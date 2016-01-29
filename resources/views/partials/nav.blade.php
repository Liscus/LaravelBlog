<!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/laravel/learning-laravel-5/public">Blog</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
          	<ul class="nav navbar-nav navbar">
              <li><a href="/laravel/learning-laravel-5/public/articles">All Articles</a></li>
              @if($user !== null)
                <li><a href="/laravel/learning-laravel-5/public/articles/create" class="btn btn-default btn-xs">Create Article</a></li>
              @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
              @if($user !== null)
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Howdy, {!! $user->name !!}<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/laravel/learning-laravel-5/public/auth/logout">Log-out</a></li>
                  </ul>
                </li>
              @else
                <li><a href="/laravel/learning-laravel-5/public/auth/login">Log-in</a></li>
              @endif
              
              {{-- 
              <li>{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id])  !!}</li> --}}
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
