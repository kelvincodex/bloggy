@extends('layouts.app')

@section('content')
<div class="flex justify-center">
 <div class="w-4/12 bg-white p-6 rounded-lg ">
  <form action="{{ route('register') }}" method="post">
   @csrf
   @method('post')
   <div class="mb-4">
    <label for="name" class="sr-only">name</label>
    <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">
    @error('name')
    <div class="text-red-500 mt-2 text-sm">
     {{ $message }}
    </div>
    @enderror
   </div>

   <div class="mb-4">
    <label for="username" class="sr-only">username</label>
    <input type="text" name="username" id="username" placeholder="Your username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">
    @error('username')
    <div class="text-red-500 mt-2 text-sm">
     {{ $message }}
    </div>
    @enderror
   </div>

   <div class="mb-4">
    <label for="email" class="sr-only">email</label>
    <input type="email" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
    @error('email')
    <div class="text-red-500 mt-2 text-sm">
     {{ $message }}
    </div>
    @enderror
   </div>

   <div class="mb-4">
    <label for="password" class="sr-only">password</label>
    <input type="password" name="password" id="password" placeholder="Your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" >
    @error('password')
    <div class="text-red-500 mt-2 text-sm">
     {{ $message }}
    </div>
    @enderror
   </div>

   <div class="mb-4">
    <label for="repassword" class="sr-only">re-password</label>
    <input type="password" name="password_confirmation" id="repassword" placeholder="Re-password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('repassword') border-red-500 @enderror" value="{{ old('repassword') }}">
    @error('repassword')
    <div class="text-red-500 mt-2 text-sm">
     {{ $message }}
    </div>
    @enderror
   </div>

   <div>
    <button class="bg-blue-500 text-center px-4 py-4 rounded font-medium w-full">Register</button>
   </div>
  </form>
 </div>
 @endsection