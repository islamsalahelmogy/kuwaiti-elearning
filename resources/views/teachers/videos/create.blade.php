@extends('teachers.layout')
@section('content')
    <section class="pt-10 my-md-5 h-100">
        <div class="container">
            <div class="row">
                <div class="col-10 col-sm-8 col-md-6 col-lg-4 offset-1 offset-sm-2 offset-md-3 offset-lg-4 row">
                    <div class="mb-4 mb-sm-0">
                        <h1 class="element-title font-weight-bold text-center mb-1">
                            إضافة فيديو جديد
                        </h1>

                        <div class="border rounded-bottom-md border-top-0">
                            <div class="p-3">
                                <form action="{{route('teacher.video.store')}}" method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group check-step-gray">
                                        <select class="form-control  @error('topic_id') is-invalid @enderror" id="content-video" name="topic_id">
                                            <option selected disabled>اختار موضوع الفيديو</option>
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
                                                    id="basic-addon2">اكتب عنوان الفيديو</span>
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
                                    <div class="form-group wrapper">
                                        <h2>ارفع الفيديو</h2>
                                        <input type="file" id="file-input" name="attachment" 
                                                class="@error('attachment') is-invalid @enderror">
                                        <label for="file-input">
                                            <i class="fa fa-paperclip fa-2x"></i>
                                            <span></span>
                                        </label>
                                        <i class="fa fa-times-circle remove"></i>
                                        @error('attachment')
                                            <span id="attachment" class="invalid-feedback d-block px-2 font-weight-bolder"
                                                            role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" 
                                            style="color: #495057;padding-right: 13px;font-weight: 600;">اكتب وصف الفيديو</label>
                                        <textarea class="form-control @error('description')  is-invalid @enderror" id="exampleFormControlTextarea1" 
                                            rows="3" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span id="description" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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