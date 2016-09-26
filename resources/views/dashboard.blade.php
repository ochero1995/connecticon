@extends('layouts.master')

@section('title')

	Dashboard

@endsection

@section('content')

@include('includes.messageblock')

	<div class="container">
    <section class="row new-post">
    	<div class="col-md-6 col-md-offset-3 m-y-3">
    		<header><h3 class="display-5">What's on your mind buddy? (Don't call me buddy, guy!)</h3></header>
    		<form action="{{ route('post_create') }}" method="post">
    			<div class="form-group">
    				<textarea  class="form-control" name="body" id="new-post" rows="5" placeholder="Share it with the World Friend (I'm not your friend buddy!)"></textarea>
    			</div>

    			<button type="submi" class="btn btn-primary">Create Post</button>
    			<input type="hidden" name="_token" value="{{ Session::token() }}">
    		</form>
    	</div>
    </section>

    <hr class="m-y-1">

    <section class="row posts">
    	<div class="col-md-6 col-md-3-offset m-t-1">
    		<header><h4 class="m-b-2">What the rest have to say!</h4></header>

    		@foreach($posts as $post)

    			<article class="post" data-postid="{{ $post->id }}">
    			<p id="post-content">{{ $post->body }}</p>
    			<div class="info m-y-1 font-italic text-muted">
    				Posted by {{ $post->user->first_name }} on {{ $post->created_at}}
    			</div>

    			<div class="interaction m-y-1">
    				<a href="#">Like</a> |
    				<a href="">Dislike</a> |


    				@if(Auth::user() == $post->user)
    					<a href="#" class="edit" id="openModal">Edit</a> |
    					<a href="{{ route('post.delete', ['post_id'=> $post->id ]) }}">Delete</a> |
					@endif

                    <a href="">Comment</a> |
                    <div class="form-group">
                        <textarea class="form-control" id="comments" rows="1"></textarea>
                    </div>

    			</div>

    		</article>





    		@endforeach

    	</div>
    </section>

    <!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		        <h4 class="modal-title" id="myModalLabel">Edit Post</h4>
		      </div>
		      <div class="modal-body">
		        <div class="form-group">
				    <textarea class="form-control" id="post-body" rows="3"></textarea>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>

		<script>
			var token = '{{ Session::token() }}';
			var url = '{{ route('edit') }}';
		</script>


    </div>

@endsection
