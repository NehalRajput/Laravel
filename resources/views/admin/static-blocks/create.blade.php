<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
            padding: 10px;
            border: 1px solid #ddd;
            width: 300px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .center {
            margin: auto;
            width: 70%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }

        .center th, .center td {
            padding: 15px;
            color: white;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .note-editor {
            margin: auto;
            width: 80%;
            margin-bottom: 20px;
        }

        .note-editor .note-editable {
            background-color: white;
            color: black;
            min-height: 200px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <div class="div_center">
                    <h2 class="h2_font">Create Static Block</h2>

                    <form action="{{ route('static-blocks.store') }}" method="POST">
                        @csrf
                        <div>
                            <input class="input_color" type="text" name="title" placeholder="Enter block title" required>
                        </div>
                        <div>
                            <input class="input_color" type="text" name="slug" placeholder="Enter block slug (e.g., footer, about-us)" required>
                        </div>
                        <div>
                            <textarea id="summernote" name="content" required></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Create Block</button>
                        </div>
                    </form>
                </div>

                <table class="center">
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                    @foreach($staticBlocks ?? [] as $block)
                    <tr>
                        <td>{{ $block->title }}</td>
                        <td>{{ $block->slug }}</td>
                        <td>{{ Str::limit($block->content, 100) }}</td>
                        <td>
                            <form action="{{ route('static-blocks.destroy', $block->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @include('admin.script')
</body>
</html>