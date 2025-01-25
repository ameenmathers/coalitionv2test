@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">


            @include('notification')


            <form method="POST" action="{{route('upload-product')}}" >
                <h2>Upload Product</h2>
                <br>
                @csrf

                <div class="form-outline">
                    <label for="product_name">Product name</label>
                    <input class="form-control" type="text" name="product_name" id="product_name" required>
                </div>

                <div class="form-outline">
                    <label for="quantity">Quantity in Stock</label>
                    <input class="form-control"  type="number" name="quantity" id="quantity" required>
                </div>

                <div class="form-outline">
                    <label for="price">Price per Item</label>
                    <input class="form-control"  type="text" name="price" id="price" required>
                </div>


                <button class="edit-button" type="submit">Submit</button>

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
                <form method="POST" action="{{url('update-product/'.$product->pid )}}" >
                    @csrf
                    @method('PUT')

                    @php $totalValue = $product->quantity * $product->price; @endphp
                    <tr data-id="{{ $product->pid }}">
                        <td><input required name="product_name" type="text" value="{{ $product->product_name }}" onchange="updateProduct({{ $product->id }}, 'product_name', this.value)"></td>
                        <td><input required name="quantity" type="number" value="{{ $product->quantity }}" onchange="updateProduct({{ $product->id }}, 'quantity', this.value)"></td>
                        <td><input required name="price" type="number" value="{{ $product->price }}" onchange="updateProduct({{ $product->id }}, 'price', this.value)"></td>
                        <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M Y h:i A') }}</td>

                        <td>{{ number_format($totalValue, 2) }}</td>
                        <td><button class="edit-button" type="submit">Edit </button></td>
                    </tr>
                    @php $sumTotal += $totalValue; @endphp

                </form>

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

    </div>




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
