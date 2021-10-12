@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 mt-5 mb-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
         <!-- <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
          </div>
        -->
          <div class="carousel-inner">
            @for ($i = 1; $i <= 10; $i++)
              <div class="{{$i === 1 ? 'carousel-item active' : 'carousel-item' }}">
                <img src="{{url('img/carousel/imag-'.$i.'.jpg')}}" class="d-block w-100" alt="..." width="660px" height="450px" style="object-fit:scale-down;">
              </div>
            @endfor
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
  sdLorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque, eligendi eaque fugit error iure, debitis cupiditate sint quia adipisci et aliquam velit. Iste repudiandae consectetur est similique vitae, nam velit.
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem iure tempora minus autem ducimus aspernatur! Quas sequi, odit nostrum tempora quos iste unde architecto consectetur possimus eaque. Ipsa, reiciendis laudantium.

  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga sapiente id eum dolor fugit neque aut. Similique voluptatem, labore impedit assumenda, atque exercitationem ab ullam alias consequuntur voluptas porro suscipit.
  <br>
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus excepturi incidunt in voluptatum, harum error ipsam quasi eaque quos optio, sapiente necessitatibus cumque laborum ipsum fugiat minima quis corrupti officia!
  <br>
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, non! Quas nostrum quibusdam magni autem vitae corporis perspiciatis asperiores, velit porro, quaerat dolorem quae tempore incidunt sint rem! Laudantium, odit?
  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore eum laboriosam laudantium asperiores sint dignissimos magni nemo ea? Vitae voluptatum dolor tempora quod facilis tenetur esse corporis officiis deleniti in.
</div>
@endsection