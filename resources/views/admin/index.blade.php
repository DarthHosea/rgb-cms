<x-admin-master>

    
    

    @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>

    @if (auth()->user()->userHasRole('Admin'))
        <h1>Dashboard</h1>
    @endif
    @endsection

    


</x-admin-master>