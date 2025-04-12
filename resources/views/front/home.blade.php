@extends('front.layout')

@section('content')
<section class="banner-seven-area sub-bg-two bg-image pt-26" data-background="{{ asset('learnit/assets/images/bg/banner-shadow.png') }}">
    <div class="container">
        <div class="banner-two__content">
            <h5 class="mb-10 primary-color text-capitalize wow fadeInRight" data-wow-delay="00ms"
                data-wow-duration="1500ms">Taman Kanak-Kanak</h5>
            <h1 class="wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">Rumah anak-anak untuk
                <span class="primary-color">Belajar <img src="{{ asset('learnit/assets/images/shape/banner-span-shape.png') }}"
                        alt="shape"></span>
            </h1>
            <p class="mt-20 wow fadeInRight" data-wow-delay="400ms" data-wow-duration="1500ms">Pastikan anak anda aman dan tumbuh untuk masa depan yang lebih baik</p>
            <div class="d-flex align-items-center gap-3 mt-50 wow fadeInRight" data-wow-delay="600ms"
                data-wow-duration="1500ms">
                <a href="course.html" class="btn-one">Lihat Paket<i
                        class="fa-light fa-arrow-right-long"></i></a>
                <div class="banner__video-btn ml-20">
                    <div class="video-btn video-pulse">
                        <a class="video-popup" href="https://www.youtube.com/watch?v=cBGEn_L_fxs"><i
                                class="fa-solid fa-play"></i></a>
                    </div>
                </div>
                <h5 class="d-none d-sm-block">Paly Video</h5>
            </div>
        </div>
    </div>
    <div class="banner-seven__image">
        <img class="w-100" src="{{ asset('learnit/assets/images/banner/banner-seven-hero.png') }}" alt="image">
        <img class="al-quran animation__arryUpDown" src="{{ asset('learnit/assets/images/shape/banner-seven-quran.png') }}"
            alt="image">
    </div>
</section>

   
        <!-- About area start here -->
        <section class="about-area pt-120 pb-120">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-5 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="about__left-part">
                            <div class="about__image">
                                <img class="about-dots sway__animation" src="{{ asset('learnit/assets/images/shape/about-dots.png') }}"
                                    alt="shape">
                                <img class="about-circle" src="{{ asset('learnit/assets/images/shape/about-circle.png') }}" alt="shape">
                                <img src="{{ asset('learnit/assets/images/about/about-image1.png') }}" alt="image">
                                <img class="sm-image" src="{{ asset('learnit/assets/images/about/about-image2.png') }}" alt="image">
                                <div class="count-info">
                                    <h5 class="primary-color fs-28"><span class="count primary-color">25</span>+</h5>
                                    <span class="fs-14">Years Experience</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="about__right-wrp">
                            <div class="section-header">
                                <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Tentang Kami</h5>
                                <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Rumah Untuk Tumbuh Bagi Anak Anak
                                </h2>
                                <p class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, itaque iusto omnis saepe aut asperiores? Reiciendis omnis ipsa ducimus quidem corporis velit nesciunt tenetur delectus?</p>
                            </div>
                            <div class="about__right-part mt-30 wow fadeInDown" data-wow-delay="200ms"
                                data-wow-duration="1500ms">
                                <div class="about__info">
                                    <div class="icon bg__1">
                                        <img src="{{ asset('learnit/assets/images/icon/about-icon1.png') }}" alt="icon">
                                    </div>
                                    <div>
                                        <h4>Educator Support</h4>
                                        <p class="mt-10">Elit Aenean scelerisque vitae consequat the.</p>
                                    </div>
                                </div>
                                <div class="about__info">
                                    <div class="icon bg__2">
                                        <img src="{{ asset('learnit/assets/images/icon/about-icon2.png') }}" alt="icon">
                                    </div>
                                    <div>
                                        <h4>Flexible Classes</h4>
                                        <p class="mt-10">Elit Aenean scelerisque vitae consequat the.</p>
                                    </div>
                                </div>
                            </div>
                            <a href="about.html" class="btn-one mt-50 wow fadeInDown" data-wow-delay="200ms"
                                data-wow-duration="1500ms">About Us<i class="fa-light fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About area end here -->


     <!-- filepath: /home/pram/project/kampus/kaido-kit/resources/views/front/home.blade.php -->
<section class="courses-nine-area pt-120 pb-120 sub-bg">
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
            <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Top Classes</h5>
            <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Choose Our <span>Top</span> Courses</h2>
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
                        <h4><a href="#" class="primary-hover">{{ $feature->name }}</a></h4>
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
                    
                    </div>
                </div>
            </div>
            @empty
            <div class="col-xl-6 wow fadeInDown" data-wow-delay="00ms" data-wow-duration="1500ms">
                <div class="courses-nine__item p-4">
                    <div class="courses-nine__image">
                        <img src="{{ asset('learnit/assets/images/courses/courses-nine-image1.jpg') }}" alt="image">
                    </div>
                    <div class="courses-nine__content">
                        <span class="time-tag bg1"><i class="fa-light fa-clock"></i> 16 Hours Session</span>
                        <h4><a href="course-details.html" class="primary-hover">Day Care</a></h4>
                        <p>
                            Menjaga anak anak anda dengan baik dan aman
                        </p>
                        <ul>
                            <li>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.38397 14.1797C7.34153 14.1797 7.29954 14.171 7.26066 14.1539C7.22178 14.1369 7.18684 14.1121 7.15803 14.0809L1.06612 7.49119C1.02551 7.44726 0.99859 7.39244 0.988651 7.33344C0.978712 7.27445 0.986187 7.21384 1.01016 7.15902C1.03414 7.10421 1.07357 7.05758 1.12364 7.02483C1.17371 6.99208 1.23223 6.97464 1.29206 6.97464H4.22437C4.26839 6.97464 4.31191 6.98409 4.35197 7.00234C4.39204 7.0206 4.42772 7.04723 4.45661 7.08045L6.49255 9.42273C6.71258 8.95239 7.13852 8.16925 7.88597 7.21497C8.99095 5.8042 11.0463 3.7294 14.5627 1.85642C14.6307 1.82023 14.7097 1.81083 14.7843 1.83009C14.8589 1.84936 14.9235 1.89587 14.9654 1.96046C15.0073 2.02504 15.0235 2.103 15.0108 2.17894C14.998 2.25488 14.9573 2.32328 14.8966 2.37064C14.8831 2.38113 13.5273 3.44882 11.967 5.40448C10.5309 7.20417 8.62191 10.1469 7.68255 13.946C7.66605 14.0128 7.62767 14.0721 7.57354 14.1144C7.5194 14.1568 7.45263 14.1799 7.38388 14.1799L7.38397 14.1797Z"
                                        fill="oklch(0.828 0.189 84.429)" />
                                </svg>
                                Flexible Timings
                            </li>
                            <li>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.38397 14.1797C7.34153 14.1797 7.29954 14.171 7.26066 14.1539C7.22178 14.1369 7.18684 14.1121 7.15803 14.0809L1.06612 7.49119C1.02551 7.44726 0.99859 7.39244 0.988651 7.33344C0.978712 7.27445 0.986187 7.21384 1.01016 7.15902C1.03414 7.10421 1.07357 7.05758 1.12364 7.02483C1.17371 6.99208 1.23223 6.97464 1.29206 6.97464H4.22437C4.26839 6.97464 4.31191 6.98409 4.35197 7.00234C4.39204 7.0206 4.42772 7.04723 4.45661 7.08045L6.49255 9.42273C6.71258 8.95239 7.13852 8.16925 7.88597 7.21497C8.99095 5.8042 11.0463 3.7294 14.5627 1.85642C14.6307 1.82023 14.7097 1.81083 14.7843 1.83009C14.8589 1.84936 14.9235 1.89587 14.9654 1.96046C15.0073 2.02504 15.0235 2.103 15.0108 2.17894C14.998 2.25488 14.9573 2.32328 14.8966 2.37064C14.8831 2.38113 13.5273 3.44882 11.967 5.40448C10.5309 7.20417 8.62191 10.1469 7.68255 13.946C7.66605 14.0128 7.62767 14.0721 7.57354 14.1144C7.5194 14.1568 7.45263 14.1799 7.38388 14.1799L7.38397 14.1797Z"
                                        fill="oklch(0.828 0.189 84.429)" />
                                </svg>
                                Expert Trainers
                            </li>
                        </ul>
                    
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
        <!-- Faq area start here -->
        <section class="faq-six-area sub-bg-two pt-120 pb-120">
            <div class="faq-six__shape1">
                <img class="animation__goAll3" src="{{ asset('learnit/assets/images/shape/faq-six-shape1.png') }}" alt="shape">
            </div>
            <div class="faq-six__shape2">
                <img class="animation__rotateY" src="{{ asset('learnit/assets/images/shape/faq-six-shape2.png') }}" alt="shape">
            </div>
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="section-header mb-40">
                            <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">FAQ’S</h5>
                            <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Kami Selalu Memberi Pengalaman Yang Baik Untuk Orangtua dan Anak-anak</h2>
                        </div>
                        <div class="accordion" id="accordionExample">
<div class="accordion" id="accordionExample">
    @forelse(App\Models\Faq::where('is_active', true)->orderBy('order')->get() as $index => $faq)
        <div class="accordion-item shadow border-none wow fadeInDown" data-wow-delay="{{ $index * 100 }}ms"
            data-wow-duration="1500ms">
            <h2 class="accordion-header" id="heading{{ $index }}">
                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                    {{ $faq->question }}
                </button>
            </h2>
            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>{!! $faq->answer !!}</p>
                </div>
            </div>
        </div>
    @empty
        <div class="accordion-item shadow border-none wow fadeInDown" data-wow-delay="00ms"
            data-wow-duration="1500ms">
            <h2 class="accordion-header" id="headingDefault">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseDefault" aria-expanded="true" aria-controls="collapseDefault">
                    Belum ada FAQ yang tersedia
                </button>
            </h2>
            <div id="collapseDefault" class="accordion-collapse collapse show" aria-labelledby="headingDefault"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Silakan tambahkan FAQ melalui panel admin.</p>
                </div>
            </div>
        </div>
    @endforelse
</div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 wow fadeInLeft" data-wow-delay="200ms"
                        data-wow-duration="1500ms">
                        <div class="faq-six__image image">
                            <img src="{{ asset('images/faq.jpeg') }}" alt="image">
                            <img class="shape animation__floatBob" src="{{ asset('learnit/assets/images/shape/faq-six-image-shape.png') }}"
                                alt="shape">
                            <img class="dots animation__floatBob" src="{{ asset('learnit/assets/images/shape/faq-six-image-shape-dots.png') }}"
                                alt="shape">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Faq area end here -->
        <!-- Banner video area start here -->
        <div class="banner-video-seven-area pt-120">
            <div class="container">
                <div class="banner-video-seven__wrp image">
                    <img src="{{ asset('learnit/assets/images/video/video-seven-image.png') }}" alt="image">
                    <div class="banner-video__video-btn">
                        <div class="video-btn video-pulse">
                            <a class="video-popup" href="https://www.youtube.com/watch?v=cBGEn_L_fxs"><i
                                    class="fa-solid fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner video area end here -->

        <!-- Team area start here -->
        <section class="team-seven-area sub-bg-two pt-100 pb-120 bg-image"
            data-background="{{ asset('learnit/assets/images/bg/team-seven-bg.png') }}">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between gap-4 flex-wrap mb-60">
                    <div class="section-header">
                        <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Tenaga Pengajar</h5>
                        <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Bersama Tenaga Profesional
                        </h2>
                    </div>
                    <div class="d-flex align-items-center gap-3 wow fadeInUp" data-wow-delay="400ms"
                        data-wow-duration="1500ms">
                        <button class="arry-prev team-two__arry-prev"><i
                                class="fa-light fa-arrow-left-long"></i></button>
                        <button class="arry-next team-two__arry-next active"><i
                                class="fa-light fa-arrow-right-long"></i></button>
                    </div>
                </div>
                <div class="swiper team-four__slider">
                    <div class="swiper-wrapper">
               <!-- filepath: /home/pram/project/kampus/kaido-kit/resources/views/front/home.blade.php -->
<div class="swiper team-four__slider">
    <div class="swiper-wrapper">
        @forelse(App\Models\User::take(6)->get() as $instructor)
        <div class="swiper-slide">
            <div class="team-seven__item">
<div class="team-seven__image image">
    <div style="height: 380px; overflow: hidden; border-radius: 10px;">
        @if($instructor->avatar_url)
            <img src="{{ asset('storage/' . $instructor->avatar_url) }}" alt="{{ $instructor->name }}" 
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center top;">
        @else
            <img src="{{ asset('learnit/assets/images/team/team-seven-image1.jpg') }}" alt="Default instructor image"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center top;">
        @endif
    </div>
    <div class="team-two__share">
        <a class="share-icon" href="#0"><i class="fa-light fa-share-nodes"></i></a>
        <ul>
            @if($instructor->facebook_url)
            <li>
                <a href="{{ $instructor->facebook_url }}"><i class="fa-brands fa-facebook-f"></i></a>
            </li>
            @endif
            @if($instructor->instagram_url)
            <li>
                <a href="{{ $instructor->instagram_url }}"><i class="fa-brands fa-instagram"></i></a>
            </li>
            @endif
            @if($instructor->linkedin_url)
            <li>
                <a href="{{ $instructor->linkedin_url }}"><i class="fa-brands fa-linkedin-in"></i></a>
            </li>
            @endif
        </ul>
    </div>
</div>
                <div class="team-four__content">
                    <h4><a href="">{{ $instructor->name }}</a></h4>
                    <span>{{ $instructor->email ?? 'tidak tersedia' }}</span>
                </div>
            </div>
        </div>
        @empty
        <div class="swiper-slide">
            <div class="team-seven__item">
                <div class="team-seven__image image">
                    <img src="{{ asset('learnit/assets/images/team/team-seven-image1.jpg') }}" alt="image">
                    <div class="team-two__share">
                        <a class="share-icon" href="#0"><i class="fa-light fa-share-nodes"></i></a>
                        <ul>
                            <li>
                                <a href="#0"><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fa-brands fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="team-four__content">
                    <h4><a href="team-details.html">Default Instructor</a></h4>
                    <span>Lead Teacher</span>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
                       
               
                    </div>
                </div>
            </div>
        </section>
        <!-- Team area end here -->

        <section class="blog-two-area pt-120 pb-120">
            <div class="container">
                <div class="section-header mb-60 text-center">
                    <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Aktivitas</h5>
                    <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Lihat Aktivitas Terbaru Kami
                    </h2>
                </div>

        <div class="row g-4">
            @forelse(App\Models\Activity::latest()->take(3)->get() as $activity)
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="blog-two__item">
                        <a href="{{ route('activity.show', $activity->id) }}" class="blog__image d-block image radius0">
                            @if($activity->image)
    <div style="height: 220px; overflow: hidden;">
        <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}" 
             style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
    </div>
@else
    <div style="height: 220px; overflow: hidden;">
        <img src="{{ asset('learnit/assets/images/blog/blog-six-image1.jpg') }}" 
             alt="default image" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
    </div>
@endif
                        </a>
                        <div class="blog-two__content p-4">
                            <a href="#0" class="tag">{{ $activity->category ?? "Tidak Ada" }}</a>
                            <h3><a href="{{ route('activity.show', $activity->id) }}" class="primary-hover">{{ $activity->title }}</a></h3>
                            <ul class="blog-info mt-20">
                                <li>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.66406 3.7915C5.3224 3.7915 5.03906 3.50817 5.03906 3.1665V0.666504C5.03906 0.324837 5.3224 0.0415039 5.66406 0.0415039C6.00573 0.0415039 6.28906 0.324837 6.28906 0.666504V3.1665C6.28906 3.50817 6.00573 3.7915 5.66406 3.7915ZM12.3307 3.7915C11.9891 3.7915 11.7057 3.50817 11.7057 3.1665V0.666504C11.7057 0.324837 11.9891 0.0415039 12.3307 0.0415039C12.6724 0.0415039 12.9557 0.324837 12.9557 0.666504V3.1665C12.9557 3.50817 12.6724 3.7915 12.3307 3.7915ZM6.08073 11.0832C5.9724 11.0832 5.86406 11.0582 5.76406 11.0165C5.65573 10.9748 5.5724 10.9165 5.48906 10.8415C5.33906 10.6832 5.2474 10.4748 5.2474 10.2498C5.2474 10.1415 5.2724 10.0332 5.31406 9.93317C5.35573 9.83317 5.41406 9.7415 5.48906 9.65817C5.5724 9.58317 5.65573 9.52484 5.76406 9.48317C6.06406 9.35817 6.43906 9.42484 6.6724 9.65817C6.8224 9.8165 6.91406 10.0332 6.91406 10.2498C6.91406 10.2998 6.90573 10.3582 6.8974 10.4165C6.88906 10.4665 6.8724 10.5165 6.8474 10.5665C6.83073 10.6165 6.80573 10.6665 6.7724 10.7165C6.7474 10.7582 6.70573 10.7998 6.6724 10.8415C6.51406 10.9915 6.2974 11.0832 6.08073 11.0832ZM8.9974 11.0832C8.88906 11.0832 8.78073 11.0582 8.68073 11.0165C8.5724 10.9748 8.48906 10.9165 8.40573 10.8415C8.25573 10.6832 8.16406 10.4748 8.16406 10.2498C8.16406 10.1415 8.18906 10.0332 8.23073 9.93317C8.2724 9.83317 8.33073 9.7415 8.40573 9.65817C8.48906 9.58317 8.5724 9.52484 8.68073 9.48317C8.98073 9.34984 9.35573 9.42484 9.58906 9.65817C9.73906 9.8165 9.83073 10.0332 9.83073 10.2498C9.83073 10.2998 9.8224 10.3582 9.81406 10.4165C9.80573 10.4665 9.78906 10.5165 9.76406 10.5665C9.7474 10.6165 9.7224 10.6665 9.68906 10.7165C9.66406 10.7582 9.6224 10.7998 9.58906 10.8415C9.43073 10.9915 9.21406 11.0832 8.9974 11.0832ZM11.9141 11.0832C11.8057 11.0832 11.6974 11.0582 11.5974 11.0165C11.4891 10.9748 11.4057 10.9165 11.3224 10.8415L11.2224 10.7165C11.1908 10.6701 11.1656 10.6196 11.1474 10.5665C11.1233 10.5193 11.1065 10.4687 11.0974 10.4165C11.0891 10.3582 11.0807 10.2998 11.0807 10.2498C11.0807 10.0332 11.1724 9.8165 11.3224 9.65817C11.4057 9.58317 11.4891 9.52484 11.5974 9.48317C11.9057 9.34984 12.2724 9.42484 12.5057 9.65817C12.6557 9.8165 12.7474 10.0332 12.7474 10.2498C12.7474 10.2998 12.7391 10.3582 12.7307 10.4165C12.7224 10.4665 12.7057 10.5165 12.6807 10.5665C12.6641 10.6165 12.6391 10.6665 12.6057 10.7165C12.5807 10.7582 12.5391 10.7998 12.5057 10.8415C12.3474 10.9915 12.1307 11.0832 11.9141 11.0832ZM6.08073 13.9998C5.9724 13.9998 5.86406 13.9748 5.76406 13.9332C5.66406 13.8915 5.5724 13.8332 5.48906 13.7582C5.33906 13.5998 5.2474 13.3832 5.2474 13.1665C5.2474 13.0582 5.2724 12.9498 5.31406 12.8498C5.35573 12.7415 5.41406 12.6498 5.48906 12.5748C5.7974 12.2665 6.36406 12.2665 6.6724 12.5748C6.8224 12.7332 6.91406 12.9498 6.91406 13.1665C6.91406 13.3832 6.8224 13.5998 6.6724 13.7582C6.51406 13.9082 6.2974 13.9998 6.08073 13.9998ZM8.9974 13.9998C8.78073 13.9998 8.56406 13.9082 8.40573 13.7582C8.25573 13.5998 8.16406 13.3832 8.16406 13.1665C8.16406 13.0582 8.18906 12.9498 8.23073 12.8498C8.2724 12.7415 8.33073 12.6498 8.40573 12.5748C8.71406 12.2665 9.28073 12.2665 9.58906 12.5748C9.66406 12.6498 9.7224 12.7415 9.76406 12.8498C9.80573 12.9498 9.83073 13.0582 9.83073 13.1665C9.83073 13.3832 9.73906 13.5998 9.58906 13.7582C9.43073 13.9082 9.21406 13.9998 8.9974 13.9998ZM11.9141 13.9998C11.6974 13.9998 11.4807 13.9082 11.3224 13.7582C11.2453 13.6799 11.1856 13.5862 11.1474 13.4832C11.1057 13.3832 11.0807 13.2748 11.0807 13.1665C11.0807 13.0582 11.1057 12.9498 11.1474 12.8498C11.1891 12.7415 11.2474 12.6498 11.3224 12.5748C11.5141 12.3832 11.8057 12.2915 12.0724 12.3498C12.1307 12.3582 12.1807 12.3748 12.2307 12.3998C12.2807 12.4165 12.3307 12.4415 12.3807 12.4748C12.4224 12.4998 12.4641 12.5415 12.5057 12.5748C12.6557 12.7332 12.7474 12.9498 12.7474 13.1665C12.7474 13.3832 12.6557 13.5998 12.5057 13.7582C12.3474 13.9082 12.1307 13.9998 11.9141 13.9998ZM16.0807 7.19984H1.91406C1.5724 7.19984 1.28906 6.9165 1.28906 6.57484C1.28906 6.23317 1.5724 5.94984 1.91406 5.94984H16.0807C16.4224 5.94984 16.7057 6.23317 16.7057 6.57484C16.7057 6.9165 16.4224 7.19984 16.0807 7.19984Z"
                                            fill="oklch(0.828 0.189 84.429)" />
                                        <path
                                            d="M12.3333 17.9582H5.66667C2.625 17.9582 0.875 16.2082 0.875 13.1665V6.08317C0.875 3.0415 2.625 1.2915 5.66667 1.2915H12.3333C15.375 1.2915 17.125 3.0415 17.125 6.08317V13.1665C17.125 16.2082 15.375 17.9582 12.3333 17.9582ZM5.66667 2.5415C3.28333 2.5415 2.125 3.69984 2.125 6.08317V13.1665C2.125 15.5498 3.28333 16.7082 5.66667 16.7082H12.3333C14.7167 16.7082 15.875 15.5498 15.875 13.1665V6.08317C15.875 3.69984 14.7167 2.5415 12.3333 2.5415H5.66667Z"
                                            fill="oklch(0.828 0.189 84.429)" />
                                    </svg>
                                    <a href="#0">{{ \Carbon\Carbon::parse($activity->activity_date)->format('M d, Y') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada aktivitas yang tersedia.</p>
                </div>
            @endforelse
        </div>
        
        @if(App\Models\Activity::count() > 3)
            <div class="text-center mt-5">
                <a href="{{ route('activity.index') }}" class="btn-one">Lihat Semua Aktivitas<i class="fa-light fa-arrow-right-long"></i></a>
            </div>
        @endif
    </div>
</section>
            </div>
        </section>
        <section class="testimonial-seven-area sub-bg-two pt-120 pb-120 bg-image"
        data-background="{{ asset('learnit/assets/images/bg/ellipse-bg.png') }}">
        <div class="testimonial-seven__shape1">
            <img class="sway__animationX" src="{{ asset('learnit/assets/images/shape/courses-seven-shape1.png') }}" alt="shape">
        </div>
        <div class="testimonial-seven__shape2">
            <img class="animation__rotate" src="{{ asset('learnit/assets/images/shape/courses-seven-shape2.png') }}" alt="shape">
        </div>
        <div class="testimonial-seven__shape3">
            <img class="animation__rotateY" src="{{ asset('learnit/assets/images/shape/courses-seven-shape3.png') }}" alt="shape">
        </div>
        <div class="container">
            <div class="section-header mb-60 text-center">
                <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">TESTIMONIALS</h5>
                <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms"> Apa Yang Mereka Katakan tentang TK Khalifah</h2>
            </div>
            <div class="swiper testimonial-seven__slider">
              
<div class="swiper-wrapper">
    @foreach($testimonials as $testimonial)
    <div class="swiper-slide">
        <div class="testimonial-seven__item">
            <div class="d-flex align-items-center gap-4 justify-content-between mb-15">
                <div class="star">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $testimonial->rating)
                            <i class="fa-sharp fa-solid fa-star"></i>
                        @else
                            <i class="fa-sharp fa-solid fa-star disabled"></i>
                        @endif
                    @endfor
                </div>
                <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.5">
                        <path
                            d="M21.5998 15.1662C21.4359 21.2706 20.2326 27.1028 17.1618 32.4687C15.0391 36.1766 11.8636 38.7708 8.31789 40.9881C8.09312 41.1284 7.80413 41.3886 7.55907 41.1588C7.2836 40.9002 7.52189 40.5673 7.66216 40.3087C8.9449 37.9646 10.3121 35.6645 11.4292 33.2309C12.6528 30.564 13.6212 27.811 14.2567 24.9396C14.4257 24.1774 14.255 24.0929 13.535 24.2484C7.64188 25.526 2.16112 21.8976 1.00852 15.9858C-0.0849304 10.38 3.84608 4.78603 9.51275 3.88694C15.9196 2.86954 21.5491 7.65063 21.5998 14.1522C21.6015 14.4902 21.5998 14.8282 21.5998 15.1662Z"
                            fill="oklch(0.828 0.189 84.429)" />
                        <path
                            d="M44.25 15.2202C44.0793 21.5916 42.7949 27.6571 39.3912 33.1581C37.3175 36.5077 34.3228 38.8501 31.0746 40.9288C30.816 41.0945 30.4729 41.4375 30.1856 41.1198C29.9253 40.8325 30.2346 40.4877 30.3884 40.1987C31.6559 37.8462 33.0401 35.5562 34.1403 33.1142C35.3351 30.4642 36.2917 27.7382 36.9153 24.8939C37.0775 24.1536 36.8967 24.0827 36.2224 24.2415C30.2836 25.6358 24.4277 21.6338 23.5556 15.4348C22.7985 10.0537 26.7751 4.68115 32.1359 3.89022C38.7118 2.92353 44.2162 7.65053 44.25 14.2923C44.25 14.6016 44.25 14.9109 44.25 15.2202Z"
                            fill="oklch(0.828 0.189 84.429)" />
                    </g>
                </svg>
            </div>
            <p>{!! $testimonial->content !!}</p>
            <div class="d-flex align-items-center gap-3 mt-30">
                @if($testimonial->image)
                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}">
                @else
                    <img src="{{ asset('assets/images/testimonial/default-avatar.png') }}" alt="{{ $testimonial->name }}">
                @endif
                <div class="testi-info">
                    <h4>{{ $testimonial->name }}</h4>
                    <p class="fs-14">{{ $testimonial->position }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
            </div>
            <div class="text-center mt-60">
                <div class="dot testimonial-seven__dot"></div>
            </div>
        </div>
    </section>
@endsection