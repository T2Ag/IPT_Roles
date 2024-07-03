<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                  <div class="flex flex-row items-center justify-between space-x-4 ">
                     <h1 class="m-1 text-[50px] font-bold">PRODUCTS LIST</h1>
                     <!-- Button trigger modal -->
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

                                                   <form action="{{ route('writer.product.update', $product->id) }}" method="POST">
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
