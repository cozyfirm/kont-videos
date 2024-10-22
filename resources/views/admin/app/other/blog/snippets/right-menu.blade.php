<div class="col-md-3 border-left">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-0 m-0" title="#">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="p-0 m-0"> {{ __('Ostale informacije') }} </h5>
                    <i class="fas fa-info mt-1 mr-1"></i>
                </div>
            </div>

            <form action="{{ route('system.admin.blog.add-to-gallery') }}" method="POST" id="gallery-img" enctype="multipart/form-data">
                @csrf
                {{ html()->hidden('id')->class('form-control')->value($post->id) }}
                <div class="card p-0 m-0" title="{{ __('Nova fotografija za galeriju') }}">
                    <div class="card-body d-flex justify-content-between">
                        <label for="gallery-img-input" >
                            <p class="m-0">{{ __('Galerija fotografija') }}</p>
                        </label>
                        <i class="fas fa-plus mt-1"></i>
                    </div>
                    <input name="photo_uri" class="form-control form-control-lg d-none" id="gallery-img-input" type="file">
                </div>
            </form>

            <div class="card mt-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-10">
                            <h5 class="card-title m-0 p-0"><b>{{ __('Pregled galerije') }}</b></h5>
                        </div>
                        <div class="col-md-2 text-end">
                            <a href="#">
                                <i class="fas fa-image mt-1"></i>
                            </a>
                        </div>
                    </div>
                    @php $counter = 1 @endphp
                    @foreach($post->imageRel as $image)
                        <h6 class="card-subtitle mb-3 text-muted mt-2 d-flex justify-content-between">
                            <small>{{ $counter++ }}. {{ $image->fileRel->file ?? '' }}</small>
                            <a href="{{ route('system.admin.blog.delete-from-gallery', ['id' => $image->id ]) }}">
                                <small><i class="fas fa-trash"></i></small>
                            </a>
                        </h6>
                    @endforeach
                </div>
            </div>

            <hr>

            <div class="card p-0 m-0" >
                <div class="card-body d-flex">
                    <a href="{{ route('system.admin.blog.edit-image', ['id' => $post->id, 'what' => 'small_img']) }}" class="w-25" title="{{ __('Unesite naslovnu fotografiju') }}">
                        <div class=" text-center border">
                            <i class="fas fa-image mt-1"></i>
                        </div>
                    </a>

                    <a href="{{ route('system.admin.blog.edit-image', ['id' => $post->id, 'what' => 'main_img']) }}" class="w-25" title="{{ __('Ažurirajte cover fotografiju') }}">
                        <div class=" text-center border">
                            <i class="fas fa-image mt-1"></i>
                        </div>
                    </a>
                    {{--                    <a href="{{ route('system.admin.blog.edit-image', ['id' => $post->id, 'what' => 'img_two']) }}" class="w-25" title="{{ __('Ažurirajte fotografiju br. 2') }}">--}}
                    {{--                        <div class="text-center border">--}}
                    {{--                            <i class="fas fa-image mt-1"></i>--}}
                    {{--                        </div>--}}
                    {{--                    </a>--}}
                    {{--                    <a href="{{ route('system.admin.blog.edit-image', ['id' => $post->id, 'what' => 'img_three']) }}" class="w-25 title="{{ __('Ažurirajte fotografiju br. 3') }}"">--}}
                    {{--                        <div class="text-center border">--}}
                    {{--                            <i class="fas fa-image mt-1"></i>--}}
                    {{--                        </div>--}}
                    {{--                    </a>--}}
                </div>
            </div>

        </div>
    </div>
</div>
