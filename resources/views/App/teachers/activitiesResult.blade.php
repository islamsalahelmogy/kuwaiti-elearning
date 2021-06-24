@extends('app.layout')
@section('style')
    @parent
    <style>
        @media (min-width: 992px) {
            .table-cart tbody tr td {
                padding: 20px 0 20px 0;
            }
        }
        .table-cart tbody tr td:first-child {
            padding: 20px 0 20px 0;

        }
        .table-cart thead tr th {
            color: #000;
        }
    </style>
@endsection
@section('content')
<section class="py-8">
    <div class="container">
        <div class="table-responsive-sm table-cart text-center">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">إسم الطالب</th>
                        <th scope="col">عدد الأسئلة</th>
                        <th scope="col">الإجابات الخاطئة</th>
                        <th scope="col">النتيجة</th>
                        <th scope="col">مجموع الدرجات</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($activity->students()->orderBy('created_at','DESC')->get() as $student)
                        <tr>
                            <td class="td-product-name">{{ $student->name }}</td>
                            <td>{{strtr(strval($activity->questions->count() ),array('0'=>'٠','1'=>'١','2'=>'٢','3'=>'٣','4'=>'٤','5'=>'٥','6'=>'٦','7'=>'٧','8'=>'٨','9'=>'٩')) }}</td>
                            <td>{{ $student->studentResult->wrong_answer }}</td>
                            <td>{{strtr(strval($student->studentResult->result + 0),array('0'=>'٠','1'=>'١','2'=>'٢','3'=>'٣','4'=>'٤','5'=>'٥','6'=>'٦','7'=>'٧','8'=>'٨','9'=>'٩')) }}</td>
                            <td>{{strtr(strval($activity->questions->count()),array('0'=>'٠','1'=>'١','2'=>'٢','3'=>'٣','4'=>'٤','5'=>'٥','6'=>'٦','7'=>'٧','8'=>'٨','9'=>'٩')) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection