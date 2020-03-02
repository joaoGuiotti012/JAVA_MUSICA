@extends('layouts.app')
<style>
    section {
    padding-top: 4rem;
    padding-bottom: 5rem;
    background-color: #f1f4fa;
}
.wrap {
    display: flex;
    background: white;
    padding: 1rem 1rem 1rem 1rem;
    border-radius: 0.5rem;
    box-shadow: 7px 7px 30px -5px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}

.wrap:hover {
    background: linear-gradient(135deg, #3970a7 0%,#0a193b 100%);
    color: white;
}

.ico-wrap {
    margin: auto;
}

.mbr-iconfont {
    font-size: 4.5rem !important;
    color: #313131;
    margin: 1rem;
    padding-right: 1rem;
}
.vcenter {
    margin: auto;
}

.mbr-section-title3 {
    text-align: left;
}
h2 {
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}
.display-5 {
    font-family: 'Source Sans Pro',sans-serif;
    font-size: 1.4rem;
}
.mbr-bold {
    font-weight: 700;
}

 p {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    line-height: 25px;
}
.display-6 {
    font-family: 'Source Sans Pro',sans-serif;
    font-size: 1re}
</style>

@section('content')
<br>
    <div class="container">
            <div class="row mbr-justify-content-center">
    
                <div class="col-lg-6 mbr-col-md-10">
                    <div class="wrap">
                        <div class="ico-wrap">
                            <span class="mbr-iconfont fa-volume-up fa "></span>
                        </div>
                        <div class="text-wrap vcenter">
                            <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Stay <span>Successful</span></h2>
                            <p class="mbr-fonts-style text1 mbr-text display-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mbr-col-md-10"  onclick="location.href='{{ url('/agendamento') }}'">
                    <div class="wrap">
                        <div class="ico-wrap">
                            <span class="mbr-iconfont fa-calendar fa"></span>
                        </div>
                        <div class="text-wrap vcenter">
                            <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Agendamento
                                <span>de Visitantes</span>
                            </h2>
                            <p class="mbr-fonts-style text1 mbr-text display-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mbr-col-md-10">
                    <div class="wrap">
                        <div class="ico-wrap">
                            <span class="mbr-iconfont fa-globe fa"></span>
                        </div>
                        <div class="text-wrap vcenter">
                            <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Launch
                                <span>A Unique Project</span>
                            </h2>
                            <p class="mbr-fonts-style text1 mbr-text display-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mbr-col-md-10">
                    <div class="wrap">
                        <div class="ico-wrap">
                            <span class="mbr-iconfont fa-trophy fa"></span>
                        </div>
                        <div class="text-wrap vcenter">
                            <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Achieve <span>Your Targets</span></h2>
                            <p class="mbr-fonts-style text1 mbr-text display-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
 
@endsection
