   <!-- social widget -->
   <div class="aside-widget">
       <div class="section-title">
           <h2 class="title">السوشيال ميديا</h2>
       </div>
       <div class="social-widget">
           <ul>
               <li>
                   <a href="{{ $facebook }}" class="social-facebook">
                       <i class="fa fa-facebook"></i>
                       <span>{{ $facebook_followers_count }}<br>متابع</span>
                   </a>
               </li>

               <li>
                   <a href="{{ $youtube }}" class="social-google-plus">
                       <i class="fa fa-youtube"></i>
                       <span>{{ $youtube_followers_count }}<br>متابع</span>
                   </a>
               </li>
               <li>
                   <a href="{{ $instagram }}" class="social-instagram">
                       <i class="fa fa-instagram"></i>
                       <span>{{ $instagram_followers_count }}<br>متابع</span>
                   </a>
               </li>
           </ul>
       </div>
   </div>
   <!-- /social widget -->

   <!-- Ad widget -->
   <div class="aside-widget text-center">
       <a href="#" style="display: inline-block;margin: auto;">
           {!! $side_ad !!}
       </a>
   </div>
   <!-- /Ad widget -->


   <!-- post widget -->
   <div class="aside-widget">
       <div class="section-title">
           <h2 class="title">رشحنا لك</h2>
       </div>


       @foreach ($side_posts as $post)
           <!-- post -->
           <div class="post post-widget">
               <a class="post-img" href="{{ route('website.posts.show', $post) }}"><img src="{{ $post->image }}"
                       alt="{{ $post->name }}"></a>
               <div class="post-body">
                   <div class="post-category">
                       <a
                           href="{{ route('website.categories.show', $post->category) }}">{{ $post->category->name }}</a>
                   </div>
                   <h3 class="post-title"><a href="{{ route('website.posts.show', $post) }}">{{ $post->name }}</a>
                   </h3>

               </div>
           </div>
           <!-- /post -->
       @endforeach




   </div>
   <!-- /post widget -->
