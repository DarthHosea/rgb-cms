<x-admin-master>

    @section('content')
        
        <h1>Edit a Post</h1>

        

        <form method="post" action="{{ route('post.update',$post->id) }}" enctype="multipart/form-data">
        
            {{-- Csrf - cross map forgery - protecting us from another server storing data --}}
            @csrf

            @method('PUT')
            <div class="form-group" ">
                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{$post->title}}">
                </div>
                

                <div class="form-group">
                    <label for="file">File</label>
                <div><img height="100px" src="{{$post->image}}" alt=""></div>
                    <input type="file" name="image" class="form-control-file" id="post_image" >
                </div>
                

                <div class="form-group">
                    <label for="body">Content</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control" >{{$post->body}}</textarea>
                
                </div>

                <div class="form-group">               
                        <button type="submit" class="btn btn-danger">Save changes</button>
                   
                </div>
                  
            
            </div>   

        
        </form>



    @endsection





</x-admin-master>