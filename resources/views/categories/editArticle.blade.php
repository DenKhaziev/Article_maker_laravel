@extends('layouts.layout')
<h1 class="max-w-full mb-4 mt-5 text-3xl font-extrabold tracking-tight leading-none md:text-5xl dark:text-white text-center">Изменить категорию</h1>
<div class="max-w-2xl mx-auto">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <a href="{{route('articles.show', $articlesInView->id)}}" class="mb-5 font-medium text-sm inline-flex items-center text-blue-500 hover:text-blue-800">
            <svg class="mr-1 -ml-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
            </svg>
            {{$articlesInView->article_name}}
        </a>
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Изменить категорию
                </h3>
            </div>
            <form action="{{route('articles.category.store', $articlesInView->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-4">
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Выберите категорию</label>
                        <select name="category_id" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach($categories as $category)
                                <option
                                    @if(!isset($articlesInView->category->id))
                                        {{''}}
                                    @else
                                        {{$category->id === $articlesInView->category->id ? ' selected' : ''}}
                                    @endif
                                    value="{{$category->id}}">
                                    {{$category['category_name']}}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:focus:ring-yellow-900">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Изменить
                </button>
            </form>
        </div>
    </div>
</div>

