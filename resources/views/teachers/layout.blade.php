@extends('layouts.app')
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
@section('topBar')
<div class="overlay"></div>

<div class="bg-stone top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <ul class="
                        list-inline
                        d-flex
                        mb-0
                        justify-content-center
                        align-items-center
                        mr-xl-2
                    ">
                    <li class="text-white mr-md-3 mr-lg-2 mr-xl-5">
                        <a class="
                                    text-white
                                    font-weight-medium
                                    opacity-80 mr-1 mr-md-2 mr-lg-1 mr-xl-2
                                " href="{{ route('teacher.dashboard') }}">
                            <span class="bg-purple
                                    icon-header
                                    mr-1 mr-md-2 mr-lg-1 mr-xl-2">
                                <i class="
                                        fa fa-cog
                                        text-white
                                        font-size-17
                                        
                                    " aria-hidden="true"></i>
                            </span>
                            {{ Auth::guard('teacher')->user()->name }}
                        </a>
                        <a class="
                                    text-white
                                    font-weight-medium
                                    opacity-80 mr-1 mr-md-2 mr-lg-1 mr-xl-2
                                " href="{{ route('teacher.logout') }}">
                            <span class="bg-purple
                                    icon-header
                                    mr-1 mr-md-2 mr-lg-1 mr-xl-2">
                                <i class="
                                        fa fa-sign-out
                                        text-white
                                        font-size-17
                                        
                                    " aria-hidden="true"></i>
                            </span>
                            خروج
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('navbar')
    <nav class="sidebar">

        <!-- close sidebar menu -->
        <div class="dismiss">
            <i class="fa fa-arrow-left"></i>
        </div>

        

        <ul class="list-unstyled menu-elements mt-7 text-left">
            <li class ="@if (str_contains(Route::currentRouteName(),'dashboard'))
                active
            @endif">
                <a class="scroll-link" href="{{ route('teacher.dashboard') }}"><i class="fa fa-user mx-2"></i>الصفحة الشخصية</a>
            </li>


            @if (auth('teacher')->user()->role=='admin')
            <li class ="@if (str_contains(Route::currentRouteName(),'admin'))
                active
            @endif">
                <a class="scroll-link" href=" {{ route('admin.teacher.index') }} "><i class="fa fa-user mx-2"></i>المدرسين</a>
            </li>
            @endif

            @if (auth('teacher')->user()->role=='admin')
            <li class ="@if (str_contains(Route::currentRouteName(),'topic'))
                active
            @endif">
                <a class="scroll-link" href=" {{ route('topic.index') }} "><i class="fa fa-user mx-2"></i>الموضوعات</a>
            </li>
            @endif



            @if (auth('teacher')->user()->role=='admin')
            <li class ="@if (str_contains(Route::currentRouteName(),'level'))
                active
            @endif">
                <a class="scroll-link" href=" {{ route('level.index') }} "><i class="fa fa-user mx-2"></i>المستوي</a>
            </li>
            @endif


            <li class ="@if (str_contains(Route::currentRouteName(),'video'))
                active
            @endif">
                <a class="scroll-link" href="{{ route('teacher.videos') }}"><i class="fa fa-user mx-2"></i>الفيديوهات</a>
            
           </li>
            <li class ="@if (str_contains(Route::currentRouteName(),'stor'))
                active
            @endif">
                <a class="scroll-link" href="{{ route('teacher.stories') }}"><i class="fa fa-user mx-2"></i>القصص</a>
            </li>
            <li class ="@if(str_contains(Route::currentRouteName(),'activit'))
                active
            @endif">
                <a class="scroll-link" href="{{-- {{ route('teacher.activities') }} --}}"><i class="fa fa-user mx-2"></i>الأنشطة</a>
            </li>
            <li class ="@if (str_contains(Route::currentRouteName(),'password'))
                active
            @endif">
                <a class="scroll-link" href="{{ route('teacher.password.edit') }}"><i class="fa fa-key mx-2"></i>تغيير كلمة السر</a>
            </li>
        </ul>

    </nav>
    <nav class="
            navbar
            navbar-sticky
            navbar-white
                ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="d-inline-block" src="{{ asset('img/logo.jpg') }}" alt="Kuwaiti-elearning" />
            </a>
            <a class="btn btn-primary btn-customized open-menu" role="button">
                    <i class="fa fa-align-right"></i> <span>القائمة</span>
            </a>
        </div>
    </nav>

@endsection
@section('footer')
<div class="copyright">
    <div class="container">
        <div class="row py-4 align-items-center">
            <div class="col-sm-6 offset-sm-3">
                <p class="copyright-text text-center">
                    جميع الحقوق محفوظة © 2021
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
        $('document').ready(function(){
            
            var $file = $('#file-input'),
                $label = $file.next('label'),
                $labelText = $label.find('span'),
                $labelRemove = $('i.remove'),
                labelDefault = $labelText.text();
                
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