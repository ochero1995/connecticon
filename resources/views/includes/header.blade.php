


<nav class="navbar navbar-full navbar-dark bg-primary navbar-fixed-top">
   <ul class="nav navbar-nav">
      <li class="nav-item"><a  class="navbar-brand" href="{{ route('dashboard') }}">CN</a></li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item pull-xs-right">
        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
      </li>
      	
      	
      	<li class="nav-item pull-xs-right">
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar" aria-controls="exCollapsingNavbar" aria-expanded="false" aria-label="Toggle navigation">
	    	Settings &#9776;
	      </button>

		  <div class="collapse" id="exCollapsingNavbar">
		      <div class="bg-primary p-a-1">
		      	<a class="nav-link" href="{{ route('account') }}">Profile settings</a>
		      </div>
	      </div>
	  	</li>



   </ul>
</nav>
