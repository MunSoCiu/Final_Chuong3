<div class="pagination-custom">

@if ($products->onFirstPage())
<span class="page-btn">‹</span>
@else
<a href="{{ $products->previousPageUrl() }}" class="page-btn">‹</a>
@endif

@for ($i=1;$i<=$products->lastPage();$i++)
<a href="{{ $products->url($i) }}" 
class="page-btn {{ $i==$products->currentPage()?'page-active':'' }}">
{{ $i }}
</a>
@endfor

@if ($products->hasMorePages())
<a href="{{ $products->nextPageUrl() }}" class="page-btn">›</a>
@else
<span class="page-btn">›</span>
@endif

</div>