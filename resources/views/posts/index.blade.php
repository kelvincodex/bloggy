@extends('layouts.app')

@section('content')
<div class="flex justify-center">
 <div class="w-8/12 bg-white p-6 rounded-lg ">
  <form action="{{route('posts')}}" method="post" class="mb-4">
   @csrf
   <div class="mb-4">
    <label for="body">Body</label>
    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-200 @enderror"></textarea>
    @error('body')
    <div class="text-red-400 mt-2 text-sm">{{ $message }}</div>
    @enderror
   </div>
   <div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
   </div>
  </form>
  @if (count($posts) > 0)
  @foreach ($posts as $post)
   <x-post :post="$post" />
  @endforeach
  {{ $posts->links('pagination::tailwind')}}

  @else
  <div class="text-center">No posts</div>
  @endif

 </div>
</div>
@endsection