@extends('teachers.layout')
@section('style')
    <style>
    .wrapper{
    padding: 5px;
    text-align:center;
    color: #495057;
    border: 3px solid #CED4DA;
    border-radius:0.625rem;
    }
    .wrapper h2{
    padding-bottom: 5px;
    }
    .wrapper #file-input{
    display:none;
    }

    .wrapper label[for='file-input'] *{
    vertical-align:middle;
    cursor:pointer;
    }

    .wrapper label[for='file-input'] span{
    margin-left: 10px
    }

    .wrapper i.remove{
    vertical-align:middle;
    margin-left: 5px;
    cursor:pointer;
    display:none;
    }
</style>
@endsection

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
                                        <select class="form-control" id="content-video" name="topic_id">
                                            <option selected disabled>اختار موضوع الفيديو</option>
                                                @foreach ($topics as $topic)
                                                <option value="{{ $topic->id }}" @if($topic->id == $video->topic_id) selected
                                                    @endif>{{ $topic->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">عنوان الفيديو</span>
                                            </div>
                                            <input type="text" name="title" value="{{ $video->title }}"class="form-control
                                                @error('title') is-invalid @enderror"
                                                autocomplete="title" dir="rtl">
                                        </div>
                                        @error('title')
                                        <span class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
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
                                            style="color: #495057;padding-right: 13px;font-weight: 600;">الوصف</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" 
                                            rows="3" name="description">{{ $video->description }}</textarea>
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
<script>
        $('document').ready(function(){
            
            var $file = $('#file-input'),
                $label = $file.next('label'),
                $labelText = $label.find('span'),
                $labelRemove = $('i.remove'),
                labelDefault = $labelText.text();
                
                /* if (!$file.hasClass('is-invalid')) {
                    console.log()
                    $path = {!! json_encode($path) !!}.split('\\').pop(),
                    labelDefault = $labelText.text($path);
                    $labelRemove.show();
                } */
                //var $old = {!! old('attachment') !!};
                //console.log($old);
            // on file change
            $file.on('change', function(event){
                //console.log(event.target);
                var fileName = $file.val().split( '\\' ).pop();
                
                if( fileName ){
                        //console.log($file)
                        $labelText.text(fileName);
                        $labelRemove.show();
                }else{
                    $labelText.text(labelDefault);
                    $labelRemove.hide();
                }
                
                if($file.hasClass('is-invalid')) {
                    //console.log($file);
                    $file.removeClass('is-invalid');
                    $('#'+$file.attr('name')).remove();
                }
            });
            
            // Remove file   
            $labelRemove.on('click', function(event){
                $file.val("");
                $labelText.text(labelDefault);
                $labelRemove.hide();
                //console.log($file)
            });
            
            
        })
</script>
@endsection