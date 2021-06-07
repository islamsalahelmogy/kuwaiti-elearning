@extends('teachers.layout')
@section('content')
    <section class="py-8  bg-white">
        <div class="container">
            <div class="section-title justify-content-center mb-4 mb-md-8">
                <a class="btn btn-info font-size-20 font-weight-medium d-block"
                    href="{{ route('teacher.video.create') }}">إضافة فيديو جديد</a>
            </div>
            <div class="section-title justify-content-center mb-4 mb-md-8">
                <span class="shape shape-left bg-info"></span>
                <h2 class="text-danger">الفيديوهات</h2>
                <span class="shape shape-right bg-info"></span>
            </div>

            <div class="row">
                
            </div>
        </div>
    </section>
@endsection

