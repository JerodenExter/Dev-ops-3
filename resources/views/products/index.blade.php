<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <p class="title is-2">All the products</p>
            </div>
            <div class="column">
                <a href="#" class="button is-primary is-pulled-right">
                    Add a new product
                </a>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="content">
                        <table class="table is-fullwidth">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Code</th>
                                    <th style="width: 50%">Description</th>
                                    <th style="width: 10%">Price<br>(SEK)</th>
                                    <th style="width: 20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $result)
                                <tr>
                                    <td>{{ $result->code }}</td>
                                    <td>{{ $result->description }}</td>
                                    <td>{{ $result->current_price }}</td>
                                    <td>
                                        <div class="field has-addons">
                                            <form method="POST" action="#" class="control">
                                                <button class="button is-light is-small">Edit</button>
                                            </form>
                                            <form method="POST" action="#" class="control">
                                                <button class="button is-danger is-small">Delete</button>
                                            </form>
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
    </section>
</x-main>
