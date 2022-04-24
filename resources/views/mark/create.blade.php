@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="col-md-10">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title"> Add Mark </h3>
                <div class="block-options justify-content-center align-items-center">
                    @if (count($students) < 1)
                        <div class="category-empty">
                            <p class="text-danger m-0"> To add mark please create some students.&nbsp;&nbsp;&nbsp; <a
                                    href="{{ route('students.create') }}" class="btn btn-primary">
                                    Add Student </a></p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('marks.store') }}" method="POST">
                    @csrf

                    <div class="form-group row {{($errors->has('student_id')) ? 'is-invalid' : ''}}">
                        <div class="col-md-9">
                            <div class="form-material">
                                <select class="select2 browser-default" id="material-student_id" name="student_id" {{ count($students) < 1 ? 'disabled' : false }} data-placeholder="Please select a student">
                                    <option value=""></option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : false }}> {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="material-student_id"> Student *</label>
                            </div>
                            @error('student_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('maths') ? 'is-invalid' : '' }}">
                        <div class="col-md-9">
                            <div class="form-material input-group">
                                <input type="text" class="form-control" id="material-addon-icon" name="maths"
                                    placeholder="Please enter the maths" value="{{ old('maths') }}">
                                <label for="material-addon-icon"> Maths </label>
                            </div>
                            @error('maths') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('science') ? 'is-invalid' : '' }}">
                        <div class="col-md-9">
                            <div class="form-material input-group">
                                <input type="text" class="form-control" id="material-addon-icon" name="science"
                                    placeholder="Please enter the science" value="{{ old('science') }}">
                                <label for="material-addon-icon"> Science </label>
                            </div>
                            @error('science') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('history') ? 'is-invalid' : '' }}">
                        <div class="col-md-9">
                            <div class="form-material input-group">
                                <input type="text" class="form-control" id="material-addon-icon" name="history"
                                    placeholder="Please enter the history" value="{{ old('history') }}">
                                <label for="material-addon-icon"> History </label>
                            </div>
                            @error('history') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row {{($errors->has('term')) ? 'is-invalid' : ''}}">
                        <div class="col-md-9">
                            <div class="form-material">
                                <select class="select2 browser-default" id="material-term" name="term" data-placeholder="Please select a term">
                                    <option value=""></option>
                                    <option value="One" {{ old('term') === "One" ? 'selected' : false }}> One </option>
                                    <option value="Two" {{ old('term') === "Two" ? 'selected' : false }}> Two </option>
                                </select>
                                <label for="material-term"> Term * </label>
                            </div>
                            @error('term') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-9">
                            @if (count($students) < 1)
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

