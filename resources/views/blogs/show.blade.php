@extends('layouts.homeLayout')
@section('content')
<section class="home-slider ftco-degree-bg">
      <div class="slider-item bread-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">
            <div class="col-md-10 col-sm-12 ftco-animate mb-4 text-center">
              <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="blog.html">Blog</a></span> <span>Single Blog</span></p>
              <h1 class="mb-3">Single Blog</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <input type="hidden" id="blog_id" value="{{$blog->id}}">
   <!-- we put this script above comment component to make the interpreter interpret  blog id before it goes to the comment componnent to make it globally for this component -->
   <script>
  let blogId = document.getElementById('blog_id').value;
  // 
</script>
    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3">{{$blog->title}}</h2>
           
            <p>{{$blog->body}}</p>
            <p>
              <img src="{{asset($blog->blog_image)}}" alt="" class="img-fluid">
            </p>
            
            @if($blog->user->id == auth()->user()->id)
            <form method="post" action="{{route('blogs.destroy',['id'=>$blog->id])}}">  
              @csrf
              @method('DELETE')         
              <a class="btn btn-primary py-3 px-5" href="{{route('blogs.edit',['id'=>$blog->id])}}">Edit</a>
               <button type="submit" class="btn btn-danger py-3 px-5" >Delete</button>
            </form>
            @endif 
             
            
            
           


            <div class="pt-5 mt-5">

              
               

              <h3 class="mb-5">
              {{$blog->comments_count}}
              Comments
              </h3>
              <div id="app">
              <!-- we bind the auth user to use it in vue in vue props to know each user send comment -->
                <comment-component :user="{{auth()->user()}}"></comment-component>
                
            </div>
              
              <!-- END comment-list -->
              
              
            </div>

          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
            
          <div class="sidebar-box ftco-animate">
            <h3>Created by</h3>
            <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{asset($blog->user->avatar)}});"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">{{$blog->user->name}}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {{$blog->user->created_at}}</a></div>
                    <!-- <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div> -->
                  </div>
                </div>
              </div>
          </div>


            <div class="sidebar-box ftco-animate">
              <h3>Recent Blogs</h3>
              
             @isset($recentBlogs)
             @foreach($recentBlogs as $recentBlog)
             
             @if($recentBlog->id != $blog->id)
              <div class="block-21 mb-4 d-flex">
                <a href="{{route('blogs.show',['id'=>$recentBlog->id])}}" class="blog-img mr-4" style='background-image: url("{{asset($recentBlog->blog_image)}}");'></a>
                <div class="text">
                  <h3 class="heading"><a href="{{route('blogs.show',['id'=>$recentBlog->id])}}">{{$recentBlog->title}}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {{$recentBlog->created_at->diffForHumans()}}</a></div>
                    <div><a href="#"><span class="icon-person"></span> {{$recentBlog->user->name}}</a></div>
                  </div>
                </div>
              </div>
              @else
              @endif
              @endforeach
              @endisset
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <div class="tagcloud">
                @isset($tags)
                @foreach($tags as $tag)
                <a href="{{route('tag.blogs',['tag'=>$tag->name])}}" class="tag-cloud-link">{{$tag->name}}</a>
              @endforeach
              @else
              <a href="#" class="tag-cloud-link">There's No Tags</a>

                @endisset
              </div>
            </div>

            
          </div>

        </div>
      </div>
    </section> 

@endsection