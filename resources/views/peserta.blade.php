@extends('layouts.peserta')
@section('body')
@if (count($rapatSelf) > 0)
        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <h4 class="mb-1">Rapat yang sedang diikuti</h4>
              <!-- <p class="text-sm">Rapat Tertutup, formal, dan informal</p> -->
            </div>
            <div class="card-body p-3">
              <div class="row">
                @foreach ($rapatSelf as $rapat)
                <div class="col-xl-3 col-md-6 mb-xl-4 mb-4">
                  <div class="card card-blog card-plain">
                    <div class="position-relative">
                      <a class="d-block shadow-xl border-radius-xl" style="height: 250px;width: 250px">
                        <img src="{{ isset($rapat->ruanganDetail) && !is_null($rapat->ruanganDetail) ? $rapat->ruanganDetail->file : 'https://img.freepik.com/free-vector/illustration-businesspeople-having-video-conference_218660-8.jpg?size=626&ext=jpg' }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" style="background-size: cover;background-repeat: no-repeat;background-position: center center;height: 270px !important;object-fit: cover;">
                      </a>
                    </div>
                    <div class="card-body px-1 pb-0">
                      <p class="text-gradient text-dark mb-2 text-sm">{{ date('d / M / Y H:i:s', strtotime($rapat->start)) }}</p>
                      <a href="javascript:;">
                        <h5>
                          {{ $rapat->judul }} <small style="font-size: 12px">( {{ $rapat->getTypeRapat() }} )</small>
                        </h5>
                      </a>
                      <div class="d-flex align-items-center justify-content-between">
                        <a href="detail/{{ urlencode(base64_encode(base64_encode($rapat->id))) }}/rapat" class="btn btn-outline-primary btn-sm mb-0">Sedang diikuti</a>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="people...">
                            <img alt="Image placeholder" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F649%2F115%2Foriginal%2Fuser-icon-symbol-sign-vector.jpg&f=1&nofb=1">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-3 p-3">
              <h6 class="mb-1 text-center"><i>Sedang tidak ada rapat yang kamu ikuti</i></h6>
              <!-- <p class="text-sm">Rapat Tertutup, formal, dan informal</p> -->
            </div>
          </div>
        </div>
        @endif
        @if (count($rapatSendiri) > 0)
        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <h4 class="mb-1">Undangan Rapat</h4>
              <!-- <p class="text-sm">Rapat Tertutup, formal, dan informal</p> -->
            </div>
            <div class="card-body p-3">
              <div class="row">
                @foreach ($rapatSendiri as $rapats)
                <div class="col-xl-3 col-md-6 mb-xl-4 mb-4">
                  <div class="card card-blog card-plain">
                    <div class="position-relative">
                      <a class="d-block shadow-xl border-radius-xl" style="height: 250px;width: 250px">
                        <img src="{{ isset($rapat->ruanganDetail) && !is_null($rapat->ruanganDetail) ? $rapat->ruanganDetail->file : 'https://img.freepik.com/free-vector/illustration-businesspeople-having-video-conference_218660-8.jpg?size=626&ext=jpg' }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" style="background-size: cover;background-repeat: no-repeat;background-position: center center;height: 270px !important;object-fit: cover;">
                      </a>
                    </div>
                    <div class="card-body px-1 pb-0">
                      <p class="text-gradient text-dark mb-2 text-sm">{{ date('d / M / Y H:i:s', strtotime($rapat->start)) }}</p>
                      <a href="javascript:;">
                        <h5>
                          {{ $rapats->judul }} <small style="font-size: 12px">( {{ $rapats->getTypeRapat() }} )</small>
                        </h5>
                      </a>
                      <div class="d-flex align-items-center justify-content-between">
                        <a href="detail/{{ urlencode(base64_encode(base64_encode($rapat->id))) }}/rapat" class="btn btn-outline-primary btn-sm mb-0">Hadiri</a>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="people...">
                            <img alt="Image placeholder" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F649%2F115%2Foriginal%2Fuser-icon-symbol-sign-vector.jpg&f=1&nofb=1">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        @endif
        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <h4 class="mb-1">Rapat Terbuka</h4>
              <!-- <p class="text-sm">Rapat Terbuka</p> -->
            </div>
            <div class="card-body p-3">
              <div class="row">
                @foreach ($rapatTerbuka as $rapat)
                <div class="col-xl-3 col-md-6 mb-xl-4 mb-4">
                  <div class="card card-blog card-plain">
                    <div class="position-relative">
                      <a class="d-block shadow-xl border-radius-xl" style="height: 250px;width: 250px">
                        <img src="{{ isset($rapat->ruanganDetail) && !is_null($rapat->ruanganDetail) ? $rapat->ruanganDetail->file : 'https://img.freepik.com/free-vector/illustration-businesspeople-having-video-conference_218660-8.jpg?size=626&ext=jpg' }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" style="background-size: cover;background-repeat: no-repeat;background-position: center center;height: 270px !important;object-fit: cover;">
                      </a>
                    </div>
                    <div class="card-body px-1 pb-0">
                      <p class="text-gradient text-dark mb-2 text-sm">{{ date('d / M / Y H:i:s', strtotime($rapat->start)) }}</p>
                      <a href="javascript:;">
                        <h5>
                          {{ $rapat->judul }}
                        </h5>
                      </a>
                      <div class="d-flex align-items-center justify-content-between">
                        <a href="detail/{{ urlencode(base64_encode(base64_encode($rapat->id))) }}/rapat" class="btn btn-outline-primary btn-sm mb-0">Hadiri</a>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="people...">
                            <img alt="Image placeholder" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F649%2F115%2Foriginal%2Fuser-icon-symbol-sign-vector.jpg&f=1&nofb=1">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
@endsection