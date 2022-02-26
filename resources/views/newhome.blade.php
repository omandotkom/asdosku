@extends('layouts.newtemplate.home')
@section('content')
<main>
    <!-- Floating Button -->
    <a href="https://api.whatsapp.com/send?phone=6285643715830&text=Halo%20Asdosku%20Mau%20Tanya%20Nih." target="_blank" class="float">
      <img src="{{asset('newtemplate/assets/svg/whatsapp.svg')}}" width="25px" alt="" />
    </a>
    <!-- End Floating Button -->

    <!-- First Content -->
    <section class="bg-dark-blue h-100 w-100">
      <div class="px-5 py-5">
        <div class="row mt-4 mb-5">
          <div class="col-lg-7 col-md-7 mb-5 col-sm-12">
            <div class="row">
              <div class="col">
                <h2 class="text-white">
                  Selesaikan kerjaan tertunda,<br />
                  kerjakan proyek baru dan <br />
                  maksimalkan peluang <br />
                  bersama
                  <span class="font-light-blue">#AsistenProfesional</span>
                </h2>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-lg-12 col-md-12 col-sm-6">
                <p class="text-white middle-text">
                  Pilih berbagai layanan dan Asisten terbaik <br />
                  yang akan mewujudkan misi anda.
                </p>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-12 col-md-12 col-sm-6">
                <a href="" class="btn btn-success btn-md px-4 btn-rounded"
                  >Pilih Layanan</a
                >
              </div>
            </div>
            <div class="row mt-4 justify-content-start mt-4">
              <div class="col-lg-8 col-sm-12 col-md-10">
                <a class="btn btn-outline-primary btn-md px-3">Member Area</a>
                <a class="btn btn-outline-primary btn-md mx-2">Build Team</a>
              </div>
              <div class="col-3"></div>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 mb-5 col-sm-12">
            <div class="container p-1">
              <img
                width="380vw"
                class="mt-4 img-fluid img"
                src="{{asset('newtemplate/assets/images/User.png')}}"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End -->

    <!-- Second Content -->
    <section>
      <div class="py-5">
        <div class="container mt-5">
          <div class="row">
            <div class="col">
              <div class="d-flex text-center justify-content-center">
                <p class="h2">
                  40++ Kampus pilihan dari berbagai kota di Indonesia
                </p>
              </div>
            </div>
          </div>
          <div class="container px-2">
            <div class="row mt-4">
              <div class="col">
                <div class="d-flex justify-content-center py-1">
                  <img width="100rem" src="{{asset('newtemplate/assets/images/UnMuhYogy.png')}}" />
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-center py-1">
                  <img width="100rem" src="{{asset('newtemplate/assets/images/UnivJogja.png')}}" />
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-center py-1">
                  <img width="100rem" src="{{asset('newtemplate/assets/images/UnivNegYogya.png')}}" />
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-center py-1">
                  <img width="100rem" src="{{asset('newtemplate/assets/images/UnivPemNas.png')}}" />
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-center py-1">
                  <img width="100rem" src="{{asset('newtemplate/assets/images/UnivJenSud.png')}}" />
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-center py-1">
                  <img width="100rem" src="{{asset('newtemplate/assets/images/UnMuhPurwo.png')}}" />
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-center py-1">
                  <img width="100rem" src="{{asset('newtemplate/assets/images/Ust.png')}}" />
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-center py-1">
                  <img width="100rem" src="{{asset('newtemplate/assets/images/Uin.png')}}" />
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-center py-1">
                  <img width="100rem" src="{{asset('newtemplate/assets/images/Itb.png')}}" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End -->

    <!-- Third Content -->
    <section>
      <div class="bg-light-grey h-100 w-100 mt-5 py-5">
        <div class="container mt-3">
          <div class="row">
            <div class="col">
              <div class="d-flex justify-content-center">
                <div class="h2">Layanan Best Seller</div>
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <div
              class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-center"
            >
              <figure class="figure">
                <img
                  src="{{asset('newtemplate/assets/images/Features-Icon-1.png')}}"
                  class="figure-img img-fluid rounded"
                />
                <figcaption class="figure-caption mt-3 fs-5 text-center">
                  Surveyor.
                </figcaption>
              </figure>
            </div>
            <div
              class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-center"
            >
              <figure class="figure">
                <img
                  src="{{asset('newtemplate/assets/images/Features-Icon-2.png')}}"
                  class="figure-img img-fluid rounded"
                />
                <figcaption class="figure-caption mt-3 fs-5 text-center">
                  Bantuan Skripsi.
                </figcaption>
              </figure>
            </div>
            <div
              class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-center"
            >
              <figure class="figure">
                <img
                  src="{{asset('newtemplate/assets/images/Features-Icon-3.png')}}"
                  class="figure-img img-fluid rounded"
                />
                <figcaption class="figure-caption mt-3 fs-5 text-center">
                  Asisten Penulis.
                </figcaption>
              </figure>
            </div>
            <div
              class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-center"
            >
              <figure class="figure">
                <img
                  src="{{asset('newtemplate/assets/images/Features-Icon-4.png')}}"
                  class="figure-img img-fluid rounded"
                />
                <figcaption class="figure-caption mt-3 fs-5 text-center">
                  Desain Logo.
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End -->

    <!-- Fourth Content -->
    <section>
      <div class="bg-light-blue h-100 w-100 py-5">
        <div class="container py-4 mt-3">
          <div class="row">
            <div class="col">
              <div class="d-flex justify-content-center">
                <div class="h2">Kenapa Asdosku</div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="row mt-4">
              <div class="col">
                <div class="row">
                  <div class="col-lg-12">
                    <img src="{{asset('newtemplate/assets/svg/check-solid.svg')}}" width="20vw" /><span
                      class="text-white h6 mx-3"
                      >50++ Pilihan Layanan</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <img src="{{asset('newtemplate/assets/svg/check-solid.svg')}}" width="20vw" /><span
                      class="text-white h6 mx-3"
                      >Bisa Memililih Asisten dari kampus dan Kota lain</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <img src="{{asset('newtemplate/assets/svg/check-solid.svg')}}" width="20vw" /><span
                      class="text-white h6 mx-3"
                      >Keamanan data terjamin</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <img src="{{asset('newtemplate/assets/svg/check-solid.svg')}}" width="20vw" /><span
                      class="text-white h6 mx-3"
                      >Asisten Terlatih dan Terpantau</span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End -->

    <!-- Fifth Content -->
    <section>
      <div class="h-100 w-100 py-5">
        <div class="container mt-3">
          <div class="row">
            <div class="col">
              <div class="d-flex justify-content-center">
                <div class="h2">Apa kata warga kampus</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="container">
              <div class="d-flex justify-content-center">
                <div class="col">
                  <div class="row mt-4 justify-content-center">
                    <div class="col-8">
                      <p class="h5 text-center">
                        “Layanannya banyak, bisa milih dan bisa jadi bisa
                        melakukan banyak hal bersamaan.”
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <div class="d-flex justify-content-center">
                <img
                  class="mx-auto mt-3"
                  width="80px"
                  src="{{asset('newtemplate/assets/images/Person.png')}}"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End -->

    <!-- Footer -->
    <section>
      <div class="bg-dark-blue h-100 w-100 py-5">
        <div class="px-5">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <img src="{{asset('newtemplate/assets/images/Logo.png')}}" style="width: 8rem" alt="" />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-5 col-md-12 col-sm-12">
              <div class="row">
                <p class="text-white">CV. Asdosku Bakti Nusantara</p>
              </div>
              <div class="row">
                <p class="text-white fs-6 fw-light">
                  Asdosku adalah platform untuk mencari asisten untuk membantu
                  berbagai tugas dan kegiatan di kampus serta proyek ataupun
                  bisnis bagi warga kampus. Kami telah berkolaborasi dengan
                  40++ kampus di Indonesia untuk menjadi bagian dalam kemajuan
                  pendidikan Indonesia.
                </p>
              </div>
              <div class="row">
                <p class="text-white fw-bold">
                  Asdosku dari Kampus untuk Indoesia.
                </p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
              <hr />
              <div class="row">
                <p class="text-white fw-bold">Alamat</p>
              </div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-5"></div>
                <p class="text-white fs-6 fw-light">
                  Jl. DR Soeparno No. 19B Arcawinangun, Purwokerto Banyumas,
                  Jawa Tengah 53113.
                </p>
              </div>
              <div class="row">
                <div class="col">
                  <div class="row">
                    <p class="text-white fs-6 fw-bold">Kontak Kami</p>
                  </div>
                  <div class="row">
                    <ul class="list-unstyled">
                      <li class="text-white mt-1">
                        <img src="{{asset('newtemplate/assets/svg/mail.svg')}}" width="25px" alt="" />
                        cs@asdosku.com
                      </li>
                      <li class="text-white mt-1">
                        <img
                          src="{{asset('newtemplate/assets/svg/instagram.svg')}}"
                          width="25px"
                          alt=""
                        />
                        asdosku_com
                      </li>
                      <li class="text-white mt-1">
                        <img
                          src="{{asset('newtemplate/assets/svg/facebook.svg')}}"
                          width="25px"
                          alt=""
                        />
                        asdosku
                      </li>
                      <li class="text-white mt-1">
                        <img
                          src="{{asset('newtemplate/assets/svg/whatsapp.svg')}}"
                          width="25px"
                          alt=""
                        />
                        0856 4371 5830
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
              <hr />
              <div class="row">
                <p class="text-white fs-6 fw-bold">Metode Pembayaran</p>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col m-1">
                  <img
                    width="100vw"
                    class="rounded"
                    src="{{asset('newtemplate/assets/images/Bsi.png')}}"
                    alt=""
                  />
                </div>
                <div class="col-lg-4 col-md-4 col m-1">
                  <img
                    width="100vw"
                    class="rounded"
                    src="{{asset('newtemplate/assets/images/Bri.png')}}"
                    alt=""
                  />
                </div>
                <div class="col-lg-4 col-md-4 col m-1">
                  <img
                    width="100vw"
                    class="rounded"
                    src="{{asset('newtemplate/assets/images/Bni.png')}}"
                    alt=""
                  />
                </div>
                <div class="col-lg-4 col-md-4 col m-1">
                  <img
                    width="100vw"
                    class="rounded"
                    src="{{asset('newtemplate/assets/images/Gopay.png')}}"
                    alt=""
                  />
                </div>
                <div class="col-lg-4 col-md-4 col m-1">
                  <img
                    width="100vw"
                    class="rounded"
                    src="{{asset('newtemplate/assets/images/Linkaja.png')}}"
                    alt=""
                  />
                </div>
                <div class="col-lg-4 col-md-4 col m-1">
                  <img
                    width="100vw"
                    class="rounded"
                    src="{{asset('newtemplate/assets/images/Dana.png')}}"
                    alt=""
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End -->
  </main>
  @endsection