<x-layout :title="$title">


    <!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <a href="/post" class="font-medium text-xs text-blue-500 hover:underline">Back to all posts</a>
            <header class="my-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) :  asset('img/default.jpg') }}" alt="{{ $post->author->name }}" alt="{{ Auth::user()->avatar }}">
                        <div>
                            <a href="/authors/{{ $post->author->username }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                            <span class="bg-primary-100 {{ $post->category->color }} text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                                <a class="block" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                            </span>
                            <p>
                                <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post['judul'] }}</h1>
            </header>
            <div>{!! $post->body !!}</div>
        </article>
    </div>
</main>


</x-layout>
