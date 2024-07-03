<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                  <div class="flex flex-row items-center justify-between space-x-4 ">
                     <h1 class="m-1 text-[50px] font-bold">PRODUCTS LIST</h1>
                     
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

                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($products as $product)
                                 <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>                    

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
