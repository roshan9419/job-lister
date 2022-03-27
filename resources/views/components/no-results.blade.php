<div style="width: 100%; display: inline-flex; flex-direction: column; align-items: center; justify-content: center">
    @if ($word)
        <h2>We couldn't find anything for <strong>{{$word}}</strong>
    @else
        <h2>We couldn't find anything</h2>
    @endif
    <h5 class="text-muted">Try different or less specific keywords</h5>
</div>