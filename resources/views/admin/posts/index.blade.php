<x-admin-master>

    @section('content')

    @if (auth()->user()->userHasRole('Admin'))
        <h1>All Posts</h1>
    @endif


    

    @if (Session::has('message'))
    <div class="alert alert-danger">{{Session::get('message')}}</div>
    @endif

    @if (session('message1'))

            <div class="alert alert-info">
                {{session('message1')}}
            </div>      
    @endif
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Owner</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Owner</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>

                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                    <td><a href="{{route('post.edit',$post->id)}}">{{$post->title}}</a></td>

                        <td><img src="{{$post->image}}" alt="" height="40px"></td>


                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        <td>
                            {{$post->user->name}}
                        </td>
                        <td>
                            @can('view', $post)
                        <form action="{{route('post.destroy',$post->id)}}" method="post" enctype="multipart/form-data">

                                @csrf

                                @method('DELETE')

                                                                                       
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endcan
                        </td>


                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          {{ $posts->links() }}


    @endsection

    @section('scripts')
        
          <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts 
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
-->

    @endsection




</x-admin-master>