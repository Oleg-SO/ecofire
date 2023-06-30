@extends('main')

@section('title', 'Акции')


@section('content')

<h3 class="interier"> Дополнительные услуги которые мы осуществляем </h3>
    <div class="container" style="max-width: 1200px;">

        <div class="row mb-2" style="padding-top: 60px;">
            <div class="col-md-6">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-primary">Пример пристенной каминной зоны</strong>
                  <h3 class="mb-0" href="{{ route('news.index', ['id' => $news[0]->id]) }}">{{ $news[0]->title }}</h3>
                  <div class="mb-1 text-muted">
                    <p href="{{ route('news.index', ['id' => $news[0]->id]) }}">{{ $news[0]->updated_at }}</p><br/>
                    </div>
                  <p class="card-text mb-auto" href="{{ route('news.index', ['id' => $news[0]->id]) }}"><?= $news[0]->body?><br/></p>
                  <!-- <a href="#{{ $news[0]->id }}" class="stretched-link">Continue reading</a> -->
                </div>
                <div class="img_interier">
                    <img class="aa_class" src="{{ productImage($news[0]->image) }}">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-success">Пример каминной зоны с колонной</strong>
                  <h3 class="mb-0"href="{{ route('news.index', ['id' => $news[1]->id]) }}">{{ $news[1]->title }}</h3>
                  <div class="mb-1 text-muted"><p href="{{ route('news.index', ['id' => $news[1]->id]) }}">{{ $news[1]->updated_at }}</p><br/></div>
                  <p class="mb-auto" href="{{ route('news.index', ['id' => $news[1]->id]) }}"><?= $news[1]->body?><br/></p>
                  <!-- <a href="#{{ $news[2]->id }}" class="stretched-link">Continue reading</a> -->
                </div>
                <div class="img_interier">
                  {{-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
                  <img class="aa_class" src="{{ productImage($news[1]->image) }}">
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-6">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-primary"></strong>
                  <h3 class="mb-0" href="{{ route('news.index', ['id' => $news[2]->id]) }}">{{ $news[2]->title }}</h3>
                  <div class="mb-1 text-muted">
                    <p href="{{ route('news.index', ['id' => $news[2]->id]) }}">{{ $news[2]->updated_at }}</p><br/>
                    </div>
                  <p class="card-text mb-auto" href="{{ route('news.index', ['id' => $news[2]->id]) }}"><?= $news[2]->body?><br/></p>
                  <!-- <a href="#{{ $news[1]->id }}" class="stretched-link">Continue reading</a> -->
                </div>
                <div class="img_interier">
                    <img class="aa_class" src="{{ productImage($news[2]->image) }}">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-success"></strong>
                  <h3 class="mb-0"href="{{ route('news.index', ['id' => $news[3]->id]) }}">{{ $news[3]->title }}</h3>
                  <div class="mb-1 text-muted"><p href="{{ route('news.index', ['id' => $news[3]->id]) }}">{{ $news[3]->updated_at }}</p><br/></div>
                  <p class="mb-auto" href="{{ route('news.index', ['id' => $news[3]->id]) }}"><?= $news[3]->body?><br/></p>
                  <!-- <a href="#{{ $news[3]->id }}" class="stretched-link">Continue reading</a> -->
                </div>
                <div class="img_interier">
                  <img class="aa_class" src="{{ productImage($news[3]->image) }}">
                </div>
              </div>
            </div>
          </div>
          
       
@endsection

@section('extra-js')
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
