@extends('teachers.layout')


@section('content')
<section class="pt-10 my-md-5 h-100">
    <div class="container">
        <div class="row">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 offset-1 offset-sm-2 offset-md-3 offset-lg-4 row">
                <div class="mb-4 mb-sm-0">
                        <h1 class="element-title font-weight-bold text-center mb-1">
                            تعديل فيديو
                        </h1>

                        <div class="border rounded-bottom-md border-top-0">
                            <div class="p-3">
                                <form action="{{ route('teacher.video.update',['id'=> $video->id]) }}" method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group check-step-gray">
                                        <select class="form-control @error('topic_id')  is-invalid @enderror" id="content-video" name="topic_id">
                                            <option selected disabled>اختار موضوع الفيديو</option>
                                                @foreach ($topics as $topic)
                                                    <option value="{{ $topic->id }}" 
                                                        @if($topic->id == $video->topic_id) selected @endif >
                                                        {{ $topic->name }}
                                                    </option>
                                                @endforeach
                                        </select>
                                        @error('topic_id')
                                            <span id="topic_id" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group check-step-gray">
                                        <select class="form-control @error('level_id')  is-invalid @enderror" id="content-video" name="level_id">
                                            <option selected disabled>اختار مستوي الفيديو</option>
                                                @foreach ($levels as $level)
                                                    <option value="{{ $level->id }}" 
                                                        @if($level->id == $video->level_id) selected @endif >
                                                        {{ $level->name }}
                                                    </option>
                                                @endforeach
                                        </select>
                                        @error('level_id')
                                            <span id="level_id" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">عنوان الفيديو</span>
                                            </div>
                                            <input type="text" name="title" 
                                                value="@error('title') {{ old('title') }} @else {{ $video->title }} @enderror"
                                                class="form-control @error('title') is-invalid @enderror"
                                                autocomplete="title" dir="rtl">
                                        </div>
                                        @error('title')
                                        <span id="title" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="wrapper">
                                            <h2>ارفع الفيديو</h2>
                                            <input type="file" id="file-input" name="attachment" 
                                                    class="@error('attachment') is-invalid @enderror">
                                            <label for="file-input">
                                                <i class="fa fa-paperclip fa-2x"></i>
                                                <span></span>
                                            </label>
                                            <i class="fa fa-times-circle remove"></i>
                                        </div>
                                        @error('attachment')
                                                <span id="attachment" class="invalid-feedback d-block px-2 font-weight-bolder"
                                                            role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" 
                                            style="color: #495057;padding-right: 13px;font-weight: 600;">الوصف</label>
                                        <textarea class="form-control @error('description')  is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" 
                                            name="description">@error('description') {{ old('description') }} @else {{ $video->description }} @enderror</textarea>
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
                                            حفظ التعديلات
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
@section('script')
    @parent
    <script>
        $(document).ready(() => {
            $('input ,textarea ,select').on('focus',(e) => {
                var input = $(e.target)
                if(input.hasClass('is-invalid')) {
                    console.log(input);
                    input.removeClass('is-invalid');
                    $('#'+input.attr('name')).remove();
                }
                if($('span.invalid').length) {
                    $('span.invalid').remove();
                }
            })
        })
    </script>
@endsection
