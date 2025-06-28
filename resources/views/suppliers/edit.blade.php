<x-main>

    <div class="box">
        <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
            @csrf
            @method('PATCH')
            <h1 class="title is-4">Create a New Supplier</h1>
            <br>
            <h2 class="subtitle is-6 is-italic">
                Please fill out all the form fields and click 'Submit'
            </h2>

            {{-- Here are all the form fields --}}
            <div class="field">
                <label for="name" class="label">Name</label>
                <div class="control has-icons-right">
                    <input type="text" name="name" placeholder="Enter the post's name..."
                           class="input @error('name') is-danger @enderror"
                           value="{{ old('name', $supplier) }}" autocomplete="name" autofocus>
                    @error('name')
                    <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    @enderror
                </div>
                @error('title')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="address" class="label">Address</label>
                <div class="control has-icons-right">
                    <input type="text" name="address" placeholder="Enter a address..."
                           class="input @error('address') is-danger @enderror"
                           value="{{ old('address', $supplier) }}" autocomplete="address">
                    @error('address')
                    <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    @enderror
                </div>
                @error('excerpt')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="credit_balance" class="label">Credit balance</label>
                <div class="control has-icons-right">
                    <input type="text" name="credit_balance" placeholder="Enter the credit balance..."
                           class="input @error('credit_balance') is-danger @enderror"
                           value="{{ old('credit_balance', $supplier) }}" autocomplete="credit_balance">
                    @error('credit_balance')
                    <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    @enderror
                </div>
                @error('body')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-primary">Save</button>
                </div>
                <div class="control">
                    <a type="button" href="{{ url()->previous() }}" class="button is-light">Cancel</a>
                </div>
                <div class="control">
                    <button type="reset" class="button is-warning">Reset</button>
                </div>
            </div>
        </form>
    </div>
</x-main>
