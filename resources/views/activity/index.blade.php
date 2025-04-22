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
                    Aktivitas
                </h1>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><i class="fa-regular fa-angle-right"></i></li>
                    <li>Aktivitas</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Banner area end here -->

    <!-- Activities area start here -->
    <section class="blog-two-area pt-120 pb-120">
        <div class="container">
            <div class="section-header mb-60 text-center">
                <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Aktivitas Kami</h5>
                <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Aktivitas dan Kegiatan
                    <span>TK Khalifah <img src="{{ asset('learnit/assets/images/shape/header-shape.png') }}" alt="shape"></span>
                </h2>
                <p class="wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                    Berikut adalah aktivitas-aktivitas terbaru yang dilakukan oleh anak-anak dan guru di TK Khalifah.
                </p>
            </div>

            <div class="row g-4">
                @forelse(App\Models\Activity::latest()->paginate(9) as $activity)
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->index * 100 }}ms" data-wow-duration="1500ms">
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
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($activity->description), 100) }}</p>
                                <ul class="blog-info mt-20">
                                    <li>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.5 8.25H3C2.17157 8.25 1.5 7.57843 1.5 6.75V3.75C1.5 2.92157 2.17157 2.25 3 2.25H4.5C5.32843 2.25 6 2.92157 6 3.75V6.75C6 7.57843 5.32843 8.25 4.5 8.25Z"
                                                fill="oklch(0.828 0.189 84.429)" />
                                            <path d="M4.5 15.75H3C2.17157 15.75 1.5 15.0784 1.5 14.25V11.25C1.5 10.4216 2.17157 9.75 3 9.75H4.5C5.32843 9.75 6 10.4216 6 11.25V14.25C6 15.0784 5.32843 15.75 4.5 15.75Z"
                                                fill="oklch(0.828 0.189 84.429)" />
                                            <path d="M12 8.25H10.5C9.67157 8.25 9 7.57843 9 6.75V3.75C9 2.92157 9.67157 2.25 10.5 2.25H12C12.8284 2.25 13.5 2.92157 13.5 3.75V6.75C13.5 7.57843 12.8284 8.25 12 8.25Z"
                                                fill="oklch(0.828 0.189 84.429)" />
                                            <path d="M12 15.75H10.5C9.67157 15.75 9 15.0784 9 14.25V11.25C9 10.4216 9.67157 9.75 10.5 9.75H12C12.8284 9.75 13.5 10.4216 13.5 11.25V14.25C13.5 15.0784 12.8284 15.75 12 15.75Z"
                                                fill="oklch(0.828 0.189 84.429)" />
                                            <path d="M15 9.75V11.25C15 11.6642 15.3358 12 15.75 12H16.5C16.9142 12 17.25 11.6642 17.25 11.25V9.75C17.25 9.33579 16.9142 9 16.5 9H15.75C15.3358 9 15 9.33579 15 9.75Z"
                                                fill="oklch(0.828 0.189 84.429)" />
                                            <path d="M15 6.75V8.25C15 8.66421 15.3358 9 15.75 9H16.5C16.9142 9 17.25 8.66421 17.25 8.25V6.75C17.25 6.33579 16.9142 6 16.5 6H15.75C15.3358 6 15 6.33579 15 6.75Z"
                                                fill="oklch(0.828 0.189 84.429)" />
                                            <path d="M6.75 9.75V11.25C6.75 11.6642 7.08579 12 7.5 12H8.25C8.66421 12 9 11.6642 9 11.25V9.75C9 9.33579 8.66421 9 8.25 9H7.5C7.08579 9 6.75 9.33579 6.75 9.75Z"
                                                fill="oklch(0.828 0.189 84.429)" />
                                            <path d="M6.75 6.75V8.25C6.75 8.66421 7.08579 9 7.5 9H8.25C8.66421 9 9 8.66421 9 8.25V6.75C9 6.33579 8.66421 6 8.25 6H7.5C7.08579 6 6.75 6.33579 6.75 6.75Z"
                                                fill="oklch(0.828 0.189 84.429)" />
                                        </svg>
                                        <a href="#0">{{ \Carbon\Carbon::parse($activity->activity_date)->format('d F Y') }}</a>
                                    </li>
                                    <li>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 9.75C10.6569 9.75 12 8.40685 12 6.75C12 5.09315 10.6569 3.75 9 3.75C7.34315 3.75 6 5.09315 6 6.75C6 8.40685 7.34315 9.75 9 9.75Z"
                                                fill="oklch(0.828 0.189 84.429)" />
                                            <path
                                                d="M9 11.25C6.1005 11.25 3.75 13.6005 3.75 16.5C3.75 16.9142 4.08579 17.25 4.5 17.25H13.5C13.9142 17.25 14.25 16.9142 14.25 16.5C14.25 13.6005 11.8995 11.25 9 11.25Z"
                                                fill="oklch(0.828 0.189 84.429)" />
                                            <path
                                                d="M15.75 6C15.75 3.10051 13.3995 0.75 10.5 0.75C10.0858 0.75 9.75 1.08579 9.75 1.5C9.75 1.91421 10.0858 2.25 10.5 2.25C12.5711 2.25 14.25 3.92893 14.25 6C14.25 6.41421 14.5858 6.75 15 6.75C15.4142 6.75 15.75 6.41421 15.75 6Z"
                                                fill="oklch(0.828 0.189 84.429)" />
                                        </svg>
                                        <a href="#0">By Admin</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="empty-state">
                            <img src="{{ asset('learnit/assets/images/icon/empty-data.svg') }}" alt="No Activities" class="mb-4" style="max-width: 150px;">
                            <h4>Belum Ada Aktivitas</h4>
                            <p>Saat ini belum ada aktivitas yang ditambahkan. Silakan kembali lagi nanti.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination area -->
            <div class="pagination-area mt-60 wow fadeInDown" data-wow-delay="400ms" data-wow-duration="1500ms">
               {{ $activities->links('') }}
            </div>
        </div>
    </section>
    <!-- Activities area end here -->

    <!-- Banner video area start here -->
    <div class="banner-video-seven-area pt-120 pb-120 sub-bg-two">
        <div class="container">
            <div class="section-header text-center mb-50">
                <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Galeri Video</h5>
                <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Lihat Aktivitas Kami
                    <span>Dalam Video </span>
                </h2>
            </div>
            <div class="banner-video-seven__wrp image">
                <img src="{{ asset('images/bannervideo.jpeg') }}" alt="image">
                <div class="banner-video__video-btn">
                    <div class="video-btn video-pulse">
                        <a class="video-popup" href="https://www.youtube.com/embed/p5wyPm2v5CA?si=YWDnOdNqtsMVc4L-"><i
                                class="fa-solid fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner video area end here -->

    <!-- Call to action area start here -->
    <section class="cta-four-area pt-100 pb-100">
        <div class="container">
            <div class="cta-four__wrp">
                <div class="cta-four__shape">
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="cta-four__content">
                            <h2 class="wow fadeInDown" data-wow-delay="00ms" data-wow-duration="1500ms">Daftarkan anak Anda di TK Khalifah</h2>
                            <p class="wow fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">Bergabunglah dengan kami untuk memberikan pendidikan terbaik bagi buah hati Anda.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInDown" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="d-flex justify-content-lg-end">
                            <a href="{{ route('pendaftaran.index') }}" class="btn-one">Daftar Sekarang<i
                                    class="fa-light fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to action area end here -->
</main>
@endsection