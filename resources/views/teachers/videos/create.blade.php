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
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">اكتب عنوان الفيديو</span>
                                            </div>
                                            <input type="text" required name="title" value="{{ old('title') }}" class="form-control
                                                @error('title')  is-invalid @enderror" autocomplete="title"
                                                dir="ltr">
                                        </div>
                                        @error('title')
                                        <span id="title" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>



                                    <div class="form-group check-step-gray">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">اكتب  وصف الفيديو</span>
                                            </div>
                                           
                                            
                                             <textarea name="description" required  class="form-control
                                                @error('description')  is-invalid @enderror"> {{ old('description') }}  </textarea>

                                        </div>
                                        @error('description')
                                        <span id="title" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group check-step-gray">
                                        <select class="form-control" id="content-video" name="topic_id" required>
                                         <option selected  disabled>اختار موضوع الفيديو</option>
                                        @foreach($topics as $t)
                                           <option value="{{ $t->id }}" @if(old('topic_id')==$t->id) selected @endif >{{  $t->name }}</option>
                                           
                                        @endforeach
                                            
                                        </select>
                                    </div>

                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">ارفع الفيديو</span>
                                            </div>
                                            <input type="file" name="attachment" class="form-control
                                                @error('attachment')  is-invalid @enderror"
                                                autocomplete="attachment" dir="ltr">
                                        </div>
                                        @error('attachment')
                                        <span class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
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