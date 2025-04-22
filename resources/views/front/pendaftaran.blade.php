<!-- filepath: /home/pram/project/kampus/kaido-kit/resources/views/front/pendaftaran.blade.php -->
@extends('front.layout')

@section('content')
<main>
    <!-- Banner area start here -->
    <section class="banner-inner-area sub-bg bg-image" data-background="{{ asset('learnit/assets/images/bg/banner-inner-bg.png') }}">
        <div class="banner-inner__shape1">
            <img class="animation__sunMove" src="{{ asset('learnit/assets/images/shape/banner-inner-shape1.png') }}" alt="image">
        </div>
        <div class="banner-inner__shape2">
            <img src="{{ asset('learnit/assets/images/shape/banner-inner-shape2.png') }}" alt="image">
        </div>
        <div class="banner-inner__shape3">
            <img class="animation__arryLeftRight" src="{{ asset('learnit/assets/images/shape/banner-inner-shape3.png') }}" alt="image">
        </div>
        <div class="banner-inner__shape4">
            <img class="animation__arryUpDown" src="{{ asset('learnit/assets/images/shape/banner-inner-shape4.png') }}" alt="image">
        </div>
        <div class="banner-inner__shape5">
            <img src="{{ asset('learnit/assets/images/shape/banner-inner-shape5.png') }}" alt="image">
        </div>
        <div class="banner-inner__circle">
            <img class="slide-effect1" src="{{ asset('learnit/assets/images/shape/banner-inner-circle.png') }}" alt="image">
        </div>
        <div class="banner-inner__circle2">
            <img class="slide-effect2" src="{{ asset('learnit/assets/images/shape/banner-inner-circle2.png') }}" alt="image">
        </div>
        <div class="banner-inner__dots">
            <img class="pxl-image-zoom" src="{{ asset('learnit/assets/images/shape/banner-inner-dots.png') }}" alt="image">
        </div>
        <div class="container">
            <div class="banner-inner__content">
                <h1>
                    Pendaftaran
                </h1>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><i class="fa-regular fa-angle-right"></i></li>
                    <li>Pendaftaran</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Banner area end here -->

    <!-- Features area start here -->
    <section class="courses-nine-area pt-120 pb-60 sub-bg">
        <div class="courses-nine__arry1 sway__animation">
            <img src="{{ asset('learnit/assets/images/shape/course-nine-arry-left.png') }}" alt="shape">
        </div>
        <div class="courses-nine__arry2 sway__animationX">
            <img src="{{ asset('learnit/assets/images/shape/course-nine-arry-right.png') }}" alt="shape">
        </div>
        <div class="courses-nine__shape pxl-image-zoom2">
            <img src="{{ asset('learnit/assets/images/shape/course-nine-shape.png') }}" alt="shape">
        </div>
        <div class="container">
            <div class="section-header-three text-center mb-60">
                <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Program yang Tersedia</h5>
                <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Pilih <span>Program</span> Terbaik Kami</h2>
            </div>
            <div class="row g-4">
                @forelse(App\Models\Feature::with('benefits')->get() as $index => $feature)
                <div class="col-xl-6 wow fadeInDown" data-wow-delay="{{ $index * 100 }}ms" data-wow-duration="1500ms">
                    <div class="courses-nine__item p-4">
                        <div class="courses-nine__image">
                            @if($feature->images)
                            <div style="width: 227px; height: 297px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $feature->images) }}" alt="{{ $feature->name }}" 
                                     style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                            </div>
                            @else
                            <div style="width: 227px; height: 297px; overflow: hidden;">
                                <img src="{{ asset('learnit/assets/images/courses/courses-nine-image1.jpg') }}" alt="default image" 
                                     style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                            </div>
                            @endif
                        </div>
                        <div class="courses-nine__content">
                            <span class="time-tag bg1"><i class="fa-light fa-clock"></i> {{ $feature->time ?? '16 Hours Session' }}</span>
                            <h4><a href="#pendaftaran" class="primary-hover">{{ $feature->name }}</a></h4>
                            <p>
                                {{ $feature->desc }}
                            </p>
                            <ul>
                                @forelse($feature->benefits as $benefit)
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.38397 14.1797C7.34153 14.1797 7.29954 14.171 7.26066 14.1539C7.22178 14.1369 7.18684 14.1121 7.15803 14.0809L1.06612 7.49119C1.02551 7.44726 0.99859 7.39244 0.988651 7.33344C0.978712 7.27445 0.986187 7.21384 1.01016 7.15902C1.03414 7.10421 1.07357 7.05758 1.12364 7.02483C1.17371 6.99208 1.23223 6.97464 1.29206 6.97464H4.22437C4.26839 6.97464 4.31191 6.98409 4.35197 7.00234C4.39204 7.0206 4.42772 7.04723 4.45661 7.08045L6.49255 9.42273C6.71258 8.95239 7.13852 8.16925 7.88597 7.21497C8.99095 5.8042 11.0463 3.7294 14.5627 1.85642C14.6307 1.82023 14.7097 1.81083 14.7843 1.83009C14.8589 1.84936 14.9235 1.89587 14.9654 1.96046C15.0073 2.02504 15.0235 2.103 15.0108 2.17894C14.998 2.25488 14.9573 2.32328 14.8966 2.37064C14.8831 2.38113 13.5273 3.44882 11.967 5.40448C10.5309 7.20417 8.62191 10.1469 7.68255 13.946C7.66605 14.0128 7.62767 14.0721 7.57354 14.1144C7.5194 14.1568 7.45263 14.1799 7.38388 14.1799L7.38397 14.1797Z"
                                            fill="oklch(0.828 0.189 84.429)" />
                                    </svg>
                                    {{ $benefit->name }}
                                </li>
                                @empty
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.38397 14.1797C7.34153 14.1797 7.29954 14.171 7.26066 14.1539C7.22178 14.1369 7.18684 14.1121 7.15803 14.0809L1.06612 7.49119C1.02551 7.44726 0.99859 7.39244 0.988651 7.33344C0.978712 7.27445 0.986187 7.21384 1.01016 7.15902C1.03414 7.10421 1.07357 7.05758 1.12364 7.02483C1.17371 6.99208 1.23223 6.97464 1.29206 6.97464H4.22437C4.26839 6.97464 4.31191 6.98409 4.35197 7.00234C4.39204 7.0206 4.42772 7.04723 4.45661 7.08045L6.49255 9.42273C6.71258 8.95239 7.13852 8.16925 7.88597 7.21497C8.99095 5.8042 11.0463 3.7294 14.5627 1.85642C14.6307 1.82023 14.7097 1.81083 14.7843 1.83009C14.8589 1.84936 14.9235 1.89587 14.9654 1.96046C15.0073 2.02504 15.0235 2.103 15.0108 2.17894C14.998 2.25488 14.9573 2.32328 14.8966 2.37064C14.8831 2.38113 13.5273 3.44882 11.967 5.40448C10.5309 7.20417 8.62191 10.1469 7.68255 13.946C7.66605 14.0128 7.62767 14.0721 7.57354 14.1144C7.5194 14.1568 7.45263 14.1799 7.38388 14.1799L7.38397 14.1797Z"
                                            fill="oklch(0.828 0.189 84.429)" />
                                    </svg>
                                    Flexible Timings
                                </li>
                                @endforelse
                            </ul>
                            <div class="mt-3">
                                <a href="#pendaftaran" class="btn-one btn-sm" onclick="setFeature({{ $feature->id }}, '{{ $feature->name }}')">
                                    Daftar Sekarang<i class="fa-light fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>Belum ada program yang tersedia.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Features area end here -->

    <!-- Registration area start here -->
    <section id="pendaftaran" class="contact-area pt-60 pb-120">
        <div class="container">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="contact__item">
                        <div class="section-header mb-40 text-center">
                            <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Pendaftaran</h5>
                            <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Daftar
                                <span>Sekarang <img src="{{ asset('learnit/assets/images/shape/header-shape.png') }}" alt="shape"></span>
                            </h2>
                        </div>
                        
                        @if(session('success'))
                            <div class="alert alert-success mb-4">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <form action="{{ route('pendaftaran.store') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-12">
                                    <label for="features_id">Program*</label>
                                    <select id="features_id" name="features_id" required>
                                        <option value="">Pilih Program</option>
                                        @foreach(App\Models\Feature::all() as $feature)
                                            <option value="{{ $feature->id }}" {{ old('features_id') == $feature->id ? 'selected' : '' }}>
                                                {{ $feature->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('features_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-4 mt-2">
                                <div class="col-md-6">
                                    <label for="nama">Nama Lengkap*</label>
                                    <input id="nama" name="nama" type="text" placeholder="Nama Lengkap" required value="{{ old('nama') }}">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="nowa">Nomor WhatsApp*</label>
                                    <input id="nowa" name="nowa" type="tel" placeholder="Nomor WhatsApp" required value="{{ old('nowa') }}">
                                    @error('nowa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <label for="email">Email*</label>
                                    <input id="email" name="email" type="email" placeholder="Email" required value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <label for="alamat" class="mt-4">Alamat Lengkap*</label>
                            <textarea name="alamat" id="alamat" required placeholder="Alamat Lengkap">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="text-center">
                                <button type="submit" class="btn-one mt-4">Daftar Sekarang<i class="fa-light fa-arrow-right-long"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Registration area end here -->
</main>

@push('scripts')
<script>
    function setFeature(featureId, featureName) {
        document.getElementById('features_id').value = featureId;
        
        // Create a smooth scroll to the form
        document.getElementById('pendaftaran').scrollIntoView({
            behavior: 'smooth'
        });
    }
</script>
@endpush
@endsection