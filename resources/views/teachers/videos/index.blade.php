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
                href="{{ route('teacher.video.create') }}">إضافة فيديو جديد</a>
        </div>
        <div class="section-title justify-content-center mb-4 mb-md-8">
            <span class="shape shape-left bg-info"></span>
            <h2 class="text-danger">الفيديوهات</h2>
            <span class="shape shape-right bg-info"></span>
        </div>

        <div class="row">
            @if($videos->count() > 0)
                <div class="col-md-8 col-lg-9">
                    <div class="row">
                        @foreach ($videos as $video)
                        	<div class="col-sm-6 col-xl-4 col-xs-12">
                                <div class="card">
                                    <a href="{{ route('teacher.video.show' ,['id'=>$video->id]) }}" class="position-relative">
                                        <img class="card-img-top" src="/img/courses/courses-img4.jpg" alt="Card image">
                                        <div class="card-img-overlay">
                                            <span class="badge badge-info badge-rounded-circle">
                                                <i class="fa fa-youtube-play"></i></span>
                                        </div>
                                    </a>
                                    <div class="card-body border-top-5 px-3 rounded-bottom border-info">
                                        <h3 class="card-title">
                                            <a class="text-info text-capitalize d-block text-truncate" 
                                                href="{{ route('teacher.video.show' ,['id'=>$video->id]) }}">{{ $video->title }}</a>
                                        </h3>
                                        <ul class="list-unstyled text-muted">
                                            <li>
                                                <i class="fa fa-calendar-o mr-2" aria-hidden="true"></i> 
                                                    {{ $video->created_at->locale('Ar')->diffForHumans() }}
                                            </li>
                                        </ul>
                                        <p>{{ $video->description }}</p>
                                        <div class="d-block">
                                            <div class="row">
                                                <a href="{{ route('teacher.video.edit',['id'=>$video->id]) }}"
                                                    class="btn btn-sm btn-white text-hover-purple text-uppercase col-5 ml-2">
                                                    <i class="fa fa-edit mr-2" aria-hidden="true"></i>تعديل
                                                </a>
                                                <a href="{{ route('teacher.video.delete',['id'=>$video->id]) }}"
                                                    class="btn btn-sm btn-white text-hover-purple text-uppercase col-5 ml-3">
                                                    <i class="fa fa-times mr-2" aria-hidden="true"></i>حذف
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                </div>
                <div class="col-md-4 col-lg-3 d-none">
                    <form>
                        <div class="card shadow-none bg-transparent">
                            <h3 class="card-header bg-warning font-weight-bold rounded-top text-white">Search</h3>
                            <div class="card-body border border-top-0 rounded-bottom">
                                <div class="input-group border-bottom pb-3 pt-4">
                                    <input type="text" class="form-control border-0 px-1"
                                        placeholder="Enter Your Search" aria-describedby="basic-addon2">
                                    <span class="input-group-addon" id="basic-addon2">
                                        <input class="btn btn-sm btn-warning text-uppercase text-white shadow-sm"
                                            type="submit" value="Search">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card shadow-none bg-transparent overflow-hidden">
                        <h3 class="card-header bg-success font-weight-bold rounded-top text-white">Filter By</h3>
                        <div class="card-body border border-top-0 rounded-bottom">
                            <div class="filter">
                                <div class="mb-4 pt-3">
                                    <select class="select2-select w-100 bg-white" name="state">
                                        <option value="0">Select By Gender</option>
                                        <option value="1">Boys</option>
                                        <option value="2">Girls</option>
                                    </select>
                                </div>
                                
                            </div>

                            <div class="price-range-content">
                                <input class="btn btn-success text-white text-uppercase" type="submit"
                                    value="Filter">
                            </div>
                            
                        </div>
                    </div>
                </div>
            @else
                    <div class="w-50 text-dark text-center font-weight-bolder mx-auto">
                        <h3>لا يوجد فيديوهات</h3>
                    </div>
            @endif
        </div>
</section>
@endsection