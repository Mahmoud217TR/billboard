<div class="d-flex">
    @can('update',$category)
        <a href="{{ route('category.edit',$category) }}" class="btn btn-success me-2">Edit</a>
    @endcan
    @can('delete',$category)
        <form action="{{ route('category.destroy',$category) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    @endcan
</div>