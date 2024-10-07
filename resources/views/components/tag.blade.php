@props(['tag'])

<a href="/tags/{{strtolower($tag->name)}}" {{$attributes}} class="bg-white/10 transition-colors duration-300 hover:bg-white/25 px-3 py-1 rounded-xl">{{$tag->name}}</a>
