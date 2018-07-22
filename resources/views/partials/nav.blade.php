<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ action('HomeController@index') }}">XZRD</a>
      <form class="form-inline my-2 my-lg-0" role="search" method="get" action="action('HomeController@search')">
     <div class="form-group">
        <input class="form-control mr-sm-2" type="text" placeholder="搜尋文章" name="keyword">
     </div>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜尋</button>
      </form>
      <ul class="collapse navbar-collapse justify-content-end">
          <li class="navbar-text">
              <a href="{{ action('Auth\RegisterController@showRegistrationForm') }}" style="padding-right:25pt;">註冊</a>
          </li>
          @if(Auth::check())
          <li class="navbar-text">
              {{ Auth::user()->name }}
          </li>
          <li class="navbar-text">
              <a href="{{ action('Auth\LoginController@logout') }}">登出</a>
          </li>
          @else
          <li class="navbar-text">
              <a href="{{ action('Auth\LoginController@showLoginForm') }}">登入</a>
          </li>
          @endif
      </ul>
    </div>
  </nav>
<div style="padding-top:70px;"></div>
