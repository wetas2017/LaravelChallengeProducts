<!-- Display List of Category in table form -->
<!-- Main Category Views Table -->
<!-- I create this layout to use it in other views -->

<table class="table">
    <thead class="table-dark">
      <tr>
          <th scope="col">Category Name</th>
          <th scope="col">Parent Category</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->parent_category }}</td>
            <td>

                <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ url('category/destroy/'.$category->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

