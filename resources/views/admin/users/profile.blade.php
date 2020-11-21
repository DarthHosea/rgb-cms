<x-admin-master>

    @section('content')
        <h1>User profile for: {{$user->name}}</h1>
    

        <div class="col-sm-6">
        <form action="{{route('user.profile.update',$user)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <h4>Profile image</h4>
                    <img src="{{$user->avatar}}" alt="" class="rounded-circle">
                </div>

                <div class="form-group">
                    <label for="avatar">Change Profile Image</label>
                    <input type="file" name="avatar" class="img-thumbnail">

                </div>

                <div class="form-group">
           
                    <label for="username">Username</label>
                <input type="text" name="username" class="form-control @error('username')
                    is-invalid
                @enderror"
                id="username" value="{{$user->username}}">

                    @error('username')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
 
                </div>
            
                <div class="form-group">
           
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name')
                        is-invalid
                    @enderror"
                id="name" value="{{$user->name}}">
                        
                    @error('name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>




                <div class="form-group">
                                        
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" @error('email')
                        is-invalid
                    @enderror
                id="email" value="{{$user->email}}">
                             
                @error('email')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror


                </div>

                <div class="form-group">
                                        
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control @error('password')
                        is-invalid
                    @enderror"
                id="password">
                    
                @error('password')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
                             
                </div>

                <div class="form-group">
                                        
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation')
                        is-invalid
                    @enderror"
                id="password_confirmation" ">

                @error('password_confirmation')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
                             
                </div>

                <button type="submit" class="btn btn-primary">Save changes</button>
            
            
            
            </form>



        </div>
        @endsection

</x-admin-master>