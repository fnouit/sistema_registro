@extends('layout.app')
@section('titulo','Captura')
@section('container')
@section('banner')
        <section id="home">
            <div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                <!-- START REVOLUTION SLIDER 5.4.1 auto mode -->
                <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                    <ul>	
                        <li data-index="rs-3046" data-transition="parallaxtoleft" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <img src="{{asset('images/bg4.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        </li>
                    </ul>
                    <div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>	
                </div>
            </div><!-- END REVOLUTION SLIDER -->
        </section>
@endsection
<h3 class="font300 mb20  h2" align="center">
    <b>Campamento Deportivo</b><br>
    <span class="text-primary"> <strong>2019</strong> </span>
</h3>



<div class="section text-center">
    <h2>EL REGISTRO A CONCLUIDO</h2>
</div>

@stop


@section('banner2')
<a href="http://sistema_registro.test/images/bg4.jpg" class="btn btn-block btn-primary pt40 pb40 btn-lg">DESCARGA LA CONVOCATORIA .</a>
@endsection

@section('script')

<script type="text/javascript">
$('#region').on('change', onSelectRegion);

function onSelectRegion() {
    var region_id = $(this).val();
    $.get('/regiones/' + region_id + '/delegaciones', function(data) {

        $('#delegacion').empty();

        $('#delegacion').append('<option disabled selected>SELECCIONA DELEGACIÓN</option>');
        for (var i = 0; i < data.length; ++i)
            $('#delegacion').append('<option value="' + data[i].id + '">' + data[i].delegacion + " - " + data[i]
                .sede + '</option>');
        return;
    });
}
</script>

@endsection