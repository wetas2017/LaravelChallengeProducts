<!-- Display List of Product in table form -->
<!-- Main Products Views Table -->
<!-- I create this layout to use it in other views -->
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

