<x-admin-master>

    @section('content')
        
        <h1>Create</h1>

        

        <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
        
            {{-- Csrf - cross map forgery - protecting us from another server storing data --}}
            @csrf
            <div class="form-group" ">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                </div>
                

                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" name="image" class="form-control-file" id="post_image" >
                </div>
                

                <div class="form-group">
                    <label for="body">Content</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                
                </div>

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">Create</button>
                </div>
                  
            
            </div>   

        
        </form>



    @endsection





</x-admin-master>