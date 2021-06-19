@extends('teachers.layout')
@section('content')
    <section class="pt-10 my-md-5 h-100">
        <div class="container">
            <div class="row">
                <div class="col-10 col-sm-8 col-md-6 col-lg-4 offset-1 offset-sm-2 offset-md-3 offset-lg-4 row">
                    <div class="mb-4 mb-sm-0">
                        <h1 class="element-title font-weight-bold text-center mb-1">
                            إضافة نشاط جديد
                        </h1>

                        <div class="border rounded-bottom-md border-top-0">
                            <div class="p-3">
                                <form action="{{route('test.store')}}" method="POST" role="form">
                                    @csrf
                                    
                                    <div class="form-group check-step-gray">
                                        <select class="form-control  @error('level_id') is-invalid @enderror" id="content-video" name="level_id">
                                            <option selected disabled>اختار مستوي النشاط</option>
                                                @foreach ($levels as $level)
                                                <option value="{{ $level->id }}" @if($level->id == old('level_id')) selected
                                                    @endif>{{ $level->name }}</option>
                                                @endforeach
                                        </select>
                                        @error('level_id')
                                        <span id="level_id" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>



                                    <div class="form-group check-step-gray">
                                        <select class="form-control  @error('topic_id') is-invalid @enderror" id="content-video" name="topic_id">
                                            <option selected disabled>اختار موضوع النشاط</option>
                                                @foreach ($topics as $topic)
                                                <option value="{{ $topic->id }}" @if($topic->id == old('topic_id')) selected
                                                    @endif>{{ $topic->name }}</option>
                                                @endforeach
                                        </select>
                                        @error('topic_id')
                                        <span id="topic_id" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    

                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">اكتب عنوان النشاط</span>
                                            </div>
                                            <input type="text" name="title" value="{{ old('title') }}"class="form-control
                                                @error('title') is-invalid @enderror"
                                                autocomplete="title" dir="rtl">
                                        </div>
                                        @error('title')
                                        <span id="title" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                              

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" 
                                            style="color: #495057;padding-right: 13px;font-weight: 600;">اكتب وصف النشاط</label>
                                        <textarea class="form-control @error('description')  is-invalid @enderror" id="exampleFormControlTextarea1" 
                                            rows="3" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span id="description" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-icon pl-4 row font-weight-bolder">
                                        <label class="col-4 text-color">نشر :</label>
                                        <div class="col-4 ">
                                            <input  value="true" type="radio" class="gender-input"
                                                name="published" {{ old('published','true') == 'true' ? 'checked' : '' }}>
                                            <label for="true" class="gender"></label>
                                            <span class="text-danger ml-1">نشر</span>
                                        </div>
                                        <div class="col-4 pl-0">
                                            <input  value="false" type="radio" class="gender-input"
                                                name="published" {{ old('published','false') == 'false' ? 'checked' : '' }}>
                                            <label for="false" class="gender"></label>
                                            <span class="text-danger ml-1">عدم النشر</span>
                                        </div>
                                    </div>




                                    <div class="form-group font-weight-bolder">
                                        <button type="submit" 
                                            class="
                                                btn btn-danger
                                                text-uppercase
                                                w-100
                                        ">
                                            إضافة
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
