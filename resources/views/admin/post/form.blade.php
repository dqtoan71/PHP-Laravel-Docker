<div class="card-body">        
    <div class="tab-pane" id="settings">
        <div class="form-horizontal">
            <div class="form-group mb-2 mb20">
                <label for="title" class="form-label">{{ __('admin.Title') }}</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post?->title) }}" id="title" placeholder="Title" required>
                {!! $errors->first('title', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="slug" class="form-label">{{ __('admin.Slug') }}</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $post?->slug) }}" id="slug" placeholder="Slug" required>
                {!! $errors->first('slug', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="description" class="form-label">{{ __('admin.Description') }}</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $post?->description) }}" id="description" placeholder="Description" required>
                {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="content" class="form-label">{{ __('admin.Content') }}</label>
                <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror">{{ old('content', $post?->content) }}</textarea>
                {!! $errors->first('content', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>       
</div>