<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Todo List</title>
</head>

<body>
    <div class="container-fluid w-full h-screen flex justify-center py-16">
        <div class="w-2/4 relative flex flex-col border-1 border-[#ccc] background-white shadow-md rounded-md rounded-lg">
            <h1 class="ml-2 mt-4 font-bold text-3xl text-gray-500">TO-DO LIST</h1>
            <form action="{{route ('store') }}" method="post" autocomplete="off" class="mt-3 w-full p-2 text-center">
                @csrf
                <div class="container flex justify-between items-center space-x-4">
                    <input type="text" name="todo" autofocus class="w-full p-2 border-none outline-none bg-white shadow-sm" placeholder="Add new todo...">
                    <button type="submit" class="text-orange-600 px-4 py-2 bg-white shadow-sm hover:bg-orange-600 hover:text-white"><i class="fa fa-plus"></i></button>
                </div>
            </form>
            @if ($todolists->count())
            <ul class="w-full px-4 overflow-y-auto py-4">
                @foreach ($todolists as $item)
                <li class="border-b py-3">
                    <form action="{{ route ('destroy', $item->id)}}" method="POST" class="w-full flex justify-between items-center">
                        <span class="text-blue-400">{{$item->todo}}</span>
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-center text-gray-400"><i class="fas fa-trash"></i></button>
                    </form>
                </li>
                @endforeach
            </ul>
            @endif
            @if ($todolists->count())
            <div class="w-full absolute left-0 bottom-0 rounded-b-md bg-gray-300 px-2 py-4 text-center">
                <h2 class="text-xl text-orange-600">You have {{$todolists->count()}} {{Str::plural('todo', $todolists->count())}}</h2>
            </div>
            @else
            <div class="w-full absolute left-0 bottom-0 rounded-b-md bg-gray-300 px-2 py-4 text-center">
                <h2 class="text-xl text-orange-600">No Todo's</h2>
            </div>
            @endif
        </div>
    </div>
</body>

</html>
