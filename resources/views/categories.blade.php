<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Category Managmenet System</title>
  </head>
  <body>
    @include("navbar")

    @if ($layout == 'index')
        <div class="container-fluid mt-4">
            <div class="row">
                <section class="col-md-7">
                    @include("categorieslist")
                </section>

                <section class="col-md-5"></section>
            </div>
        </div>
    @elseif($layout == 'create')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col-md-7">
                @include("categorieslist")
            </section>
            <section class="col-md-5">
                <form action="{{ url('category/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                    <label>Category Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Enter category name">
                  </div>
                  <div class="mb-3">
                    <label>Parent Category</label>
                    <input name="parent" type="text" class="form-control" placeholder="Enter parent category">
                  </div>
                  <input type="submit" class="btn btn-info" value="Save">
                  <input type="reset" class="btn btn-warning" value="Reset">
                </form>
            </section>
        </div>
    </div>
    @elseif($layout == 'show')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col-md-7">
                @include("categorieslist")
            </section>
            <section class="col-md-5"></section>
        </div>
    </div>
    @elseif($layout == 'edit')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col-md-7">
                @include("categorieslist")
            </section>
            <section class="col-md-5">
                <form action="{{ url('category/update/'.$category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Category Name</label>
                        <input value="{{ $category->name }}" name="name" type="text" class="form-control" placeholder="Enter category name">
                      </div>
                      <div class="mb-3">
                        <label>Parent Category</label>
                        <input value="{{ $category->parent_category }}" name="parent" type="text" class="form-control" placeholder="Enter parent category">
                      </div>
                      <input type="submit" class="btn btn-info" value="Save">
                      <input type="reset" class="btn btn-warning" value="Reset">

                </form>
            </section>
        </div>
    </div>
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
