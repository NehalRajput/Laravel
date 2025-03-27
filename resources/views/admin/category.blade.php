<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            margin-right: 10px;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }

        .center td {
            padding: 10px;
            color: white;
            border: 1px solid #ddd;
        }

        .alert {
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
        }
    </style>
</head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     
       @include('admin.sidebar')
      <!-- partial -->
    
        <!-- partial:partials/_navbar.html -->
       @include('admin.header')
        <!-- partial -->
       
        <!-- main-panel ends -->
        <div class="main-panel">
            <div class="content-wrapper">
                 
                @if(session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden ="true">x</button>

                    {{session()->get('message')}}   
                </div>


                @endif
                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>

                    <form id="categoryForm">
                        @csrf
                        <input class="input_color" type="text" name="category" placeholder="write category name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                    </form>
                </div>

                <table class="center">
                    <tr>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>
                    <tbody id="categoryTableBody">
                        @foreach ($data as $category)
                        <tr>
                            <td>{{$category->category_name}}</td>
                            <td>
                                <form action="{{ route('admin.category.delete', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Include jQuery -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                
                    $('#categoryForm').on('submit', function(e) {
                        e.preventDefault();
                        
                        let categoryInput = $('input[name="category"]').val();
                        if (!categoryInput) {
                            alert('Please enter a category name');
                            return;
                        }
                    
                        $.ajax({
                            url: "/admin/add-category",
                            type: "POST",
                            data: {
                                category: categoryInput,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            success: function(response) {
                                if(response.success) {
                                    // Create new row with the returned category data
                                    var newRow = `
                                        <tr>
                                            <td>${response.category.category_name}</td>
                                            <td>
                                                <form action="/admin/delete-category/${response.category.id}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    `;
                                    
                                    // Add the new row to the table
                                    $('#categoryTableBody').append(newRow);
                                    
                                    // Clear the input field
                                    $('input[name="category"]').val('');
                                    
                                    // Show success message
                                    $('.content-wrapper').prepend(`
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            ${response.message}
                                        </div>
                                    `);
                                }
                            },
                            error: function(xhr) {
                                let errorMessage = 'Error adding category';
                                if (xhr.responseJSON && xhr.responseJSON.message) {
                                    errorMessage = xhr.responseJSON.message;
                                }
                                
                                $('.content-wrapper').prepend(`
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                        ${errorMessage}
                                    </div>
                                `);
                            }
                        });
                    });
                
                    
                </script>

                @include('admin.script')
            </div>
        </div>
   
        
      <!-- page-body-wrapper ends -->
    
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>