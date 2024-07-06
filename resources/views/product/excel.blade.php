<div class="container mt-5">
   <table class="table table-bordered">
         <thead>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Description</th>
               <th>Price</th>
               <th>Created At</th>
               <th>Updated At</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($products as $product)
               <tr>
                     <td>{{ $product->id }}</td>
                     <td>{{ $product->name }}</td>
                     <td>{{ $product->description }}</td>
                     <td>{{ $product->price }}</td>
                     <td>{{ $product->created_at }}</td>
                     <td>{{ $product->updated_at }}</td>
               </tr>
            @endforeach
         </tbody>
   </table>
</div>