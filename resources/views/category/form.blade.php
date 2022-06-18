<div class="row mb-3">
    <div class="col-md-4 text-md-end">
        <label for="name" class="col-form-label">
            Category Name:
        </label>
    </div>
    <div class="col-md-6">
        <input type="text" name="name" id="name" value="{{ old('name')??$category->name }}"
        class="form-control @error('name') is-invalid @enderror" required>
        
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4 text-md-end">
        <label for="name" class="col-form-label">
            Category Description:
        </label>
    </div>
    <div class="col-md-6">
        <textarea name="description" id="description" cols="30" rows="10" required
        style="resize: none" class="form-control @error('description') is-invalid @enderror"
        >{{ old('description')??$category->description }}</textarea>
        
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>