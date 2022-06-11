<div class="row">
    <label class="col col-form-label" for="title">Title:</label>
</div>
<div class="row mb-3">
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
<div class="row">
    <label class="col col-form-label" for="description">Description:</label>
</div>
<div class="row mb-3">
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
    <label class="col col-form-label" for="state">State:</label>
</div>
<div class="row mb-3">
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
