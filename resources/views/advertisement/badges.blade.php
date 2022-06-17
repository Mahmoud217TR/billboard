<a href="@if($advertisement->isCategorized()){{ route('category.show',$advertisement->category) }}@else {{ route('uncategorized.advertisements') }} @endif" class="unstyled">
    <span class="badge rounded-pill bg-primary mb-2">
        {{ $advertisement->getCategory() }}
    </span>
</a>
@if ($advertisement->featured)
    <span class="badge rounded-pill bg-success mb-2">
        Featured
    </span>
@endif