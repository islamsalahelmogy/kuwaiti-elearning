@extends('teachers.layout')
@section('style')
    <style>
        .card-img-overlay {padding:100px}
    </style>
@endsection
@section('content')
<section class="py-8 bg-white">
    <div class="container">
        <div class="section-title justify-content-center mb-4 mb-md-8">
            <a class="btn btn-info font-size-20 font-weight-medium d-block"
                href="{{ route('topic.create') }}">إضافة موضوع جديد</a>
        </div>
        <div class="section-title justify-content-center mb-4 mb-md-8">
            <span class="shape shape-left bg-info"></span>
            <h2 class="text-danger">الموضوعات</h2>
            <span class="shape shape-right bg-info"></span>
        </div>

        <div class="row">
            @if($topics->count() > 0)
                    @foreach ($topics as $t)
                        <div class="col-sm-6 col-lg-3 col-xs-12">
                                <div class="card">
                                    
                                    <div class="card-body border-top-5 px-3 rounded-bottom border-info">
                                        <h3 class="card-title">
                                            <a class="text-info text-capitalize d-block text-truncate" 
                                                >{{ $t->name }}</a>
                                        </h3>
                                        <ul class="list-unstyled text-muted">
                                            <li>
                                                <i class="fa fa-clock-o mr-2" aria-hidden="true"></i> 
                                                    {{ $t->created_at->locale('Ar')->diffForHumans() }}
                                            </li>
                                               <br>
                                            <li> 
                                               عدد الفيديوهات  :{{$t->contents->where('attach_type','video')->count()}} 
                                            </li>
                                            <li>
                                                   عدد القصص :{{$t->contents->where('attach_type','audio')->count()}}    
                                            </li>
                                        </ul>
                                        <p class="show-read-more" style="height: 145px;">{{ $t->description }}</p>
                                        <div class="d-block">
                                            <div class="row">
                                                <a href="{{ route('topic.edit',['id'=>$t->id]) }}"
                                                    class="btn btn-sm btn-white text-hover-purple text-uppercase col-5 ml-2">
                                                    <i class="fa fa-edit mr-2" aria-hidden="true"></i>تعديل
                                                </a>
                                                <a href="{{ route('topic.delete',['id'=>$t->id]) }}"
                                                    class="btn btn-sm btn-white text-hover-purple text-uppercase col-5 ml-3">
                                                    <i class="fa fa-times mr-2" aria-hidden="true"></i>حذف
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
            @else
                    <div class="w-50 text-dark text-center font-weight-bolder mx-auto">
                        <h3>لا يوجد مواضيع</h3>
                    </div>
            @endif
        </div>
</section>
@endsection
