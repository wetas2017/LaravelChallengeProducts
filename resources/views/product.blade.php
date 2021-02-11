<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Product Managmenet System</title>
  </head>
  <body>
      <!-- Add Navbar -->
    @include("navbar")

    <!--Display Filter -->
    <div class="container-fluid mt-4 pt-3">
            <form action="{{ url('/') }}" method="GET">
                <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                            <select name="query" class="form-group">
                                <option value="">Select Category To Filter By</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="container-fluid md-4">
                    <button type="submit" class="btn btn-primary py-2">Filter</button>
                </div>


            </form>

    </div>







<!--Display Sort Choices -->
<!--Still working on it -->
    <div class="container pt-2">
            <div class="col-md-12">
                <span><strong>Sort By:</strong></span>
                <a href="{{ URL::current() }}">All</a>
                <a href="{{ URL::current().'?sort=price_asc' }}">Price - Low to Hight</a>
                <a href="{{ URL::current().'?sort=price_desc' }}">Price - Hight to Low</a>
                <a href="{{ URL::current().'?sort=a_to_z' }}">A-Z</a>
                <a href="{{ URL::current().'?sort=z_to_a' }}">Z-A</a>
            </div>

    </div>
<!--Display Index layout-->
    @if ($layout == 'index')
        <div class="container-fluid mt-4">
            <div class="row">
                <section class="col-md-7">
                    @include("productslist")
                </section>

                <section class="col-md-5"></section>
            </div>
        </div>

<!--Display create layout-->
    @elseif($layout == 'create')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col-md-7">
                @include("productslist")
            </section>
            <section class="col-md-5">
                <form action="{{ url('/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                    <label>Product Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Enter product name">
                  </div>
                  <div class="mb-3">
                    <label>Description</label>
                    <input name="description" type="text" class="form-control" placeholder="Enter product description">
                  </div>
                  <div class="mb-3">
                    <label>Price</label>
                    <input name="price" step="any" type="number" class="form-control" placeholder="Enter product price">
                  </div>
                  <div class="mb-3">
                    <label>Image</label>
                    <input name="image" type="file" class="form-control" accept="imag/*">
                  </div>
                  <div class="mb-3">
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <input type="submit" class="btn btn-info" value="Save">
                  <input type="reset" class="btn btn-warning" value="Reset">
                </form>
            </section>
        </div>
    </div>


    <!--Display edit layout-->
    @elseif($layout == 'edit')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col-md-7">
                @include("productslist")
            </section>
            <section class="col-md-5">
                <form action="{{ url('/update/'.$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                <div class="mb-3">
                    <label>Product Name</label>
                    <input value="{{ $product->name }}" name="name" type="text" class="form-control" placeholder="Enter product name">
                  </div>
                  <div class="mb-3">
                    <label>Description</label>
                    <input value="{{ $product->description }}" name="description" type="text" class="form-control" placeholder="Enter product description">
                  </div>
                  <div class="mb-3">
                    <label>Price</label>
                    <input value="{{ $product->price }}" name="price" step="any" type="number" class="form-control" placeholder="Enter product price">
                  </div>
                  <div class="mb-3">
                    <label>Image</label>
                    <input value="{{ $product->image }}" name="image" type="file" class="form-control" accept="imag/*">
                  </div>


                <div class="mb-3">
                    <div class="mb-3">
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                  <input type="submit" class="btn btn-info" value="Update">
                  <input type="reset" class="btn btn-warning" value="Reset">
                </form>
            </section>
        </div>
    </div>

    <!--Display edit layout-->
    @elseif($layout == 'search')
    <table class="table">
        <thead class="table-dark">
          <tr>
              <th scope="col">Product Name</th>
              <th scope="col">Description</th>
              <th scope="col">Price</th>
              <th scope="col">Image</th>
              <th scope="col">Category</th>
              <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td><img src="{{ asset('uploads/products/' . $product->image) }}" width="100px" height="100px" alt="Image"></td>
                <td>{{ $product->category->name }}</td>
                <td>

                    <a href="{{ url('edit/'.$product->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ url('destroy/'.$product->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>


    @endif

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
