<x-article>
    <x-slot name="image">/img/dutchflag.jpg</x-slot>
    <x-slot name="title">Welcome to DutchGroceries.</x-slot>
    <x-slot name="subtitle">Enjoy Dutch Snacks in Sweden</x-slot>
    <div class="columns">

        <div class="column is-8-desktop is-12-tablet">
            <article class="content">
                <p>
                    Welcome to <strong>DutchGroceries</strong>, the perfect solution for Dutch immigrants in Sweden who
                    miss the <em>authentic flavors</em> of their homeland! Our platform makes it easier than ever to
                    enjoy beloved Dutch specialties such as <strong>kroketten</strong>, <strong>kaassoufflés</strong>,
                    and creamy <em>peanut sauce</em>. Whether you’re hosting a Dutch-themed party or simply craving the
                    comfort of familiar foods, we’re here to bring the Netherlands to your doorstep.
                </p>
                <p>
                    Twice a year, one of our dedicated community members embarks on a special journey with a freezer
                    truck, traveling back to the Netherlands to collect your favorite groceries. From well-stocked
                    supermarkets to specialty suppliers, we ensure that every item you order meets the high standards of
                    <em>quality</em> and <em>freshness</em> you expect. With DutchGroceries, staying connected to your
                    culinary roots has never been so convenient.
                </p>
                <p>
                    Explore our <strong>extensive product catalog</strong>, featuring a wide range of Dutch favorites.
                    Whether it’s stroopwafels, hagelslag, or your favorite brands of cheese, you’ll find everything you
                    need to recreate the tastes of home. Our intuitive ordering system ensures a seamless experience,
                    allowing you to browse, select, and finalize your order with just a few clicks. <strong>Every order
                        counts</strong> towards supporting our community-driven initiative.
                </p>
                <p>
                    Join the DutchGroceries community today and experience the joy of sharing traditions with fellow
                    Dutch immigrants. By working together, we keep our connection to Dutch cuisine alive, even while
                    living abroad. Don’t miss out on the next delivery—start browsing now and place your order to secure
                    your favorite <em>lekker snacks</em> and more. <strong>Taste the difference</strong> with
                    DutchGroceries!
                </p>
            </article>
        </div>

        <div class="column is-4-desktop is-12-tablet">
            <p class="title is-4">Latest news</p>

            <div class="columns is-multiline">

                @foreach($latestArticles as $article)
                    <div class="column is-12">
                        <div class="card">

                            <div class="card-image">
                                <img src="{{ $article->img_url }}" alt="Article picture">
                            </div>

                            <div class="card-content">
                                <div class="content">

                                    <a class="title is-4" href="/articles/{{$article->id}}">{{$article->title}}</a>

                                    <p>{{$article->excerpt}}</p>
                                </div>
                                <div class="has-text-centered">
                                    <a href="/articles/{{$article->id}}" class="button is-primary">Read more...</a>
                                </div>
                            </div>
                            <footer class="card-footer">
                                <p class="card-footer-item"><small>Published: {{ $article->published_at->diffForHumans() }}</small></p>
                            </footer>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-article>
