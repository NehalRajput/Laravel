<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;

        }

        .text_color {
            color: black;
            padding-bottom: 20px;

        }
        label{
            display: inline-block;
            
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
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div_center">
                    <h1 class="font_size">Add Product</h1>

                    <div>
                        <label>Product Title</label>
                        <input class="text_color" type="text" name="title" placeholder="write a title">

                    </div>

                    <div>
                        <label>Product Title :</label>
                        <input class="text_color" type="text" name="title" placeholder="write a title">

                    </div>
                    <div>
                        <label>Product Description :</label>
                        <input class="text_color" type="text" name="Description" placeholder="write a Description>

                    </div>
                    <div>
                        <label>Product Price :</label>
                        <input class="text_color" type="number" name="price" placeholder="write a price">

                    </div>
                    <div>
                        <label>Discount Price</label>
                        <input class="text_color" type="number" name="dis_price" placeholder="write a Discount is apply">

                    </div>
                    <div>
                        <label>Product Quantity :</label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="write a quantity">

                    </div>
                   
                    <div>
                        <label>Product Category :</label>
                          <select class="text_color" name="category">
                            <option>shirt</option>
                          </select>
                    </div>

                    <div>
                        <label>Product Image Here:</label>
                      <input type="file" name="image">
                    </div>
  

                    <div>
                        <input type="submit">
                    </div>
                

                </div>
            </div>
        </div>
        <!-- main-panel ends -->


        <!-- page-body-wrapper ends -->

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>
