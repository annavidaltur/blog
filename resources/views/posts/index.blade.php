<x-app-layout>
    <div class="container py-8 bg-green-200">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2022/01/16/13/49/dog-6942065_960_720.jpg @endif)">
                    <div class="v-full h-full px-8 flex flex-col justify-center">
                        <div>
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
                                <a href="{{route('posts.tag', $tag)}}" class="inline-block mb-2 px-3 h-6 {{$bgcolor}} text-white rounded-full">{{$tag->name}}</a>
                            @endforeach
                        </div> 
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{route('posts.show', $post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>