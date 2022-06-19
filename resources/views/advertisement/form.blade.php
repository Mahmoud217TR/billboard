<div class="row mb-3">
    <label class="col-md-4 col-form-label text-end" for="title">Title:</label>
    <div class="col-md-6">
        <input class="form-control @error('title') is-invalid @enderror" type="text"
        id='title' name="title" value="{{ old('title')??$advertisement->title }}">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label class="col-md-4 col-form-label text-end" for="description">Description:</label>
    <div class="col-md-6">
        <textarea class="form-control @error('description') is-invalid @enderror"
        type="text" id='description' name="description" cols='40' rows='10' style="resize: none">{{ old('description')??$advertisement->description }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row">
    <label class="col-md-4 col-form-label text-end" for="tag-input">Tags:</label>
    <div class="col-md-4">
        <search-component search-url='{{ route('search.tag') }}' add-url="{{ route('tag.store') }}"
        old-tags="{{ $advertisement->tags->pluck('name','id') }}"></search-component>
    </div>
</div>
<div class="row">
    <div class="col-md-4 offset-md-4">
        @error('tags.')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-4 offset-md-4">
        @error('tags.*')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row my-3">
    <label class="col-md-4 col-form-label text-end" for="state">State:</label>
    <div class="col-md-2">
        <select class="form-select" name="state" id="state">
            @foreach ($advertisement->getStates() as $state)
                <option value="{{ $state }}" @selected($state==$advertisement->state)>{{ ucfirst($state) }}</option>
            @endforeach
        </select>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label class="col-md-4 col-form-label text-end" for="category_id">Category:</label>
    <div class="col-md-4">
        <select class="form-select" name="category_id" id="category_id">
            <option value="{{ null }}" @selected($advertisement->category == null)>Uncategorized</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected($category == $advertisement->category)>{{ ucfirst($category->name) }}</option>
            @endforeach
        </select>
        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@if (auth()->user()->isAdmin())
<div class="row mb-3">
    <div class="col-md-6 offset-md-4">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="featured" id="featured" value="1" @checked($advertisement->featured)>
            <label class="form-check-label" for="featured">
              Featured
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="featured" id="unfeatured" value="0"  @checked(!$advertisement->featured)>
            <label class="form-check-label" for="unfeatured">
              Unfeatured
            </label>
        </div>
        @error('featured')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endif