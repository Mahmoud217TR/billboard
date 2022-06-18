<div class="d-flex my-2">
    @can('update',$tag)
        <a href="{{ route('category.edit',$tag) }}" class="btn btn-success me-2">Edit</a>
    @endcan
    @can('delete',$tag)
        <form action="{{ route('category.destroy',$tag) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    @endcan
</div>