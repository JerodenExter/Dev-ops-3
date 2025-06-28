<x-main>
    <h1 class="title is-4">{{ $supplier->name }}</h1>
    <h2 class="subtitle is-6 is-italic">
        {!! $supplier->address !!}
    </h2>
    <h2>
        {!! $supplier->credit_balance !!}
    </h2>
    <div>
        <a href="{{route('suppliers.edit', $supplier)}}" class = 'button is-primary'>Edit</a>
    </div>
    <div>
        <form method="POST" action="{{ route('suppliers.destroy', $supplier->id) }}" onsubmit="return confirm('Weet je zeker dat je dit wilt verwijderen?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="button is-danger">Delete</button>
        </form>
    </div>
</x-main>
