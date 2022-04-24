@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="col-md-10">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title"> Add student </h3>
                <div class="block-options justify-content-center align-items-center">
                    @if (count($teachers) < 1)
                        <div class="category-empty">
                            <p class="text-danger m-0"> To add students please create some teachers.&nbsp;&nbsp;&nbsp; <a
                                    href="{{ route('teachers.create') }}" class="btn btn-primary">
                                    Add Teacher </a></p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf

                    <div class="form-group row {{ $errors->has('name') ? 'is-invalid' : '' }}">
                        <div class="col-md-9">
                            <div class="form-material input-group">
                                <input type="text" class="form-control" id="material-addon-icon" name="name"
                                    placeholder="Please enter the name" value="{{ old('name') }}">
                                <label for="material-addon-icon"> Name * </label>
                            </div>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('age') ? 'is-invalid' : '' }}">
                        <div class="col-md-9">
                            <div class="form-material input-group">
                                <input type="text" class="form-control" id="material-addon-icon" name="age"
                                    placeholder="Please enter the age" value="{{ old('age') }}">
                                <label for="material-addon-icon"> age * </label>
                            </div>
                            @error('age') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row {{($errors->has('gender')) ? 'is-invalid' : ''}}">
                        <div class="col-md-9">
                            <div class="form-material">
                                <select class="select2 browser-default" id="material-gender" name="gender" data-placeholder="Please select a gender">
                                    <option value=""></option>
                                        <option value="M"> Male </option>
                                        <option value="F"> Female </option>
                                </select>
                                <label for="material-gender"> Gender *</label>
                            </div>
                            @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row {{($errors->has('teacher_id')) ? 'is-invalid' : ''}}">
                        <div class="col-md-9">
                            <div class="form-material">
                                <select class="select2 browser-default" id="material-teacher_id" name="teacher_id" {{ count($teachers) < 1 ? 'disabled' : false }} data-placeholder="Please select a teacher">
                                    <option value=""></option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="material-teacher_id"> Teacher *</label>
                            </div>
                            @error('teacher_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-9">
                            @if (count($teachers) < 1)
                                <a class="btn btn-alt-primary" disabled >Submit</a>
                            @else
                                <button type="submit" class="btn btn-alt-primary" >Submit</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

