@extends('layouts.plantillaBase')
@section('contenido')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content text-center p-md">
                        @foreach($empresa as $item)
                        <h2><span class="text-navy">{{$item->nombre}}</span></h2>
                        <p>
                            {{$item->lema}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-content text-center p-md">
                        <h4 class="m-b-xxs">Top navigation, centered content layout</h4>
                        <small>(optional layout)</small>
                        <p>Available configure options</p>
                        <span class="simple_tag">Scroll navbar</span>
                        <span class="simple_tag">Top fixed navbar</span>
                        <span class="simple_tag">Boxed layout</span>
                        <span class="simple_tag">Scroll footer</span>
                        <span class="simple_tag">Fixed footer</span>
                        <div class="m-t-md">
                            <p>Check the Dashboard v.4 with top navigation layout</p>
                            <div class="p-lg ">
                                <a href="dashboard_4.html"><img class="img-fluid img-shadow" src="img/dashboard4_2.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Imagenes Corporativas</h5>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" href="{{route('empresa.edit',$item->id)}}">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="width: 25rem;" src="{{asset('images/'.$item->logo_republica)}}" alt="">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p style="background-color: #000;opacity: 0.5;">Logo de la Republica</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="width: 25rem;" src="{{asset('images/'.$item->logo_municipio)}}" alt="">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p style="background-color: #000;opacity: 0.5;">Logo del Municipio</p>
                                    </div>
                                </div>
                                <div class="carousel-item active">
                                    <img class="d-block w-100" style="width: 25rem;" src="{{asset('images/'.$item->logo_plandesarrollo)}}" alt="">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p style="background-color: #000;opacity: 0.5;">Logo del Plan de Desarrollo</p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>


        </div>


    </div>

@endsection