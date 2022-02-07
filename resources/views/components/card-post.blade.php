@props(['post'])
<article class="mt-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}">

    <div class="px-6 py-4">
        <h1>
            <a href="{{route('posts.show', $post)}}" class="font-bold text-xl mb-2 text-gray-800">
                {{$post->name}}
            </a>
        </h1>

        <div>
            {{$post->extract}}
        </div>
    </div>
    <div class="px-6 py-4 pb-2">
        
        @foreach($post->tags as $tag)
            @php
                switch($tag->color){
                    case "blue":                
                        $bgcolor = "bg-blue-500";                    
                    break;

                    case "green":                
                        $bgcolor = "bg-green-500";                    
                    break;

                    case "pink":                
                        $bgcolor = "bg-pink-500";                    
                    break;

                    case "purple":                
                        $bgcolor = "bg-purple-500";                    
                    break;

                    case "red":                
                        $bgcolor = "bg-red-500";                    
                    break;

                    case "indigo":                
                        $bgcolor = "bg-indigo-500";                    
                    break;

                    default: $bgcolor = "bg-red-500";
                }
            @endphp
            <a href="{{route('posts.tag', $tag)}}" class="{{$bgcolor}} inline-block rounded-full text-gray-800 px-3 py-1 text-sm mr-2">
                {{$tag->name}}
            </a>
        @endforeach
    </div>
</article>