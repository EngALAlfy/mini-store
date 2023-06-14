<div>

    <div class="card card-outline card-primary m-b-20">
        <div class="card-body py-1 row">
            <div class=" col-6 col-md-3 my-2">
                <div class=" input-group input-group-sm m-auto ">
                    <input class="form-control" type="search" wire:model="search" placeholder="@lang('all.search')">
                </div>
            </div>

            <div class=" col-6 col-md-3 my-2">
                <div class=" input-group input-group-sm m-auto ">
                    <select class="form-control" wire:model="state_id" placeholder="@lang('all.state')">
                        <option value="0">@lang('all.state')</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class=" col-6 col-md-3 my-2">
                <div class=" input-group input-group-sm m-auto">
                    <select class="form-control" wire:model="price_id" placeholder="@lang('all.price')">
                        <option value="0">@lang('all.price')</option>
                        @foreach ($prices as $price)
                            <option value="{{ $price->id }}">{{ $price->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class=" col-6 col-md-3 my-2">
                <div class=" input-group input-group-sm m-auto">
                    <select class="form-control" wire:model="category_id" placeholder="@lang('all.category')">
                        <option value="0">@lang('all.category')</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if ($category_id > 0 || $state_id > 0 || $price_id > 0)
                <button class="btn p-0" wire:click="clearFilter()"><i class="fa fa-close"></i></button>
            @endif

        </div>
    </div>

    @forelse ($posts as $post)
        <div class="post post-row">
            <a class="post-img" href="{{ route('website.posts.show', $post) }}"><img src="{{ $post->image }}"
                    alt="{{ $post->name }}"></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="{{ route('website.categories.show', $post->category) }}">{{ $post->category->name }}</a>
                </div>
                <h3 class="post-title"><a href="{{ route('website.posts.show', $post) }}">{{ $post->name }}</a></h3>
                <ul class="post-meta">
                    <li><a href="{{ route('website.prices.show', $post->price) }}">{{ $post->price->name }}</a></li>
                </ul>
                <div class="post-category">
                    <a href="{{ route('website.states.show', $post->state) }}">{{ $post->state->name }}</a>
                </div>

                @isset($post->url)
                    <a href="{{ $post->url }}" class="btn btn-success">@lang('website.book')</a>
                @endisset
            </div>
        </div>
    @empty
        <div class="alert alert-info m-l-10 m-r-10">
            <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
        </div>
    @endforelse


    {{ $posts->links() }}



</div>
