<link rel="stylesheet" href="{{ asset('css/footer_style.css')}}">

<footer>
        <div class="container py-5 text-center text-md-start">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="infos mb-3">
                        <a class="navbar-brand fs-3 fw-semibold logo" href="{{ url('/') }}">
                            {{ config('title', 'Fsk Location') }}
                            <img src="{{asset('images/car17.png')}}" class="" width="22%" alt="ym">
                        </a>
                        <p class="pb-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe veniam harum molestiae ex deleniti perferendis numquam pariatur, officia quos ducimus tempora nihil repudiandae
                        </p>
                        <div class="copyright">
                            <h6 class="">created by fsk location , sale Maroc</h6>
                            <span class="">&copy; {{ date('Y') }} - </span><span class="fsk fs-5 fw-bold">Fsk location</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="links px-4 px-lg-0 mt-3 text-capitalize">
                        <h5 class="fs-5 fw-semibold">quiq links</h5>
                        <ul class="list-unstyled py-2">
                            <li class="py-2">
                                <a class="text-white nav-link" href="{{ route('index')}}">home</a>
                            </li>
                            <li class="py-2">
                                <a class="text-white nav-link" href="{{ route('voitures.index')}}">cars</a>
                            </li>
                            <li class="py-2">
                                <a class="text-white nav-link" href="{{ route('contact')}}">Contact</a>
                            </li>
                            <li class="py-2">
                                <a class="text-white nav-link" href="{{ route('login')}}">Login</a>
                            </li>
                            <li class="py-2">
                                <a class="text-white nav-link" href="{{ route('register')}}">Registre</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="work mt-3">
                        <h5 class="fs-5 fw-semibold text-capitalize">working hours</h5>
                        <ul class="list-unstyled py-2">
                            <li class="py-2">
                                <h5 class="py-1">Lun - Ven <span class="ps-2">:</span><span class="h6 text-white ps-2">09:00 AM - 21:00 PM</span></h5>
                            </li>
                            <li class="py-2">
                                <h5 class="py-1">Sam <span class="ps-2">:</span><span class="h6 text-white ps-2">10:00 AM - 14:00 PM</span></h5>
                            </li>
                            <li class="py-2">
                                <h5 class="py-1">Dim <span class="ps-2">:</span><span class="h6 text-white ps-2">Closed</span></h5>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="contact mt-3 px-4 px-lg-0">
                        <h5 class="fs-5 fw-semibold">Contact</h5>
                        <p class="py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia vitae libero veniId </p>
                        <a class="btn rounded-pill w-100 px-2 py-2 fs-5 mb-4" href="mailto:Fsklocation@mail.com?subject=Contact">fsklocation@gmail.com</a>
                        <div class="media pt-2">
                            <ul class="d-flex list-unstyled justify-content-center justify-content-md-start ps-1 gap-3">
                                <li>
                                    <a class="d-block text-light" href="">
                                        <i class="fa-brands fa-facebook fa-xl facebook rounded-circle p-2"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-block text-light" href="">
                                        <i class="fa-brands fa-instagram fa-xl instagram rounded-circle p-2"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-block text-light" href="">
                                        <i class="fa-brands fa-twitter fa-xl twitter rounded-circle p-2"></i>

                                    </a>
                                </li>
                                <li>
                                    <a class="d-block text-light" href="">
                                    <i class="fa-brands fa-linkedin fa-xl linkedin rounded-circle p-2"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>