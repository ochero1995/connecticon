@if (count($errors) > 0)

            <div class="alert alert-danger m-t-1 p-x-1">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach                    
                </ul>
                
            </div>
@endif

@if(Session::has('message'))
	<div class="alert alert-success m-t-1">
      {{Session::get('message')}}                  
    </div>


@endif