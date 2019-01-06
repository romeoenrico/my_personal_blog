<section class="main-slider">
     <ul class="bxslider">
         @foreach ($articlesForSlider as $articleSlider)
        
          <li>
             <div class="slider-item"><img src="{{ asset('uploads/images') . "/" . $articleSlider->post_image }}" title="{{ $articleSlider->title }}" />
               <h2>
                 <a href="{{url('articolo/' . $articleSlider->slug) }}" title="{{$articleSlider->title}}">
                 </a>
               </h2>
             </div>
           </li>
         @endforeach

     </ul>
 </section>
