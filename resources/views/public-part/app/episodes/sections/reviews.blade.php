<div class="inner__element reviews @if(!$episode->totalReviews()) d-none @endif">
    <div class="reviews__global">
        <div class="rg__wrapper rg__wrapper__small">
            <p class="description">{{ __('Ukupno ocjena') }}</p>
            <div class="heading__wrapper">
                <h1>{{ $episode->totalReviews() }}</h1>
            </div>
            <p class="additional">{{ __('Ocjene od korisnika kont.ba') }}</p>
        </div>
        <div class="line__between"><div class="fill"></div></div>
        <div class="rg__wrapper rg__wrapper__small">
            <p class="description">{{ __('Prosječna ocjena') }}</p>
            <div class="heading__wrapper">
                <h1>{{ $episode->averageRating() }}</h1>
                <div class="stars__wrapper">
                    @include('public-part.app.shared.common.stars', ['stars' => $episode->averageRating() ])
                </div>
            </div>
            <p class="additional">{{ __('Zaokružena prosječna ocjena') }}</p>
        </div>
        <div class="line__between"><div class="fill"></div></div>
        <div class="rg__wrapper rg__wrapper__big rg__wrapper__reviews">
            @foreach($reviewsByNumber as $index => $number)
                <div class="rate__no">
                    <div class="stars__no">
                        <img src="{{ asset('files/images/default/icons/star-yellow.svg') }}" alt="">
                        <p>{{ $index }}</p>
                    </div>
                    <div class="rate__line" line-width="{{ $number['percentage'] }}"> </div>
                    <p>{{ $number['total'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="single__reviews">
        @foreach($episode->approvedReviewsRel as $review)
            @isset($review->userRel->name)
                <div class="single__review">
                    <div class="user__info">
                        <div class="ui__img_w">
                            @if(isset($review->userRel->photo_uri))
                                <img src="{{ asset('files/images/public-part/users/' . ($review->userRel->photo_uri)) }}" alt="">
                            @else
                                <h2>{{ $review->userRel->getInitials() }}</h2>
                            @endif
                        </div>
                        <div class="ui__info">
                            <h2>{{ $review->userRel->name ?? '' }}</h2>
                            <p>{{ __('Ukupno ocjena: ') }} {{ $review->userRel->totalReviews() }}</p>
                        </div>
                    </div>
                    <div class="review__info">
                        <div class="stars__and__date">
                            <div class="stars">
                                @include('public-part.app.shared.common.stars', ['stars' => $review->stars])
                            </div>
                            <div class="date">
                                <p>{{ $review->createdAt() }}h</p>
                            </div>
                        </div>

                        <div class="note">
                            <p>{!! nl2br($review->note ?? '') !!}</p>
                        </div>
                    </div>
                </div>
            @endisset
        @endforeach
    </div>
</div>
