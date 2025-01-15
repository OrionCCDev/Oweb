<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>upload maximam 10 photos at time</h1>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <select name="project_id" id="">
            @foreach ($data as $project )
            <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
        <select name="project_collection" id="">

            <option value="flipster">flipster</option>
            <option value="mini_gallary">mini_gallary</option>

        </select>
        <input type="file" name="pro_images[]" multiple id="">
        <button>upload</button>
    </form>
</body>

</html>