<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li class="py-5 bg-red-700 text-white font-bold">{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>


                <form action="{{route('admin.projects.update', $project)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="flex flex-col gap-y-5">
                        <div class="flex flex-col gap-y-2">
                            <h1 class="text-3xl test-indigo-950 font-bold">
                                Add new project
                            </h1>
                            <h3>
                                Name
                            </h3>
                            <input value="{{$project->name}}" type="text" id="name" name="name">
                            <div class="flex flex-col gap-y-2">
                                <h3>
                                    category
                                </h3>
                                <select name="category" id="category">
                                    <option selected value="{{$project->category}}">{{$project->category}}</option>
                                    <option value="Performance Test">Performance Test</option>
                                    <option value="Manual Test">Manual Test</option>
                                    <option value="Katalon Test">katalon</option>
                                    <option value="Postman">Postman</option>
                                    <option value="Cypress">Cypress</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-y-2">
                                <h3>
                                    cover image
                                </h3>
                                <img src="{{Storage::url($project->cover)}}"
                                    alt="" class="object-cover w-[120px] h-[90px] rounded-2xl">
                                <input type="file" id="cover" name="cover">
                            </div>
                            <div class="flex flex-col gap-y-2">
                                <h3>
                                    about
                                </h3>
                                <textarea id="about" name="about">{{$project->about}}</textarea>
                            </div>
                            <button type="submit" class="py-4 w-full rounded-full bg-violet-700 font-bold text-white">Update project</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>