<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <h1 class="title is-2">The supplier page</h1>
            </div>
            <div class="column">
                <a href="{{ route('suppliers.create') }}" class="button is-primary is-pulled-right">
                    Create
                </a>
            </div>
        </div>

        @foreach($suppliers as $supplier)
                <div>
                            <a href="{{ route('suppliers.show', $supplier) }}">
                                <strong>{{ $supplier->name }}</strong>
                            </a>
                        <h2>{{ $supplier->address }}</h2>
                    <br>
                    <h3>{{ $supplier->credit_balance }}</h3>
                            <div>
                                <a href="{{route('suppliers.edit', $supplier)}}" class = 'button is-primary'>edit</a>
                            </div>
                    <br>
                    </div>
        @endforeach
    </div>
</x-main>
