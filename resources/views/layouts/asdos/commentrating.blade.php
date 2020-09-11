<div class="row">
<a href="{{ URL::previous() }}" class="badge badge-secondary">Kembali</a>
</div>
<div class="row">
  Rating : @if(isset($rating)) {{$rating->rating}} / 5 dari {{$rating->person}} asistensi @else - @endif
</div>
<div class="row mt-3">

  <ul class="list-group">
    @foreach($comments as $comment)
    <li class="list-group-item">
      <blockquote class="blockquote">
        <p class="mb-0">{{$comment->comment}}</p>
        <footer class="blockquote-footer"><cite title="Source Title">{{$comment->created_at}}</cite></footer>
      </blockquote>
    </li>
    @endforeach
  </ul> {{$comments->links()}}
</div>
</div>