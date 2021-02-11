<!-- NavBar View -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

      <a class="navbar-brand" href="{{ url('/') }}">Product Managmenet</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="{{ url('/') }}">Home</a>
            <!-- go to form to create new product -->
            <a class="nav-item nav-link active" href="{{ url('/create') }}">Product</a>
            <!-- go to form to create new category -->
            <a class="nav-item nav-link active" href="{{ url('/category/create') }}">Categories</a>

            <!-- search for product by name -->
            <form class="d-flex" action="{{ url('/search') }}" type="" >
          <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div>

        </div>
      </div>
    </div>
  </nav>
