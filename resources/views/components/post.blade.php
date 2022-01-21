 @props(["post"=>$post])

 <div class="mb-4">
     <a href="{{route('user.posts',$post->user)}}" class="font-bold mr-2">{{$post->user->name}}</a><span class="text-gray-600 text-sm">{{$post['created_at']->diffForHumans()}}</span>
     <p class="mb-2">{{$post['body']}}</p>
     @auth
     @if ($post->ownedby(auth()->user()))
     <div>
         <form action="{{route('posts.destroy',$post)}}" method="post" class="mr-2">
             @csrf
             @method('delete')
             <button type="submit" class="text-blue-500">Delete</button>
         </form>
     </div>
     @endif
     @endauth

     <div class="flex items-center">
         @auth
         @if (!$post->likedby(auth()->user()))
         <form action="{{route('posts.likes',$post)}}" method="post" class="mr-2">
             @csrf
             <button type="submit" class="text-blue-500">Like</button>
         </form>
         @else
         <form action="{{route('posts.likes',$post)}}" method="post" class="mr-2">
             @csrf
             @method('delete')
             <button type="submit" class="text-blue-500">Unlike</button>
         </form>
         @endif
         @endauth
         @if ($post->likes->count())
         <span>{{$post->likes->count()}} {{ Str::plural('like',$post->likes->count())}} </span>
         @else

         @endif
     </div>
 </div>