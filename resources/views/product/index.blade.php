<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                  <div class="flex flex-row items-center justify-between space-x-4 ">
                     <h1 class="m-1 text-[50px] font-bold">PRODUCTS LIST</h1>
                     <!-- Button trigger modal -->

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                           Add Product
                        </button>

                  </div>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header flex justify-between">
                           <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                           <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                           </div>

                           <form action="{{ route('product.store') }}" method="POST">
                              @csrf
                              <div class="modal-body">
                                 <div class="mb-3">
                                       <label for="name" class="form-label">Name</label>
                                       <input type="text" class="form-control" id="name" name="name" required>
                                 </div>
                                 <div class="mb-3">
                                       <label for="description" class="form-label">Description</label>
                                       <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                 </div>
                                 <div class="mb-3">
                                       <label for="price" class="form-label">Price</label>
                                       <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" required>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Create Product</button>
                              </div>
                           </form>
                           
                        </div>
                     </div>
                  </div>
               </div>

               <!-- Table -->

               <div class="container px-6">

                     <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Description</th>
                                 <th>Price</th>
                                 <th class="text-center">...</th>

                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($products as $product)
                                 <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    
                                    <td>
                                       
                                       <div class="flex justify-center">
                                          <button class="text-green-600 mx-2 " type="button" data-bs-toggle="modal" data-bs-target="#editModal-{{$product->id}}">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                             </svg>
                                          </button>

                                          <button class="text-red-600 mx-2 " type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$product->id}}">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                             </svg>  
                                          </button>
                                       </div>
                     

                                          <!-- Edit Modal -->
                                          <div class="modal fade" id="editModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalTitle-{{$product->id}}" aria-hidden="true">
                                             <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                   <div class="modal-header flex justify-between">
                                                   <h5 class="modal-title" id="editModalTitle">Modal title</h5>
                                                   <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                   </button>
                                                   </div>

                                                   <form action="{{ route('product.update', $product->id) }}" method="POST">
                                                      @csrf
                                                      <div class="modal-body">
                                                         <div class="mb-3">
                                                               <label for="name" class="form-label">Name</label>
                                                               <input type="text" class="form-control" id="name" name="name" value='{{$product->name}}' required>
                                                         </div>
                                                         <div class="mb-3">
                                                               <label for="description" class="form-label">Description</label>
                                                               <input type="text" class="form-control" id="description" name="description" rows="3" value='{{$product->description}}' required></input>
                                                         </div>
                                                         <div class="mb-3">
                                                               <label for="price" class="form-label">Price</label>
                                                               <input type="number" class="form-control" id="price" name="price" value='{{$product->price}}' min="0" step="0.01" required>
                                                         </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                         <button type="submit" class="btn btn-primary">Update Product</button>
                                                      </div>
                                                   </form>
                                                   
                                                </div>
                                             </div>
                                          </div>

                                          <!-- Delete Modal -->
                                          <div class="modal fade" id="deleteModal-{{$product->id}}" tabindex="-1" aria-labelledby="deleteModalLabel-{{$product->id}}" aria-hidden="true">
                                             <div class="modal-dialog">
                                                   <div class="modal-content">
                                                      <div class="modal-header">
                                                         <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Product</h1>
                                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                         @csrf
                                                         @method('DELETE')
                                                         <div class="modal-body">
                                                               Are you sure you want to delete this product?
                                                         </div>
                                                         <div class="modal-footer">
                                                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                               <button type="submit" class="btn btn-danger">Delete product</button>
                                                         </div>
                                                      </form>
                                                   </div>
                                             </div>
                                          </div>
                                    </td>

                                 </tr>
                              @endforeach
                           </tbody>
                     </table>
                  </div>
               </div>


            </div>
        </div>
    </div>
</x-app-layout>
