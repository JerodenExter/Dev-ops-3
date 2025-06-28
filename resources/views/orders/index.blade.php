<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <p class="title is-2">All the product orders</p>
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
                                    <th style="width: 45%">Description</th>
                                    <th style="width: 10%">Price<br>(SEK)</th>
                                    <th style="width: 5%">Payed</th>
                                    <th style="width: 20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $result)
                                <tr>
                                    <td>{{ $result->code }}</td>
                                    <td>{{ $result->description }}</td>
                                    <td>{{ $result->price_at_purchase }}</td>
                                    <td>{{ $result->payed_at ? 'Y' : 'N' }}</td>
                                    <td>
                                        <form method="POST" action="#">
                                            <button class="button is-primary is-small">Mark as payed</button>
                                        </form>
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
