<x-app-layout>
    @if(isset($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <h2>Product: Mobile Phone</h2>
    <p>Price: $20</p>
    
    <form action="{{ route('stripe') }}" method="post">
        @csrf
        <input type="hidden" name="product_name" value="Mobile Phone">
        <input type="hidden" name="quantity" value="1">
        <input type="hidden" name="price" value="20">

        <button type="submit">Pay with Stripe</button>
    </form>
</x-app-layout>