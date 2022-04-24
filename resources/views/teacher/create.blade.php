@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="col-md-10">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title"> Add Teacher </h3>
            </div>
            <div class="block-content">
                <form action="{{ route('teachers.store') }}" method="POST">
                    @csrf

                    <div class="form-group row {{ $errors->has('name') ? 'is-invalid' : '' }}">
                        <div class="col-md-9">
                            <div class="form-material input-group">
                                <input type="text" class="form-control" id="material-addon-icon" name="name"
                                    placeholder="Please enter the name" value="{{ old('name') }}">
                                <label for="material-addon-icon">Name *</label>
                            </div>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-alt-primary" >Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection