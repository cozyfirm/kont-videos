@php
    $fulLStar = 1; $halfStar = 0;
    ReviewHelper::getRawData($stars ?? '1', $fulLStar, $halfStar);
@endphp

@for($i=1; $i<=5; $i++)
    @if($i<=$fulLStar)
        <div class="star">
            <img src="{{ asset('files/images/default/icons/star-yellow.svg') }}" alt="">
        </div>
    @elseif($halfStar && $halfStar == $i)
        <div class="star">
            <img src="{{ asset('files/images/default/icons/star-half-yellow.svg') }}" alt="">
        </div>
    @else
        <div class="star">
            <img src="{{ asset('files/images/default/icons/star-empty-yellow.svg') }}" alt="">
        </div>
    @endif
@endfor
