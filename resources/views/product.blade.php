@extends('layouts.app')

@section('content')
    <div>

        @include('notification')

        <form method="POST" action="{{route('update-product')}}" >
            @csrf

            <div class="form-control">
                <label for="product_name">Product name</label>
                <input type="text" name="product_name" id="product_name" required>
            </div>

            <div class="form-control">
                <label for="quantity">Quantity in Stock</label>
                <input type="number" name="quantity" id="quantity" required>
            </div>

            <div class="form-control">
                <label for="price">Price per Item</label>
                <input type="text" name="price" id="price" required>
            </div>


            <button type="submit">Submit</button>

        </form>
    </div>

    <h2>Products</h2>
    <table border="1" width="100%">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity in Stock</th>
            <th>Price per Item</th>
            <th>Datetime Submitted</th>
            <th>Total Value</th>
            <th>Edit Per Item</th>
        </tr>
        </thead>
        <tbody>
        @php $sumTotal = 0; @endphp
        @foreach($products as $product)
            @php $totalValue = $product->quantity * $product->price; @endphp
            <tr data-id="{{ $product->id }}">
                <td><input type="text" value="{{ $product->product_name }}" onchange="updateProduct({{ $product->id }}, 'product_name', this.value)"></td>
                <td><input type="number" value="{{ $product->quantity }}" onchange="updateProduct({{ $product->id }}, 'quantity', this.value)"></td>
                <td><input type="number" value="{{ $product->price }}" onchange="updateProduct({{ $product->id }}, 'price', this.value)"></td>
                <td>{{ $product->created_at }}</td>
                <td>{{ number_format($totalValue, 2) }}</td>
                <td><button onclick="deleteProduct({{ $product->pid }})">Delete</button></td>
            </tr>
            @php $sumTotal += $totalValue; @endphp

        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4">Total Sum:</td>
            <td>{{ number_format($sumTotal, 2) }}</td>
            <td></td>
        </tr>
        </tfoot>
    </table>



  @push('ajax-script')
      <script>
          function updateProduct(pid, field, value) {
              $.ajax({
                  url: '/products/' + id,
                  method: 'POST',
                  data: {
                      _token: '{{ csrf_token() }}',
                      [field]: value
                  },
                  success: function(response) {
                      if (response.success) {
                          alert('Product updated successfully');
                          location.reload();
                      }
                  }
              });
          }
      </script>
  @endpush

@endsection
