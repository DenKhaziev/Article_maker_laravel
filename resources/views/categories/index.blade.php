@extends('layouts.layout')
<h1 class="max-w-full mb-4 mt-5 text-3xl font-extrabold tracking-tight leading-none md:text-5xl dark:text-white text-center">Список категорий</h1>

<div class="relative overflow-x-auto w-[35%] sm:rounded-lg mx-auto mt-9">
    <a href="{{route('index')}}" class="mb-5 font-medium text-sm inline-flex items-center text-blue-500 hover:text-blue-800">
        <svg class="mr-1 -ml-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
        </svg>
        Список статей
    </a>

    @if(auth()->user()->isAdmin())
        <div>
            <a href="{{route('categories.create')}}" class="inline-block focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Добавить</a>
        </div>
    @endif
</div>

<div class="relative overflow-x-auto shadow-md w-[35%] sm:rounded-lg mx-auto mt-9">
    <table class="text-sm w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Название
            </th>

            <th scope="col" class="px-6 py-3">
                Кол-во статей
            </th>
            @if(auth()->user()->isAdmin())
                <th scope="col" class="px-6 py-3">
                    Действия
                </th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($categoriesInView as $category)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$category->category_name}}
                </th>

                <td class="px-6 py-4">
                    {{count($category->articles)}}
                </td>

                <td class="px-6 py-4 flex">
                    @can('update', $category )
                        <a href="{{route('categories.edit', $category->id)}}" class="p-1" title="Редактировать">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" >
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                        </a>
                    @endcan

                    @can('delete', $category)
                        <form action="{{route('categories.destroy', $category->id)}}" method="post">
                            @csrf
                            @method('delete')
                                <button type="submit" class="d-flex align-items-end">
                                    <a href="" class="p-1" title="Удалить" onClick="return confirm('Вы уверены?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" >
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                        </svg>
                                    </a>
                                </button>
                        </form>
                    @endcan
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>

