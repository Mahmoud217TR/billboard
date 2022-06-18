<div class="d-flex mb-2">
    @can('update',$advertisement)
        <a href="{{ route('advertisement.edit',$advertisement) }}" class="btn btn-success me-2">Edit</a>
    @endcan
    @can('delete',$advertisement)
        <form action="{{ route('advertisement.destroy',$advertisement) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger me-2">Delete</button>
        </form>
    @endcan
</div>